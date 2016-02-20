(function($){
    $.pie = function(name, v){
        // 如果没有加载 PIE 则直接终止
        if (! PIE) return false;
        // 是否 jQuery 对象或者选择器名称
        var obj = typeof name == 'object' ? name : $(name);
        // 指定运行插件的 IE 浏览器版本
        var version = 9;
        // 未指定则默认使用 ie10 以下全兼容模式
        if (typeof v != 'number' && v < 9) {
            version = v;
        }
        // 可对指定的多个 jQuery 对象进行样式兼容
        if ($.browser.msie && obj.size() > 0) {
            if ($.browser.version*1 <= version*1) {
                obj.each(function(){
                    PIE.attach(this);
                });
            }
        }
    }
})(jQuery);

(function($){
    $.fn.extend({
        backgroundCover:function() {
            return this.each(function(){
                var url = $(this).css('background-image');
                var first = url.indexOf("\"");
                $(this).css("filter","progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+url.substr(first+1,url.length-first-3)+"',  sizingMethod='scale')");
                // filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='__PUBLIC__/images/site1.jpg',  sizingMethod='scale');
            });
        }
    });
})(jQuery);