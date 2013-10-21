#!/usr/bin/env php
<?php
namespace CJL;

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Guzzle\Http\Client;

// Load key file
if (file_exists(__DIR__ .'secret.key' ))
  @include 'secret.key';

// Create application
$console = new Application('Console: ESPN', '0.1.0');

/**
 *  Console: Provides example of validation of arguments
 */


$client = new Client('http://api.espn.com');

$console
  ->register('espn:run')
  ->setDescription('Example application that performs api calls to api.espn.com')
  ->setHelp('
The <info>espn:run</info> command will perform API call to espn.com based on the
sports type.
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
