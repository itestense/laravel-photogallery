@extends('laravel-photogallery::layouts.master')
@section('content')
<h1>{{$gallery->name}}</h1>

<div droppable="true" id="gallery-drop-area" style="min-height:200px;width:600px;border:1px solid #666">

</div>

<div>
@foreach($photos as $ph)
<a draggable="true" photoid="{{$ph->id}}"><img style="max-width:100px;" src="{{Config::get('laravel-photogallery::upload_dir')}}/{{$ph->path}}" 
alt="{{$ph->name}}" title="{{$ph->name}}" ></a>
@endforeach
</div>
<button onclick="updategallery('{{URL::route(Utils::routeprefix('gallery.update'),['id'=>$gallery->id])}}')">{{trans('laravel-photogallery::messages.updategallery')}}</button>
@stop
