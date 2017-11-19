<li>
	@include('admin.object.term.field-item', ['term' => $parent])

	@if ($parent->hasChildren)
		<ul>
			@foreach ($parent->children as $child)
				@include('admin.object.term.field-item-parent', ['parent' => $child])
			@endforeach
		</ul>
	@endif
</li>