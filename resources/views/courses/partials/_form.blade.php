<div class="form-group">
	{!! Form::label('name', 'Course Name', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">
		{!! Form::text('name', null, 
			array('placeholder' => 'Ex. Introduction to Business', 'class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('shortcode', 'Shortcode', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">							
		{!! Form::text('shortcode', null, 
			array('placeholder' => 'Ex. BUSN 101', 'class' => 'form-control') ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::submit(isset($buttonText) ? $buttonText.' Course' : 'Submit Course',
		array('class' => 'btn btn-primary') ) !!}
</div>