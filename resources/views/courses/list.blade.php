@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>{{ $school->name }}</h1>
				</div>

				<div class="panel-body">

					<div id="big-btn-group" class="row">
						<div class="col-sm-4 col-sm-offset-2">
							<a href="{{ route('courses.create', [$domain]) }}" role="button" class="btn btn-success btn-lg btn-block">Add Course</a>
						</div>
						<div class="col-sm-4">
							<a href="#" role="button" disabled class="btn btn-info btn-lg btn-block">Add Book</a>
						</div>
					</div>		

					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr class="info text-center">
									<td>Course</td>
									<td>Students</td>
									<td>Book Available</td>
									<td>Last Updated</td>
									<td>Options</td>
								</tr>
							</thead>
							<tbody>
							@if (!$school->courses->count())
								<tr><td colspan="5">
									<p>No courses exist for this school yet. Add yours and be the first!</p>
								</td></tr>
							@else
								@foreach($school->courses as $course)
									<tr>
										<td>{{ $course->name }}</td>
										<td class="text-center">{{ $course->students->count() }}</td>
										<td class="text-center">
											@if ( $course->books->count() >= 1)
												<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: green;"></span>
											@else
												<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color: red;"></span>
											@endif
										</td>
										<td class="text-center"><span class="time-format-dt">{{ $course->updated_at }}</span></td>
										<td class="course-btn-group text-center">
											<a href="{{ route('courses.show', [$domain, $course->id]) }}" class="btn btn-info" role="button">View Course</a>
											<a id="course-archive" href="#" class="btn btn-success" role="button">Join Course</a>
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
@endsection
