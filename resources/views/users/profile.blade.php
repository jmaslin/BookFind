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
						<div role="tabpanel" id="courses" class="tab-pane fade in active">
						<!-- Courses -->
							@include('users/partials/_profile-courses', ["limited" => "false"])
						</div>
						<!-- Books -->
						<div role="tabpanel" id="books" class="tab-pane fade">
							@include('users/partials/_profile-books')
						</div>
						<!-- Settings -->
						<div role="tabpanel" id="settings" class="tab-pane fade">
							@include('users/partials/_profile-settings')
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


