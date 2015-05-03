@extends('laravel-photogallery::layouts.master')
@section('content')
<table class="table table-hover">
  <tbody>
  @foreach($photos as $ph)
    <tr>
      <td>{{$ph->id}}</td>
      <td><img src="{{Config::get('laravel-photogallery::upload_dir')}}/{{$ph->path}}" class="admin-photo-thumb" /></td>
      <td>{{$ph->name}}</td>
      <td>{{$ph->description}}</td>
      <td>@include('laravel-photogallery::forms.delete-photo',['ph'=>$ph])</td>
    </tr>
  @endforeach
  </tbody>
</table>
@stop
