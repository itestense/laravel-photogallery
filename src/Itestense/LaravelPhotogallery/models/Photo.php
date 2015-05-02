<?php
namespace Itestense\LaravelPhotogallery\Models;

class Photo extends \Eloquent
{
  protected $table = 'photos';
  protected $guarded = [];

  public function galleries(){
    return $this->belongsToMany('\Itestense\LaravelPhotogallery\Models\Gallery',
      'galleries_photos');
  }

  public static function getAllRandom()
  {
    return self::all()->shuffle();
  }
  public function getCompletePathAttribute()
  {
	 
	  return \Config::get('laravel-photogallery::upload_dir').'/'.$this->path;
  }
  public function thumbnail($thumb='')
  {
	 if($thumb)
		 $thumb=$thumb.'/';
	return \Config::get('laravel-photogallery::upload_dir').'/'.$thumb.$this->path;
  }

}
