(function (doc, win) {
var docEl = doc.documentElement,
resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
recalc = function () {
var clientWidth = docEl.clientWidth;
if (!clientWidth) return;
if(clientWidth>=640){
docEl.style.fontSize = '100px';
}else{
docEl.style.fontSize = 100 * (clientWidth / 640) + 'px';
}
};

if (!doc.addEventListener) return;
win.addEventListener(resizeEvt, recalc, false);
doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);


//+function () {
//  // var tid=null;
//  remLayout();
//  function remLayout () {
//      var w=document.documentElement.clientWidth;
//      w=w>768?768:w;
//      w=w<=320?320:w;
//      document.documentElement.style.fontSize =  w/ 6.4 + 'px';
//  }
//  window.addEventListener('resize', function() {
//          // clearTimeout(tid);
//          // tid = setTimeout(remLayout, 100);
//      remLayout();
//  }, false);
//
//}();