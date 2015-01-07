@extends('layout')
@section('content')

<div class="container container-light">
	<br/>
	
	<div class="well">
		<div class="well well-light">
			<div class="message alert alert-info">Loading data...</div>
			<div id="cal-heatmap"></div>
			<div id="onClick-placeholder"></div>
		</div>
		<hr/>
		<div class="well well-light">
			<div class="message alert alert-info">Loading data...</div>
			<div class="text-center">
				<div id="punchcard"></div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	$("#result").load("{{action('PageController@renderStats')}}");
});
</script>
<div id="result"></div>
@yield('render')
@stop