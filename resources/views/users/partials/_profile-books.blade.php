<!-- Books -->
<div role="tabpanel">
	<div class="col-sm-6 col-sm-offset-3">
		<ul class="nav nav-pills nav-justified" role="tablist">
			<!-- <li role="presentation" class="active"><a href="#active">Active</a></li> -->
			<li role="presentation"><a aria-controls="wanted" role="tab" data-toggle="pill" href="#wanted">Wanted</a></li>
			<li role="presentation" class="active"><a aria-controls="uploads" role="tab" data-toggle="pill" href="#uploads">Uploads</a></li>
		</ul>
		<br>
	</div>
	<div class="tab-content col-sm-10 col-sm-offset-1">

		<!-- Wanted Tab -->
		<div role="tabpanel" id="wanted" class="tab-pane fade">
			<h2>Book Wishlist</h2>

		</div>
		<!-- Uploads Tab -->
		<div role="tabpanel" id="uploads" class="tab-pane fade in active">
			<h2>My Uploads</h2>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr class="info text-center">
							<td>Name</td>
							<td>Course</td>
							<td>Rating</td>
							<td>Options</td>
						</tr>
					</thead>
					<tbody>
					@if (!$user->books->count())
						<tr><td colspan="4">You have not added any books!</td></tr>
					@else
						@foreach($user->books as $book)
							<tr>
								<td>{{ $book->name }}</td>
								<td class="text-center"><a href="#" title="{{ $book->course->shortcode }}">{{ $book->course->name }}</a></td>
								<td class="text-center"></td>
								<td class="text-center"></td>
							</tr>
						@endforeach
					@endif
					</tbody>
				</table>
			</div>
		</div>


	</div>
</div>