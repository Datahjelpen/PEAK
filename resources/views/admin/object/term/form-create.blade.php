<form method="POST" action="{{ route('admin.term.store', [$type->slug, $taxonomy->slug]) }}">
	{{ csrf_field() }}

	@include('admin.object.term.fields')

	<input type="submit">
</form>