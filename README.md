[![Build Status](https://travis-ci.org/astronati/php-world-cups-data-response-parser.svg?branch=master)](https://travis-ci.org/astronati/php-world-cups-data-response-parser)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/b58fe33c44264d56946fb12331100a6e)](https://www.codacy.com/app/astronati/php-world-cups-data-response-parser?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=astronati/php-world-cups-data-response-parser&amp;utm_campaign=Badge_Grade)
[![Latest Stable Version](https://poser.pugx.org/astronati/world-cups-data-response-parser/v/stable)](https://packagist.org/packages/astronati/world-cups-data-response-parser)
[![License](https://poser.pugx.org/astronati/world-cups-data-response-parser/license)](https://packagist.org/packages/astronati/world-cups-data-response-parser)

# World Cups Data Response Parser (Stoccoli)
Allows to map responses provided by the World Cups Data API.

## Installation
You can install the library and its dependencies using `composer` running:
```sh
$ composer require astronati/world-cups-data-response-parser
```

### Usage
The library allows to return a model per each response and its content (round, match, team, etc...).

##### Example
The following snippet can be helpful:

```php
use WCDRP\Response\ResponseParser;
...
// Obtain a Response
$apiResponse = ... // Save this the response from the World Cups Data API
$response = ResponseParser::create($apiResponse);
...
// Get first round
$round = $response->getRounds()[0];
echo $round->getNumber(); // 1...
```

For more details please take a look at [Response](https://github.com/astronati/php-world-cups-data-response-parser/tree/master/src/Response).

## Development
The environment requires [phpunit](https://phpunit.de/), that has been already included in the `dev-dependencies` of the
`composer.json`.

### Dependencies
To install all modules you just need to run following command:

```sh
$ composer install
```

### Testing
Tests files are created in dedicates folders that replicate the
[src](https://github.com/astronati/php-world-cups-data-response-parser/tree/master/src) structure as follows:
```
.
+-- src
|   +-- [folder-name]
|   |   +-- [file-name].php
|   ...
+-- tests
|   +-- [folder-name]
|   |   +-- [file-name]Test.php
```

Execute following command to run the tests suite:
```sh
$ composer test
```

Run what follows to see the code coverage:
```sh
$ composer coverage
```

## License
This package is released under the [MIT license](LICENSE.md).

