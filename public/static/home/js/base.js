//屏蔽右键相关
var jsArgument = document.getElementsByTagName("script")[document.getElementsByTagName("script").length-1].src;	//获取传递的参数
rightButton = jsArgument.substr(jsArgument.indexOf("rightButton=") + "rightButton=".length, 1);
if (rightButton == "1")
{
	document.oncontextmenu = function(e){return false;}
	document.onselectstart = function(e){return false;}
	if (navigator.userAgent.indexOf("Firefox") > 0)
	{
		document.writeln("<style>body {-moz-user-select: none;}</style>");
	}
}


//设为首页
function setHomePage()
{
	if(document.all)
	{
		var obj = document.links(0);
		if (obj)
		{
			obj.style.behavior = 'url(#default#homepage)';
			obj.setHomePage(window.location.href);
		}
  	}
	else
	{
		if(window.netscape)
		{
			try
			{
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			}
			catch (e)
			{
				window.alert("此操作被浏览器拒绝，请通过浏览器菜单完成此操作！");
			}
		}
   	}
}

//加入收藏
function addFavorite()
{
	var url		= document.location.href;
	var title	= document.title;
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

//jquery 返回顶部
$(function(){
	$(window).scroll(function() {
        if ($(window).scrollTop() >= 200) {
            $(".backTop").fadeIn(200);
        } else {
            $(".backTop").fadeOut(100);
        }
    });
    $(".backTop").click(function() {
		$("html,body").animate({scrollTop:0}, 500);
    });
});

//左右等高
function equalHeight(aObj, bObj){
	var a = $(aObj).height();
	var b = $(bObj).height();
	if ( a >= b){
		$(bObj).height(a);
	}
	else if ( a <= b){
		$(aObj).height(b);
	}
}

//纵向菜单
function Nav(){
	var mst;
	$(".MainNav li").hover(function(){
		var _this = $(this)
		$(this).find("a:eq(0)").addClass("cur");
		mst = setTimeout(function(){
			_this.find(".subNav").slideDown(300);
			mst = null;
		},300)
	},function(){
		if(mst!=null) {clearTimeout(mst)};
		$(this).find("a:eq(0)").removeClass("cur");
		$(this).find(".subNav").slideUp(300);
	})
	$(".subNav").hover(function(){
	},function(){
		$(this).slideUp(300);
	})
}

//整体下拉菜单
function Nav_1(){
	var mst;
	$('.MainNav-7 .li, .MainNav-7 .subNav').hover(function(){
		clearTimeout(mst);
		mst = setTimeout(function(){
			$(".MainNav-7 .subNav").stop(true,true).slideDown(200);
		}, 150);
	},function(){
		clearTimeout(mst);
		mst = setTimeout(function(){
			$(".MainNav-7 .subNav").stop(true,true).slideUp(200);
		}, 150);
	});
}

/**
 * 设置固定宽度图片间距
 * obj 容器对象
 * pic_width 图片宽度
 * picCnt 图片个数
 * picSpace 图片个数
 */
function setPicSpace(obj, pic_width, picCnt)
{
   var box_width = $(obj).width();
   if(box_width < pic_width*picCnt || picCnt < 2){
   		picSpace = 0;
   }else{
   		picSpace = (box_width-(pic_width*picCnt))/(picCnt-1);
   }
   
   $(obj).find(".MgRt").css("margin-right", picSpace+"px");
}

$(function () {
	var cbg = $("p[data-background]");
	if (cbg.length > 0){
		cbg.parent().attr("style", cbg.attr("data-background"));
	}
})
