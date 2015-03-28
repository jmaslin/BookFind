<!-- View: users/Profile -->

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<small>User Information</small>
				</div>

				<div class="panel-body">

					<ul>
						<li>Name: {{ $user->name }}</li>
						<li>Uploads
							<ul>
							@if (!$user->books->count())
								<li>No Uploads</li>
							@else
								@foreach($user->books as $book)
									<li><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></li>
								@endforeach
							@endif
							</ul>
						</li>

					</ul>

					<br>

				</div>

			</div>
		</div>
	</div>
</div>
@endsection