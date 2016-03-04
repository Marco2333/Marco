@extends('common/wrap')

@section('title','博客归档')
@section('keywords','Marco 主页 博客')
@section('description','主页 博客')	

@section('content')	
	
	@include('common/nav')

	<div class="main-content">
		<div class="container">
			<div class="row">
				<div id="archive-list-wrap" class="content-wrapper col-sm-9  wow fadeInLeft">
					<div id="archive-header">
						<span>博客归档</span>
					
						<label for="blog-time">提交日期</label>
						<select name="blog-time" id="blog-time">
							<option value="all">全部</option>
							
							@if(isset($date_sum) )
								@foreach($date_sum as $ds)
									<option value="{{ $ds }}">{{ substr($ds,0,4).'年 '.substr($ds,4,2).' 月' }}</option>
								@endforeach
							@endif

						</select>

						<label for="blog-theme">博客主题</label>
						<select name="blog-theme" id="blog-theme">
							<option value="all">全部</option>

							@foreach($types as $t)
								<option value="{{ $t->id }}">{{ $t->theme }}</option>
							@endforeach

						</select>
					</div>
					<div id="archive-body">
						<ul>

							@foreach($archive_blog as $key => $ab)
								<li class="list-item" data-date="{{ $key }}">
									<span>{{ substr($key,0,4).'年 '.substr($key,4,2).' 月' }}</span>
									<ul class="sub-list">
										@foreach($ab as $b)
											<li date-category="{{ $b['category'] }}"><a href="{{ url('/detail/'.$b['id']) }}">
											@if($b['type'] == 2) 
												[转]
											@elseif($b['type'] == 3)
												[译]
											@endif
											{{ $b['title'] }}</a></li>
										@endforeach
									</ul>
								</li>
							@endforeach

						</ul>
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
			$("#archive-body").css('min-height',height-80);

			$("#blog-time").change(function() {

				if($("#blog-time").val() == 'all') {
					$("#archive-body .list-item").removeClass('none');

					return;
				}

				var list = $("#archive-body .list-item");

				for(var i = 0;i < list.length;i++) {
					if($(list[i]).attr('data-date') != $("#blog-time").val()) {
						$(list[i]).addClass('none');
					}
					else {
						$(list[i]).removeClass('none');
					}
				}

				return;
			});

			$("#blog-theme").change(function() {
				if($("#blog-theme").val() == 'all') {
					$("#archive-body .sub-list li").removeClass('none');

					return;
				}

				var val = $("#blog-theme").val();
				var itemList = $("#archive-body .sub-list li");

				for(var i = 0;i < itemList.length;i++) {
					var category = $(itemList[i]).attr("date-category");

					var cateArr = category.split(",");

					if(cateArr.indexOf(val) === -1) {
						$(itemList[i]).addClass('none');
					}
					else {
						$(itemList[i]).removeClass('none');
					}
				}
			});

		});
	</script>
@stop