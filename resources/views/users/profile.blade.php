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
							</div>
							<div class="col-sm-6">
								<h2>Active Courses</h2>
									<ul id="courses-list" class="list-group">
									@if (!$user->courses->count())
										<p>You have no courses yet - <a href="#">add one</a>!</p>
									@else
										@foreach($user->courses as $course)
											<li class=list-group-item><a href="{{ route('schools.courses.show', [$user->school->id, $course->info->id]) }}">{{ $course->info->name }}</a></li>
										@endforeach
									@endif
								</ul>							
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

	// $('.profile-category').hide();

	// $('#top-nav li').click('a', function (e) {
	//   e.preventDefault()
	//   $(this).tab('show')

	//   console.log($(this).html());
	// })

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


