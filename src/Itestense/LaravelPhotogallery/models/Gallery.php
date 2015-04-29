<?php
namespace Itestense\LaravelPhotogallery\Models;

class Gallery extends \Eloquent
{
  protected $table = 'galleries';
  protected $guarded = [];  
  public $timestamps = false;

  public function photos()
  {
    return $this->belongsToMany('\Itestense\LaravelPhotogallery\Models\Photo',
      'galleries_photos');
  }
}
