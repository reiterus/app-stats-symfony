# Symfony Application Stats

Statistics about your Symfony application: size, files, methods, templates, services, etc.

| #   | Title  | Value                           |
|-----| ------ |---------------------------------|
| 1   | Root folder | /var/www/demo.symfony.localhost |
| 2   | All project in bytes | 94539478 (vendor, var, etc)     |
| 3   | Working files in bytes  | 12104484                        |
| 4   | Number of working files | 519                             |
| 5   | ...including "assets" | 13                              |
| 6   | ...including "bin" | 2                               |
| 7   | ...including "config" | 36                              |
| 8   | ...including "migrations" | 1                               |
| 9   | ...including "public" | 344                             |
| 10  | ...including "templates" | 30                              |
| 11  | ...including "translations" | 48                              |
| 12  | ...including "src" | 35                              |
| 13  | ...including "tests" | 10                              |

To get one of the statistics options, run the following commands:
- general information: `rts:stats:general`
- to be continued :-) ...

To get more detailed information about a specific service run this command `bin/console debug:container rts.app`

![General Statistics](img-services.png)

# Installation
You can install the bundle in two ways

From packagist.org
```shell
composer require reiterus/app-stats-symfony
```

From GitHub repository
```json
{
 "repositories": [
  {
   "type": "vcs",
   "url": "https://github.com/reiterus/app-stats-symfony.git"
  }
 ]
}
```

# Tests

To run tests with visual code coverage, launch the command as follows:

```shell
XDEBUG_MODE=coverage ./vendor/phpunit/phpunit/phpunit \
--configuration phpunit.xml \
--testsuite default \
--coverage-html coverage/
```

Test results will be saved in the `coverage` directory.

**Tip**: `vendor/bin/phpunit --generate-configuration`

# License

This library is released under the [MIT license](LICENSE).
