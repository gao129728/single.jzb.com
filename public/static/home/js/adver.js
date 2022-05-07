var timespan	= navigator.userAgent.indexOf("Firefox") > 0 ? 15 : 10;
var AdConfig	= true;

function addEvent(obj, eventType, func)
{
	if (obj.addEventListener)
	{
		obj.addEventListener(eventType, func, false);
	}
	else if (obj.attachEvent)
	{
		obj.attachEvent("on" + eventType, func);
	}
}

function AdConfigInit()
{
	AdConfig = new Object();
	AdConfig.Left = 0;
	AdConfig.Top = 0;
	AdConfig.Width = 0;
	AdConfig.Height = 0;
	AdConfig.Scroll = function()
	{
		if (document.documentElement && document.documentElement.scrollLeft)
		{
			AdConfig.Left = document.documentElement.scrollLeft;
		}
		else if (document.body)
		{
			AdConfig.Left = document.body.scrollLeft;
		}

		if (document.documentElement && document.documentElement.scrollTop)
		{
			AdConfig.Top = document.documentElement.scrollTop;
		}
		else if (document.body)
		{
			AdConfig.Top = document.body.scrollTop;
		}
	}
	AdConfig.Resize = function()
	{
		if (document.documentElement && document.documentElement.clientHeight && document.body && document.body.clientHeight)
		{
			AdConfig.Width = (document.documentElement.clientWidth > document.body.clientWidth) ? document.body.clientWidth : document.documentElement.clientWidth;
			AdConfig.Height = (document.documentElement.clientHeight > document.body.clientHeight) ? document.body.clientHeight : document.documentElement.clientHeight;
		}
		else if (document.documentElement && document.documentElement.clientHeight)
		{
			AdConfig.Width = document.documentElement.clientWidth;
			AdConfig.Height = document.documentElement.clientHeight;
		}
		else if (document.body)
		{
			AdConfig.Width = document.body.clientWidth;
			AdConfig.Height = document.body.clientHeight;
		}
	}

	AdConfig.Scroll();
	AdConfig.Resize();
	addEvent(window, "scroll", AdConfig.Scroll);
	addEvent(window, "resize", AdConfig.Resize);
}

function AdPrepare(id, url, mode, pic, width, height, top, side, autoClose, screenTime)
{
	if (AdConfig)
		AdConfigInit();

	var content = AdContent(url, pic, width, height, autoClose);
	if(mode == 'pullScreen'){
		$('body').prepend("<div id='adver_" + id + "'  class='adver_model'>" + content + "</div>");
	}else{
		$('body').append("<div id='adver_" + id + "'  class='adver_model'>" + content + "</div>");
	}

	var obj = document.getElementById("adver_" + id);
	switch(mode)
	{
		case "popup":
			AdPopup(obj, width, height, autoClose);
			break;
		case "float":
			AdFloat(obj, width, height, top, side, autoClose);
			break;
		case "hangL":
			AdHangLeft(obj, top, side, autoClose);
			break;
		case "hangR":
			AdHangRight(obj, top, side, autoClose);
			break;
		case "pullScreen":
			AdPullScreen(obj, width, autoClose, screenTime);
			break;
	}
}

function AdPopup(obj, width, height, autoClose){
	$(obj).addClass('adver_shadow').css({
		'position':'fixed',
		'width':width+'px',
		'height':height+'px',
		'left':'50%',
		'top':'50%',
		'marginLeft':'-'+ width/2 +'px',
		'marginTop':'-'+ height/2 +'px',
		'display':'none'
	}).fadeIn(1500);
	if (autoClose)
	{
		$(obj).on('click', 'i', function(){
			$(obj).hide(500);
		});
	}
}

function AdFloat(obj, width, height, top, side, autoClose)
{
	$(obj).addClass('adver_shadow').css({
		'position':'absolute',
		'width':width+'px',
		'height':height+'px',
		'top':top+'px',
		'left':side+'px'
	});
	var directX = 1;
	var directY = 1;
	obj.Move = function()
	{
		if (side + width >= AdConfig.Left + AdConfig.Width)
		{
			side = AdConfig.Left + AdConfig.Width - width;
			directX = -1;
		}
		else if (side <= AdConfig.Left)
		{
			side = AdConfig.Left;
			directX = 1;
		}

		if (top + height >= AdConfig.Top + AdConfig.Height)
		{
			top = AdConfig.Top + AdConfig.Height - height;
			directY = -1;
		}
		else if (top <= AdConfig.Top)
		{
			top = AdConfig.Top;
			directY = 1;
		}
		side += directX;
		top += directY;
		obj.style.left = side + "px";
		obj.style.top = top + "px";
	}
	var interval = window.setInterval(obj.Move, timespan);
	obj.onmouseover = function()
	{
		window.clearInterval(interval);
	}
	obj.onmouseout = function()
	{
		interval = window.setInterval(obj.Move, timespan);
	}
	if (autoClose)
	{
		$(obj).on('click', 'i', function(){
			window.clearInterval(interval);
			$(obj).fadeOut(500);
		});
	}
}

function AdHangLeft(obj, top, side, autoClose)
{
	$(obj).addClass('adver_shadow').css({
		'position':'absolute',
		'top':top+'px',
		'left':side+'px'
	});
	obj.Move = function()
	{
		var t = parseInt(obj.style.top, 10);
		if (t + 5 < AdConfig.Top + top)
		{
			obj.style.top = (t + 5) + "px";
		}
		else if (t - 5 > AdConfig.Top + top)
		{
			obj.style.top = (t - 5) + "px";
		}
	}

	var interval = window.setInterval(obj.Move, timespan);
	if (autoClose)
	{
		$(obj).on('click', 'i', function(){
			window.clearInterval(interval);
			$(obj).hide(500);
		});
	}
}

function AdHangRight(obj, top, side, autoClose)
{
	$(obj).addClass('adver_shadow').css({
		'position':'absolute',
		'top':top+'px',
		'right':side+'px'
	});
	obj.Move = function()
	{
		var t = parseInt(obj.style.top, 10);
		if (t + 5 < AdConfig.Top + top)
		{
			obj.style.top = (t + 5) + "px";
		}
		else if (t - 5 > AdConfig.Top + top)
		{
			obj.style.top = (t - 5) + "px";
		}
	}

	var interval = window.setInterval(obj.Move, timespan);
	if (autoClose)
	{
		$(obj).on('click', 'i', function(){
			window.clearInterval(interval);
			$(obj).hide(500);
		});
	}
}

function AdPullScreen(obj, width, autoClose, screenTime){
	$(obj).css({'width':'100%', 'display':'none'});
	$(obj).find('p').css({
		'position':'relative',
		'left':'50%',
		'width':width+'px',
		'marginLeft':'-'+ width/2 +'px'
	});
	obj.PullUp = function()
	{
		$(obj).slideUp(2000);
	}
	if (autoClose)
	{
		$(obj).on('click', 'i', function(){
			obj.PullUp();
		});
	}
	$(function(){
		$(obj).slideDown(2000);
		setTimeout(obj.PullUp,screenTime*1000);
	})
}

function AdContent(url, pic,width,height, autoClose)
{
	var content;
	var image = "<img src='" + pic + "' width='" + width + "' height='" + height + "' border='0' />";
	if (url != ""){
		content = "<p><a href='" + url + "' target='_blank'>" + image + "</a></p>";
	}else{
		content = "<p>" + image + "</p>";
	}
	if (autoClose){
		content += "<i class='iconfont icon-htmal5icon19 close'></i>";
	}

	return content;
}