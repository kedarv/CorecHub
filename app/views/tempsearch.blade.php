@extends('layout')
@section('append_head')
<style>
body {
	background: #2B2B2B
}
</style>
@stop
@section('content')

<div class="container container-light">
	<br/>
	<div class="well">
		<div class="well well-light">
			<form>
				<input id="search">
			</form>
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
		</div>
	</div>
</div>
<script>
$(function() {
    var json;
    $.getJSON( "{{action('PageController@getExercises')}}", function(data) {
        json = data;
        $.each(data, function(key, val) {
            $("#parent-" + val['category']).append( "<li class='list-group-item' + id='" + key + "'>" + val['name'] + "</li>" );
        });
    });
    $("#search").keyup(function() {
        var keyword = $("#search").val();
        if(keyword=='') {
        } else {
            console.log(keyword);
        } return false;
    });
});
</script>
@yield('render')
@stop