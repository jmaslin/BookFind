<!-- View: Books/Profile -->

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $book->name }} 
					<small>Book Information</small>
				</div>

				<div class="panel-body">
					@if (isset($new) && $new == 'true')
						<div class="alert alert-success">
							<strong>Woo!</strong> Your book was uploaded.
						</div>
					@endif
					<ul>
						<li>ISBN: {{ $book->isbn }}</li>
						<li>Uploaded By: {{ $book->creator->name }}</li>
						<li>Date: <span class="time-format-dt">{{ $book->updated_at }}</span></li>
						<!-- Preview, Relevant Classes for X School, Rating -->
					</ul>

				<embed id="pdfdata" src="{{ $book->url }}" type="application/pdf" width="100%" height="600px"></embed>

					<br>
					{!! link_to_route('books.edit', 'Edit Book', $book->id) !!}

				</div>

			</div>
		</div>
	</div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">
		
	// $('#time-format-dt').html(function() {
	// 	return moment($(this).html(), 'YYYY-MM-DD HH:mm:ss').format('MMMM DD, YYYY');
	// });

</script>

@endsection