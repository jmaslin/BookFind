@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Book</div>

				<div class="panel-body">


					{!! Form::model($book, ["class" => "form_horizontal", 'method' => 'PATCH', 'route' => ['books.update', $book->id] ]) !!}

						<div class="form-group">
							{!! Form::label('name', 'Name:', array("class" => "col-md-4 control-label")) !!}
							<div class="col-md-6">
								{!! Form::text('name') !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('isbn', 'ISBN:', array("class" => "col-md-4 control-label")) !!}
							<div class="col-md-6">							
								{!! Form::text('isbn') !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::submit('Update Book') !!}
						</div>

					{!! Form::close() !!}


		
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
