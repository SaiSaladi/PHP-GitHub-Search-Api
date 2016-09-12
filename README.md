# PHP-GitHub-Search-Api
Retrieve search results of GitHub Repositories using GitHub Api and PHP

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

id-->int-->primary key
name-->varchar
html_url-->varchar
made_at-->varchar
pushed_at-->varchar		
description-->varchar-->nullable
stargazers_count-->int

Then used model for storing each record in the table.

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

Files created:
Controller: 		    ApiController.php
View for search : 	search.blade.php
View for Results:	  results.blade.php
Model: 			        value.php


Installation 

—> install the MAMP or XAMP frameworks
—>inside the htdocs of the framework create the Laravel project

—>To create a Laravel Project use the command from terminal
composer create-project laravel/laravel  “project_name_here”

Then replace the following folders in to the laravel project created

—>app folder
	‘Value.php’ is the model for the database
	‘http’ folder which has the ‘routes.php’ and the controllers folder
		Controllers folder has the ‘ApiController.php’ file 

—>database folder  (htdocs/GitHub_Api/database/migrations)
	Inside the migrations we have the database migration file
	‘2016_09_10_042057_Create_Api_Values_table.php’
	To migrate database run the command- ‘php artisan migrate’

—>resources folder (/MAMP/htdocs/GitHub_Api/resources/views/GitApi)
	Inside the GitApi file we have the Views ‘results.blade.php’ 	and	‘search.blade.php’

—>config folder (MAMP/htdocs/GitHub_Api/config)
	we have the app.php which has the application url settings
  	'url' => env('APP_URL', 'http://localhost'),

—>  ‘.env’ this is the file in which all settings are set 

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=Git_Api
	DB_USERNAME=root
	DB_PASSWORD=1234

—> public folder has the index.php
Then just go to the application url http://localhost/GitHub_Api/public/
Thanks






