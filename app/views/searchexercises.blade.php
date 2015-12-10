@extends('layout')
@section('append_head')
<style>
body {
	background: #2B2B2B
}
.well {
    padding: 5px;
}
.well-light {
    margin-bottom: 0px;
}
.panel-group {
    margin-bottom: 0px;
}
.list-group-item {
    background-color: #2D2D2D;
    border: 1px solid #3A3A3A;
    color: #fff;
}
.panel-default>.panel-heading {
    color: #E0E0E0;
}
html {
  overflow-y: scroll;
}
.exercise_link {
	color: #fff;
}
.exercise_link:hover, .exercise_link:active, .exercise_link:focus {
	color: #cecece;
}
</style>
@stop

@section('append_js')
{{HTML::script('js/fuse.min.js')}}

{{HTML::script('js/plugin.min.js')}}
{{HTML::script('js/velocity.min.js')}}
{{HTML::script('js/bellows.min.js')}}
<script>
$('.bellows').bellows();
</script>
<style>
.bellows__item:not(.bellows--is-open)>.bellows__content{display:none}.bellows__item.bellows--is-open>.bellows__content-wrapper,.bellows__item.bellows--is-closing>.bellows__content-wrapper{display:block}.bellows__content-wrapper{display:none}
</style>
@stop

@section('content')

<div class="container container-light">
	<br/>
	<div class="well">
		<div class="well well-light">
			<div id="search-container">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                <input type="text" class="form-control" id="search" placeholder="Search Exercises">
            </div>
            <div id="searched" style="color:#fff"></div>
            <hr/>
            <div class="panel-group" role="tablist">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-shoulders-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-shoulders" aria-expanded="false" aria-controls="collapse-shoulders">
                            Shoulders
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-shoulders" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-shoulders-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-1">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-triceps-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-triceps" aria-expanded="false" aria-controls="collapse-triceps">
                            Triceps
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-triceps" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-triceps-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-2">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-biceps-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-biceps" aria-expanded="false" aria-controls="collapse-biceps">
                            Biceps
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-biceps" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-biceps-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-3">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-chest-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-chest" aria-expanded="false" aria-controls="collapse-chest">
                            Chest
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-chest" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-chest-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-4">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-back-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-back" aria-expanded="false" aria-controls="collapse-back">
                            Back
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-back" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-back-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-5">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-legs-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-legs" aria-expanded="false" aria-controls="collapse-legs">
                            Legs
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-legs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-legs-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-6">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-abs-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-abs" aria-expanded="false" aria-controls="collapse-abs">
                            Abs
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-abs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-abs-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-7">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-cardio-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-cardio" aria-expanded="false" aria-controls="collapse-cardio">
                            Cardio
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-cardio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-cardio-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-8">
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="collapse-other-heading">
                        <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapse-other" aria-expanded="false" aria-controls="collapse-other">
                            Other
                        </a>
                        </h4>
                    </div>
                    <div id="collapse-other" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse-other-heading" aria-expanded="false">
                        <ul class="list-group" id="parent-9">
                        </ul>
                    </div>
                </div>                           
            </div>
                <div class="bellows">
                    <!-- The Accordion Items -->
                    <div class="bellows__item">
                        <div class="bellows__header">
                            Shoulders
                        </div>
                        <div class="bellows__content" id="parentz-1">
                        </div>
                    </div>
                    <div class="bellows__item">
                        <div class="bellows__header">
                            <h3>Triceps</h3>
                        </div>
                        <div class="bellows__content" id="parentz-2">
                        </div>
                    </div>
                    <div class="bellows__item">
                        <div class="bellows__header">
                            <h3>Biceps</h3>
                        </div>
                        <div class="bellows__content" id="parentz-3">
                        </div>
                    </div>
            </div>
		</div>
		<div id="track-container" style="display:none;">
			<h2 id="exerciseName" class="header_text oswald">{exercise Name}</h2>

    <ul id="myTabs" class="nav nav-tabs nav-justified" role="tablist">
      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Track</a></li>
      <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">History</a></li>
       <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Graph</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
      </div>
    </div>

		</div>
		</div>
	</div>
</div>
<script>
$(function() {
    var json;
    $.getJSON( "{{action('PageController@getExercises')}}", function(data) {
        json = data;
        $.each(data, function(key, val) {
            $("#parent-" + val['category']).append("<li class='list-group-item'><a href='#' class='exercise_link' data-id=" + val['id'] + " data-name='" + val['name'] + "'>" + val['name'] + "</a></li>");
            $("#parentz-" + val['category']).append("<li class='list-group-item'><a href='#' class='exercise_link' data-id=" + val['id'] + " data-name='" + val['name'] + "'>" + val['name'] + "</a></li>");
        });
    });
    $("#search").keyup(function() {
    	$("#searched").html("");
        var keyword = $("#search").val();
        var options = {
	  		keys: ['name']
		}
		var f = new Fuse(json, options);
		var result = f.search(keyword);
		var counter = 0;
        console.log(result);
		$.each(result, function(key, val) {
			if(counter < 10) {
	        	$("#searched").append("<li class='list-group-item'><a href='#' class='exercise_link' data-id=" + val['id'] + " data-name='" + val['name'] + "'>" + val['name'] + "</a></li>");
        		console.log(val['name']);
        		counter++;
        	}
        	else {
        		return;
        	}
        });
		
    });

	$(document).on('click', '.exercise_link', function(e) {
		e.preventDefault();
		$(this).blur();
		console.log($(this).data("id"));
		$("#exerciseName").html($(this).data("name"));
		$("#search-container").slideUp();
		$("#track-container").slideDown();
	});
});
</script>
@yield('render')
@stop