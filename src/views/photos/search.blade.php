@foreach($photos as $ph)
<a draggable="true" photoid="{{$ph->id}}"><img style="max-width:100px;" alt="{{$ph->name}}" title="{{$ph->name}}" src="{{Config::get('laravel-photogallery::upload_dir')}}/{{$ph->path}}"></a>
@endforeach
