#!/usr/bin/env php
<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
// use Symfony\Component\DomCrawler\Crawler;

$console = new Application('Console Sports', '0.1.0');
/**
 *  Console: Using the console perform an API request to api.espn.com
 */

$console
  ->register('sports:run')
  ->setDescription('Example application')
  ->setHelp('
The <info>sports:run</info> command will print out your argument if it is on the
whitelist of valid sports type.
')
  ->setDefinition(array(
    new InputArgument('sportType', InputArgument::OPTIONAL, 'Please provide a sport type', 'baseball'),
  ))
  ->setCode(function (InputInterface $input, OutputInterface $output) {

    // Only allow the following arguments to validate. Otherwise produce
    // an error message.
    $sportTypeWhitelist = array(
      'baseball',
      'basketball',
      'soccer',
      'hockey',
    );

    $sportType = strtolower($input->getArgument('sportType'));

    if (!in_array($sportType, $sportTypeWhitelist)) {
      $output->writeln('<error>Please provide a valid sport type.</error>');
    } else {
        $output->writeln('<info>' . $sportType . '</info>');
    }
  });

$console->run();
