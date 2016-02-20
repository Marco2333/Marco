<nav id="nav-top">
	<div class="fl">
		<p class="system-name">
			<i class="fa fa-book system-name-logo"></i>
			<span>Marco个人博客管理端</span>
		</p>
	</div>
	<div id="nav-top-pinfo" class="fr pos-relative">
		<p class="one-line">
			<i class="fa fa-user"></i>
			<span class="user-name">{{ $username or 'Marco' }}</span>
			<a href="{{ url('/logout') }}">
				<span>退出</span>
			</a>
		</p>
	</div>
</nav>