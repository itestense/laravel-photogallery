{{ Form::open(array('route' => Itestense\LaravelPhotogallery\Utils\Utils::routeprefix('photo.store'), 'method' => 'POST', 'files' => true)) }}
      
    <div class="form-group">
        {{ Form::label('images[]', 'File' . ':') }}
        {{ Form::file('images[]',array('multiple'=>true), array('class' => 'form-control')) }}
    </div>
<!--
    <div class="form-group">
      {{ Form::label('name', 'Nome'.':') }}
      {{ Form::text('name', null, array('class'=>'form-control')) }} 
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Descrizione' . ':') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>
-->
    <div class="form-group">
        {{ Form::submit('Invia', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
