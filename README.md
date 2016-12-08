# PAE EM4 - Web Frontend

:octocat: Welcome to the PAE_EM4 web frontend repository! :blue_heart:

## About this Project
This project is part of a larger University assignment. Its aim is it to provide a view for a custom-written REST API.
 
### ToDo
- [x] put on github
- [ ] Homepage
- [ ] Project Page


### Branch Structure
**master** <br />
master is my stable branch; anything on master is bug-tested,
deployment-ready code. It contains all releases of this project.

**developer** <br />
developer is my almost-stable branch; anything here is "frontline alpha"
and supposed to work without crashes - mostly. :blush:

**fix and feature** <br />
Any branches with the suffixes fix_ and feature_ added to their name
are anything but stable. They represent my bleeding edge of 
development and reflect what feature or bug I'm currently working on.
Branches with fix_ will be deleted as soon as I'm done debugging.

## Usage
Before this project can be used, the dependencies need to be downloaded through Composer.

1. Download composer [here](https://getcomposer.org/download/) if you have not yet done so,
either locally or globally. A smart IDE (like PhpStorm, which I use) may perform this step for you.

2. Execute "install".
    * local install with the phar-file: `php path/to/composer.phar install`
    * global install: `composer install`
    
3. Sit back and watch the magic! :sparkles:

It is recommended to run this project under PHP 7.1. To host a local test-server, 
open your shell of choice in the project root and type: <br />
    `cd htdocs` <br />
    `php -S 127.0.0.1:80` <br />
Then, use your browser and navigate it to the above URL. The homepage should be displayed to you.

## Dependencies
This project has been set up using a [simple PHP boilerplate](https://github.com/janoszen/university-php-boilerplate). <br>
All dependencies for this project are managed by [Composer](https://getcomposer.org/). The following libraries are used:

- [Auryn DIC](https://github.com/rdlowrey/auryn)
- [Guzzle HTTP](http://guzzlephp.org/)
- [FastRoute](https://github.com/nikic/FastRoute)
- [Twig](http://twig.sensiolabs.org/)

This project aims to follow the [PSR 4](http://www.php-fig.org/psr/psr-4/) 
and [PSR 7](http://www.php-fig.org/psr/psr-7/) standards.
