<!DOCTYPE html>
<html lang="en">
<head>
   	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$data['name']}}</title>
	{{ HTML::style('css/bootstrap.css'); }}
	<style>
.header-image {
    display: block;
    width: 100%;
    background: url('img/bg.jpg') no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}

.headline {
    padding: 60px 0;
    color: #fff;
}

.headline h1 {
    font-size: 70px;
}

.headline h2 {
    font-size: 77px;
}
.navbar {
	margin-bottom: 0px;
}
</style>
</head>
<body>
 @include('nav')
 @yield('content')
 </body>
 </html>