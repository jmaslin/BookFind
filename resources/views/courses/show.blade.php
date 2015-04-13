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
							<div class="col-sm-6">
								<h3>{{ $course->shortcode }} <small>Information</small></h3>
							</div>
							<div class="col-sm-12">
								<hr style="margin-top: -10px;">
							</div>
							<div class="col-sm-6 col-sm-offset-6 text-right">
								<button class="btn btn-success" style="margin-top: -20px;">Add Book</button>
								@if (!$hasCourse) 
									<button class="btn btn-info" style="margin-top: -20px;">Join Course</button>
								@else
									<button class="btn btn-warning" style="margin-top: -20px;">Leave Course</button>
								@endif
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<form>
									<div class="form-group">
										<!-- Book ISBN -->
										<!-- Checkbox: Have Book! (Then, Enter URL) -->
										<!-- Checkbox: Want Book! -->
									</div>
								</form>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
							<br>
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
														<a href="{{-- route('schools.courses.books.show', [$school->id, $course->id, $book->id]) --}}" class="btn btn-info" role="button">Show Book</a>
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
	</div>
</div>
@endsection