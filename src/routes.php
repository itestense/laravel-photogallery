<?php

Route::group(['prefix'=>Config::get('laravel-photogallery::route_prefix')], function()
{
  Route::get('/',['uses'=>'Itestense\LaravelPhotogallery\Controllers\MainController@index','as'=>'laravel.photogallery.index']);
  Route::resource('photo',
    'Itestense\LaravelPhotogallery\Controllers\PhotosController');

  Route::resource('gallery',
    'Itestense\LaravelPhotogallery\Controllers\GalleriesController');
  Route::resource('galleries.photos',
    'Itestense\LaravelPhotogallery\Controllers\GalleryPhotosController');
});
