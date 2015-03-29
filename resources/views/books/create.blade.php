@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Book</div>
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
					{!! Form::open(['class' => 'form_horizontal', 'route' => 'books.store' ]) !!}

						@include('books/partials/_form', ['buttonText' => 'Upload'])

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
