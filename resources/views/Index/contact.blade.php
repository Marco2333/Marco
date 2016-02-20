@extends('common/wrap')

@section('title','联系我')
@section('keywords','Marco 博客')
@section('description','联系我')	

@section('content')	
	<link rel="stylesheet" href="{!! URL::asset('static/bootstrapvalidator/bootstrapValidator.css') !!}">
	
	@include('common/nav')

	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="content-wrapper col-sm-9 wow bounceInLeft">
					<div id="allmap"></div> 	
					<div id="contact-detail">
						<div class="row">
							<div class="col-sm-5">
								<div class="section">
									<div class="section-title">
										联系信息
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
														Mr Marco
													</td>
												</tr>
												<tr>
													<td>
														<i class="glyphicon glyphicon-calendar"></i>
														Birthday
													</td>
													<td>
														1994-08-08
													</td>
												</tr>
												<tr>
													<td>
														<i class="glyphicon glyphicon-map-marker"></i>
														Address
													</td>
													<td>
														苏州干将东路333号
													</td>
												</tr>
												<tr>
													<td>
														<i class="glyphicon glyphicon-envelope"></i>
														Mail
													</td>
													<td>
														MrMarcoHan@gmail.com
													</td>
													
												</tr>
												<tr>
													<td>
														<i class="glyphicon glyphicon-phone"></i>
														Phone
													</td>
													<td>
														18896554856
													</td>
													
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="col-sm-7">

								<div class="section">
									<div class="section-title">
										在线留言
									</div>
									<div class="section-body">
										<form action="{{ url('/mail') }}" id="contactform" onsubmit="return check();">
                                            <p class="form-group" id="contact-name">
                                                <label for="name">姓名</label>
                                                <input type="text" name="name" class="form-control name-contact" id="inputSuccess" placeholder="Name..." required>
                                            </p>
                                            <p class="form-group" id="contact-email"> 
                                                <label for="email">邮箱</label>
                                                <input type="text" name="email" class="form-control email-contact" id="inputSuccess" placeholder="Email..." required="required">
                                            </p>

                                            <p class="form-group" id="contact-message">
                                                <label for="message">留言</label>
                                                <textarea name="message" cols="88" rows="6" class="form-control message-contact" id="inputError" placeholder="Message..." required></textarea>
                                            </p>
                                            <input class="btn btn-default" type="reset"  value="清除" >
											<input class="btn btn-primary" type="submit" value="提交">
                                        </form>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>

				@include('common/side')

			</div>
		</div>
	</div>
	


	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=p2OKiLafzzbzAHEpnCBmWtpn"></script>
	<script src="{!! URL::asset('static/bootstrapvalidator/bootstrapValidator.min.js') !!}"></script>

	<script>
		$(document).ready(function () { 
			
			var height = $("#side-bar").outerHeight();
			$("#contact-detail").css('min-height',height-250);

			$(window).resize(function() {
				var height = $("#side-bar").outerHeight();
				$("#contact-detail").css('min-height',height-250);
			});

			var map = new BMap.Map("allmap");
			var point = new BMap.Point(120.646244,31.314511);	
			var marker = new BMap.Marker(point);

			map.centerAndZoom(point, 18);
			map.enableScrollWheelZoom(true);
			map.addOverlay(marker);

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
			var inputList = $("#contactform input[type='text']");
			var textareaList = $("#contactform textarea"); 
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
	
	<script>
		
	</script>
@stop