# stats
Statistical Package for a site

# Requirements
- - -

- PHP 5.4 or above
- Laravel 5.2 or above

# Installation 
- - - 
This package use the Agent.php class for package : 
[jenssegers/agent](https://github.com/jenssegers/agent)

### Step 1 : Install the package 
Install the package with composer
```sh
$ composer require athakim/stats dev-master
```
Then add the service provider to your config/app.php:
```sh
Athakim\Stats\StatsServiceProvider::class,
```
Add the aliase to your config/app.php
```sh
'Stats'     => Athakim\Stats\Facades\Stats::class,
```
Add the visitors middleware to your app/Http/Kernel.php

```sh
protected $routeMiddleware = [
        ...
        
        'visitors' => \Athakim\Stats\Middleware\VisitorsMiddleware::class,
    ];
```

### Step 2: Publish the package files
Run the vendor:publish command to publish the package config, views and migrations to your app's directories:

```sh
php artisan vendor:publish
```

### Step 3: Update your database

Run your migrations:
```sh
php artisan migrate
```


### Usage
To begin we must first enable the filter, adding middleware visitors has your route group to record the visits and visitors:
```sh
Route::group(['middleware' => ['web','visitors']], function () {

	Route::get('/', function () {
		...
		# Your code 
	});
	...
});
```
As soon as you install and enable it, package 'Stats' will start storing all information you tell it to, then you can in your application use the Stats Facade to access everything. Here are some of the methods and relatioships available:
```$
# Get the number of visits within a year
$nb_visits_in_year = Stats::getVisitsOfYear('21/01/2016')->count();
# Get the number of visits within a month
$nb_visits_in_month = Stats::getVisitsOfMonth('21/01/2016')->count();
# Get the number of visits in a day
$nb_visitors_in_day = Stats::getVisitorsOfDay('21/01/2016')->count();
# you can also get collections 
$visits_in_year = Stats::getVisitorsOfYear('21/01/2016');
...
# get all visitors collection 
$visitors = Stats::getAllVisitors();
#get all pages visited collection
$pages = Stats::getAllPages();

# get number of visitors  
$nb = Stats::visitors();
....
```
Licence 
---

MIT