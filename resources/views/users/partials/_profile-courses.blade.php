<!-- Courses -->
<div role="tabpanel" id="courses" class="tab-pane fade in active">
<div class="col-sm-6 col-sm-offset-3">
	<ul class="nav nav-pills nav-justified">
		<li role="presentation" class="active"><a href="#active">Active</a></li>
		<li role="presentation"><a href="#active">Archived</a></li>
	</ul>
	<br>
</div>
<div class="col-sm-10 col-sm-offset-1">
	<h2>Courses</h2>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="info text-center">
					<td>Name</td>
					<td>Book</td>
					<td>Updated</td>
					<td>Options</td>
				</tr>
			</thead>
			<tbody>
			@if (!$user->courses->count())
				<tr><td colspan="4">You have not added any courses!</td></tr>
			@else
				@foreach($user->courses as $course)
					<tr>
						<td>{{ $course->info->name }}</td>
						<td class="text-center">
							@if ( $course->info->books->count() >= 1)
								<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: green;"></span>
							@else
								<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color: red;"></span>
							@endif
						</td>
						<td class="text-center"><span class="time-format-dt">{{ $course->info->updated_at }}</span></td>
						<td class="course-btn-group text-center">
							<a href="{{ route('schools.courses.show', [$user->school->id, $course->info->id]) }}" class="btn btn-info" role="button">View Course</a>
							<a id="course-archive" href="#" class="btn btn-warning" role="button">Archive</a>
						</td>
					</tr>
				@endforeach
			@endif
<!-- 		<tr class="">
					<td colspan="4">
						<form class="form-inline">
							<div class="row">
								<div class="form-group">
									<label for="courseName">Name</label>
									<input type="text" name="course" class="form-control" placeholder="Intro to Business">
								</div>
								<div class="form-group">
									<label for="courseName">Shortcode</label>
									<input type="text" name="course" class="form-control" placeholder="BUSN 101">
								</div>									
								<div class="form-group">
									<label for="courseName">CRN</label>
									<input type="text" name="course" class="form-control" placeholder="123456">
								</div>																					
								<div class="form-group">
									<button type="submit" class="btn btn-success">Add</button>
								</div>
							</div>
						</form>
					</td>
				</tr> -->
			</tbody>
		</table>
	</div>
</div>