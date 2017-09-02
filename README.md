# CI_Ratchet

A simple chat application in CodeIgniter using websocket with Ratchet. Integrated with models, libraries, helpers and CI stuff.

## Install

1. Get the project from this repository
2. [Install composer](https://getcomposer.org/download/)
3. In your computer, go to the project root directory and run `composer install` to install the dependencies

## Setup

1. Configure base URL in `application/config/config.php` (line 26), if you have one
2. Configure the websocket port in `application/config/constants.php` (line 87), or leave it with default value

## Usage
1. Go to the project root directory and run `php index.php ratchet/bin/RatchetServer` and let server running.
2. Open two tabs in your browser and access `http://[your_domain]/ratchet/demo` and have fun!

### Files
* Ratchet Server: `application/controllers/ratchet/bin/RatchetServer.php`
* Ratchet Class: `application/controllers/ratchet/Ratchet.php`
* Chat Controller: `application/controllers/ratchet/Demo.php`
* Chat View: `application/views/ratchet/ratchet.php` (the websocket connection is here)
