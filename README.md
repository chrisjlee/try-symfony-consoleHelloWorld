### Symfony2 Console Examples

These files provide some practical examples of what one can do with the Symfony2
console component. Each file progressively adds more fun functionality:

## Requirements

* PHP 5.3+
* Composer
* Git
* PHP libcurl library

<hr />

### Example 1: Hello World

Filename: app/console.php

#### Description:

In this is an example console application, it should return a hello message.
Run it via the following command in Terminal:

<code>php app/console.php say:hello</code>

#### Expected output

You should be able to pass in an argument and it'll print out the argument.
It doesn't involve any valiation.

<hr />

### Example 2: Sport example

Filename: app/consoleSports.php

#### Description:

This is an example console application. Run it via the following command in Terminal:

<code>php app/console.php sport:run</code>

#### Expected output

Validates the argument. It must be one of the following items in the whitelist:

* baseball
* basketball
* soccer
* hockey

If argument validates it'll print out the argument you wanted. Otherwise, you
will get a plain old error message.

#### Thanks

Special thanks goes to the following resources for giving me the push in the
right direction as to how to go about writing these examples:

* [Symfony Console Component](http://talater.com/symfony_console_component/)
* [Building CLI apps with Symfony Component](http://dev.umpirsky.com/building-cli-apps-with-symfony-console-component/)



