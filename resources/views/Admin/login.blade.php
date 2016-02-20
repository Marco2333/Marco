@extends('common/wrapsimple')

@section('title','管理端登录')

@section('content')	
	
	<style>
		body {
			background-color: #f6f6f6;
		}
	</style>
	<div id="admin-log-wrapper" class="center">
		<div class="admin-log-title">
			 <h2>请登录</h2>	
		</div>
		<form action="{{ url('/toLogin') }}" onsubmit="return checkInfo();">
			<div class="admin-log-body">
				<div class="admin-user-info">
					<span><i class=" fa fa-user-md"></i></span>
					<input type="text" name="name" placeholder="账号" value="">
				</div>
				<div class="admin-user-info">
					<span><li class="fa fa-key"></li></span>
					<input type="password" name="password" placeholder="密码" value="">
				</div>
				<div id="admin-log-button">
					<span class="fr">
						<input class="opacity-none" type="submit">
						<i class="fa fa-sign-in"></i>
					</span>
						
				</div>
			</div>
		</form>
	</div>
	
	<script>
		function checkInfo() {
			var name = $(".admin-user-info input[name='name']").val();

			if(name.trim().length == 0) {
				alert("用户名不能为空！");
				return false;
			}

			var pass = $(".admin-user-info input[name='password']").val();
			if(pass.trim().length == 0) {
				alert("密码不能为空！");
				return false;
			}
			return true;
		}
	</script>

@stop