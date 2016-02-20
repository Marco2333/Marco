@extends('common/wrap')

@section('title',$blog->title)
@section('keywords','Marco 博客')
@section('description',$blog->title)	

@section('content')	

	@include('common/nav')

	<div class="main-content">
		<div class="container">
			<div class="row">
				<div id="blog-detail-wrap" class="content-wrapper col-sm-9 wow bounceInLeft"> 	
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
						<div class="blog-content">
					 		{!! $blog->body !!}
					 	</div>
					</div>
				</div>

				@include('common/side')

			</div>
		</div>
	</div>

	
	<script>
		$(document).ready(function() {
			// body...
			var height = $("#side-bar").outerHeight();
			$("#blog-detail").css('min-height',height-20);

			$(window).resize(function() {
				var height = $("#side-bar").outerHeight();
				$("#blog-detail").css('min-height',height-20);
			});	

		});
	</script>

	<script src="{!! URL::asset('static/shCore/shCore.js') !!}" type="text/javascript"></script>
    <link href="{!! URL::asset('static/shCore/shCoreDefault.css') !!}"rel="stylesheet" type="text/css" >
    <script type="text/javascript" language="javascript">
        $(function(){
            SyntaxHighlighter.all();
        });
    </script>
@stop