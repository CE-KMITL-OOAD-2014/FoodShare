<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

   

    <!-- Bootstrap core CSS -->
    
	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/js/bootstrap.js') }}">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}">
    <!-- Custom styles for this template -->
	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/style.css') }}">
</head>
<body>
    @include("layout.headershop")
        @yield("content")
</body>
</html>