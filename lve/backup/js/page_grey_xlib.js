window.onload = function()
{
};
window.onunload = function() // assigning an unload listener disables bfcache (fastback) in Opera and Firefox
{
};
var pg=null;

function xPageGrey(sDivClass, sImgUrl, sImgClass, sMsg, sMsgClass,w,h)
{
  /*@cc_on
  @if (@_jscript_version < 5.5)
  this.ele = null;
  @else @*/
  this.ele = document.createElement('div');
  this.ele.className = sDivClass;
  this.ele.id = 'graypreview';
  //this.ele.style.width = '331px';
//  this.ele.style.height = '188px';
  if (sImgUrl) {
    

var img = document.createElement('img');
    img.style.display = 'block';	
	img.setAttribute("id", "wait");
	img.setAttribute('zIndex',"9999");
    img.style.zIndex = '9999';	
    img.className = sImgClass;
    img.src = sImgUrl;
	
   var lk2 = document.createElement('a');
   lk2.href = 'javascript:void(0);';
   lk2.id = 'lk2';
   lk2.appendChild(img);
	

   var lk = document.createElement('a');
   lk.href = 'javascript:void(0);';
   lk.id = 'hd';
    lk.style.fontSize = '11px';
  lk.appendChild(document.createTextNode('Fermer'));
   
   var sep=' | ';
   
/*   var lk2 = document.createElement('a');
   lk2.href = 'javascript:void(0);';
   lk2.id = 'val';
   lk2.appendChild(document.createTextNode('Valider ma carte'));
*/    
   this.men = document.createElement('div');
   this.men.setAttribute("id", "mnu");
   //this.men.className = 'mn';
   this.men.appendChild(lk);
/*   this.men.appendChild(document.createTextNode(sep));
   this.men.appendChild(lk2);
*/

    this.msg = document.createElement('div');
	this.msg.id='msg';
	this.msg.setAttribute('zIndex',"9999");
    this.msg.className = sMsgClass;
    this.msg.appendChild(lk2);
    this.msg.appendChild(this.men);
	//this.msg.appendChild(document.getElementById('ok'));
	//this.msg.appendChild(document.getElementById('no'));
	
	if(document.getElementById('tabauth')) {this.msg.appendChild(document.getElementById('tabauth'));}
	document.body.appendChild(this.msg);
  	document.getElementById('msg').style.width=w;
	if(document.getElementById('tabauth')) {document.getElementById('tabauth').style.display = 'none';}
	
  }
  document.body.appendChild(this.ele);
  /*@end @*/
  this.show = function()
  {
    if (this.ele) {
      var ds = xDocSize();
      xMoveTo(this.ele, 0, 0);
      xResizeTo(this.ele, ds.w, ds.h);
      if (this.msg) {
        xMoveTo(this.msg, xScrollLeft()+(xClientWidth()-xWidth(this.msg))/2, xScrollTop()+(xClientHeight()-xHeight(this.msg))/2);
      //xResizeTo(this.msg, '331', '188');
	  this.msg.style.width=w;
  	  this.msg.style.height=h+10;
    }
    }
  };
  this.hide = function()
  {
   img.src = sImgUrl;
    if(document.getElementById('tabauth')){document.getElementById('tabauth').style.display = 'none';}
//	document.getElementById('wait').style.display='block';
//	document.getElementById('mnu').style.display='block';
//	document.getElementById('ok').style.display='none';
//	document.getElementById('no').style.display='none';
	if (this.ele) {
      xResizeTo(this.ele, 10, 10);
      xMoveTo(this.ele, -10, -10);
      if (this.msg) {
        xMoveTo(this.msg, -xWidth(this.msg)-1000, -1000);
      }
    }
  };
  
  this.validateCard = function ()   {
    img.src = sImgUrl;
	sendData('POST','ajax2.php','xmlhttp=1&isLoged=1');
  }  ;

}

/* Compiled from X 4.12 with XC 1.02 on 18Apr07 */
function xAddEventListener(e,eT,eL,cap)
{
  if(!(e=xGetElementById(e)))return;
  eT=eT.toLowerCase();
  if(e.addEventListener)e.addEventListener(eT,eL,cap||false);
  else if(e.attachEvent)e.attachEvent('on'+eT,eL);
  else {
    var o=e['on'+eT];
    e['on'+eT]=typeof o=='function' ? function(v){o(v);eL(v);} : eL;
  }
}
function xClientHeight()
{
  var v=0,d=document,w=window;
  if(d.compatMode == 'CSS1Compat' && !w.opera && d.documentElement && d.documentElement.clientHeight)
    {v=d.documentElement.clientHeight;}
  else if(d.body && d.body.clientHeight)
    {v=d.body.clientHeight;}
  else if(xDef(w.innerWidth,w.innerHeight,d.width)) {
    v=w.innerHeight;
    if(d.width>w.innerWidth) v-=16;
  }
  return v;
}
function xClientWidth()
{
  var v=0,d=document,w=window;
  if(d.compatMode == 'CSS1Compat' && !w.opera && d.documentElement && d.documentElement.clientWidth)
    {v=d.documentElement.clientWidth;}
  else if(d.body && d.body.clientWidth)
    {v=d.body.clientWidth;}
  else if(xDef(w.innerWidth,w.innerHeight,d.height)) {
    v=w.innerWidth;
    if(d.height>w.innerHeight) v-=16;
  }
  return v;
}
function xDef()
{
  for(var i=0; i<arguments.length; ++i){if(typeof(arguments[i])=='undefined') return false;}
  return true;
}
function xDocSize()
{
  var b=document.body, e=document.documentElement;
  var esw=0, eow=0, bsw=0, bow=0, esh=0, eoh=0, bsh=0, boh=0;
  if (e) {
    esw = e.scrollWidth;
    eow = e.offsetWidth;
    esh = e.scrollHeight;
    eoh = e.offsetHeight;
  }
  if (b) {
    bsw = b.scrollWidth;
    bow = b.offsetWidth;
    bsh = b.scrollHeight;
    boh = b.offsetHeight;
  }
  return {w:Math.max(esw,eow,bsw,bow),h:Math.max(esh,eoh,bsh,boh)};
}
function xGetComputedStyle(e, p, i)
{
  if(!(e=xGetElementById(e))) return null;
  var s, v = 'undefined', dv = document.defaultView;
  if(dv && dv.getComputedStyle){
    s = dv.getComputedStyle(e,'');
    if (s) v = s.getPropertyValue(p);
  }
  else if(e.currentStyle) {
    v = e.currentStyle[xCamelize(p)];
  }
  else return null;
  return i ? (parseInt(v) || 0) : v;
}
function xGetElementById(e)
{
  if(typeof(e)=='string') {
    if(document.getElementById) e=document.getElementById(e);
    else if(document.all) e=document.all[e];
    else e=null;
  }
  return e;
}
function xHeight(e,h)
{
  if(!(e=xGetElementById(e))) return 0;
  if (xNum(h)) {
    if (h<0) h = 0;
    else h=Math.round(h);
  }
  else h=-1;
  var css=xDef(e.style);
  if (e == document || e.tagName.toLowerCase() == 'html' || e.tagName.toLowerCase() == 'body') {
    h = xClientHeight();
  }
  else if(css && xDef(e.offsetHeight) && xStr(e.style.height)) {
    if(h>=0) {
      var pt=0,pb=0,bt=0,bb=0;
      if (document.compatMode=='CSS1Compat') {
        var gcs = xGetComputedStyle;
        pt=gcs(e,'padding-top',1);
        if (pt !== null) {
          pb=gcs(e,'padding-bottom',1);
          bt=gcs(e,'border-top-width',1);
          bb=gcs(e,'border-bottom-width',1);
        }
        else if(xDef(e.offsetHeight,e.style.height)){
          e.style.height=h+'px';
          pt=e.offsetHeight-h;
        }
      }
      h-=(pt+pb+bt+bb);
      if(isNaN(h)||h<0) return;
      else e.style.height=h+'px';
    }
    h=e.offsetHeight;
  }
  else if(css && xDef(e.style.pixelHeight)) {
    if(h>=0) e.style.pixelHeight=h;
    h=e.style.pixelHeight;
  }
  return h;
}
function xLeft(e, iX)
{
  if(!(e=xGetElementById(e))) return 0;
  var css=xDef(e.style);
  if (css && xStr(e.style.left)) {
    if(xNum(iX)) e.style.left=iX+'px';
    else {
      iX=parseInt(e.style.left);
      if(isNaN(iX)) iX=xGetComputedStyle(e,'left',1);
      if(isNaN(iX)) iX=0;
    }
  }
  else if(css && xDef(e.style.pixelLeft)) {
    if(xNum(iX)) e.style.pixelLeft=iX;
    else iX=e.style.pixelLeft;
  }
  return iX;
}
xLibrary={version:'4.12',license:'GNU LGPL',url:'http://cross-browser.com/'};
function xMoveTo(e,x,y)
{
  xLeft(e,x);
  xTop(e,y);
}
function xNum()
{
  for(var i=0; i<arguments.length; ++i){if(isNaN(arguments[i]) || typeof(arguments[i])!='number') return false;}
  return true;
}
function xResizeTo(e,w,h)
{
  xWidth(e,w);
  xHeight(e,h);
}
function xScrollLeft(e, bWin)
{
  var offset=0;
  if (!xDef(e) || bWin || e == document || e.tagName.toLowerCase() == 'html' || e.tagName.toLowerCase() == 'body') {
    var w = window;
    if (bWin && e) w = e;
    if(w.document.documentElement && w.document.documentElement.scrollLeft) offset=w.document.documentElement.scrollLeft;
    else if(w.document.body && xDef(w.document.body.scrollLeft)) offset=w.document.body.scrollLeft;
  }
  else {
    e = xGetElementById(e);
    if (e && xNum(e.scrollLeft)) offset = e.scrollLeft;
  }
  return offset;
}
function xScrollTop(e, bWin)
{
  var offset=0;
  if (!xDef(e) || bWin || e == document || e.tagName.toLowerCase() == 'html' || e.tagName.toLowerCase() == 'body') {
    var w = window;
    if (bWin && e) w = e;
    if(w.document.documentElement && w.document.documentElement.scrollTop) offset=w.document.documentElement.scrollTop;
    else if(w.document.body && xDef(w.document.body.scrollTop)) offset=w.document.body.scrollTop;
  }
  else {
    e = xGetElementById(e);
    if (e && xNum(e.scrollTop)) offset = e.scrollTop;
  }
  return offset;
}
function xStr(s)
{
  for(var i=0; i<arguments.length; ++i){if(typeof(arguments[i])!='string') return false;}
  return true;
}
function xTop(e, iY)
{
  if(!(e=xGetElementById(e))) return 0;
  var css=xDef(e.style);
  if(css && xStr(e.style.top)) {
    if(xNum(iY)) e.style.top=iY+'px';
    else {
      iY=parseInt(e.style.top);
      if(isNaN(iY)) iY=xGetComputedStyle(e,'top',1);
      if(isNaN(iY)) iY=0;
    }
  }
  else if(css && xDef(e.style.pixelTop)) {
    if(xNum(iY)) e.style.pixelTop=iY;
    else iY=e.style.pixelTop;
  }
  return iY;
}
function xWidth(e,w)
{
  if(!(e=xGetElementById(e))) return 0;
  if (xNum(w)) {
    if (w<0) w = 0;
    else w=Math.round(w);
  }
  else w=-1;
  var css=xDef(e.style);
  if (e == document || e.tagName.toLowerCase() == 'html' || e.tagName.toLowerCase() == 'body') {
    w = xClientWidth();
  }
  else if(css && xDef(e.offsetWidth) && xStr(e.style.width)) {
    if(w>=0) {
      var pl=0,pr=0,bl=0,br=0;
      if (document.compatMode=='CSS1Compat') {
        var gcs = xGetComputedStyle;
        pl=gcs(e,'padding-left',1);
        if (pl !== null) {
          pr=gcs(e,'padding-right',1);
          bl=gcs(e,'border-left-width',1);
          br=gcs(e,'border-right-width',1);
        }
        else if(xDef(e.offsetWidth,e.style.width)){
          e.style.width=w+'px';
          pl=e.offsetWidth-w;
        }
      }
      w-=(pl+pr+bl+br);
      if(isNaN(w)||w<0) return;
      else e.style.width=w+'px';
    }
    w=e.offsetWidth;
  }
  else if(css && xDef(e.style.pixelWidth)) {
    if(w>=0) e.style.pixelWidth=w;
    w=e.style.pixelWidth;
  }
  return w;
}
function xCamelize(cssPropStr)
{
  var i, c, a = cssPropStr.split('-');
  var s = a[0];
  for (i=1; i<a.length; ++i) {
    c = a[i].charAt(0);
    s += a[i].replace(c, c.toUpperCase());
  }
  return s;
}
