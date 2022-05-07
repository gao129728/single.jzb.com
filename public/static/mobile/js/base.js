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

/**
 * 设置图片高度
 * obj 容器对象
 */
function setPicHeight(obj)
{
	var ht  = $(obj).find('img').height();
	$(obj).find('img').height(ht);
}

$(function () {
	var cbg = $("p[data-background]");
	if (cbg.length > 0){
		cbg.parent().attr("style", cbg.attr("data-background"));
	}
})
