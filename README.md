# PHP-GitHub-Search-Api
Retrieve search results of repositories using GitHub Api and PHP

GitHub Search Api 

The Application is developed using Laravel Framework and MAMP stack.
The front is designed using the Bootstrap CSS framework and JQuery Javascript.
The Api call is made using the Curl.

The application uses a MVC design pattern.

A simple Controller is used for receiving the search request and then processing the data and rendering the records view.

Used the Migration to create the required table model.
‘2016_09_10_042057_Create_Api_Values_table.php’ is the migration name created.
Php Command ‘php artisan migrate’ will migrate the table. 
The table Structure is 

id				int 			constraint primary key
name				varchar
html_url			varchar
made_at			varchar
pushed_at			varchar		
description		varchar		nullable
stargazers_count	int

Then used model for storing each record in the table.
Install the dependencies using the composer.

The ports used are 
Apache Port: 80
MySQL Port: 3306


Database Config: from .env file 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Git_Api
DB_USERNAME=root
DB_PASSWORD=1234

Passing only the username in Curl Request to GitApi so can only send 10 requests per minute. This limit can be increased by using OAuth.

Files used:
Controller: 		    ApiController.php
View for search : 	search.blade.php
View for Results:	  results.blade.php
Model: 			        value.php

Installation
Install Laravel using Composer
Place the files in this Repository to your project files, following files structure
Run the php artisan migrate command to migrate the database.
Start your server and database.
Run the application from browser by going to The search page URL is http://localhost/GitHub_Api/public/


