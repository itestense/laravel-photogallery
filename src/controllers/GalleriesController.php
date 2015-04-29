<?php
namespace Itestense\LaravelPhotogallery\Controllers;
use Itestense\LaravelPhotogallery\Models\Gallery as Gallery;
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
      ['galleries'=>Gallery::all()]);
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
      return \Redirect::route("gallery.gallery.index");
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
    //return \View::make('laravel-photogallery::galleries.show',
    //  ['gallery'=>Gallery::findOrFail($id)]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
