@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $school->name }} <small>School Profile</small></div>

				<div class="panel-body">
					<h4>
						@if(!$school->books->count())
							No books yet.
						@else
							Total Books: {{ $school->books->count() }}
					</h4>
					<hr>
							<ul>
							@foreach($school->books as $book)
								<li><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></li>
							@endforeach
							</ul>
						@endif
				</div>

			</div>
		</div>
	</div>
</div>
@endsection

<!-- 

Think About:

- Courses with books.
- Courses without books.

- Search all courses.
- Search all books.

In the future:

- Personalized class list (by term?)
- Notifications if book added for watched class.
- Archive formerly active classes so not alerted.

 -->