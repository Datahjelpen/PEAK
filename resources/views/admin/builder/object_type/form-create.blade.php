<form method="POST" action="{{ route('object.type.store') }}">
	{{ csrf_field() }}

	@include('admin.builder.object_type.fields')

	<input type="submit">
</form>