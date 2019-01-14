# ToDoList

It's a Symfony 3.4 project. Improve a todolist application.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them

```
PHP 7.2
MySQL 5.7
SMTP Mail Server
Redis Server
```

### Installing

First :

```
git clone https://github.com/alexandrecorroy/Todolist.git
```

Update "parameters.yml.dist" with your parameters and rename it into "parameters.yml"

```
parameters:
    database_host: localhost
    database_port: null
    database_name: todolist
    database_user: root
    database_password: null
    mailer_transport: smtp
    mailer_encryption: ssl
    mailer_host: smtp-relay.sendinblue.com
    mailer_user: your_email
    mailer_password: password
    secret: secret
    mailer_from: contact@todolist.com
    mailer_port: 465
```

Install Dependencies :

```
composer install
```

Install DB :

```
php bin/console d:d:c
php bin/console doctrine:schema:update --force
```

Install fixtures :

```
php bin/console doctrine:fixtures:load
```

To test user features, go to ^/login with credentials : 

```
username: "user"
password: "user"
```

To test admin features, go to ^/login with credentials : 

```
username: "admin"
password: "admin"
```

## Tests

Testing the application with PHPUnit :
```
./vendor/bin/phpunit
```

[Code Coverage Link](https://github.com/alexandrecorroy/Todolist/tree/master/coverage-result)

[PhpMetrics Report](https://github.com/alexandrecorroy/Todolist/tree/master/myreport)


## Authors

* **Corroy Alexandre** - *Initial work* - [CORROYAlexandre](https://github.com/alexandrecorroy)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## SensioLabs Insight

[![SymfonyInsight](https://insight.symfony.com/projects/b1c7dcfd-0b7a-41da-a366-4872042885f8/big.svg)](https://insight.symfony.com/projects/b1c7dcfd-0b7a-41da-a366-4872042885f8)
