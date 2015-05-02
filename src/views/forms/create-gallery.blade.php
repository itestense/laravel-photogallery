{{ Form::open(array('route' => Itestense\LaravelPhotogallery\Utils\Utils::routeprefix('gallery.store'), 'method' => 'POST', 'files' => false)) }}
        

    <div class="form-group">
      {{ Form::label('name', trans('laravel-photogallery::messages.name').':') }}
      {{ Form::text('name', null, array('class'=>'form-control')) }} 
    </div>


    <div class="form-group">
        {{ Form::submit(trans('laravel-photogallery::messages.create'), array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
