<div class="col-sm-6 col-sm-offset-3">
	<ul class="nav nav-pills nav-justified">
		<!-- <li role="presentation" class="active"><a href="#active">Active</a></li> -->
		<li role="presentation"><a href="#wanted">Wanted</a></li>
		<li role="presentation"><a href="#uploaded">Uploaded</a></li>
	</ul>
</div>
<div class="col-sm-6">
	<h2>Added Books</h2>
	<ul id="books-list" class="list-group">
		@if (!$user->books->count())
			<li>No Books</li>
		@else
			@foreach($user->books as $book)
				<li class=list-group-item><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></li>
			@endforeach
		@endif
	</ul>
</div>