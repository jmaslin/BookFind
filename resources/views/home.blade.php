@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Welcome to <strong>Bookfind!</strong></h1>
				</div>

				<div class="panel-body">
					
					@if ($user->courses->count() > 0)
						@include('users/partials/_profile-courses', ["limited" => "true"])
					@else
						<p class="lead">You have not added any classes yet. Add some!</p>
					@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection