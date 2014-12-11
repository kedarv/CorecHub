{{ HTML::style('css/cal-heatmap.css'); }}
{{HTML::script('//d3js.org/d3.v3.min.js')}}
{{ HTML::script('js/cal-heatmap.min.js'); }}

<div id="cal-heatmap"></div>
<script type="text/javascript">
	var cal = new CalHeatMap();
	cal.init({
		itemSelector: "#cal-heatmap",
		domain: "month",
		subDomain: "day",
		data: {{$dataJSON}},
		start: new Date(2014, 0),
		cellSize: 15,
		range: 12,
		legend: [1]
	});
</script>

<div id="punchcard"></div>

{{ HTML::script('js/d3.punchcard.js'); }}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>