<?php
namespace Itestense\LaravelPhotogallery\Utils;
class Utils
{
	public static function routeprefix($routeName)
	{
		return str_replace('/', '.', \Config::get('laravel-photogallery::route_prefix')).".".$routeName;
	}
}
