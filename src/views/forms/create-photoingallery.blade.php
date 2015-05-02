<table>
	<tbody>
		@foreach($photos as $ph)
		<tr>
			<td><img src="{{Config::get('laravel-photogallery::upload_dir')}}{{$ph->path}}" /></td>
		</tr>
		@endforeach
	</tbody>
</table>
