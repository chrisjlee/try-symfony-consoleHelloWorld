#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
// use Symfony\Component\DomCrawler\Crawler;

$console = new Application('Hello World', '0.1.0');

$console
  ->register('say:hello')
  ->setDefinition(array(
      new InputArgument('person', InputArgument::OPTIONAL, 'Who shall we greet?', 'world'),
    ))
  ->setDescription('Greet someone.')
  ->setHelp('
The <info>say:hello</info> command will offer greetings.

<comment>Samples:</comment>
  To run with default options:
    <info>php console.php say:hello</info>
  To greet someone specific
    <info>php console.php say:hello</info>
')
  ->setCode(function (InputInterface $input, OutputInterface $output) {
    $person = $input->getArgument('person');
    $output->writeln('Hello <info>'.$person.'</info>');
  });

/**
 *  Console Application: Using an Example Argument and validation
 */

$console
  ->register('google:run')
  ->setDescription('Google console application that retrieves search.')
  ->setDefinition(array(
    new InputArgument('sportType', InputArgument::OPTIONAL, 'Please provide a sport type', 'baseball'),
  ))
  ->setCode(function (InputInterface $input, OutputInterface $output) {

    $sportTypeWhitelist = array(
      'baseball',
      'basketball',
      'soccer',
      'hockey',
    );

    $sportType = $input->getArgument('sportType');

    if (!in_array($sportType, $sportTypeWhitelist)) {
      $output->writeln('<error>Please provide a valid sport type.</error>');
    } else {
        $output->writeln($sportType);
    }

  });

$console->run();
