@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Books</div>

				<div class="panel-body">
					@if (!$books->count())
						No books exist yet.
					@else
						<ul>
							@foreach($books as $book)
								<li><a href="{{ route('books.show', $book->isbn) }}">{{ $book->name }}</a></li>
							@endforeach
						</ul>
					@endif	
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
