@extends('common/wrap')

@section('title','Marco 个人简历')
@section('keywords','Marco 主页 简历')
@section('description','主页 博客')	

@section('content')	
	
	<link rel="stylesheet" href="{!! URL::asset('static/mCustomScrollbar/jquery.mCustomScrollbar.min.css') !!}">
	<link rel="stylesheet" href="{!! URL::asset('static/bootstrapvalidator/bootstrapValidator.css') !!}">

 	<style>
		body {
			background-color: #333;
			/*background: url({!! URL::asset('images/bg/bg5.png') !!});*/
		}
 	</style>
	
	@include('common/nav')
	
	<div id="resume-wrapper">
		<div class="container">
			<div class="row">
				<div id="widget-profile" class="col-md-3 clearfix">
					<div class="col-md-12 col-sm-3 col-xs-12">
						<div class="head-image">
							<img src="{!! URL::asset('images/me.jpg') !!}" alt="">
						</div>
					</div>
					<div class="col-md-12 col-sm-9 col-xs-12">
						<div id="profile-info" class="profile text-center">
							<h1>{{ $personInfo['name'] }}</h1>
							<h3>{{ $personInfo['role'] }}</h3>
							<h4>{{ $personInfo['address'] }}</h4>
						</div>
						<div id="profile-desc" class="profile hidden-xs">
							{!! $personInfo['motto'] !!}
						</div>
						<div id="profile-social" class="profile profile-social hidden-sm hidden-xs clearfix">
							<p>My Social Profiles</p>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa fa-weibo"></i></a> 
						</div>
					</div>
				</div>
				<div id="tab-wrapper" class="col-md-9 clearfix bg-white">
					<div id="tab-nav-list" class="hidden-xs pr">
						<ul>
							<li><i class="fa fa-user"></i></li>
							<li><i class="fa fa-tasks"></i></li>
							<li><i class="fa fa-film"></i></li>
							<li><i class="fa fa-envelope"></i></li>
							<div id="tab-item-print">
								<li><i class="fa fa-print"></i></li>
							</div>
						</ul>
					</div>
					<div id="tab-body-container">
						<div class="tab-title">
							<i class="glyphicon glyphicon-user"></i>
							<span>Profile</span>
						</div>
						<div id="tab-profile" class="tab-body">
							<div class="section">
								<div class="section-title">
									Mr Marco
								</div>
								<div class="section-body">
									<div class="row">
										<div class="col-md-6">
											<table class="w">
												<tbody>
													<tr>
														<td>
															<i class="glyphicon glyphicon-user"></i>
															Name
														</td>
														<td>
															{{ $personInfo['name'] }}
														</td>
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-calendar"></i>
															Birthday
														</td>
														<td>
															{{ $personInfo['birthday'] }}
														</td>
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-map-marker"></i>
															Address
														</td>
														<td>
															{{ $personInfo['address'] }}
														</td>
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-envelope"></i>
															Mail
														</td>
														<td>
															{{ $personInfo['mail'] }}
														</td>
														
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-phone"></i>
															Phone
														</td>
														<td>
															{{ $personInfo['phone'] }}
														</td>
														
													</tr>
												</tbody>
											</table>

											<div id="profile-words" class="">
												{!! $personInfo['wise_words'] !!}
											</div>
										</div>
										<div class="col-md-6">
											<div id="profile-img" class="carousel slide">
											  <!--  <ol class="carousel-indicators">
											      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
											      <li data-target="#myCarousel" data-slide-to="1"></li>
											      <li data-target="#myCarousel" data-slide-to="2"></li>
											   </ol>   --> 
											   <!-- 轮播（Carousel）项目 -->
											   <div class="carousel-inner">
											      <div class="item active">
											         <img src="{!! URL::asset('images/profile/1.jpg') !!}" alt="First slide">
											      </div>
											      <div class="item">
											         <img src="{!! URL::asset('images/profile/2.png') !!}" alt="Second slide">
											      </div>
											      <div class="item">
											         <img src="{!! URL::asset('images/profile/3.png') !!}" alt="Third slide">
											      </div>
											   </div>
											</div> 

										</div>
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="tab-title">
							<i class="glyphicon glyphicon-tasks"></i>
							<span>Resume</span>
						</div>
						<div id="tab-resume" class="tab-body none">

							@foreach($skill as $per)
								<div class="section">
									<div class="section-title">
										{{ $per['name'] }}
									</div>
									<div class="section-body">
										@foreach($per['childSkill'] as $child)
											<div class="skillbar clearfix" data-percent="{{ $child->score }}%">
								                <div class="skillbar-title"><span>{{ $child->name }}</span></div>
								                <div class="skillbar-bar"></div>
								                <div class="skill-bar-percent">{{ $child->score }}%</div>
								            </div>
										@endforeach
									</div>
								</div>
							@endforeach

						</div>
						
						<div class="tab-title">
							<i class="glyphicon glyphicon-film"></i>
							<span>Life</span>
						</div>
						<div id="tab-life" class="tab-body none">
							<div class="section">
								<div class="section-title">
									My Life
								</div>
								<div class="section-body">
									<div class="row">
										<div class="col-xs-6 col-sm-4">
											<img src="{!! URL::asset('images/life/1.jpg') !!}" alt="">
										</div>
										<div class="col-xs-6 col-sm-4">
											<img src="{!! URL::asset('images/life/2.jpg') !!}" alt="">
										</div>
										<div class="col-xs-6 col-sm-4">
											<img src="{!! URL::asset('images/life/3.jpg') !!}" alt="">
										</div>
										<div class="col-xs-6 col-sm-4">
											<img src="{!! URL::asset('images/life/4.jpg') !!}" alt="">
										</div>
										<div class="col-xs-6 col-sm-4">
											<img src="{!! URL::asset('images/life/5.jpg') !!}" alt="">
										</div>
										<div class="col-xs-6 col-sm-4">
											<img src="{!! URL::asset('images/life/6.jpg') !!}" alt="">
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="tab-title">
							<i class="glyphicon glyphicon-envelope"></i>
							<span>Contact</span>
						</div>
						<div id="tab-contact" class="tab-body none">
							<div class="section">
								<div class="section-title">
									Contact me
								</div>
								<div class="section-body">
									<div id="allmap"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="section">
										<div class="section-title">
											Contact info
										</div>
										<div class="section-body">
											<table class="w">
												<tbody>
													<tr>
														<td>
															<i class="glyphicon glyphicon-user"></i>
															Name
														</td>
														<td>
															{{ $personInfo['name'] }}
														</td>
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-calendar"></i>
															Birthday
														</td>
														<td>
															{{ $personInfo['birthday'] }}
														</td>
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-map-marker"></i>
															Address
														</td>
														<td>
															{{ $personInfo['address'] }}
														</td>
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-envelope"></i>
															Mail
														</td>
														<td>
															{{ $personInfo['mail'] }}
														</td>
														
													</tr>
													<tr>
														<td>
															<i class="glyphicon glyphicon-phone"></i>
															Phone
														</td>
														<td>
															{{ $personInfo['phone'] }}
														</td>
														
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<div class="section hidden-xs">
										<div class="section-title">
											Follow me
										</div>
										<div class="section-body">
											<div id="profile_social" class="profile-social clearfix">
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                                <a href="#"><i class="fa fa fa-weibo"></i></a>
                                            </div>
										</div>
									</div>

								</div>

								<div class="col-sm-7">

									<div class="section">
										<div class="section-title">
											Keep in touch
										</div>
										<div class="section-body">
											<form action="{{ url('/mail') }}" id="contactform" onsubmit="return check();">
                                                <p class="form-group" id="contact-name">
                                                    <label for="name">Your Name</label>
                                                    <input type="text" name="name" class="form-control name-contact" id="inputSuccess" placeholder="Name...">
                                                </p>
                                                <p class="form-group" id="contact-email"> 
                                                    <label for="email">Your Email</label>
                                                    <input type="text" name="email" class="form-control email-contact" id="inputSuccess" placeholder="Email...">
                                                </p>

                                                <p class="form-group" id="contact-message">
                                                    <label for="message">Your Message</label>
                                                    <textarea name="message" cols="88" rows="6" class="form-control message-contact" id="inputError" placeholder="Message..."></textarea>
                                                </p>
                                                <input class="btn btn-default" type="reset"  value="CLEAR" >
												<input class="btn btn-primary" type="submit" value="SUBMIT">
                                            </form>
										</div>
									</div>
									
								</div>
							</div>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{!! URL::asset('static/mCustomScrollbar/jquery.mCustomScrollbar.min.js') !!}"></script>
	<script src="{!! URL::asset('static/mCustomScrollbar/jquery.mousewheel.min.js') !!}"></script>
	<script src="{!! URL::asset('static/bootstrapvalidator/bootstrapValidator.min.js') !!}"></script>
	<script>
		$(document).ready(function () {
			// body...
		
			// 滑动条
            $("#tab-body-container").mCustomScrollbar({
           		// theme:"dark"
           		theme: "dark-2",
           		contentTouchScroll: true,
           		advanced: {
           		    updateOnContentResize: true,
           		    updateOnBrowserResize: true,
           		    autoScrollOnFocus: false
           		}
            });
	       
	        $(".tab-title").click(function() {
	       		$(".tab-body").not($(this).next()).slideUp();
	       		$(this).next(".tab-body").toggle(500);
	        });

	        $('.carousel').carousel();

	        $("#tab-nav-list ul > li").click(function() {

	        	var prev = $(this).prevAll("li").length;

	        	$(".tab-body").css('display','none');
	        	$($(".tab-body")[prev]).fadeIn(1200);

	        	if($(this).children(".fa").hasClass("fa-tasks")) {

	        		function skillBar() {
	        			var skillbar = $(".skillbar-bar");
	        			var percent;
	        			for(var i = 0;i < skillbar.length; i++) {
	        				percent = $(skillbar[i]).parent('.skillbar').attr('data-percent');

	        				if(percent != '') {
	        					$(skillbar[i]).css('width',0);
	        					$(skillbar[i]).animate({width:percent},1000);						
	        				}
	        			}
	        		}

	        		setTimeout(skillBar,200);
	        	}

	        	$("#tab-body-container").mCustomScrollbar("destroy");

	        	$("#tab-body-container").mCustomScrollbar({
	          		// theme:"dark"
	          		theme: "dark-2",
	          		contentTouchScroll: true,
	          		advanced: {
	          		    updateOnContentResize: true,
	          		    updateOnBrowserResize: true,
	          		    autoScrollOnFocus: false
	          		}
	            });
			});

	        $("#tab-item-print").click(function() {
	        	window.print();
	        });

	        $("#contactform").bootstrapValidator({ 
		        message: 'This value is not valid', 
		        feedbackIcons: { 
		            valid: 'glyphicon glyphicon-ok', 
		            invalid: 'glyphicon glyphicon-remove', 
		            validating: 'glyphicon glyphicon-refresh' 
		        }, 
		        fields: { 
		            name: { 
		                message: 'The username is not valid', 
		                validators: { 
		                    notEmpty: { 
		                        message: '姓名不能为空' 
		                    }, 
		                    stringLength: { 
		                        min: 1, 
		                        max: 30, 
		                        message: '姓名长度在1到30之间' 
		                    }
		                } 
		            }, 
		            email: { 
		                validators: { 
		                    notEmpty: { 
		                        message: '邮件不能为空' 
		                    }, 
		                    emailAddress: { 
		                        message: '请输入合法的邮件地址' 
		                    } 
		                } 
		            },
		            message: {
		            	validators: { 
		                    notEmpty: { 
		                        message: '信息不能为空' 
		                    }, 
		                    stringLength: { 
		                        max: 300, 
		                        message: '信息长度不能超过300' 
		                    }
		                } 
		            } 
		        } 
		    }); 

		});

		function check() {
			var inputList = $("#contact-form input[type='text']");
			var textareaList = $("#contact-form textarea"); 
			for(var i = 0; i < inputList.length;i++) {
				if($(inputList[i]).val().trim() == '') {
					return false;
				}
			}
			for(var i = 0; i < textareaList.length;i++) {
				if($(textareaList[i]).val().trim() == '') {
					return false;
				}
			}

			return true;
		}

	</script>
	
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=p2OKiLafzzbzAHEpnCBmWtpn"></script>

	<script>
		$(document).ready(function () { 
			var map = new BMap.Map("allmap");
			var point = new BMap.Point(120.646244,31.314511);	
			var marker = new BMap.Marker(point);
			map.centerAndZoom(point, 18);
			map.enableScrollWheelZoom(true);
			map.addOverlay(marker);
		});
		
	</script>

@stop

	

 	

