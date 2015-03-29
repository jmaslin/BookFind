@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $school->name }} <small>Class List</small></div>

				<div class="panel-body">
					@if (!$school->courses->count())
						No schools exist yet.
					@else
						<ul>
							@foreach($school->courses as $course)
								<li><a href="{{ route('schools.courses.show', [$school->id, $course->id]) }}">{{ $course->name }} <small>({{ $course->shortcode }})</small></a></li>
							@endforeach
						</ul>
					@endif	
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
