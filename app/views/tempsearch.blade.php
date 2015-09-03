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
			<div id="live" style="color: #fff"></div>
		</div>
	</div>
</div>
<script>
$(function() {
    $("#search").keyup(function() {
        var keyword = $("#search").val();
        if(keyword=='') {
        } else {
            $.ajax({
                type: "post",
                url: "{{ action('PageController@ajaxSearch') }}",
                data: {
                    'keyword': keyword,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: 'html',
              cache: false,
              beforeSend: function(html) 
              {
                document.getElementById("live").innerHTML = ''; 
                $("#flash").show();
                $("#keyword").show();
                    $(".keyword").html(keyword);
                    $("#flash").html('Loading Results');
                },
                success: function(html)
                {
                    $("#live").show();
                    $("#live").append(html);
                    $("#flash").hide();
                }
            });
        } return false;
    });
});
</script>
<div id="result"></div>
@yield('render')
@stop