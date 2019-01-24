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
 -  Git : [Create a pull request](https://help.github.com/articles/creating-a-pull-request)

If you are working on new features, or refactoring an existing component, please create an issue first, so we can discuss
it.

#Submit an issue

The ticketing system is also hosted on GitHub:

TodoList : https://github.com/alexandrecorroy/Todolist/issues

#Make a Pull Request

The best way to submit a patch is to make a Pull Request on GitHub. First, you should create a new branch from the master. Assuming you are in your local Propel project:
  ```sh
$ git checkout -b fix-my-patch master
  ```
Now you can write your patch in this branch. Don’t forget to provide tests with your fix to prove both the bug and the patch. It will ease the process to accept or refuse a Pull Request.

When you’re done, you have to rebase your branch to provide a clean and safe Pull Request.
  ```sh
$ git remote add upstream https://github.com/alexandrecorroy/Todolist
$ git checkout master
$ git pull --ff-only upstream master
$ git checkout fix-my-patch
$ git rebase master
  ```
Once done, you can submit the Pull Request by pushing your branch to your fork:
  ```sh
$ git push origin fix-my-patch
  ```
Go to your fork of the project on GitHub and switch to the patched branch (here in the above example, fix-my-patch) and click on the “Compare and pull request” button. Add a short description to this Pull Request and submit it.

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
