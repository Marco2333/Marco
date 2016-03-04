@extends('common/wrap')

@section('title',$blog->title)
@section('keywords','Marco 博客')
@section('description',$blog->title)	

@section('content')	

	@include('common/nav')

	<div class="main-content">
		<div class="container">
			<div class="row">
				<div id="blog-detail-wrap" class="content-wrapper col-sm-9 wow fadeInLeft"> 	
					<div id="blog-detail">
						<div class="blog-title">
							@if($blog->type == 2) 
								[转]
							@elseif($blog->type == 3)
								[译] 
							@endif
							{{ $blog->title }}</div>
						<div class="blog-date">

							@if ( $blog->updated_at === null) 
								<span>Last Modified: {{ $blog->created_at }}</span>
							@else 
								<span>Last Modified: {{ $blog->updated_at }}</span>
							@endif
							
						</div>
						<div class="blog-content">{!!$blog->body!!}</div>
					</div>
				</div>

				@include('common/side')

			</div>
		</div>
	</div>

	
	<script src="{!! URL::asset('static/syntaxhighlighter/scripts/shCore.js') !!}" type="text/javascript"></script>
	<script src="{!! URL::asset('static/syntaxhighlighter/scripts/shBrushCss.js') !!}" type="text/javascript"></script>
	<script src="{!! URL::asset('static/syntaxhighlighter/scripts/shBrushPhp.js') !!}" type="text/javascript"></script>
	<script src="{!! URL::asset('static/syntaxhighlighter/scripts/shBrushXml.js') !!}" type="text/javascript"></script>
	<script src="{!! URL::asset('static/syntaxhighlighter/scripts/shBrushJScript.js') !!}" type="text/javascript"></script>
	<script src="{!! URL::asset('static/syntaxhighlighter/scripts/shBrushPlain.js') !!}" type="text/javascript"></script>
    <link href="{!! URL::asset('static/syntaxhighlighter/styles/shCoreDefault.css') !!}"rel="stylesheet" type="text/css" >


	<script>
		$(document).ready(function() {
			// body...
			var height = $("#side-bar").outerHeight();
			$("#blog-detail").css('min-height',height-20);

			$(window).resize(function() {
				var height = $("#side-bar").outerHeight();
				$("#blog-detail").css('min-height',height-20);
			});	

			SyntaxHighlighter.all();

		});
	</script>


@stop