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

/**
 * Load ESPN key file.
 * The ESPN key file contains the consumer keys that allows access to API
 *
 * 1. Create an account with ESPN and the key should be found at:
 *     - http://developer.espn.com/apps/mykeys
 * 2. In your 'secret.key' file set $consumerKey variable:
 *   <code>
 *   <?php
 *     $consumerKey = 'mykey';
 *   </code>
 */
// if (file_exists(__DIR__ .'secret.key' ))
//   @include 'secret.key';
$consumerKey = '99adppxa2pkmyrb537shwptw';

// Constructor
$console = new Application('Console: ESPN', '0.1.0');

/**
 *  Console: Provides example of validation of arguments and call to api.espn.com
 */

$client = new Client('https://api.espn.com/{version}/sports');
$request = $client->get("sports?apikey=$consumerKey");
$response = $request->send();

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
  ->setCode(function (InputInterface $input, OutputInterface $output) use ($response) {

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
        $output->writeln("<info>$response</info>");
    }
  });

$console->run();
