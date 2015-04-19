@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
				  <div class="row">
    				<div class="col-sm-6"><h1>Add Course</h1></div>
    				<div class="col-sm-6"><span class="text-right"><h4>{{ $school->name }}</h4></span></div>
 				 	</div>
				</div>
				<div class="panel-body">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

					{!! Form::open(['class' => 'form_horizontal', 'route' => array('courses.store', $domain, $school->id) ]) !!}

						@include('courses/partials/_form', ['buttonText' => 'Add'])

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
