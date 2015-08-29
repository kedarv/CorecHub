<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}"/>
	<title>{{$data['name']}}</title>
	{{ HTML::style('css/dist.min.css')}}
	{{ HTML::style('//fonts.googleapis.com/css?family=Oswald:700,400|Roboto+Condensed')}}
	{{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}
	{{HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js')}}
	{{HTML::script('//d3js.org/d3.v3.min.js')}}
	{{HTML::script('js/dist.min.js')}}
</head>

<body>
	@include('nav')

	@yield('content')
</body>
@if(!Auth::check())
<script>
	@if(Session::has('message'))
		$('#myModal').modal('show');
		$('#error').removeClass('hide').addClass('alert-danger').fadeIn("slow").html("{{Session::get('message')}}");
	@endif

	$('#login').submit(function(e){
		e.preventDefault();
		var $form = $( this ),
		dataFrom = $form.serialize(),
		url = $form.attr( "action"),
		method = $form.attr( "method" );
		$('#error').fadeOut("fast");
		jQuery("#email").parent('div').removeClass('has-error has-success').addClass("has-success");
		jQuery("#password").parent('div').removeClass('has-error has-success').addClass("has-success");
		$.ajax({
			url: "{{action('UsersController@doLogin')}}",
			data: dataFrom,
			type: method,
			beforeSend: function(request) {
				return request.setRequestHeader('X-CSRF-Token', $("meta[name='token']").attr('content'));
			},
			success: function (response) {
				var errors = "";
				if (response['status'] == 'success') {
					$('#error').removeClass('hide alert-danger').addClass('alert-success').fadeIn("slow").html("Logging in...");
					location.reload();
				}
				else {
					$.each( response['text'], function( index, value ){
						jQuery("#" + index).parent('div').addClass('has-error');
						errors += (value  + "<br/>");
					})
					$('#error').removeClass('hide').addClass('alert-danger').fadeIn("slow").html(errors);
				}
				console.log(response['text']);
			}
		});
	});
</script>
@endif
@yield('append_js')
</html>