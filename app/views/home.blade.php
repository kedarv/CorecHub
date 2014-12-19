@extends('layout')

@section('append_js')
<script>
$('#signup').submit(function(e){
    e.preventDefault();
    var $form = $( this ),
        dataFrom = $form.serialize(),
        url = $form.attr( "action"),
        method = $form.attr( "method" );

    $.ajax({
        url: "{{action('UsersController@create')}}",
        data: dataFrom,
        type: method,
        beforeSend: function(request) {
        return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
    	},
		success: function (response) {
			var errors = "";
			if (response['status'] == 'success') {
				swal({
					title: "Success",
					text: "Signing In...",
					type: "success",
				});
				setTimeout("location.href = '{{action('PageController@showStats')}}'", 2000);
			}
			else {
				$.each( response['text'], function( index, value ){
					errors += (value  + "\n");
				})
				swal({
					title: "Error",
					text: errors,
					type: "error",
					confirmButtonColor: "#DD6B55",
				});
			}
			console.log(response['text']);
		}
    });
});
</script>
@stop

@section('content')
<header class="header-image">
	<div class="headline">
		<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-md-offset-1">
            		<div class="marketing-head">
              	 		<h1>Fitness at Purdue. Simplified.</h1>
              	 		<p>Track your fitness activity, share your progress, and become healthier <b>together.</b></p>
                	</div>
                </div>
                <div class="col-md-4">
                	{{Form::open(array('action' => 'UsersController@create', 'id' => 'signup'))}}
	                	<div class="form-group">
	                		{{Form::text("puid", null, array("placeholder" => "PUID", "class" => "form-control input-lg"))}}
	                	</div>
	                	<div class="form-group">
	                		{{Form::email("email", null, array("placeholder" => "user@purdue.edu", "class" => "form-control input-lg"))}}
	                	</div>
	                	<div class="form-group">
	                		{{Form::password("password", array("placeholder" => "Password", "class" => "form-control input-lg"))}}
	                	</div>
	                	<div class="form-group">
	            			{{--Form::captcha()--}}
	                	</div>
	                	{{Form::submit('Sign Up for CorecHub', array("class" => "btn btn-newgold btn-lg btn-block"))}}
                	{{Form::close()}}
                </div>
            </div>
         </div>
	</div>
 </header>
<div class="container">
<hr/>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="box">
		    	<div class="box-icon">
		        	<span class="fa fa-4x fa-calendar"></span>
		     	</div>
		        <div class="info">
		        	<h4 class="text-center">Stay Motivated</h4>
		            <p>Quickly see how often you've been using the CoRec with the heatmap.</p>
				</div>
		 	</div>
		 </div>

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="box">
		    	<div class="box-icon">
		        	<span class="fa fa-4x fa-book"></span>
		     	</div>
		        <div class="info">
		        	<h4 class="text-center">Log Workouts</h4>
		        	<p>Log what you did at the CoRec, and view your progression over time</p>
				</div>
		 	</div>
		 </div>
		 </div>
		 <br/>
		<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="box">
		    	<div class="box-icon">
		        	<span class="fa fa-4x fa-users"></span>
		     	</div>
		        <div class="info">
		        	<h4 class="text-center">Social</h4>
		        	<p>Hit a new Personal Record? Share your progress with the world!</p>
				</div>
		 	</div>
		 </div>
		 		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="box">
		    	<div class="box-icon">
		        	<span class="fa fa-4x fa-lock"></span>
		     	</div>
		        <div class="info">
		        	<h4 class="text-center">Secure</h4>
		        	<p>Privacy is important. We'll keep your data encrypted and safe from prying eyes.</p>
				</div>
		 	</div>
		 </div>
	</div>
	<hr/>
</div>
<br/>
@stop