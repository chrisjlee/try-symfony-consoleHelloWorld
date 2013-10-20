<?php
require_once('vendor/autoload.php');

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


$console = new Application();

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

$console->run();
