<form method="POST" action="{{ route('object.taxonomy.destroy', [$type->slug, $taxonomy->slug]) }}">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
	
	<h1>{{ __('forms.confirm.delete.ask', ['name' => $taxonomy->name]) }}</h1>
	<button class="autofocus" type="submit" autofocus>{{ __('forms.confirm.delete.yes') }}</button>
	<button type="button" class="modal-close">{{ __('forms.confirm.delete.no') }}</button>
</form>