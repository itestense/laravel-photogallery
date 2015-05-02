@extends('laravel-photogallery::layouts.master')
@section('content')
<h1>{{trans('laravel-photogallery::messages.galleries')}}</h1>
@if(count($galleries)==0)
{{trans('laravel-photogallery::messages.nogalleriesfound')}} <a href="{{URL::route(Utils::routeprefix('gallery.create'))}}">Create one?</a>
@else 
<a href="{{URL::route(Utils::routeprefix('gallery.create'))}}">{{trans('laravel-photogallery::messages.addgallery')}}</a><br /><br />
<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th>{{trans('laravel-photogallery::messages.name')}}</th>
		<th>{{trans('laravel-photogallery::messages.actions')}}</th>
	</tr>
</thead>
  <tbody>
  @foreach($galleries as $g)
    <tr>
      <td>{{$g->id}}</td>
      <td>{{$g->name}}</td>
      <td><a href="{{URL::route(Utils::routeprefix('gallery.edit'),['id'=>$g->id])}}">Gestisci</a>
	@include('laravel-photogallery::forms.delete-gallery',['g'=>$g])</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endif
@stop
