@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $school->name }} <small>School Profile</small></div>

				<div class="panel-body">
					@foreach($books as $book)
						<li><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></li>
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>
@endsection