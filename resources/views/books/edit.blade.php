@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Book</div>

				<div class="panel-body">


					{!! Form::model($book, ['class' => 'form_horizontal', 'method' => 'PATCH', 'route' => ['books.update', $book->id] ]) !!}

						@include('books/partials/_form', ['buttonText' => 'Edit'])

					{!! Form::close() !!}


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
