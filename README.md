# Laravel SchemaCrawler

[![Latest Version on Packagist](https://img.shields.io/packagist/v/daniel-werner/laravel-schemacrawler.svg?style=flat-square)](https://packagist.org/packages/daniel-werner/laravel-schemacrawler)
[![Build Status](https://img.shields.io/travis/daniel-werner/laravel-schemacrawler/master.svg?style=flat-square)](https://travis-ci.org/daniel-werner/laravel-schemacrawler)
[![Quality Score](https://img.shields.io/scrutinizer/g/daniel-werner/laravel-schemacrawler.svg?style=flat-square)](https://scrutinizer-ci.com/g/daniel-werner/laravel-schemacrawler)
[![Total Downloads](https://img.shields.io/packagist/dt/daniel-werner/laravel-schemacrawler.svg?style=flat-square)](https://packagist.org/packages/daniel-werner/laravel-schemacrawler)

This package is a wrapper for the [SchemaCrawler](https://www.schemacrawler.com/). It allows you to generate ER diagram right from the database.
It is capable of creating database diagram from the default schema with zero configuration, but it also offers configuration options for more advanced usage. 

## Requirements
This package ships with the built in SchemaCrawler, and it requires installed `java` version 8 and `Graphviz`.

MacOS users can install Graphviz via HomeBrew:
```bash
brew install graphviz
```

Homestead or Ubuntu users can install it via package manager:
```bash
sudo apt-get install graphviz
```

## Installation

You can install the package via composer:

```bash
composer require daniel-werner/laravel-schemacrawler --dev
```

## Usage
You can generate the diagram using the console command or accessing the `/schema` url.

### Console command
```bash
php artisan schema:generate
```

Running this command will generate a pdf version of the default configured database, 
the `schema.pdf` will be placed in the `storage/app/` directory.

The possible configuration options are the following:
 
 ```
--output-file[=OUTPUT-FILE]       [default: "schema.pdf"] The name of the generated file
--output-format[=OUTPUT-FORMAT]   [default: "pdf"] The output file type, possible values: pdf, png, svg, html
--connection[=CONNECTION]         [default: "default"] The connection name to use for diagram generation
--info-level[=INFO-LEVEL]         [default: "standard"] Info level for SchemaCrawler, possible values are :detailed, maximum, minimum, standard, unknown
--command[=COMMAND]               [default: "schema"] Command for the SchemaCrawler
```

The following commands are available:

`brief`          Shows basic schema information, for tables, views and routines,
                  columns, primary keys, and foreign keys
                  
`count`          Shows counts of rows in the tables
 
`details`        Shows maximum possible detail of the schema, including
                  privileges, and details of privileges, triggers, and check
                  constraints
                  
`dump`           Shows data from all rows in the tables
 
`lint`           Find lints (non-adherence to coding standards and conventions)
                  in the database schema
                  
`list`           Shows a list of schema objects
 
`quickdump`      Shows data from all rows in the tables, but row order is not
                  guaranteed - this can be used with a minimum info-level for
                  speed
                  
`schema`         Shows the commonly needed detail of the schema, including
                  details of tables, views and routines, columns, primary keys,
                  indexes, foreign keys, and triggers
                  
### Url usage
By default the package registers the `/schema` route in your application. 
Visiting this url the package will generate a pdf version of the default database.

The default configuration can be overwritten with the following query parameters (e.g. `/schema?output_file="database.pdf"`):


`output_file`  The name of the generated file

`output_format` The output file type, possible values: pdf, png, svg, html

`connection` The connection name to use for diagram generation

`info_level` Info level for SchemaCrawler, possible values are: detailed, maximum, minimum, standard, unknown

`command` - See the available commands above


### Configuration
The default values for the above detailed configuration options are set up in the package's config file. 
If you'd like to change these default values, publish the config file with the following command:

```bash
php artisan vendor:publish --provider="DanielWerner\LaravelSchemaCrawler\LaravelSchemaCrawlerServiceProvider"
```

The above command will publish the `laravel-schemacrawler.php` file to your application's `config` directory.

### Example output

This is the database schema of my pet projects [Tracy](https://github.com/daniel-werner/tracy).

![](https://www.wernerd.info/wp-content/uploads/2019/09/schema.png)
 
### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email vernerd@gmail.com instead of using the issue tracker.

## Credits

- [Daniel Werner](https://github.com/daniel-werner)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).