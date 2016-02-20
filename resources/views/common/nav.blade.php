<header class="header">
	<div class="header-logo">
		<div class="container">
			<div class="logo fl"> 
				<h2>
					<span>{{$pre_name[0]->value}}</span><span>{{$name[0]->value}}</span>
				</h2>
				<p>{{ $sub_title[0]->value }}</p>
			</div>
			<div class="navbar-header">
			   <button type="button" class="navbar-toggle" data-toggle="collapse" 
			      data-target="#navbar-collapse">
			      <span class="sr-only">切换导航</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			   </button>
			</div>
		</div>
	</div>

	<nav class="header-nav" role="navigation">
	  	<div class="container">
  		    <div id="navbar-collapse" class="collapse navbar-collapse">
  				<ul class="nav navbar-nav">
  					<li><a href="{{ url('/') }}">主页</a></li>
					<li><a href="{{ url('/archive') }}">博客归档</a></li>
					<li><a href="{{ url('/resume') }}">我的简历</a></li>
					<li><a href="{{ url('/contact') }}">联系我</a></li>
					<li class="dropdown">
						<a id="dropdown-nav-menu" class="dropdown-toggle" data-toggle="dropdown" href="">关注我</a>		  
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-nav-menu">
						    <li role="presentation">
						        <a role="menuitem" tabindex="-1" target="_blank" href="https://github.com/">Github.com</a>
						    </li>
						    <li role="presentation">
						        <a role="menuitem" tabindex="-1" target="_blank" href="http://git.oschina.net/mrwhareyou">Git@OSC</a>
						    </li>
						</ul>	
					</li>
  				</ul>
  				<form class="navbar-form navbar-right" role="search" action="{{ url('/search') }}">
			        <div class="form-group">
			          	<input type="text" class="form-control" placeholder="搜索关键字" name="keyword">
			        </div>
			        <input type="submit" class="btn btn-default btn-xs-block" value="搜索">
				</form>
  		    </div>
	  	</div>
	</nav>
</header>