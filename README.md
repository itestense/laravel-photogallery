# laravel-photogallery
Laravel Photogallery is an administrative interface for Laravel plus some useful modules that can be used in the frontend. You can upload images on the server, obtain thumbnails having different sizes and place them into galleries with a specific order.

- **Author:** Paolo Niccolò Giubelli - ITestense SNC
- **Company Website:** http://www.itestense.it

##Warning!

This package is still in the early development stage, so please don't use it inproduction.
Be patient for a while! :-) If you want to collaborate, you're welcome.


##Prerequisites

You need php-gd module.

##Dependencies

This module will also install `intervention/image` and `illuminate/support`
##Install

###Composer
Simply add this line to composer.json:

	"itestense/laravel-photogallery":"*"

and run `composer update`. Then you need to register the service provider in `config/app.php` in the `providers` array.

	'providers' => [
	...
	'Itestense\LaravelPhotogallery\LaravelPhotogalleryServiceProvider',
	...
	]

##Configuration
Once the package is installed, publish the config file with:

	php artisan config:publish itestense/laravel-photogallery

###Options

Below is a list of all the available options:

- [Upload directory](#upload_dir)
- [Route prefix](#route_prefix)
- [Thumbnails](#thumbnails)

####<a name="upload_dir"></a>Upload directory
The directory must exist

	...
	'upload_dir'=>'/public/uploads/photos',
	...

####<a name="route_prefix"></a>Route prefix
All plugins routes will prefixed with this string

	...
	'route_prefix'=>'/admin/gallery',
	...

####<a name="thumbnails"></a>Thumbnails
You can specify an arbitrary number of thumbnail formats, choosing maximum width (`w`), height (`h`) and compression quality (`q`)

	...
	'formats'=>[
		's1'=>['w'=>100,'h'=>null,'q'=>96],
		'big'=>['w'=>1024,'h'=>768,'q'=>100],
		...
	],
	...
Last edit: Saturday, 02. May 2015 07:02PM 


