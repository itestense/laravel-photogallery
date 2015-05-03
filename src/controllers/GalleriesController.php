<?php
namespace Itestense\LaravelPhotogallery\Controllers;
use Itestense\LaravelPhotogallery\Models\Photo as Photo;
use Itestense\LaravelPhotogallery\Models\Gallery as Gallery;
use Itestense\LaravelPhotogallery\Utils\Utils as Utils;

class GalleriesController extends \BaseController {

  protected $gallery;

  public function __construct()
  {
    $this->gallery = new Gallery;
  }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    	return \View::make('laravel-photogallery::galleries.index',
	    ['galleries'=>Gallery::all()->orderBy('prio')]);
	    //->nest('deleteform','laravel-photogallery::forms.delete-gallery');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('laravel-photogallery::galleries.create')
      ->nest('form','laravel-photogallery::forms.create-gallery');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    //
    $input = \Input::all();
    $validation = new \Itestense\LaravelPhotogallery\Validators\Gallery;
    if($validation->passes()){
      $g = new Gallery;
      $g->name = \Input::get('name');
      $g->save();
      return \Redirect::route(Utils::routeprefix("gallery.index"));
    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    		return \View::make('laravel-photogallery::galleries.show',
    			  ['gallery'=>Gallery::findOrFail($id)]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gallery = Gallery::findOrFail($id);
		//$photos = $gallery->photos(); This is the right one
		//This is for debugging
		$photos = Photo::all();
		return \View::make('laravel-photogallery::galleries.edit',
      ['gallery'=>$gallery,'photos'=>$photos])
      ->nest('form','laravel-photogallery::forms.create-photoingallery',
	      ['gallery'=>$gallery,'photos'=>$photos]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$photos = \Input::get('photos');
		$gallery = Gallery::findOrFail($id);

		//TODO: Remove photos
		$gallery->photos()->detach();
		$i=0;
		foreach($photos as $ph){
			//Add photo
			$gallery->photos()->attach($ph,['prio'=>$i]);
			$i++;
		}
		echo "Added photos!";
		//Save
		$gallery->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Gallery::findOrFail($id)->delete();
		return \Redirect::route(Utils::routeprefix("gallery.index"));
	}


}
