{{ Form::open(array('route' => Utils::routeprefix('galleries.photos.store'), 'method' => 'POST', 'files' => true)) }}
       {{ Form::hidden('gallery_id', $gallery->id) }} 
    <div class="form-group">
        {{ Form::label('path', 'File' . ':') }}
        {{ Form::file('path',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('name', 'Nome'.':') }}
      {{ Form::text('name', null, array('class'=>'form-control')) }} 
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Descrizione' . ':') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Invia', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
