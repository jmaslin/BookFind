@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Book</div>

				{{ $book }}
				<div class="panel-body">
				{{--
					{!! Form:model($book, array('route' => array('book.update', $book->id) )) !!}
						@include('books/partials/_form', ['submit_text' => 'Add Book'])
					{!! Form::close() !!}
					--}}

			  {{ Form::model(new Bookfind\Book, array('route' => array('book.update', '4'))) }}
	        {{ Form::label('first_name', 'First Name:', array('class' => 'address')) }}
	        {{ Form::text('first_name') }}

	        {{ Form::label('last_name', 'Last Name:', array('class' => 'address')) }}
	        {{ Form::text('last_name') }}

	        {{ Form::label('email', 'E-Mail Address', array('class' => 'address')) }}
	        {{ Form::text('email') }}

	        {{ Form::submit('Send this form!') }}
        {{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
