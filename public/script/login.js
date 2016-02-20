$(document).ready(function(){
	$("#login-form").validate({
		rules:{
			name:{
				required:true,
				maxlength:10
				// remote:"../Login/checkUserExist"
			},
			password:{
				required:true,
				minlength:6,
				maxlength:20
			}
		},
		messages:{
			name:{
				required:"用户名不能为空",
				maxlength:"用户名长度不能超过10位"
			},
			password:{
				required:"密码不能为空",
				minlength:"密码长度不能低于6位",
				maxlength:"密码长度不能超过20位"
			}
		},
		errorPlacement:function(error, element) {
	        //error是错误提示元素span对象  element是触发错误的input对象
	        //发现即使通过验证 本方法仍被触发
	        //当通过验证时 error是一个内容为空的span元素
	        element.next(".userinfo-behind").html("");
	        error.appendTo(element.next(".userinfo-behind"));
    	},
    	errorClass:"error-info"
	});

});
