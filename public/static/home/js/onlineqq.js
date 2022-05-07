(function($){
    $.fn.OnlineQQ = function(options) {
        var opts = {title:'在线客服',width:160, position:"left", topSpace: 200, isOpen:1,isClosed:1,color:'#555555',bgcolor:'#FFFFFF',titcolor:'#FFFFFF',titbgcolor:'#262626',callback: function(){}};
        $.extend(opts, options);

		var kf_obj = $(this);
		kf_obj.css({'width':opts.width+'px', 'top':opts.topSpace+'px', 'color':opts.color,'backgroundColor':opts.bgcolor});
		kf_obj.prepend("<div class='kf_openBtn "+(opts.position == "left" ? "" : "kf_right")+"' style='color:"+opts.titcolor+"; background:"+opts.titbgcolor+";'><i class='iconfont icon-kefu-tianchong'></i><p>"+ opts.title +"</p></div><h3 class='l_tit' style='color:"+opts.titcolor+"; background:"+opts.titbgcolor+";'>"+ opts.title +"</h3>");
		var openBtn = kf_obj.find('.kf_openBtn');
		openBtn.css('margin-top','-'+openBtn.height()/2+'px');
		if(opts.isOpen == 1){
			if(opts.position == 'left'){
				kf_obj.css('left',0);
			}else{
				kf_obj.css('right',0);
			}
			openBtn.hide();
		}else{
			if(opts.position == 'left'){
				kf_obj.css('left','-'+opts.width+'px');
			}else{
				kf_obj.css('right','-'+opts.width+'px');
			}
			openBtn.show();
		}
		openBtn.click(function(){
			openBtn.hide(300);
			if(opts.position == 'left'){
				kf_obj.animate({left:0});
			}else{
				kf_obj.animate({right:0});
			}
		});
		if(opts.isClosed == 1){
			kf_obj.prepend("<a href='javascript:;' class='close'>×</a>");
			var closeBtn = kf_obj.find('.close');
			closeBtn.css('color',opts.titcolor);
			closeBtn.click(function(){
				if(opts.position == 'left'){
					kf_obj.animate({left:'-'+opts.width+'px'});
				}else{
					kf_obj.animate({right:'-'+opts.width+'px'});
				}
				openBtn.show(300);
			});
		}

        scrollOnline(kf_obj, opts.topSpace);
		//当页面滚动条滚动时
		$(window).scroll(function () {
			scrollOnline(kf_obj, opts.topSpace);
		});
    }
})(jQuery);

//定义一个名字为scrollOnline的函数
function scrollOnline(obj, top) {
    //定义位移为floatdiv的高度加上滚动条的顶部距离
    var offset = $(document).scrollTop()+parseInt(top);
    //为floatdiv添加动画为TOP位移offset的高度，持续0.5秒。
	obj.stop().animate({ top: offset }, 500);
}
