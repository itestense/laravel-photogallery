@extends('laravel-photogallery::layouts.master')
@section('content')
<table class="table table-hover">
  <tbody>
  @foreach($galleries as $g)
    <tr>
      <td>{{$g->id}}</td>
      <td>{{$g->name}}</td>
      <td><a href="{{URL::route('gallery.galleries.photos.index',['gallery_id'=>$g->id])}}">Gestisci</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@stop
