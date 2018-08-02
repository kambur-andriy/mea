# MEA
My English Assistant

# Description

MEA - is a personal electronic dictionary. The main features:

* Translate words
* Add words to the dictionary
* Revise words
* Practice words

# Installation

MEA was created using [Laravel Framework](https://laravel.com/) and [Material Dashboard Template](https://demos.creative-tim.com/material-dashboard/examples/dashboard.html)

* Clone project
* Rename .env.example to .env
* Open .env file and set up database credentials and Lingvo API Key 
* Generate new application key
``` 
php artisan key:generate
``` 
* Create database structure
``` 
php artisan migrate
```
* Configure a web server
 ```        
        <VirtualHost *:80>
            ServerName mea.com
            DocumentRoot /var/www/html/mea/public
        
            <Directory /var/www/html/mea/public>
                DirectoryIndex index.php
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
            </Directory>
        
            ErrorLog ${APACHE_LOG_DIR}/error.log
            CustomLog ${APACHE_LOG_DIR}/access.log combined
        </VirtualHost>
 ```



 