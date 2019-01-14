# Contributing

Visit [github.com/alexandrecorroy/Todolist](https://github.com/alexandrecorroy/Todolist "TodoList Project") for the project website.

- Make sure you have execute `composer install`
- Be sure you are in the root directory

## Resources

If you wish to contribute to `todolist` project, please be sure to read to the following resources:

 -  Coding Standards: [PSR-0/1/2/4](https://github.com/php-fig/fig-standards/tree/master/accepted)
 -  Git Guide: [README-GIT.md](https://github.com/prooph/event-store-symfony-bundle/blob/master/README-GIT.md)
 -  CleanCode : [Clean Code PHP](https://github.com/errorname/clean-code-php)
 -  Webpack Encore : [How to install Webpack Encore](https://symfony.com/doc/current/frontend/encore/installation.html)
 -  Code Sniffer : [How to install Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

If you are working on new features, or refactoring an existing component, please create an issue first, so we can discuss
it.

## WebPack Encore

New CSS code must be write in Your_Project_Name/assets/css/app.scss
New JS code must be write in Your_Project_Name/assets/css/app.js

To build the assets, run:

  ```sh
 # compile assets once
 $ yarn encore dev

 # or, recompile assets automatically when files change
 $ yarn encore dev --watch

 # on deploy, create a production build
 $ yarn encore production
  ```

## Running tests

To run tests execute *phpunit*:

  ```sh
  $ ./vendor/bin/phpunit
  ```

## Running PHPCodeSniffer

To check coding standards execute *phpcs*:

  ```sh
  $ ./vendor/bin/phpcs
  ```

To auto fix coding standard issues execute:

  ```sh
  $ ./vendor/bin/phpcbf
  ```
