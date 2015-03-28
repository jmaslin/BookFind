<!-- View: Books/Profile -->

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $book->name }} 
					<small>Book Information</small>
				</div>

				<div class="panel-body">
					<ul>
						<li>ISBN: {{ $book->isbn }}</li>
						<li>Uploaded By: {{ $book->creator->name }}</li>
						<li>Date: {{ $book->updated_at }}</li>
						<!-- Preview, Relevant Classes for X School, Rating -->
					</li>

					<br>
					{!! link_to_route('books.edit', 'Edit Book', $book->id) !!}

				</div>

			</div>
		</div>
	</div>
</div>
@endsection