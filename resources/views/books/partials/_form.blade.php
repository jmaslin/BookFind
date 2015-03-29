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
	{!! Form::label('url', 'URL:', array("class" => "col-md-4 control-label")) !!}
	<div class="col-md-6">							
		{!! Form::text('url') !!}
	</div>
</div>

<div class="form-group">
	{!! Form::submit(isset($buttonText) ? $buttonText.' Book' : 'Submit Book') !!}
</div>