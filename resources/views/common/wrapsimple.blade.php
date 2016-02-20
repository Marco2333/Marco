<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta name="keywords" content="@yield('keywords','主页')" />
	<meta name="description" content="@yield('description','')"/>
	<!-- <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /> -->
	<meta http-equiv="Cache-Control" content="no-transform" /> 
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	
	<!--[if lte IE 9]>
		<link rel="stylesheet" type="text/css" href="{!! URL::asset('css/ie.css') !!}"/>
	<![endif]--> 

	<!--[if IE 9]>
	    <script type="text/javascript" src="{!! URL::asset('static/PIE-2.0beta1/PIE_IE9.js') !!}"></script>
	    <link rel="stylesheet" type="text/css" href="{!! URL::asset('css/ie9.css') !!}"/>
	<![endif]-->

	<!--[if lt IE 9]>
		<script type="text/javascript" src="{!! URL::asset('plugins/html5.js') !!}"></script>
		<script type="text/javascript" src="{!! URL::asset('plugins/respond.min.js') !!}"></script>
		<script type="text/javascript" src="{!! URL::asset('static/PIE-2.0beta1/PIE_IE678.js') !!}"></script>
		<link rel="stylesheet" type="text/css" href="{!! URL::asset('css/ie678.css') !!}"/>
	<![endif]-->

	<!--[if lte IE 6]>
		<script src="{!! URL::asset('plugins/DD_belatedPNG_0.0.8a.js') !!}" type="text/javascript"></script>

		<script type="text/javascript">
		    DD_belatedPNG.fix('div, ul, img, li, input , a');
		</script>
	<![endif]--> 
	
	<title>@yield('title','主页')</title>

	<!-- <link href="favicon.ico" type="image/x-icon" rel="shortcut icon" /> -->

	<link rel="stylesheet" href="{!! URL::asset('css/common.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('css/admin.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('static/font-awesome-4.5.0/css/font-awesome.min.css') !!}">
	<script type="text/javascript" src="{!! URL::asset('plugins/jquery-1.11.2.js') !!}"></script>
	
	
</head>
<body>

	<div class="wrapper-main">
		
		@yield('content')

	</div>

	
	<!--[if lte IE 9]>
		<script>
			if (window.PIE) {
		      
			}

		</script>
	    <script type="text/javascript" src="{!! URL::asset('plugins/juqeryPIE.js') !!}"></script>
        
	<![endif]-->


</body>
</html>



