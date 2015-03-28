<!-- View: Books/Profile -->

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $book->name }} <small>Book Information</small></div>

				<div class="panel-body">
					<ul>
						<li>ISBN: {{ $book->isbn }}</li>
						<!-- Preview, Relevant Classes for X School, Rating -->
					</li>

				</div>

			</div>
		</div>
	</div>
</div>
@endsection