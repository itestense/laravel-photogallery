{{ Form::open(array('route' => 'gallery.gallery.store', 'method' => 'POST', 'files' => false)) }}
        

    <div class="form-group">
      {{ Form::label('name', 'Nome'.':') }}
      {{ Form::text('name', null, array('class'=>'form-control')) }} 
    </div>


    <div class="form-group">
        {{ Form::submit('Invia', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}
