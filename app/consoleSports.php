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
/**
 *  Console: Using the console perform an API request to api.espn.com
 */

$key = '99adppxa2pkmyrb537shwptw';
$uri = 'http://api.espn.com/v1/sports?apikey=';
$resource = $key . $uri;

$request = new Buzz\Message\Request('HEAD', '/', $resource);

$console
  ->register('ESPN:run')
  ->setDescription('.')
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
