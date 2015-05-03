<script>
function delete_photo()
{
	return confirm('{{trans('laravel-photogallery::messages.confirmphotodeletion')}}');
}
</script>
<style>
.form-inline{display:inline;}
</style>
{{ Form::open(['route' => [Utils::routeprefix('photo.destroy'),$ph->id], 'method'=>'DELETE','class'=>'form-inline']) }}
{{ Form::submit(trans('laravel-photogallery::messages.delete'), ['class'=>'btn btn-danger','onclick'=>'return delete_photo()']) }}
{{ Form::close() }}
