@extends('laravel-photogallery::layouts.master')
@section('content')
<script>
function deleteImage(item_id)
{
  alert('Elimina elemento '+item_id);
}
</script>
<table class="table table-hover">
  <tbody>
  @foreach($photos as $ph)
    <tr>
      <td>{{$ph->id}}</td>
      <td><img src="{{Config::get('laravel-photogallery::upload_dir')}}/s2/{{$ph->path}}" /></td>
      <td>{{$ph->name}}</td>
      <td>{{$ph->description}}</td>
      <td><button type="button" class="btn btn-danger" onclick="deleteImage({{$ph->id}});">Elimina</button></td>
    </tr>
  @endforeach
  </tbody>
</table>
@stop
