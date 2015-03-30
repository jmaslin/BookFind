@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
				  <div class="row">
    				<div class="col-sm-6"><h1>{{ $course->name }}</h1></div>
    				<div class="col-sm-6"><span class="text-right"><h4>{{ $course->school->name }}</h4></span></div>
 				 	</div>
				</div>

				<div class="panel-body">
					<div class="col-sm-10 col-sm-offset-1">

						<div class="row">
								<h3>{{ $course->shortcode }} <small>Information</small></h3>
								<hr>
						</div>

						<h4>Available Books</h4>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr class="info text-center">
										<td>Book Title</td>
										<td>ISBN</td>
										<!-- <td>Updated</td> -->
										<td>Rating</td>
										<td>Options</td>
									</tr>
								</thead>
								<tbody>
								@if (!$course->books->count())
									<tr><td colspan="4">No books have been added yet. Be the first!</td></tr>
								@else
									@foreach($course->books as $book)
										<tr>
											<td>{{ $book->name }}</td>
											<td class="text-center">{{ $book->isbn }}</td>
											<!-- <td class="text-center">{{ $book->updated_at }}</td> -->
											<td class="text-center"></td>
											<td class="text-center">
												<a href="{{ route('schools.courses.books.show', [$school->id, $course->id, $book->id]) }}" class="btn btn-info" role="button">Show Book</a>
											</td>
										</tr>
									@endforeach
								@endif
								</tbody>
							</table>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection