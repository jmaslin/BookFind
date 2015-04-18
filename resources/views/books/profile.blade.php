<!-- View: Books/Profile -->

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
					  <div class="col-sm-8"><h2>{{ $book->name }}</h2></div>
    				<div class="col-sm-4"><span class="text-right"><h4>Go Back -> <a href="#" style="color: inherit;">{{ $book->course->name }}</a></h4></span></div>
					</div>
				</div>

				<div class="panel-body">

					@if (isset($new) && $new == 'true')
					<div class="alert alert-success">
						<p class="lead"><strong>Woo!</strong> Your book was added.</p>
					</div>
					@endif

					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<h4>Book Info</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr class="info text-center">
											<td>ISBN</td>
											<td>Updated</td>
											<td>Rating</td>
										</tr>
									</thead>
									<tbody>
										<tr class="lead">
											<td class="text-center">{{ $book->isbn }}</td>
											<td class="text-center"><span class="label label-info time-format-dt">{{ $book->updated_at }}</span></td>
											<td class="text-center">85%</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div id="big-btn-group" class="row">
						<div class="col-sm-4 col-sm-offset-2">
							<a href="{{ $book->url }}" download class="btn btn-primary btn-lg btn-block" role="button">Download PDF</a>
						</div>
						<div class="col-sm-4">
							<a href="#" class="btn btn-info btn-lg btn-block" role="button">View on Amazon</a>
						</div>
<!-- 						<div class="col-sm-4">
							<button class="btn btn-success btn-lg " style="width:100%; height: 42px;">Vote Up</button>
							<button class="btn btn-danger btn-lg " style="width:100%; height: 42px;">Vote Down</button>
						</div> -->
					</div>

					<div class="row">
						<div class="col-sm-12">
							<br>
							<embed id="pdfdata" src="{{ $book->url }}" type="application/pdf" width="100%" height="600px"></embed>
						</div>
					</div>

					<br>
					{{-- !! link_to_route('books.edit', 'Edit Book', $book->id) !! --}}

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
					console.log(book);
				})
			}

		});	
	});
		
</script>

@endsection