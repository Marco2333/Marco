@extends('common/wrap')

@section('title','随笔分类')
@section('keywords','分类 博客')
@section('description','主页 博客')	

@section('content')	
	
	<link rel="stylesheet" href="{!! URL::asset('static/jPages/jPages.css') !!}">

	@include('common/nav')
	
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div id="blog-list-wrap" class="content-wrapper col-sm-9 wow fadeInLeft">
					<div id="blog-list">
						@foreach ($blogs as $blog) 
							<div class="blog">
							 	<div class="blog-title">
							 	@if($blog->type == 2) 
									[转]
								@elseif($blog->type == 3)
									[译]
								@endif{!! $blog->title !!}</div>
							 	<div class="blog-abstract">
							 		<span>摘要: {!! $blog->abstract !!}...</span><a href="{{ url('detail/'.$blog->id) }}">阅读全文</a>
							 	</div>
							 	<div class="blog-info">
							 		 <span>posted @ {!! $blog->created_at !!}</span>
							 		 <span><i class="glyphicon glyphicon-tag"></i>{!! $blog->tag !!}</span>
							 	</div>
							</div>
						@endforeach
					</div>
					
					<div class="holder text-right"></div>
				</div>

				@include('common/side')
				
			</div>
		</div>
	</div>
	
	<script src="{!! URL::asset('static/jPages/jPages.min.js') !!}"></script>
	
	<script>
		
		$(document).ready(function() {
			$(".holder").jPages({  
		      containerID : "blog-list",  
		      previous : "←",  
		      next : "→",  
		      perPage : 8
		      // animation: 'wobble'
		    });  

		    var height = $("#side-bar").outerHeight();
			$("#blog-list").css('min-height',height-60);

			$(window).resize(function() {
				var height = $("#side-bar").outerHeight();
				$("#blog-list").css('min-height',height-60);
			});	

			$(".holder a").click(function() {
				var height = $("#side-bar").outerHeight();
				$("#blog-list").css('min-height',height-60);
			});
		});

	</script>
@stop