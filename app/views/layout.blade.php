<!DOCTYPE html>
<html lang="en">
<head>
   	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}"/>
	<title>{{$data['name']}}</title>
	{{ HTML::style('css/bootstrap.css')}}
	{{ HTML::style('css/style.css')}}
	{{ HTML::style('css/sweet-alert.css')}}
	{{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')}}
	{{ HTML::style('//fonts.googleapis.com/css?family=Oswald:700,400')}}
</head>

<body>
 	@include('nav')

	@yield('content')
 </body>
	{{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}
	{{HTML::script('js/sweet-alert.min.js')}}
	@yield('append_js')
 </html>