#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
// use Symfony\Component\DomCrawler\Crawler;

$console = new Application('ESPN', '0.1.0');

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
