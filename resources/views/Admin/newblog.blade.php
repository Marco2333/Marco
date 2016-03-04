@extends('common/wrapsimple')

@section('title','管理端主页')

@section('content')	
	
	<div id="new-blog-wrapper" class="fl">
		 <!-- 加载编辑器的容器 -->
        <form action="{{ url('/submitBlog') }}" method="post">
    		<div id="new-blog-front">
                <label for="blog-title">文章标题</label>
                <select name="type" id="blog-type">
                    <option value="1">原创</option>
                    <option value="2">转载</option>
                    <option value="3">翻译</option>
                </select>
    			<input id="blog-title" name="title" type="text" placeholder="请输入文章标题">
                <label for="blog-theme">文章范畴</label>
                <select name="theme" id="blog-theme">

                    @foreach($themes as $th)
                        <option value="{{ $th-> id }}">{{ $th-> theme }}</option>
                    @endforeach
                    
                </select>
                <label for="blog-keywords">关键词</label>
                <input id="blog-keywords" name="keywords" type="text" placeholder="请输入文章关键词">

                <label for="blog-keywords">开启预览</label>
                <input type="checkbox">
    		</div>
            
            <textarea id="container" name="blog" type="text/plain"></textarea><!--加载编辑器的容器--> 

    	    <div class="text-right">
    	    	<input id="new-blog-submit" type="submit" value="提交">
    	    </div>
        </form>
	</div>

    
    <!-- 配置文件 -->
    <script type="text/javascript" src="{!! URL::asset('static/ueditor/ueditor.config.js') !!}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{!! URL::asset('static/ueditor/ueditor.all.js') !!}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        
        $(document).ready(function() {

            var ue = UE.getEditor("container",{
                initialFrameHeight:300,
                toolbars:[ 
                [ 
                    //'anchor', //锚点 
                    'undo', //撤销 
                    'redo', //重做 
                    'bold', //加粗 
                    //'indent', //首行缩进 
                    //'snapscreen', //截图（需要插件，一般不开）； 
                    'italic', //斜体 
                    'underline', //下划线 
                    'strikethrough', //删除线 
                    'subscript', //下标 
                    //'fontborder', //字符边框 
                    'superscript', //上标 
                    //'formatmatch', //格式刷 
                    //'source', //源代码 
                    'blockquote', //引用 
                    'pasteplain', //纯文本粘贴模式 
                    // 'selectall', //全选 
                    //'print', //打印 
                   
                    'horizontal', //分隔线 
                    'removeformat', //清除格式 
                    //'time', //时间 
                    //'date', //日期 
                    'unlink', //取消链接 
                    //'insertrow', //前插入行 
                    //'insertcol', //前插入列 
                    //'mergeright', //右合并单元格 
                    //'mergedown', //下合并单元格 
                    //'deleterow', //删除行 
                    //'deletecol', //删除列 
                    //'splittorows', //拆分成行 
                    //'splittocols', //拆分成列 
                    //'splittocells', //完全拆分单元格 
                    //'deletecaption', //删除表格标题 
                    'inserttitle', //插入标题 
                    //'mergecells', //合并多个单元格 
                    //'deletetable', //删除表格 
                    //'cleardoc', //清空文档 
                    //'insertparagraphbeforetable', //"表格前插入行" 
                    //'paragraph', //段落格式 
                    'simpleupload', //单图上传 
                    'insertimage', //多图上传 
                    //'edittable', //表格属性 
                    //'edittd', //单元格属性 
                    'link', //超链接 
                    'emotion', //表情 
                    'spechars', //特殊字符 
                    'searchreplace', //查询替换 
                    'map', //Baidu地图 
                    //'gmap', //Google地图 
                    'insertvideo', //视频 
                    //'help', //帮助 
                    'justifyleft', //居左对齐 
                    'justifyright', //居右对齐 
                    'justifycenter', //居中对齐 
                    'justifyjustify', //两端对齐  
                    'fullscreen', //全屏 
                    //'directionalityltr', //从左向右输入 
                    //'directionalityrtl', //从右向左输入 
                   
                    //'pagebreak', //分页 
                    //'insertframe', //插入Iframe 
                    //'imagenone', //默认 
                    //'imageleft', //左浮动 
                    //'imageright', //右浮动 
                    //'attachment', //附件 
                    'imagecenter', //居中 
                    //'wordimage', //图片转存 
                   
                    'edittip ', //编辑提示 
                    'customstyle', //自定义标题 
                    //'autotypeset', //自动排版 
                    //'webapp', //百度应用 
                    //'touppercase', //字母大写 
                    //'tolowercase', //字母小写 
                    'background', //背景 
                    //'template', //模板 
                    'scrawl', //涂鸦 
                    'music', //音乐 
                    'inserttable', //插入表格 
                    'drafts', // 从草稿箱加载 
                    'charts', // 图表 
                    'fontfamily', //字体 
                    'fontsize', //字号 
                    'insertcode', //代码语言 
                    'insertorderedlist', //有序列表 
                    'insertunorderedlist', //无序列表
                    'lineheight', //行间距  
                    'rowspacingtop', //段前距 
                    'rowspacingbottom', //段后距 
                    'forecolor', //字体颜色 
                    'backcolor', //背景色              
                    'preview', //预览 
                ] 
            ]}); 

        	// $("#new-blog-submit").click(function() {

        	// 	var html = ue.getContent();
        	// 	var title = $("#blog-title").val();
         //        var keywords = $("#blog-keywords").val();

        	// 	$.ajax({
        	// 		type: 'POST',
        	// 		url: "{{ url('/submitBlog') }}",
        	// 		data: {
        	// 	        blog: html,
        	// 	        title: title,
         //                keywords:keywords,
         //                theme:$("#blog-theme").val(),
         //                type:$("#blog-type").val()
        	// 	    },
        	// 	    success:function(data) {

        	// 	    }
        	// 	});		
        	// });       
            
            $("#new-blog-front input[type='checkbox']").one('click',function() {
                $(".edui-editor").addClass('clearfix');
               
                $(".edui-editor-bottomContainer").addClass('fl').css('width','100%');
                $("<div id='blog-preview' class='none-important'></div>").insertAfter($(".edui-editor-iframeholder"));
            });

            $("#new-blog-front input[type='checkbox']").change(function() {

                if($(this).prop('checked')) {
                    $(".edui-editor-iframeholder").addClass('fl');

                    var width = $(".edui-editor-iframeholder").css('width');
                    $(".edui-editor-iframeholder").addClass('half-devide').css('width',width.substr(0,width.length-2)/2);
                    
                    var html = ue.getContent();
                    $("#blog-preview").html(html).removeClass('none-important').css('width',width.substr(0,width.length-2)/2-2);

                    ue.addListener("contentChange",function(){
                        var html = ue.getContent();
                        $("#blog-preview").html(html);
                    });
                }
                else {
                    $(".edui-editor-iframeholder").removeClass('fl');
                    $("#blog-preview").addClass('none-important');
                    ue.removeListener("contentChange");

                    var width = $(".edui-editor-iframeholder").css('width');
                    $(".edui-editor-iframeholder").removeClass('half-devide').css('width',width.substr(0,width.length-2)*2);
                }

            });
        });

    </script>

@stop