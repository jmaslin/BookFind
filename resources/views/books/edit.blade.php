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

					<ul id="results">

					</ul>

				</div>
			</div>
		</div>
	</div>
</div>

<meta name="csrf-token" content="{{{ csrf_token() }}}">

@endsection

@section('scripts')

<script type="text/javascript">

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$( document ).ready(function() {

		$.ajax({
			type: 'post',
			url: '/books/search',
			dataType: 'JSON',
			data: 'search={{ $book->isbn }}',
			success: function(data) {
				console.log(data);
				$.each(data, function(index, book) {
					if (index > 4)
						return false;
					$('#results').append('<img src="'+book.imageLinks.large+'"/>');

				})
			}

		});	
	});
		
</script>

@endsection