<?php
namespace Itestense\LaravelPhotogallery\Controllers;
class MainController extends \BaseController
{
	public function index(){
		return \View::make('laravel-photogallery::index');
	}
}
