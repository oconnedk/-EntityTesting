#EntityTestingBundle

The idea behind this [Symfony](http://symfony.com) bundle is to ease the testing of your Doctrine entities within a Symfony 3 project using [PHPUnit](https://phpunit.de/) functional tests.
It enables you to make changes to your entity database (additions, deletions and updates) allowing you to check your entity referential integrity without any of the changes taking effect.
For each PHPUnit test, the state of the database is fresh and squeaky clean.

##Requirements

|Product|Min Version|
|---|---|
|**Symfony**|3|
|**PHP**|5.5.9|

##Usage

Edit **composer.json** as follows:

    "repositories": [
        {
            ...
            "type": "vcs",
            "url": "https://github.com/oconnedk/EntityTesting"
            ...
        }
    ],
    "require": {
        "agutils/entity-testing-bundle": "dev-master"
    },

