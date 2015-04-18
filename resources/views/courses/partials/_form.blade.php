<div class="form-group">
	{!! Form::label('name', 'Name:', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">
		{!! Form::text('name') !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('shortcode', 'Shortcode:', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">							
		{!! Form::text('shortcode') !!}
	</div>
</div>

<div class="form-group">
	{!! Form::submit(isset($buttonText) ? $buttonText.' Course' : 'Submit Course') !!}
</div>