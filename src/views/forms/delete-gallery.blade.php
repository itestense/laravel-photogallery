<script>
function delete_gallery()
{
	return confirm('{{trans('laravel-photogallery::messages.confirmgallerydeletion')}}');
}
</script>
<style>
.form-inline{display:inline;}
</style>
{{ Form::open(['route' => [Utils::routeprefix('gallery.destroy'),$g->id], 'method'=>'DELETE','class'=>'form-inline']) }}
{{ Form::submit(trans('laravel-photogallery::messages.delete'), ['class'=>'btn btn-primary','onclick'=>'return delete_gallery()']) }}
{{ Form::close() }}
