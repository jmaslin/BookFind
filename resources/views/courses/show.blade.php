@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $course->name }} <small>Course Information</small></div>

				<div class="panel-body">
				
					@if (!$course->books->count())
						<p class="lead">No books have been uploaded yet. Be the first!</p>
					@else
						<ul>
							@foreach($course->books as $book)
								<li><a href="{{ route('schools.courses.books.show', [$book->id, $course-id, $school->id]) }}">{{ $book->name }}</a></li>
							@endforeach
						</ul>
					@endif	

				</div>

			</div>
		</div>
	</div>
</div>
@endsection