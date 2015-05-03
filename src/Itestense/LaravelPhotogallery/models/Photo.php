<?php
namespace Itestense\LaravelPhotogallery\Models;

class Photo extends \Eloquent
{
  protected $table = 'photos';
  protected $guarded = [];

  public static function boot()
  {
	parent::boot();
	static::deleting(function($photo)
  	{
		$photo->galleries()->detach($photo->id);
		return true;
	});
	static::deleted(function($photo){
		unlink(public_path().\Config::get('laravel-photogallery::upload_dir').'/'.$photo->path);
		$destination =  public_path().\Config::get('laravel-photogallery::upload_dir')."/";
		$formats = \Config::get('laravel-photogallery::formats');
		foreach($formats as $name => $format){
			unlink($destination.$name.'/'.$photo->path);
		}
	});
	static::created(function($photo){
		$destination =  public_path().\Config::get('laravel-photogallery::upload_dir')."/";
		$orig = $destination.$photo->path;
		$img = \Image::make($orig);
		$formats = \Config::get('laravel-photogallery::formats');
		foreach($formats as $name => $format){
			$img->resize($format['w'],$format['h'],
					function($constraint){
          					$constraint->aspectRatio();
        				});
			$img->save($destination.$name.'/'.
					$photo->path,$format['q']);
		}
	});
  }
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
