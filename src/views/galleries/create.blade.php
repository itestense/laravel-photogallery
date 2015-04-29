@extends('laravel-photogallery::layouts.master')
@section('content')
<h2>Add gallery</h2>
@if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
@endif
{{ $form }}
@stop
