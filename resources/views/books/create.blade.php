@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Book</div>

				<div class="panel-body">

					{!! Form::open() !!}

						@include('books/partials/_form', ['buttonText' => 'Upload'])

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
