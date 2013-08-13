cakephp-opauth-example
======================

CakePHP project that shows how to work with the cakephp-opauth plugin.

Installation
===

To install this you needs composer. Run the following commands:

    $ git clone https://github.com/beeman/cakephp-opauth-example.git
    $ cd cakephp-opauth-example/app/
    $ composer install

Create the tables in your database:

    CREATE TABLE `users` (
      `id` char(36) NOT NULL DEFAULT '',
      `username` varchar(255) DEFAULT NULL,
      `password` varchar(255) DEFAULT NULL,
      `email` varchar(255) DEFAULT NULL,
      `avatar` varchar(255) DEFAULT NULL,
      `active` tinyint(1) DEFAULT '1',
      `admin` tinyint(1) DEFAULT '0',
      `modified` datetime DEFAULT NULL,
      `created` datetime DEFAULT NULL,
      `lastlogin` datetime DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
    
    CREATE TABLE `users_opauths` (
      `id` char(36) NOT NULL DEFAULT '',
      `user_id` char(36) NOT NULL,
      `uid` varchar(100) NOT NULL,
      `provider` varchar(100) NOT NULL,
      `info` text,
      `credentials` text,
      `raw` text,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
    

* Configure app/Config/database.php
* Configure the strategies by putting the right API keys in app/Config/bootstrap.php . Refer to https://github.com/opauth on how to configure the strategies

Start the development server
===
    $ ./Console/cake server -p 8080

Todo
===
* Code should be a plugin
* Implement Fat Model/Skinny Controller
* ?
