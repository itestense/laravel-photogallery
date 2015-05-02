@extends('laravel-photogallery::layouts.master')
@section('content')
<h1>Galleries</h1>
@if(count($galleries)==0)
{{trans('laravel-photogallery::messages.nogalleriesfound')}} <a href="{{URL::route(Utils::routeprefix('gallery.create'))}}">Create one?</a>
@endif
<table class="table table-hover">
  <tbody>
  @foreach($galleries as $g)
    <tr>
      <td>{{$g->id}}</td>
      <td>{{$g->name}}</td>
      <td><a href="{{URL::route(Utils::routeprefix('galleries.photos.index'),['gallery_id'=>$g->id])}}">Gestisci</a></td>
	<td>@include('laravel-photogallery::forms.delete-gallery',['g'=>$g])</td>
    </tr>
  @endforeach
  </tbody>
</table>
@stop
