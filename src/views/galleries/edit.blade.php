@extends('laravel-photogallery::layouts.master')
@section('content')
<style>
div.photosource a,div#gallery-drop-area a  {
	display:block;
	width:100px;
	height:100px;
	overflow:hidden;
	float:left;
	margin:5px;
}
div#gallery-drop-area {
	background-color: #DDDDDD;
	border:1px solid #999;
	border-radius: 5px;
}
</style>
<div class="container">
<div class="row">
	<div class="col-xs-12">
		<h1>{{$gallery->name}}</h1>
	</div>
</div>
<div class="row">
	<div class="col-xs-6">
		<div droppable="true" id="gallery-drop-area" style="min-height:200px;width:100%;border:1px solid #666">

		</div>
	</div>
	<div class="col-xs-6 photosource">
		<div>
		Cerca: <input class="form-control" type="text" /> <button onclick="searchphotos('{{Utils::routeprefix('searchphoto')}}')" />
		</div>
		<div droppable="true">
		@foreach($photos as $ph)
			<a draggable="true" photoid="{{$ph->id}}"><img style="max-width:100px;" src="{{Config::get('laravel-photogallery::upload_dir')}}/{{$ph->path}}" alt="{{$ph->name}}" title="{{$ph->name}}" ></a>
		@endforeach
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
	<button onclick="updategallery('{{URL::route(Utils::routeprefix('gallery.update'),['id'=>$gallery->id])}}')">{{trans('laravel-photogallery::messages.updategallery')}}</button>
	</div>
</div><!-- /row -->
</div><!-- /container -->
@stop
