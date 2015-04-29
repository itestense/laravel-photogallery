@extends('laravel-photogallery::layouts.master')
@section('content')
<img src="/uploads/photos/{{$photo->path}}" />
@stop
