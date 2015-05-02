<?php
namespace Itestense\LaravelPhotogallery\Controllers;
use Itestense\LaravelPhotogallery\Models\Photo as Photo;
use Itestense\LaravelPhotogallery\Utils\Utils as Utils;
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

	protected function save_file($file)
	{
		$filename = str_random(10).time() .".". 
			$file->getClientOriginalExtension();
		$destination = public_path().\Config::get('laravel-photogallery::upload_dir')."/";
		$upload = $file->move($destination, $filename);
		$img = \Image::make($destination.$filename);
		$formats = \Config::get('laravel-photogallery::formats');
		foreach($formats as $name => $format){
			$img->resize($format['w'],$format['h'],
					function($constraint){
          					$constraint->aspectRatio();
        				});
			$img->save($destination.$name.'/'.
					$filename,$format['q']);
		}
		if( $upload == false )
		{
			return \Redirect::to('gallery.photo.create')
       					->withInput()
       					->withErrors($validation->errors)
       					->with('message', 'Errori');
      		}
      		$photo = new Photo;
      		$photo->name = $file->getClientOriginalName();
      		$photo->description = $file->getClientOriginalName();
      		$photo->path = $filename;
		$photo->save();
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
			$files = \Input::file('images');
			foreach($files as $file)
			{
				$this->save_file($file);
			}	
			return \Redirect::route(Utils::routeprefix("photo.index"));
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
