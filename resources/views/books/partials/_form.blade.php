<div class="form-group row">
	{!! Form::label('title', 'Book Title', array("class" => "col-sm-4 control-label")) !!}
	<div class="col-sm-6">
		{!! Form::text('title', null,
			array('class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group row">
	{!! Form::label('isbn', 'ISBN', array("class" => "col-sm-4 control-label")) !!}
	<div class="col-sm-6">							
		{!! Form::text('isbn', null,
			array('class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group row">
	{!! Form::label('url', 'PDF Link (If Available)', array("class" => "col-sm-4 control-label")) !!}
	<div class="col-sm-6">							
		{!! Form::text('url', null, 
			array('class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-sm-6">
		{!! Form::submit(isset($buttonText) ? $buttonText.' Book' : 'Submit Book', 
			array('class' => 'btn btn-primary') ) !!}
	</div>
</div>