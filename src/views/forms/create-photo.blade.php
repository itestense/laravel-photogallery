{{ Form::open(array('route' => 'gallery.photo.store', 'method' => 'POST', 'files' => true)) }}
      
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