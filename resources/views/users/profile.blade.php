<!-- View: users/Profile -->

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					<h1>Welcome, <strong>{{ $user->name }}</strong> <!-- <small>User Information</small> --></h1>
				</div>
				<div class="panel-body" role="tabpanel">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 lead">
							<ul id="top-nav" class="nav nav-pills nav-justified" role="tablist">
								<li role="presentation" class="active"><a aria-controls="courses" role="tab" data-toggle="pill" href="#courses">Courses</a></li>
								<li role="presentation"><a aria-controls="books" role="tab" data-toggle="pill" href="#books">Books</a></li>
								<li role="presentation"><a aria-controls="settings" role="tab" data-toggle="pill" href="#settings">Settings</a></li>
							</ul>
						</div>
						<div class="col-sm-12">
							<hr>
						</div>
					</div>

					<div class="tab-content row">
						<!-- Courses -->
						<div role="tabpanel" id="courses" class="tab-pane fade in active">
							<div class="col-sm-6 col-sm-offset-3">
								<ul class="nav nav-pills nav-justified">
									<li role="presentation" class="active"><a href="#active">Active</a></li>
									<li role="presentation"><a href="#active">Archived</a></li>
								</ul>
								<br>
							</div>
							<div class="col-sm-6">
								<h2>Active Courses</h2>
									<div id="courses-list" class="list-group">
									@if (!$user->courses->count())
								  	<a href="#" class="list-group-item list-group-item-info">You have not added any courses!</a>
									@else
										@foreach($user->courses as $course)
											<a href="#course{{ $course->info->id }}" data-target="{{ route('schools.courses.show', [$user->school->id, $course->info->id]) }}" data-books-available="{{ $course->info->books->count() }}" class="list-group-item">
												{{ $course->info->name }} <span class="badge">{{ $course->info->shortcode }}</span>
											</a>
										@endforeach
											<a href="#" class="list-group-item">
												<div class="input-group">
													<input name="course" type="text" class="form-control" placeholder="Class Name">
													<span class="input-group-btn"><button type="submit" class="btn btn-success">Add</button></span>
												</div>
											</a>
									@endif
								</div>
							</div>
							<div class="col-sm-4 col-sm-offset-1">
								<h2>Course Details</h2>

								<div class="panel panel-info">
									<div class="panel panel-heading">
										<span id="course-title">No Course Selected</span>
									</div>
									<div class="panel-body">
											<p id="course-info">
												<span data-first="1" id="course-info-pretext">Choose a course to display its information.</span>
												<span id="course-books-status"></span>
											</p>
											<div id="course-btn-group">
												<a id="course-home" href="#" class="btn btn-info btn-block" role="button">Course Homepage</a>											
												<a id="course-archive" href="#" class="btn btn-warning btn-block" role="button">Archive Course</a>
											</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Books -->
						<div role="tabpanel" id="books" class="tab-pane fade">
							<div class="col-sm-6 col-sm-offset-3">
								<ul class="nav nav-pills nav-justified">
									<!-- <li role="presentation" class="active"><a href="#active">Active</a></li> -->
									<li role="presentation"><a href="#wanted">Wanted</a></li>
									<li role="presentation"><a href="#uploaded">Uploaded</a></li>
								</ul>
							</div>
							<div class="col-sm-6">
								<h2>Added Books</h2>
								<ul id="books-list" class="list-group">
									@if (!$user->books->count())
										<li>No Books</li>
									@else
										@foreach($user->books as $book)
											<li class=list-group-item><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></li>
										@endforeach
									@endif
								</ul>
							</div>
						</div>
						<!-- Settings -->
						<div role="tabpanel" id="settings" class="tab-pane fade">
							<div class="col-sm-6 col-sm-offset-3">
								<ul class="nav nav-pills nav-justified">
									<li role="presentation"><a href="#preferences">Preferences</a></li>
									<li role="presentation"><a href="#account">Information</a></li>
								</ul>
							</div>
							<div class="col-sm-6">								
								<h2>Preferences</h2>

							</div>
						</div>
					</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">

	$('.course-dropdown-info').hide();
	// $('#course-btn-group').children('a').fadeTo('0.5').attr('disabled', 'disabled');
	$('#course-btn-group').hide();

	// user selects course from list
	$('#courses-list a').click(function(e) {

		var courseTitle = $(this).clone().children().remove().end().text().trim();
		var courseBookAvailable = $(this).attr('data-books-available');

		var course = { title: courseTitle, bookAvailable: courseBookAvailable };

		// update book status pretext for first time
		if ($('#course-info-pretext').attr('data-first') == '1') {

			$('#course-info-pretext').attr('data-first', '0');

			$('#course-info-pretext').fadeToggle(function() {
				$(this).text("Books Available: ");
				$(this).fadeToggle();
				$('#course-btn-group').fadeToggle();
				updateCourseInfo($(this), course);
			});

			// enable buttons
			// $('#course-btn-group').children('a').fadeTo('fast', '1').attr('disabled', false);
		}
		else {
			updateCourseInfo($(this), course);
		}



	});

	function updateCourseInfo(thisObj, course) {
		// if the class is different from previous selection, update panel
		if ($('#course-title').text() != course.title) {

			// change title
			$('#course-title').fadeToggle(function() {
				$(this).text(course.title);
				$(this).fadeToggle();
			});

			// update book status
			$('#course-books-status').fadeToggle(function() {
				$(this).html('<span class="badge">'+course.bookAvailable+'</span>');
				$(this).fadeToggle();
			});

			// update link to course
			$('#course-btn-group a#course-home').attr('href', thisObj.attr('data-target'));
		}
	}

</script>

@endsection

<!-- 

Views:

- Courses (Add / Remove Classes)
  - If Class Exists, Boost Popularity of Adding Book

- Books
  - What already uploaded, etc.
  - What saved / favorited

- Edit Profile
  - Preferences, Etc


