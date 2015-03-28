@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Schools</div>

				<div class="panel-body">
					@if (!$schools->count())
						No schools exist yet.
					@else
						<ul>
							@foreach($schools as $school)
								<li><a href="{{ route('schools.show', $school->id) }}">{{ $school->name }}</a></li>
							@endforeach
						</ul>
					@endif	
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
