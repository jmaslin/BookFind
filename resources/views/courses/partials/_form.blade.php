<div class="form-group row">
	{!! Form::label('name', 'Course Name', array("class" => "col-sm-4 control-label")) !!}
	<div class="col-sm-6">
		{!! Form::text('name', null, 
			array('placeholder' => 'Introduction to Business', 'class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group row">
	{!! Form::label('shortcode', 'Shortcode', array("class" => "col-sm-4 control-label")) !!}
	<div class="col-sm-6">							
		{!! Form::text('shortcode', null, 
			array('placeholder' => 'BUSN 101', 'class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group row">
	{!! Form::label('reference_number', 'Course Reference Number (CRN)', array("class" => "col-sm-4 control-label")) !!}
	<div class="col-sm-6">							
		{!! Form::text('reference_number', null, 
			array('placeholder' => '123456', 'class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group row">
	<div class="col-sm-6">
		{!! Form::submit(isset($buttonText) ? $buttonText.' Course' : 'Submit Course',
			array('class' => 'btn btn-primary') ) !!}
	</div>
</div>