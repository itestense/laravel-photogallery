<?php
namespace Itestense\LaravelPhotogallery\Controllers;
use Itestense\LaravelPhotogallery\Models\Photo as Photo;
class PhotosController extends \BaseController {

  protected $photo;

  public function __construct()
  {
    $this->photo = new Photo;
  }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    return \View::make('laravel-photogallery::photos.index',['photos'=>Photo::all()]);
 	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return \View::make('laravel-photogallery::photos.create')
      ->nest('form','laravel-photogallery::forms.create-photo');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  $input = \Input::all();
		$validation = new \Itestense\LaravelPhotogallery\Validators\Photo;
		if($validation->passes())
		{
      $filename = str_random(10).time() .".". \Input::file('path')->getClientOriginalExtension();
			$destination = public_path()."/uploads/photos/";
      $upload = \Input::file('path')->move($destination, $filename);
      $img = \Image::make($destination.$filename);
      $formats = \Config::get('laravel-photogallery::formats');
      foreach($formats as $name => $format){
        $img->resize($format['w'],$format['h'],function($constraint){
          $constraint->aspectRatio();
        });
        $img->save($destination.$name.'/'.$filename,$format['q']);
      }
			if( $upload == false )
			{
				return \Redirect::to('gallery.photo.create')
       			->withInput()
       			->withErrors($validation->errors)
       			->with('message', 'Errori');
      }
      $photo = new Photo;
      $photo->name = \Input::get('name');
      $photo->description = \Input::get('description');
      $photo->path = $filename;
			$photo->save();
			//return \Redirect::route("gallery.photo.show", array('id' => $photo->id));
		}
		else
		{
			return \Redirect::route('gallery.photo.create')
            ->withInput()->withErrors($validation->errors)
            ->with('message', \Lang::get('gallery::gallery.errors'));
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
    //
    $photo = $this->photo->findOrFail($id);
    //$photo = NULL;
    return \View::make('laravel-photogallery::photos.show',['photo'=>$photo]);
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
