@extends('laravel-photogallery::layouts.master')
@section('content')
<h1>{{$gallery->name}}</h1>
<table class="table">
<tbody class="table table-hover">
  @foreach($gallery->photos as $ph)
    <tr>
     <td>{{$ph->id}}</td>
      <td><img src="/uploads/photos/s2/{{$ph->path}}" /></td>
      <td>{{$ph->name}}</td>
      <td>{{$ph->description}}</td>
      <td><button type="button" class="btn btn-danger" onclick="deleteImage({{$ph->id}});">Elimina</button></td> 
    </tr>
  @endforeach 
</tbody>
</table>

{{ $form }}
@stop
