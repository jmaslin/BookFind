@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Users</div>

				<div class="panel-body">
					@if (!$users->count())
						No users exist yet.
					@else
						<ul>
							@foreach($users as $user)
								<li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
							@endforeach
						</ul>
					@endif	
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
