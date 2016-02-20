@extends('common/wrapsimple')

@section('title','管理端主页')

@section('content')	
	
    @include('common/top')
	
	<div class="main-container">
        <nav id="admin-sidebar" class="side-bar">
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a>
                        <i class="fa-fw fa fa-cog"></i>
                        <span>系统设置</span>
                        <i class="fa-fw fa fa-angle-right fr"></i>
                    </a>
                    <ul class="sub-list">
                        <li>
                            <a href="javascript:openapp('{:U('Index/mail')}',1,'友情链接')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>友情链接</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                       
                        <li>
                            <a href="javascript:openapp('{:U('Index/reason')}',2,'邮箱配置')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>邮箱配置</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:openapp('{:U('Index/tips')}',3,'名言语录')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>名言语录</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-list-item">
                    <a>
                        <i class="fa-fw fa fa-file-text"></i>
                        <span>文章管理</span>
                        <i class="fa-fw fa fa-angle-right fr"></i>
                    </a>
                    <ul class="sub-list">
                        <li>
                            <a href="javascript:openapp('{:U('Index/user')}',4,'文章列表')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>文章列表</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:openapp('{:U('Index/adduser')}',5,'文章添加')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>文章添加</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:openapp('{:U('Index/adduser')}',6,'文章添加')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>文章类别</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-list-item">
                    <a>
                        <i class="fa-fw fa fa-graduation-cap"></i>
                        <span>个人简历</span>
                        <i class="fa-fw fa fa-angle-right fr"></i>
                    </a>
                    <ul class="sub-list">
                        <li>
                            <a href="javascript:openapp('{:U('Index/user')}',7,'文章列表')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>基本信息</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:openapp('{:U('Index/adduser')}',8,'文章添加')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>技能水平</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-list-item">
                    <a>
                        <i class="fa-fw fa fa-user"></i>
                        <span>个人中心</span>
                        <i class="fa-fw fa fa-angle-right fr"></i>
                    </a>
                    <ul class="sub-list">
                        <li>
                            <a href="javascript:openapp('{:U('Index/password')}',9,'修改密码')">
                                <i class="fa-fw fa fa-caret-right"></i>
                                <span>修改密码</span>
                                <i class="fa-fw fa fa-angle-right fr"></i>
                            </a>
                        </li>
                    </ul>
                    
                </li>
                    
            </ul>
        </nav>

        <div class="main-content">
            <div class="tab-nav">
                <ul>
                    <li class="active" data-id='0'><a data-id='0' href="javascript:openapp('{:U('Index/main')}',0,'主页')">主页</a></li>
                </ul>
            </div>
            <div class="page-content">
                <iframe data-id='0'  src="{{ url('newBlog') }}" width="100%" height="100%" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <script src="{!! URL::asset('script/admin.js') !!}"></script>

  
@stop




