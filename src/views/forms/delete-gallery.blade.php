{{ Form::open(['route' => [Utils::routeprefix('gallery.destroy'),$g->id], 'method'=>'DELETE']) }}
{{ Form::submit(trans('laravel-photogallery::messages.delete'), ['class'=>'btn btn-primary']) }}
{{ Form::close() }}
