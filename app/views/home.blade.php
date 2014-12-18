@extends('layout')
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
                	<div class="form-group">
                		<input class="form-control input-lg" type="text" placeholder="PUID">
                	</div>
                	<div class="form-group">
                		<input class="form-control input-lg" type="text" placeholder="user@purdue.edu">
                	</div>
                	<div class="form-group">
                		<input class="form-control input-lg" type="text" placeholder="Password">
                	</div>
                	<button type="button" class="btn btn-oldgold btn-lg btn-block">Sign Up for CorecHub</button>
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