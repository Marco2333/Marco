@extends('common/wrapsimple')

@section('title','管理端主页')

@section('content')	
	
	<div id="new-blog-wrapper" class="fl">
		 <!-- 加载编辑器的容器 -->
		<div id="new-blog-front">
            <label for="blog-title">文章标题</label>
            <select name="" id="blog-type">
                <option value="1">原创</option>
                <option value="2">转载</option>
                <option value="3">翻译</option>
            </select>
			<input id="blog-title" type="text" placeholder="请输入文章标题">
            <label for="blog-theme">文章范畴</label>
            <select name="" id="blog-theme">

                @foreach($themes as $th)
                    <option value="{{ $th-> id }}">{{ $th-> theme }}</option>
                @endforeach
                
            </select>
            <label for="blog-keywords">关键词</label>
            <input id="blog-keywords" type="text" placeholder="请输入文章关键词">

            <label for="blog-keywords">开启预览</label>
            <input type="checkbox">
		</div>

	    <div id="container" name="content" type="text/plain">
	        
	    </div>

	    <div class="text-right">
	    	<input id="new-blog-submit" type="button" value="提交">
	    </div>
	</div>

    
    <!-- 配置文件 -->
    <script type="text/javascript" src="{!! URL::asset('static/ueditor/ueditor.config.js') !!}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{!! URL::asset('static/ueditor/ueditor.all.js') !!}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        
        $(document).ready(function() {

            var ue = UE.getEditor('container',{
                initialFrameHeight:300
                // scaleEnabled:true
            });

        	$("#new-blog-submit").click(function() {

        		var html = ue.getContent();
        		var title = $("#blog-title").val();
                var keywords = $("#blog-keywords").val();

        		$.ajax({
        			type: 'POST',
        			url: "{{ url('/submitBlog') }}",
        			data: {
        		        blog: html,
        		        title: title,
                        keywords:keywords,
                        theme:$("#blog-theme").val(),
                        type:$("#blog-type").val()
        		    },
        		    success:function(data) {

        		    }
        		});		
        	});       
            
            $("#new-blog-front input[type='checkbox']").one('click',function() {
                console.log($(".edui-editor-iframeholder"));
                $(".edui-editor").addClass('clearfix');
                $(".edui-editor-iframeholder").addClass('fl');
                $(".edui-editor-bottomContainer").addClass('fl').css('width','100%');
                $("<div id='blog-preview' class='none-important'></div>").insertAfter($(".edui-editor-iframeholder"));
            });

            $("#new-blog-front input[type='checkbox']").change(function() {

                if($(this).prop('checked')) {
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
                    $("#blog-preview").addClass('none-important');
                    ue.removeListener("contentChange");

                    var width = $(".edui-editor-iframeholder").css('width');
                    $(".edui-editor-iframeholder").removeClass('half-devide').css('width',width.substr(0,width.length-2)*2);
                }

            });
        });

    </script>

@stop