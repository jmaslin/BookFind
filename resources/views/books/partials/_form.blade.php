<div class="form-group">
	{!! Form::label('name', 'Name:', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">
		{!! Form::text('name', null,
			array('class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('isbn', 'ISBN:', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">							
		{!! Form::text('isbn', null,
			array('class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('url', 'URL:', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">							
		{!! Form::text('url', null, 
			array('class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::submit(isset($buttonText) ? $buttonText.' Book' : 'Submit Book', 
		array('class' => 'btn btn-primary') ) !!}
</div>