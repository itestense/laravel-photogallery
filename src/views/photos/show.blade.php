@extends('laravel-photogallery::layouts.master')
@section('content')
<img src="{{Config::get('laravel-photogallery::upload_dir')}}/{{$photo->path}}" />
@stop
