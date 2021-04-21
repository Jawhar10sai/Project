/*
originalCompo.js 

Version: 1.1 (august 2012) - bug fixed when 2 instance of oc.WidgetInterface used ; 
                             2 new functions: insertCellBefore()/insertCellAt()
                             1 new event : onSelected
         1.0 (june 2012)
        
Author : Jean-Pierre Aguado

I'm a windows dev, and I use jQuery since one year only, 
so I am sure that this code can be optimized !

My web sites :
originalcompo.free.fr : 2005-2007; subject: delphi programmation (french web site)
mywebdev.free.fr      : 2007+2012; subject: web programmation (french web site)
newprograms.free.fr   : 2010-2011; subject: a web site about "ocAgenda", a software for windows mobile 6.1/6.5

To use originalcompo.js, you must include too:
<script src="jquery-1.7.2.js"></script>                 <!-- I use jQuery.on(), so the jQuery 1.7 is needed (http://api.jquery.com/on/)           -->
<script src="jquery-ui-1.8.18.custom.min.js"></script>  <!-- jquery-ui is include for the drag and drop     (http://docs.jquery.com/UI/Draggable) -->

and for the images:
<link rel="Stylesheet" type="text/css" href="jquery.ui.theme.css"/> 
 
*/

// ================================================================================================
// functions
// ------------------------------------------------------------------------------------------------

function addslashes(str) {
str=str.replace(/\\/g,'\\\\');
str=str.replace(/\'/g,'\\\'');
str=str.replace(/\"/g,'\\"');
str=str.replace(/\0/g,'\\0');
alert(str);
return str;
}
function stripslashes(str) {
str=str.replace(/\\'/g,'\'');
str=str.replace(/\\"/g,'"');
str=str.replace(/\\0/g,'\0');
str=str.replace(/\\\\/g,'\\');
return str;
}

function _isMobileBrowser(a){  // http://detectmobilebrowsers.com/
  return (
    /android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))
  );
}

function isMobileBrowser() {
  return _isMobileBrowser(navigator.userAgent||navigator.vendor||window.opera);
}

function indexOf(arr, val) { for (var i=0; i<arr.length; i++) { if (arr[i]==val) return i; } return -1; }

var _applyStyles = function (cell, elementStyle) {
    var analyse, oneStyle, allStyles = elementStyle.split(';')
    
    for (var i = 0; i< allStyles.length; i++) {
        oneStyle = jQuery.trim(allStyles[i]);
        
        if (oneStyle != '') {
            analyse = oneStyle.split(':');
            try { cell.css(jQuery.trim(analyse[0]), jQuery.trim(analyse[1])); } catch(error) { }
        }
    }
}

// ================================================================================================

var _numeric = {
  intToHex : function (n)   { var result = n.toString(16); return (result.length==1) ? "0" + result : result; },
  hexToInt : function (hex) { return parseInt(hex, 16);}
}

// ================================================================================================

var _colorRoutines = {
  hexaColor : function (c1) {           
    c1 = '' + c1;
        
    if (c1.substr(0, 4).toLowerCase() == 'rgb(') {
      i = c1.indexOf(',', 4);
      j = c1.indexOf(',', i+1);

      r = 1*c1.substring(4   , i);   // supprime les espaces !!!
      g = 1*c1.substring(i +1, j);
      b = 1*c1.substring(j +1, c1.length-1);
      return '#' + _numeric.intToHex(r) + _numeric.intToHex(g) + _numeric.intToHex(b);
    }    
    else
      return c1.toLowerCase();
  },
  
  getFadeColors : function (colorA, colorB, colorsArr, len) {
    if (colorA.charAt(0)=='#') colorA = colorA.substring(1);
    if (colorB.charAt(0)=='#') colorB = colorB.substring(1);

    var r = _numeric.hexToInt(colorA.substring(0,2));
    var g = _numeric.hexToInt(colorA.substring(2,4));
    var b = _numeric.hexToInt(colorA.substring(4,6));

    var r2 = _numeric.hexToInt(colorB.substring(0,2));
    var g2 = _numeric.hexToInt(colorB.substring(2,4));
    var b2 = _numeric.hexToInt(colorB.substring(4,6));

    var rStep = (r2 - r) / len;
    var gStep = (g2 - g) / len;
    var bStep = (b2 - b) / len;

    colorsArr[0] = "#" + colorA

    for (var i = 1; i < len-1; i++) {
      r += rStep;
      g += gStep;
      b += bStep;
      colorsArr[i] = "#" + _numeric.intToHex(Math.floor(r)) + _numeric.intToHex(Math.floor(g)) + _numeric.intToHex(Math.floor(b));
    }

    colorsArr[len-1] = "#" + colorB; 
  },
  
  colorBetween : function (colorA, colorB, ind, len) {
    if (ind==0) 
      return colorA;
    if (ind==len) 
      return colorB;
    else {
      if (colorA.charAt(0)=='#') colorA = colorA.substring(1);
      if (colorB.charAt(0)=='#') colorB = colorB.substring(1);

      var r = _numeric.hexToInt(colorA.substring(0,2));
      var g = _numeric.hexToInt(colorA.substring(2,4));
      var b = _numeric.hexToInt(colorA.substring(4,6));

      var r2 = _numeric.hexToInt(colorB.substring(0,2));
      var g2 = _numeric.hexToInt(colorB.substring(2,4));
      var b2 = _numeric.hexToInt(colorB.substring(4,6));

      r += (r2 - r) * ind / len;
      g += (g2 - g) * ind / len;
      b += (b2 - b) * ind / len;
      return "#" + _numeric.intToHex(Math.floor(r)) + _numeric.intToHex(Math.floor(g)) + _numeric.intToHex(Math.floor(b));
    }
  }
}

// ================================================================================================
var compteur    = 0;
var __multiNeon = {
  listeneon     : new Array(),
  neon          : function (idBG, bg) { for (var i = 0; i<this.compteur; i++) { if (this.listeneon[i].idBG == idBG) { this.listeneon[i].neon(bg);           return true; } } },
  alterner_neon : function (idBG, bg) { for (var i = 0; i<this.compteur; i++) { if (this.listeneon[i].idBG == idBG) { this.listeneon[i].alternate_neon(bg); return true; } } },
  add           : function (cell)     { this.listeneon[this.compteur++] = cell; }
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
var _Neon = function (backgroundID, bgWidth, bgHeight, textID, fromColorA, toColorB, getText, _steps, _twait, _flashspeed) {
  // PRIVATE (var  y; ==> private parameter , this y; ==> public parameter)
  var priv = {
      idBG          : backgroundID,    
      idC           : textID,    
      neonbasecolor : fromColorA,    
      neontextcolor : toColorB,    
      userMessage   : getText,
      steps         : (_steps == undefined) ? 20 : _steps,
      twait         : (_twait == undefined) ? 1500 : _twait,          /* time at the end of the animation, before repeat it */
      flashspeed    : (_flashspeed == undefined) ? 75 : _flashspeed,  /* time between two colors */
      index         : 0,
      colors        : undefined,

      message : function () { 
        var ret    = priv.userMessage(priv.index); // return {"ind" : i, "msg" : msg };
        priv.index = ret.ind + 1; // (ret.ind == priv.index) ? ret.ind + 1 : ret.ind;    
        return ret.msg;
      },
  
      flashing : undefined, currentColor : 0,  direction : 1,
          
      neon : function (bg){
        if (jQuery("#" +priv.idBG).length==0) return false;  /* while neon isn't really created, nothing done */
        
        if (priv.currentColor==0) {   
          jQuery('#' +priv.idC ).html(priv.message());    
          jQuery('#' +priv.idBG).css("background-color", priv.colors[0]);
          jQuery('#' +priv.idC ).css("color"           , priv.colors[0]);
        }
             
        if (bg)
          jQuery('#' + priv.idBG).css("background-color", priv.colors[priv.currentColor]);
        else
          jQuery('#' + priv.idC ).css("color"           , priv.colors[priv.currentColor]);
     
        if ((priv.direction==-1) && (priv.currentColor==0)) {                  
          priv.direction = +1;
          priv.currentColor++;
          clearInterval(priv.flashing);
          priv.alternate_neon(!bg);
        }
        else if ((priv.direction==+1) && (priv.currentColor==priv.colors.length-1)) {    
          priv.direction = -1;                                 
          priv.currentColor--;
          clearInterval(priv.flashing);
          setTimeout("__multiNeon.alterner_neon('" + priv.idBG +"'," + bg.toString() + ")", priv.twait);
        }
        else
          priv.currentColor += priv.direction;
      },
      
      alternate_neon : function (bg){
          priv.flashing = setInterval("__multiNeon.neon('" + priv.idBG +"'," + bg.toString() + ")",  priv.flashspeed);
      }
  };

  // PUBLIC
  this.idBG = priv.idBG;
  this.idC = priv.idC;
  
  this.htmlCode = '<table id="' +this.idBG +'" border=0 width="' +(bgWidth==undefined ? "100%" : bgWidth) + '" height="' +bgHeight +'">'
                 +'<tr><td valign="middle" align="center"><span id="' +this.idC +'"></span></td></tr></table>';
  
  this.neon = priv.neon;
  this.alternate_neon = priv.alternate_neon;
  
  __multiNeon.add(this);

  priv.colors = new Array(priv.steps),
  _colorRoutines.getFadeColors(priv.neonbasecolor, priv.neontextcolor, priv.colors, priv.steps); 

  priv.alternate_neon(true);
};

// ================================================================================================
// oc.searchIframe.find("mywebdev", window) si frame alors : oMainWindow.content.document ?
var _searchIFrame = {
  src      : "",
  find     : function(src, mainWindow) { this.src = src; return this._findFrameSrc( jQuery("iframe", mainWindow.document) ); },
  _matchSrc: function(iFrame)          { return iFrame.src.indexOf(this.src) >= 0; },

  _findFrameSrc: function(frameList) {
    var res = undefined;
    var contenuIFrame;
    
    for (var i = 0; i < frameList.length; i++) {
      if (this._matchSrc(frameList[i]))
        return frameList[i];
      else {
        try {
          // Attention, si iframe = pas dans le même domaine, jQuery ne peut pas explorer le iframe
          contenuIFrame = jQuery(frameList[i]).contents(); 
          
          if (contenuIFrame != undefined) // On essais de parcourir les iframes eventuels 
            try { res = this._findFrameSrc(jQuery("iframe", contenuIFrame)); } catch (err) { res = undefined; }
        }
        catch (err) { res = undefined }
            
        if (res != undefined) return res;
      }
    }    
        
    return res;    
  }
};

// ================================================================================================
// Private object (not publish in "oc") which contains the common code for "_ResizeColumns" and "_ResizeRows"
var __Resize = function(_container, _selectorClassName, _sizeArray, _columnMode) {
  var master           = _container;
  var targetClassName  = _selectorClassName;
  var sizeArray        = undefined;        // init by this.initSizeArray()
  var columnMode       = _columnMode;
  var fixe             = 0;
  var lastWidthPercent = new Array();

  this.permut       = function (i,j)    { var tmp = sizeArray[i]; sizeArray[i] = sizeArray[j]; sizeArray[j] = tmp; }
  this.getDimension = function (j)      { return (j<sizeArray.length) ? sizeArray[j] : "error"; }
  this.getParent    = function ()       { return master; }
  this.refreshSizes = function (_minus) { applySize(_minus); }    // Public function : refreshSizes must be call in "jQuery(window).resize( function() { ... } );"
  
  this.initSizeArray = function(_sA) {
    fixe      = 0;
    sizeArray = _sA;
    var tab   = jQuery('.' + targetClassName, master);
    var l;
    // BUG IE if % keeped !!! ==> px transformation

    if (columnMode) {
      for (var i=0; i<sizeArray.length; i++) {
        if (sizeArray[i].indexOf("px")>0) {
          l = sizeArray[i].substring(0, sizeArray[i].length-2);
          jQuery(tab[i]).width(l);
          fixe += jQuery(tab[i]).width();
          lastWidthPercent[i] = 0;
        }
        else {
          l = sizeArray[i].substring(0, sizeArray[i].length-1);
          lastWidthPercent[i] = l;
        }
      }
    }
    else {
      for (var i=0; i<sizeArray.length; i++) {
        if (sizeArray[i].indexOf("px")>0) {
          l = sizeArray[i].substring(0, sizeArray[i].length-2);
          jQuery(tab[i]).height(l);
          fixe += jQuery(tab[i]).height();
          lastWidthPercent[i] = 0;
        }
        else {
          l = sizeArray[i].substring(0, sizeArray[i].length-1);
          lastWidthPercent[i] = l;
        }
      }
    }
  }
  
  var applySize = function(_minus) {
    var reste = (columnMode ? master.width() : master.height()) - fixe;
    var l     = 0;

    if (columnMode && (_minus!=undefined)) reste -= _minus;
    
    if (reste > 0) {
      var tab        = jQuery('.' + targetClassName, master);
      var cssMin     = columnMode ? 'min-width' : 'min-height';
      var tmpPercent = new Array();   // optimization to avoid hole   
      var pc         = 100;

      for (var index = 0; index<tab.length; index++) tmpPercent[index] = lastWidthPercent[index]; 

      for (var index = 0; index<tab.length; index++) {
        if (tmpPercent[index] > 0) {
          var lng = reste*tmpPercent[index]/100;
          var mw  = jQuery(tab[index]).css(cssMin);                 // "400px" String
          
          if ((mw != undefined) && (mw.indexOf("px")>0)) lng = Math.max(mw.substring(0, mw.length-2), lng);
          
          if (columnMode) 
            jQuery(tab[index]).width(Math.floor(lng));
          else 
            jQuery(tab[index]).height(Math.floor(lng));
          
          // optimization to avoid hole
          pc    -= lastWidthPercent[index];
          reste -= Math.floor(lng);
          
          for (var j= index +1; j<tab.length; j++) tmpPercent[j] = lastWidthPercent[j]*100/pc;
        }
      }
    }
  };

  // BEGIN
  if (_sizeArray != undefined) this.initSizeArray(_sizeArray);
  // END
}

// ------------------------------------------------------------------------------------------------
var _ResizeColumns = function(_container, _selectorClassName, _sizeArray) {
  var y = new __Resize(_container, _selectorClassName, _sizeArray, true);   // : private
  this.refreshSizes  = y.refreshSizes;
  this.initSizeArray = y.initSizeArray;
  this.getParent     = y.getParent;
  this.getDimension  = y.getDimension;
  this.permut        = y.permut;
}

// ------------------------------------------------------------------------------------------------
var _ResizeRows = function(_container, _selectorClassName, _sizeArray) {
  var y = new __Resize(_container, _selectorClassName, _sizeArray, false);
  this.refreshSizes  = y.refreshSizes;
  this.initSizeArray = y.initSizeArray;
  this.getParent     = y.getParent;
  this.getDimension  = y.getDimension;
}

// ================================================================================================

var _manageRowColumns = function(masterId, params) {
  // Hierachies ("-->" = "parent of") :
  // rowSelector --> columnSelector --> cellSelector --> cell --> class.editCell --> span.editCell(title) -->  div.buttons --> span.collapse, span.delete
  //                                                          --> class.contentCell
  // ----------------------------------------------------------------------------------------------
  var _this_ = this;  
  // usefull for:
  // - private functions, to access to "this"
  // - public/private functions where the jQuery function "each()" is used. (Inside the "each()", "this" is then the current cell of the iteration)

  this.master = jQuery('#' +masterId);
  var advancedMode = false;
  var y = new Array();  // manage the heights of the rows if asked. Note: '_manageRowColumns' use only one level of rows, so y.length is equal to 0 or 1
  var x = new Array();  // manage the width of the columns. 

  this.cantberemoved = "Cannot be removed !";
  var margeEltY;  // this.initClassesEvents () , _resizeCurrentRow ()
  var wRow;       // used to calculate the width of a row. Contains the width of the "editRow" (0 if advancedMode==false)

  var options;
  var styles;
  
  var columnMinHeightValue = 20;
  var columnMinHeight = columnMinHeightValue.toString() +"px";
  var spaceButton, spaceButtonColRow;
  // ----------------------------------------------------------------------------------------------
  
  this.init = function (params) {
    options = $.extend( 
      {
        selected       : "selected",        // class of the selected cell, column or row. 1, 2 and 3 can have this class
        rowSelector    : "rowSelector",     // (1)
        editRow        : "editRow",         // column used in advancedMode as an handle to move a row
        columnSelector : "columnSelector",  // (2)
        editColumn     : "editColumn",      // cell used in advancedMode as an handle to move a row
        cellSelector   : "cellSelector",    // (3)
        cell           : "cell",            // div which contains the handle of an cell and the div with the
        editCell       : "editCell",        // handle of an cell 
        contentCell    : "contentCell",     // the div which has the widget
        
        marge             : 0,
        dimHiddenSelector : 0,
        dimCellSelector   : 0,
        rowColor          : "#F77000",      // Don't use color name to calc fade colors
        columnColor       : "#8F000A",
        cellColor         : "#00CCFF",
        noDragColor       : "grey",
        theRefresh        : undefined,
        onCellCollapse    : undefined,      // 1.1 : onCellCollapse(contentCell, collapsed) ; (collapsed != expanded)
        onSelected        : undefined,      // 1.1 : onSelected(elementSelected)
        postfix           : ""
      }, 
      params
    );
    
    if (params.postfix != undefined) {
      if (params.selected == undefined) options.selected = options.selected +params.postfix;
      if (params.rowSelector == undefined) options.rowSelector = options.rowSelector +params.postfix;
      if (params.columnSelector== undefined) options.columnSelector= options.columnSelector +params.postfix; 
      if (params.cellSelector== undefined) options.cellSelector= options.cellSelector +params.postfix;
      if (params.cell== undefined) options.cell= options.cell +params.postfix;
      if (params.contentCell== undefined) options.contentCell= options.contentCell +params.postfix; 
      if (params.editCell== undefined) options.editCell= options.editCell +params.postfix;
    }
    
    options.dimHiddenSelector = Math.max(options.dimHiddenSelector, 20);
    options.dimCellSelector   = Math.max(options.dimCellSelector, 24);
    
    var nc=3, nm=5; // colors of droppable lighter
    
    if (params.droppableRowColor    == undefined) options.droppableRowColor    = (options.rowColor.charAt(0)   =='#') ? _colorRoutines.colorBetween(options.rowColor   , "#FFFFFF", nc, nm) : options.rowColor;
    if (params.droppableColumnColor == undefined) options.droppableColumnColor = (options.columnColor.charAt(0)=='#') ? _colorRoutines.colorBetween(options.columnColor, "#FFFFFF", nc, nm) : options.columnColor;
    if (params.droppableCellColor   == undefined) options.droppableCellColor   = (options.cellColor.charAt(0)  =='#') ? _colorRoutines.colorBetween(options.cellColor  , "#FFFFFF", nc, nm) : options.cellColor;
    
    nc=14; nm=15; // selected colors near white (#FFFFF)
    
    if (params.selectedRowColor    == undefined) options.selectedRowColor    = (options.rowColor.charAt(0)   =='#') ? _colorRoutines.colorBetween(options.rowColor   , "#FFFFFF", nc, nm) : options.rowColor;
    if (params.selectedColumnColor == undefined) options.selectedColumnColor = (options.columnColor.charAt(0)=='#') ? _colorRoutines.colorBetween(options.columnColor, "#FFFFFF", nc, nm) : options.columnColor;
    if (params.selectedCellColor   == undefined) options.selectedCellColor   = (options.cellColor.charAt(0)  =='#') ? _colorRoutines.colorBetween(options.cellColor  , "#FFFFFF", nc, nm) : options.cellColor;

    wRow = 2*options.marge +(advancedMode ? options.dimHiddenSelector : 0); 
    
    spaceButton = Math.floor((options.dimCellSelector-20)/2);
    spaceButtonColRow = Math.floor((options.dimHiddenSelector-20)/2);
    
    // FOR IE, the height of a div is at mimimum the height of the font (?) => .deleteRow, .deleteColumn, .buttons, .deleteCell, .collapseCell {font-size:10px;}  
  }; 
   
  // ----------------------------------------------------------------------------------------------
  // Hierachies ("-->" = "parent of") :
  // rowSelector --> columnSelector --> cellSelector --> cell --> editCell --> span.editCell(title) 
  //                                                                       --> div.buttons --> span.collapse, span.delete
  //                                                          --> contentCell

  this.initClassesEvents = function() {
    margeEltY = 2 * options.marge;

    this.master.on("click", '.' +options.rowSelector + ',.' + options.columnSelector + ',.' + options.cellSelector,
      function(event) { 
        event.stopPropagation();
        var before = _this_.master.find("." + options.selected); 
        
        if (before.length>0) {
          if (before[0]==this) return;  // click sur s&eacute;lection en cours: ne rien faire
          
          before.removeClass(options.selected);  
          removeClassDragOver(before);
        }
        
        jQuery(this).addClass(options.selected); 
        
        if (options.onSelected != undefined) options.onSelected(jQuery(this)); // 1.1
      }
    );
      
    this.master.on("click", "." +options.editColumn + " .leftButtonColumn.collapse",         //  cellSelector collapse
      function() {                                                 
        var es = jQuery(this).parents('.' +options.columnSelector + ':first').find('.' +options.cellSelector +' .leftButton.collapse');
        //var es = jQuery(this).parents('.' +options.columnSelector).find('.' +options.cellSelector +' .collapse');
        
        if (es.length==0) return jQuery(this);	// true when no cellSelector in the column : nothing to do
    
        if (jQuery(this).hasClass(iconUp)) {
          jQuery(this).removeClass(iconUp);
          jQuery(this).addClass(iconDown);

          es.each( function(i) {
            elt = jQuery(this); // elt:cellSelector
            
            if (elt.hasClass(iconUp)) {
              var cc = elt.parents('.' + options.cellSelector + ':first').find('.' + options.contentCell);
              cc.css('display', 'none');
              elt.removeClass(iconUp);
              elt.addClass(iconDown);

              if (options.onCellCollapse != undefined) options.onCellCollapse(cc, false); // 1.1 jThis.hasClass(iconUp));
            }
          });
        }
        else {
          jQuery(this).removeClass(iconDown);
          jQuery(this).addClass(iconUp);

          es.each( function(i) {
            elt = jQuery(this);
            
            if (elt.hasClass(iconDown)) {
              var cc = elt.parents('.' + options.cellSelector + ':first').find('.' + options.contentCell);
              cc.css('display', '');
              elt.removeClass(iconDown);
              elt.addClass(iconUp); // collapse is the opposite of expand
                      
              if (options.onCellCollapse != undefined) options.onCellCollapse(cc, true);  
            }
          });
        }

        es.height("");
        _beforeUpdateLineContent( es.parents("." + options.columnSelector + ':first') );    // rowSelector, column, columnSelector
        _resizeCurrentRow       ( es.parents("." + options.rowSelector    + ':first') );
        
        if (options.theRefresh != undefined) options.theRefresh();
      }
    );
    
    this.master.on("click", "." +options.editCell + " .leftButton.collapse",      //  cellSelector collapse
      function() {                                                                //    cell
            var jThis = jQuery(this);
            var es = jThis.parents('.' + options.cellSelector + ':first');        //      contentCell
            var elt = es.find('.' + options.contentCell);

            if (jThis.hasClass(iconUp)) {
                elt.css('display', 'none');
                jThis.removeClass(iconUp).addClass(iconDown);
            }
            else {
                elt.css('display', '');
                jThis.removeClass(iconDown).addClass(iconUp);
            }

            if (options.onCellCollapse != undefined) options.onCellCollapse(elt, jThis.hasClass(iconUp));

        //es.height("");
        _beforeUpdateLineContent( es.parents("." + options.columnSelector + ':first') );    // rowSelector, column, columnSelector
        _resizeCurrentRow       ( es.parents("." + options.rowSelector    + ':first') );
      
        if  (options.theRefresh != undefined) options.theRefresh();
      } 
    );

       this.master.on("click", "." +options.editColumn + " .delete", function(event) { event.stopPropagation(); _this_.deleteColumn(jQuery(this).parents(":eq(1)")) }); // columnSelector/editColumn/delete  parents("." + options.columnSelector +":first")); });
    this.master.on("click", "." +options.editRow    + " .delete", function(event) { event.stopPropagation(); _this_.deleteRow   (jQuery(this).parents(":eq(1)")) }); // rowSelector/editRow/delete        parents("." + options.rowSelector    +":first")); });
    
    _this_.master.on("click", ".refreshRowSize", 
      function () { 
        var t = new Array();
        var l = jQuery(this).parents("." + options.rowSelector  + ':first');
        var c = l.find("." +options.columnSelector);
        var inp;
        
        for (var i = 0; i<c.length; i++) { 
          if (c[i].id != "") {
            // jQuery clone has the same parent, but hasn't id
            inp = jQuery(c[i]).find("." +options.editColumn + " input");
            
            if (inp.length>0) t[i] = inp[0].value; 
          }
        }

        // _this_.findCurrentResizeColumns(l, t);
        _this_.defineWidthColumns(l, t);//**************
        refreshInfoWidth(l);
        _resizeCurrentRow(l);
      }
    );
	
    // ..............................
    var _id = '#' +this.master.attr('id') +' ';  
    var topLeft = 'top:0px; left:' + options.marge + 'px; overflow:hidden';
    var pr = 'position:relative;'; 
    var ps = 'position:static;'; 
    var pa = 'position:absolute;';
    
    var notEditableCss  = _id +'.' +options.rowSelector    +' { ' +ps + 'list-style: none; margin: 0;  padding: 0; overflow:hidden;} \r\n'
                        + _id +'.' +options.editRow        +' { ' +pr + 'float:left;' + topLeft + ';list-style:none; margin:0;  padding:0; width:' + options.dimHiddenSelector +'px;} \r\n'
                        
                        + _id +'.noDrag .' +options.editRow +',' + _id +'.noDrag .' +options.editColumn +',' + _id +'.noDrag .' +options.editCell 
                              +' { background-color:' +options.editRow + ' } \r\n'
                        //+ _id +'span.noDrag, ' +_id +'.rowButton.noDrag { cursor: DEFAULT; } \r\n'
                        
                        + _id +'.' +options.editRow        +' { ' +pr + 'float:left;' + topLeft + ';list-style:none; margin:0;  padding:0; width:' + options.dimHiddenSelector +'px;} \r\n'
                        + _id +'.' +options.columnSelector +' { ' +ps + 'min-height:' +columnMinHeight +'; float:left; } \r\n'
                        + _id +'.' +options.cellSelector   +' { ' +pr + 'float:none;' + topLeft +' } \r\n' 
                        + _id +'.' +options.cell           +' { ' +pr + topLeft +' } \r\n'   
                        + _id +'.' +options.contentCell    +' { overflow:auto } \r\n'

                        + _id +'.' +options.editCell       +' { width:100%;height:' +options.dimCellSelector +'px; } \r\n' 

                        + _id +'.lastleftButton'           +' { ' +pr +' font-size:10px; float:right; width: 0px; height:16px; margin-top:' + (2+spaceButton      ) + 'px; margin-right:' + (spaceButtonColRow +4) + 'px; }\r\n'
                        + _id +'.leftButton'               +' { ' +pr +' font-size:10px; float:right; width:16px; height:16px; margin-top:' + (2+spaceButton      ) + 'px; margin-left:2px; } \r\n'
                        + _id +'.leftButtonColumn'         +' { ' +pr +' font-size:10px; float:right; width:16px; height:16px; margin-top:' + (2+spaceButtonColRow) + 'px; margin-left:2px; } \r\n'
                        + _id +'.rowButton'                +' { ' +pr +' font-size:10px; margin-top:' + (2+spaceButtonColRow) + 'px; margin-left:' + (2+spaceButtonColRow) + 'px; width:16px; height:16px;} \r\n';

    var editableCss = _id +'.' +options.cell     +' {background-color:transparent;  border :none} \r\n'
                    + _id +'.' +options.editCell +' .title {' + pr +' float: left; margin-top:' + (2+spaceButton) + 'px; margin-left:' + (2+spaceButton) + 'px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; font-family : Arial, Helvetica, sans-serif; font-size:14px; color:white; font-weight:bold} \r\n'
                    
                    + _id +'.' +options.editColumn +' {background-color:trasparant} \r\n' 
                    + _id +'.' +options.editRow    +' {background-color:trasparant} \r\n' 

                    + _id +'.selected.' +options.columnSelector  +' { background-color:trasparant } \r\n' 
                    + _id +'.selected.' +options.rowSelector     +' { background-color:trasparant } \r\n'
                    
                    + _id +'.dragOverDrop.' +options.columnSelector +' {background-color:trasparant} \r\n' 
                    + _id +'.dragOverDrop.' +options.rowSelector    +' {background-color:trasparant} \r\n' 

                    + _id +'.' +options.editColumn +' input {' + pr +' font-size:10px; top:' + spaceButtonColRow + 'px; left:0px; width:40px} \r\n';

    var globalCss = "<style type='text/css' oc='notEditable'>" +notEditableCss +" </style>\r\n"
                   +"<style type='text/css' oc='editable'>"    +editableCss    +" </style>\r\n";
                   
    var firstStyle = jQuery("head style, head link");
    if (firstStyle.length>0) jQuery(globalCss).insertBefore(firstStyle[0]); else jQuery(globalCss).appendTo("head");
  };
  
  // ----------------------------------------------------------------------------------------------
  
  var removeClassDragOver = function(target) {
    if  (target.hasClass(options.cellSelector)) target.find("." + options.editCell).removeClass("dragOverDrop"); else target.removeClass("dragOverDrop"); 
  }; 

  // ----------------------------------------------------------------------------------------------

  var liveDragDrop = function (target) {
    // ............................................................................................
    // dropOptions : 
    // - over() : change the color of the cell if droppable
    // - out()  : restore the original color 
    // - drop() : execute the action
    // ............................................................................................
	  
    var excludeFromDrop = function(ldest) {
      if (ldest.hasClass("noDrag")) return true;
        
      if (ldest.hasClass(options.cellSelector)) {
        if (ldest.parent().hasClass("noDrag")) return true;
        if (ldest.parent().parent().hasClass("noDrag")) return true;
      } else {
        if (ldest.hasClass(options.columnSelector)) { if (ldest.parent().hasClass("noDrag")) return true; }
      }
      
      return false;
    };
      
    var dropOptions = {
      accept    : "." + options.cellSelector + ", ." + options.columnSelector + ", ." + options.rowSelector, 
      tolerance : "pointer", 
      greedy    : true,    // will prevent event propagation on nested droppables

      // over: change the color of the cell if droppable
      over: function(event, ui){
        var ldest   = jQuery(this); 
        var lsource = ui.draggablenon;
        
        if (ldest.attr("id")==lsource.parent().attr("id")) {
          //_this_.master.css("cursor", "move");
          return false;  // Cell --> Column only if column Empty
        }
        
        if (ldest.hasClass(options.cellSelector)) {
          if ( !lsource.hasClass(options.cellSelector) ) return;
        }
        else if (ldest.hasClass(options.columnSelector)) {
          if (lsource.hasClass(options.cellSelector)) { 
            // CELL --> COLUMN
          }
          else if (lsource.hasClass(options.columnSelector)){
            // COLUMN --> COLUMN only if same row and advancedMode
            if (ldest.parent("." + options.rowSelector).attr("id") != lsource.parent("." + options.rowSelector).attr("id"))
              return;
              
            if (!advancedMode) return;
          }
          else 
            return;
        }
        else if (lsource.hasClass(options.rowSelector) && ldest.hasClass(options.rowSelector)) {
          // ROW --> ROW only if advancedMode
          if (!advancedMode) return;
        }
        else 
          return;
        
        if (excludeFromDrop(ldest)) {
         // _this_.master.css("cursor", "not-allowed");
          return;
        }
        else
          //_this_.master.css("cursor", "move");
          
        if (ldest.hasClass(options.cellSelector)) ldest.find("." + options.editCell).addClass("dragOverDrop"); else ldest.addClass("dragOverDrop"); 
      },

      out: function(event, ui) { removeClassDragOver( jQuery(this) ); },
      
      drop: function(event, ui){
        var p1, p2;
        var ldest = jQuery(this);   
        
        if (excludeFromDrop(ldest)) return;

        removeClassDragOver( ldest );

        var lsource = ui.draggable;
        p1          = lsource.parents("." + options.rowSelector + ":first");
        
        if (ldest.hasClass(options.cellSelector)) {
          if (lsource.hasClass(options.cellSelector)) {
            // CELL --> CELL
            if (lsource.parent().attr("id") == ldest.parent().attr("id")) {      // lsource.parent("." + options.columnSelector + ":first") ... "." + options.columnSelector + ":first" 2012.06.14
              // if source (ui.draggable) and destination have the same parent column, a simple permutation is done
              // jQuery parents() are not comparable, only the id !
              var pdest   = ldest.index()
              var psource = lsource.index()
                   
              if (psource<pdest) { 
                ldest.after(lsource.detach());  
                lsource.css({"top":"", "left":""});   //lsource.css("top","").css("left", "").css("top", "");
                _this_.updateStyle(lsource, p1,p1); 
              }
              else if (psource>pdest) {
                ldest.before(lsource.detach());  
                lsource.css({"top":"", "left":""});  //lsource.css("top","").css("left", "").css("top", "");
                ldest.css({"top":"", "left":""});    //ldest.css("top","").css("left", "").css("top", "");
                _this_.updateStyle(lsource, p1,p1); 
                _this_.updateStyle(ldest, p1,p1); 
              }
              
              return; // SAME PARENT : no need to recalculate the sizes of the column or the row
            }
            else {
              // DISTINCT PARENTS
              p2 = ldest.parent().parent(); //parents("." + options.rowSelector + ":first");
              jQuery(this).before(lsource.detach()); // to directly add an cell at the end of the column, try to drop it into the "columnSelector" area
              lsource.css({"top":"", "left":""});    //lsource.css("top","").css("left", "").css("top", "");
              _this_.updateStyle(lsource, p1,p2); 
              return;
            }
          }
          // not CELL --> CELL : forbidden
        }
        else if (ldest.hasClass(options.columnSelector)) {
          if (lsource.hasClass(options.cellSelector)) {
            // CELL --> COLUMN
            if (ldest.attr("id")==lsource.parent().attr("id")) return false;  // Cell --> Column only if column Empty
            // au moment du drop, même si on a pas boug&eacute;, la destination est diff&eacute;rente de la source !
        
            p2 = ldest.parent(); //parents("." + options.rowSelector + ":first");
            ldest.append(lsource.detach());
            lsource.css({"top":"", "left":""});   // lsource.css("top","").css("left", "").css("top", "");
            _this_.updateStyle(lsource, p1,p2); 
          }
          else if (lsource.hasClass(options.columnSelector)){
            // COLUMN --> COLUMN only if advancedMode and same parent
            if (!advancedMode) return;
            
            var theRow = ldest.parent(); //("." + options.rowSelector);
            
            //if (theRow.attr("id") != lsource.parent("." + options.rowSelector).attr("id"))
            if (theRow.attr("id") != lsource.parent().attr("id"))
              return;
              
            var pdest   = ldest.index()
            var psource = lsource.index()
            
            if (psource==pdest) return;
            
            if (psource<pdest)                // go down, the source is placed after the target (destination)
              ldest.after(lsource.detach());  
            else                              // go up, the source is placed before the target (destination)
              ldest.before(lsource.detach());  

            //var w = findCurrentResizeColumns(theRow);
            //*********************************************
            theRow.find(".refreshRowSize").click(); //don't work because with columns in px the click use the clone width too ??!! 
          }
          /* else ROW --> COLUMN : nothing to do */
        }
        else if (lsource.hasClass(options.rowSelector) && ldest.hasClass(options.rowSelector)) {
          // ROW --> ROW
          if (!advancedMode) return;
          var pdest = ldest.index()
          var psource = lsource.index()
          
          if (psource==pdest) return;
          
          if (psource<pdest)                  // go down, the source is placed after the target (destination)
            ldest.after(lsource.detach());  
          else                                // go up, the source is placed before the target (destination)
            ldest.before(lsource.detach());  
          
		  //if (y.length>0) { y[0].permut(pdest, psource); }
        }
        /* other case (impossible) : NOTHING */
      }
    }
    
    // ............................................................................................
    // dragOptions 
    // - start() : change color and z-index of the the draggable cell  
    // - stop()  : restore color and z-index
    // ............................................................................................
    var last_zIndex;

    var dragOptions = { 
      iframeFix:false,
      opacity: 0.75,
      handle: "." +options.editColumn + ",." +options.editRow, 
      cancel: "#" + _this_.master.attr("id") + " .noDrag", // bug fixed 1.1 (when 2 instance of oc.WidgetInterface used)
	    helper: "clone",      //cursor: "move",
	  
      start: function (event, ui) { 
        //if (ui.helper.hasClass("noDrag")) return false;
        
       // _this_.sX = ui.originalPosition.left; _this_.sY = ui.originalPosition.top;
       // _this_.master.css("cursor", "move");
		
        // To draw correctly the object from a column/row to another column/row the parent of the dragged cell must always be "static"
        // AND the helper must be "clone". However, there is a problem of position if the dragged is a column
        //if (ui.helper.hasClass(options.columnSelector)) ui.helper.parent().css("position","relative"); 
		
        last_zIndex  = ui.helper.css("z-index");
        ui.helper.css("z-index", 10000);
      }, 

      stop: function (event, ui) { 
        try { 
          _this_.master.css("cursor", "default"); 
          //removeClassDragOver(ui.helper); 
          ui.helper.css("z-index", last_zIndex); 
        }
        catch (err) { ui.helper.css("z-index", ""); }
		
       // if (ui.helper.hasClass(options.columnSelector)) ui.helper.parent().css("position","static"); 
      }
    };

    // BEGIN liveDragDrop()
    if (target==undefined) {  // used when advancedMode change
      _this_.master.find("." + options.cellSelector).draggable( dragOptions );
      
      if (advancedMode) {
        _this_.master.find("." + options.columnSelector ).draggable( $.extend(dragOptions, {axis: "x"}) );
        _this_.master.find("." + options.rowSelector    ).draggable( $.extend(dragOptions, {axis: "y"}) );
      }
      else {
        _this_.master.find("." + options.columnSelector ).draggable("destroy");   // don't want opacity if default css used !
        _this_.master.find("." + options.rowSelector    ).draggable("destroy");
      }
      
     // _this_.master.find("." + options.cellSelector + ", ." + options.columnSelector + ", ." + options.rowSelector).droppable( dropOptions );
    }
    else {
      if (target.hasClass(options.cellSelector)) 
        target.draggable(  dragOptions );
      else if (advancedMode) {
        if   (target.hasClass(options.columnSelector)) target.draggable( $.extend(dragOptions, {axis: "x"}) );
        else if (target.hasClass(options.rowSelector)) target.draggable( $.extend(dragOptions, {axis: "y"}) );
      }
      else {
        if (target.hasClass(options.columnSelector) || target.hasClass(options.rowSelector)) 
          target.draggable("destroy");
      }
      
     // jQuery(target).droppable( dropOptions );
    }
    // END liveDragDrop()
  }
  
  // ----------------------------------------------------------------------------------------------
  
  var iconDown    = "ui-icon-triangle-1-s"; //"ui-icon-circle-triangle-s";
  var iconUp      = "ui-icon-triangle-1-n"; //"ui-icon-circle-triangle-n";
  var iconClose   = "ui-icon-close"; //"ui-icon-circle-close";
  var iconRefresh = "ui-icon-arrowthick-2-e-w";
  var compteur    = -1;
  
  // ----------------------------------------------------------------------------------------------

  var divButtons = function(up, isColumn, canRemove) {
    if (up==undefined) up = true;
    if (isColumn==undefined) isColumn = false;
    if (canRemove==undefined) canRemove = true;
    
    var icon = up ? iconUp : iconDown
  
    return "<span class='noDrag lastleftButton'></span>" 
          +(canRemove ? "<span class=\"delete ui-icon " +iconClose +" noDrag "+ (isColumn ? "leftButtonColumn" : "leftButton") +"\"></span>" : "") 
          +"<span class=\"collapse ui-icon " +icon +" noDrag " +(isColumn ? "leftButtonColumn" : "leftButton") +"\"></span>";
  }
  
  // ----------------------------------------------------------------------------------------------

  var newCell = function(idPage,idBlock,id, title, html, canRemove, canMove, handleState) {  // title must be encoded before
	 idNewBlock(compteur);
  
    handleState = handleState == undefined ? "up" : handleState;
    if (canRemove==undefined) canRemove = true;   // never happends
  
    var editCellSelector = (handleState != "none") 
        ? "" 
        : "";
    
    compteur = idBlock;
		  
   
						return "<div id=\"oc_elt_" + compteur + "\" class=\"" + options.cellSelector +((!canMove) || (handleState == "none") ? " noDrag" : "") +"\" elt=\"" + title + "\"" + (canRemove ? "" : " canRemove=\"no\"") + ">" 
          + "<div class=\"" + options.cell + "\">" 
          +   editCellSelector
          +   "<div class=\"" +options.contentCell +"\" " + (handleState == "down" ? "style=\"display:none\"": "") +  " onClick=\"$('#demoContainer').mb_expand('ajax1.php?data="+idBlock+"&idpage="+idPage+"')\">" +html+"</div>"
          +"</div></div>"; 
		  
		  	   
  }

  // ----------------------------------------------------------------------------------------------
  
  var editColumnSelector = function (canRemove) {
    if (canRemove==undefined) canRemove = true; // never happend
    
    if (advancedMode) 
      return "<div class='" + options.editColumn +"'><input class='noDrag' type='text' name='width' value='1' />" 
           + divButtons("up", true, canRemove) // up, isColumn, canRemove
           + "</div>";
    else 
      return "";
  }

  // ----------------------------------------------------------------------------------------------

  var newColumn = function(canRemove, canMove) { 
    if (canRemove==undefined) canRemove = true; 
    if (canMove==undefined) canMove = true; 
    compteur++; 
//    return "<li class='" + options.columnSelector  + (canMove ? "" : " noDrag") + "' id='oc_colSel_" + compteur + "' canRemove='" +(canRemove ? "yes" : "no") +"'>" + editColumnSelector(canRemove) + "</li>"; 
    return "<li class='" + options.columnSelector  + (canMove ? "" : " noDrag") + "' id='oc_colSel_" + compteur + "'" + (canRemove ? "" : "canRemove='no'") +">" + editColumnSelector(canRemove) + "</li>"; 
  }    

  // ----------------------------------------------------------------------------------------------
                                                  
  var editRowSelector = function (canRemove) {
    if (advancedMode) 
      return "<li class='" + options.editRow + "' >"
            + (canRemove ? "<div class='delete ui-icon " + iconClose +" noDrag rowButton' ></div>" : "")
            + "<div class='refreshRowSize ui-icon " + iconRefresh +" noDrag rowButton'></div>"
            + "</li>";  
    else 
      return "";
  }

  // ----------------------------------------------------------------------------------------------

  var newRow = function(withColumn, canRemove, canMove) { 
    if (withColumn==undefined) withColumn = true;
    compteur++; 
    return "<ul class='" + options.rowSelector + (canMove ? "" : " noDrag") +"' " + (canRemove ? "" : "canRemove='no'") +" id='oc_ligSel_" + compteur + "'>" 
          + editRowSelector(canRemove) + (withColumn ? newColumn() : "") 
          + "</ul>"; 
  }

  // ----------------------------------------------------------------------------------------------

  this.switchAdvancedMode = function(newMode) {
    if (newMode==undefined) newMode = !advancedMode;
    if (newMode==advancedMode) return;
    
    if (newMode) {
      wRow = 2*options.marge + options.dimHiddenSelector ;
      advancedMode = newMode; // true !
      var rows = this.master.find("." +options.rowSelector);
      var currentRow, canRemove;

      for (var i=0; i<rows.length; i++) { 
        currentRow = jQuery(rows[i]);
        currentRow.find("." +options.columnSelector +":eq(0)").before( editRowSelector(currentRow.attr("canRemove") != "no") ); 
        var cols = currentRow.find("." +options.columnSelector);
        
        for (var j=0; j<cols.length; j++) { 
          var es = jQuery(cols[j]).find("." +options.cellSelector +":eq(0)");
          
          canRemove = jQuery(cols[j]).attr("canRemove") != "no";
          
          if (es.length==0)
            jQuery(cols[j]).append( editColumnSelector(canRemove) ); 
          else
            es.before( editColumnSelector(canRemove) ); 
        }
      }
      
      refreshInfoWidth();
    }
    else {
      wRow = 2*options.marge;

      advancedMode = newMode; // false !
      this.master.find("." + options.editRow).remove();
      this.master.find("." + options.editColumn).remove();
      _beforeUpdateLineContent( this.master.find("." + options.rowSelector) );
    }

    liveDragDrop();
    this.resizeAll(val);
  }

  // ----------------------------------------------------------------------------------------------

  this.updateStyle = function (obj,p1,p2) { 
    if (p1==p2) {
      _beforeUpdateLineContent(p1);
      _resizeCurrentRow(p1); 
    }
    else {
      _beforeUpdateLineContent(p1);
      _beforeUpdateLineContent(p2);
      _resizeCurrentRow(p1); 
      _resizeCurrentRow(p2); 
    }
  }
  
  // ----------------------------------------------------------------------------------------------
  // use this function if you don't use addRow, addColumn... to construct your page
  this.applyClasses = function() {
    liveDragDrop();
  }

  // ----------------------------------------------------------------------------------------------

  var _createArray = function(n) {
    var t = new Array();
    var npc = 100/n + "%";
    for (var i = 0; i< n; i++) t[i] = npc;
    return t;
  }
  
  // ----------------------------------------------------------------------------------------------

  this.defineHeightRows   = function (_jQSelector, _array) { return this.define(false, _jQSelector, _array); }
  this.defineWidthColumns = function (_jQSelector, _array) { return this.define(true , _jQSelector, _array); }
  
  // ----------------------------------------------------------------------------------------------

  this.define = function (_column, _jQSelector, _array) { 
    var p  = _jQSelector.hasClass(options.rowSelector) ? _jQSelector.children(':first') : _jQSelector; 
      
    var current = undefined;

    if (_column) {
      current = this.findCurrentResizeColumns(p.parent(), _array);
    }
    else {
      var _idContent = p.parent()[0].id;
  
      for (var i =0; i <y.length; i++) 
        if (y[i].getParent()[0].id == _idContent) {
          current = y[i]; 
          break;
        }
        
      if (current == undefined) {
        p.find("." + options.cell).css({"min-height" : "" , "overflow-y" : "hidden"});
        y[y.length] = new oc.ResizeRows(p, options.rowSelector, _array);
        current = y[y.length-1];
      }
      else { 
        current.getParent().find("." + options.cell).css({"min-height" : "", "overflow-y" : "hidden"});
        current.initSizeArray(_array);
      }
    }
  }    
  
  var justAdd = false;

  // ----------------------------------------------------------------------------------------------
  
  this.defineOtherRows = function () {
    var allLines = this.master.find("." + options.rowSelector);    // we search all the rows (which must contains columnSelector)
    
    for (var i = 0; i < allLines.length; i++) {
      justAdd = false;
      current = this.findCurrentResizeColumns(jQuery(allLines[i]));
      
      if (justAdd) {
        current.initSizeArray( _createArray(jQuery(allLines[i]).find("." + options.columnSelector).length) );
        //_resizeCurrentRow(jQuery(allLines[i]));
        justAdd = false;
      }
    }
  }
  
  // ----------------------------------------------------------------------------------------------

  this.findCurrentResizeColumns = function (currentSelection, _array) { // rowSelector or columnSelector
    var current      = undefined;
    var columnParent = currentSelection.hasClass(options.rowSelector) ? currentSelection : currentSelection.parents("." +options.rowSelector + ":first");// currentSelection.parents('.' + options.row)
    
    for (var i =0; i <x.length; i++) 
      if (x[i].getParent()[0].id == columnParent[0].id) {
        current = x[i]; 
        break;
      }

    if (current == undefined) {
      x[x.length] = new oc.ResizeColumns(columnParent, options.columnSelector, _array);
      current = x[x.length-1];
      justAdd = true
    }
    else if (_array != undefined)
      current.initSizeArray(_array);
    
    return current;
  }

  // ----------------------------------------------------------------------------------------------
  // _manageRowColumns(jQuery("#tout"), 'options.selected', 'rowSelector'..., 4);  // : row, column or empty
  var addRowOptionColumn = function (currentSelection, canRemove, canMove, withColumn) {    // after insert, currentSelection = row inserted
    if (currentSelection==undefined) currentSelection = _this_.master.find('.' + options.selected);
    if (currentSelection.length==0) currentSelection = _this_.master.find('.' + options.rowSelector + ':last');
    if (canRemove==undefined) canRemove = true; 
    if (canMove==undefined) canMove = true;
    
    if (currentSelection.hasClass(options.cellSelector)) 
      currentSelection = currentSelection.parent().parent();
    else
    if (currentSelection.hasClass(options.columnSelector)) 
      currentSelection = currentSelection.parent();
      
    if (currentSelection.length == 0) {                           // 1a) first row to add
      _this_.master.html(newRow(withColumn, canRemove, canMove));
      currentSelection = _this_.master.find('.' + options.rowSelector);
    }
    else {                                                        // 2a) add new row
      var jCS = jQuery(currentSelection[currentSelection.length-1]); 
      jQuery(newRow(withColumn, canRemove, canMove)).insertAfter(jCS); 
      currentSelection = jCS.next();    
    }

    currentSelection.click();

    var l = currentSelection.parent().width();  // IE: must be calc before "_updateStyleAfterInsert"

    currentSelection.width(l);    // ul (rowSelector)

    if (withColumn) {
      currentSelection.find('.' + options.columnSelector).width(l-2*options.marge);
      
      var yCurrent = _this_.findCurrentResizeColumns(currentSelection); // addRow ==> new 
      var col = currentSelection.find('.' + options.columnSelector);
      var row = currentSelection.find('.' + options.row);
      yCurrent.initSizeArray( _createArray(col.length) ); // col.length == 1 !
      _resizeCurrentRow(currentSelection);
      liveDragDrop(currentSelection);
      liveDragDrop(col);
      refreshInfoWidth(currentSelection);
    }

    return currentSelection;
  }

  this.addRow = function (currentSelection, canRemove, canMove) {    // after insert, currentSelection = row inserted
    return addRowOptionColumn(currentSelection, canRemove, canMove, false);
  }

  this.addRowColumn = function (currentSelection, canRemove, canMove) {    // after insert, currentSelection = row inserted
    return addRowOptionColumn(currentSelection, canRemove, canMove, true);
  }
  
  // ----------------------------------------------------------------------------------------------
  
  this.deleteRow = function (currentSelection) {
    if (currentSelection==undefined) currentSelection = this.master.find("." + options.selected);        // : row, column or empty

    if (currentSelection.length==0)                               // 1) empty
      return false;
    else if (!currentSelection.hasClass(options.rowSelector))     // 2a) if column then selection = row
      return false;
    else {
      if (currentSelection.find("[canRemove='no']").length>0) {
        alert(this.cantberemoved);
        return false;
      }
      // remove the current oc.ResizeColumns from the array "x":
      { 
        var idToFind = currentSelection[0].id; //currentSelection.find('.' + options.row)[0].id;
        
        for (var i =0; i <x.length; i++) 
          if (x[i].getParent()[0].id == idToFind) { x.splice(i, 1); break; } // remove items number "i" from the array "x"
      }

      var nextSelection = currentSelection.next("." + options.rowSelector);

      if (nextSelection.length==0) nextSelection = currentSelection.prev("." + options.rowSelector);
      currentSelection.remove();
      
      if (nextSelection.length>0) 
        nextSelection.click(); 
      else if (options.onSelected != undefined) {
        options.onSelected(undefined);
      }
    }
  }

  // ----------------------------------------------------------------------------------------------
  
  var _beforeUpdateLineContent = function (jQline) {
    if (!jQline.hasClass(options.rowSelector)) jQline = jQline.parents('.' +options.rowSelector);
    
    jQline.find('.' + options.columnSelector).css({"min-height": columnMinHeight});
    jQline.find('.' + options.columnSelector).removeAttr("height").css({"height": ""});
    //jQline.find('.' + options.cellSelector).removeAttr("height").css({"height": ""}).css({"min-height": ""});
  }
  
  // ----------------------------------------------------------------------------------------------
  
  this.addColumn = function (currentSelection, canRemove, canMove) {
    if (currentSelection==undefined) currentSelection = this.master.find('.' + options.selected);
    if (canRemove==undefined) canRemove = true; 
    if (canMove==undefined) canMove = true; 
    
    if (currentSelection.length==0) return undefined;

    if (currentSelection.hasClass(options.cellSelector)) currentSelection = currentSelection.parent();
    
    if (currentSelection.hasClass(options.rowSelector)) {
        var csCol = currentSelection.find('.' + options.columnSelector +':last');
        
        if (csCol.length>0) {
          jQuery(newColumn(canRemove, canMove)).insertAfter(csCol); // = currentSelection.find(".rowSelector:last")
          currentSelection = csCol.next();
        }
        else {
          currentSelection.append(newColumn(canRemove, canMove)); // = currentSelection.find(".rowSelector:last")
          currentSelection = currentSelection.find('.' + options.columnSelector +':first');
        }
        
        currentSelection.click();
    }
    else if (currentSelection.hasClass(options.columnSelector)) {
        jQuery(newColumn(canRemove, canMove)).insertAfter(currentSelection); // = currentSelection.find(".rowSelector:last")
        currentSelection.next('.' + options.columnSelector).click();
    }
    
    currentSelection = this.master.find('.' + options.selected);
    
    var yCurrent = this.findCurrentResizeColumns(currentSelection);

    var colonnes = currentSelection.parent().find('.' + options.columnSelector);  // parent() = parents('.' +options.row)
    yCurrent.initSizeArray( _createArray(colonnes.length) );
    
    _resizeCurrentRow(currentSelection.parents('.' + options.rowSelector));
    liveDragDrop(currentSelection);  
    refreshInfoWidth(currentSelection.parent());
    return currentSelection;
  }
  
  // ----------------------------------------------------------------------------------------------

  this.deleteColumn = function (currentSelection) {
    if (currentSelection==undefined) currentSelection = this.master.find("." + options.selected);         // must be a column
    
    if (currentSelection.length==0)                             // - nothing options.selected, nothing to delete
      return false;
    else if (currentSelection.hasClass(options.columnSelector)) {  
      if (currentSelection.find("[canRemove='no']").length>0) {
        alert(this.cantberemoved);
        return false;
      }

      _beforeUpdateLineContent(currentSelection); //*********************
      
      var lineToRefresh = currentSelection.parent(); //parents("." + options.rowSelector); //parent()
      var nbColumns     = lineToRefresh.find("." + options.columnSelector).length;
      
      if (nbColumns == 1) {
        this.deleteRow(lineToRefresh);   // no more column, no line
      }
      else {
        var yCurrent      = this.findCurrentResizeColumns(currentSelection);
        var nextSelection = currentSelection.next("." + options.columnSelector);
        if (nextSelection.length==0) nextSelection = currentSelection.prev("." + options.columnSelector);
        currentSelection.remove();
        nextSelection.click();    
        
        yCurrent.initSizeArray( _createArray(nbColumns-1) );
        _resizeCurrentRow( lineToRefresh );
        refreshInfoWidth(lineToRefresh);
      }
    }
  }    

  // ----------------------------------------------------------------------------------------------
  // 1.1
  var add_AtTheEndOfThe_columnSelected = 0
  var insertBefore_cellSelected = 1
  var insertAtPositionOf_columnSelected  = 2

  var genericAddCell = function (idPage,idBlock,widgetId, widgetTitle, widgetHtml, target, index, canRemove, canMove, handleState, mode) {
	 				
					  
    var lineToRefresh;
    if (canRemove == undefined) canRemove = true;
    if (canMove == undefined) canMove = true;

    if (target == undefined) target = _this_.master.find('.' + options.selected); 

    if (mode == add_AtTheEndOfThe_columnSelected) {
      //if (target == undefined) target = _this_.master.find('.' + options.selected); 
    
		//alert(target.find('.' + options.cellSelector).attr('id'));

      if (target.hasClass(options.rowSelector))
          target = target.find("." + options.columnSelector + ":first");
      else if (target.hasClass(options.cellSelector))
          target = target.parent();

      lineToRefresh = target.parents("." + options.rowSelector);
      _beforeUpdateLineContent(target); 
      target.append(newCell(idPage,idBlock,widgetId, widgetTitle, widgetHtml, canRemove, canMove, handleState));

      _resizeCurrentRow(lineToRefresh);
      // The target still actually to be the columnSelector
      var newElt = target.find('.' + options.cellSelector + ':last');
      liveDragDrop(newElt);
      return newElt;
    }
    else if (target == undefined) // DANS TOUS LES AUTRES CAS (INSERT), LA CIBLE EST OBLIGATOIRE
      throw "You try to insert a widget without define the referent !"; 
    else if (mode == insertBefore_cellSelected) {  
      if (target.hasClass(options.cellSelector)) {
        var columnToRefresh = target.parent();
        lineToRefresh = columnToRefresh.parent();
        _beforeUpdateLineContent(columnToRefresh); 

        var x = newCell(idPage,idBlock,widgetId, widgetTitle, widgetHtml, canRemove, canMove, handleState);
        target.before(x); // insert x before target
        _resizeCurrentRow(lineToRefresh);
        var newElt = target.prev();
        liveDragDrop(newElt);
        return newElt;
      }
      else
        throw "You try to insert a widget before an other widget, but the choqen target isn't a widget"; 
    }
    else if (mode == insertAtPositionOf_columnSelected) {  
      if ((target.hasClass(options.cellSelector)) && (!isNan(index))) {
        var columnToRefresh = target.parent();
        lineToRefresh = columnToRefresh.parent();
        _beforeUpdateLineContent(columnToRefresh); //*********************

        var x = newCell(idPage,idBlock,widgetId, widgetTitle, widgetHtml, canRemove, canMove, handleState);
        
        if (target.find("." + options.cellSelector).length>index) {
          var cellTarget = target.find("." + options.cellSelector +":eq(" +index +")");
          target.before(x); // insert x before target
          _resizeCurrentRow(lineToRefresh);
          var newElt = target.prev();
          liveDragDrop(newElt);
          return newElt;
        }
        else
          return genericAddCell(idBlock,widgetId, widgetTitle, widgetHtml, columnToRefresh, 0, canRemove, canMove, handleState, "add")
      }
      else
        throw "You try to insert a widget in a column, but the target chosen isn't a column or the position defined isn't a number"; 
    }
    else
      return undefined;
    
					 }

  // ..............................................................................................
  
  this.addCell = function (idPage,idBlock,widgetId, widgetTitle, widgetHtml, currentSelection, canRemove, canMove, handleState) {	
    return genericAddCell(idPage,idBlock,widgetId, widgetTitle, widgetHtml, currentSelection, 0, canRemove, canMove, handleState, add_AtTheEndOfThe_columnSelected);
  }

  // ..............................................................................................
  // 1.1
  this.insertCellBefore = function (idPage,idBlock,widgetId, widgetTitle, widgetHtml, cellTarget, canRemove, canMove, handleState) {
    return genericAddCell(idPage,idBlock,widgetId, widgetTitle, widgetHtml, cellTarget, 0, canRemove, canMove, handleState, insertBefore_cellSelected);
  }
  // 1.1
  this.insertCellAt = function (idPage,idBlock,widgetId, widgetTitle, widgetHtml, columnTarget, cellPosition, canRemove, canMove, handleState) {
    return genericAddCell(idPage,idBlock,widgetId, widgetTitle, widgetHtml, columnTarget, cellPosition, canRemove, canMove, handleState, insertAtPositionOf_columnSelected);
  }
  
  // ----------------------------------------------------------------------------------------------

  this.deleteCell = function (currentSelection) {
    if (currentSelection==undefined) currentSelection = jQuery("." + options.selected);        // : row, column or empty
    
    if (currentSelection.length==0)                 // 1) empty
      return false;
    else if (!currentSelection.hasClass(options.cellSelector))    // 2a) if column then selection = row
      return false;
    else {
      if (currentSelection.attr("canRemove") == "no") {
        alert(this.cantberemoved);
        return false;
      }

      var lineToRefresh = currentSelection.parents("." + options.rowSelector);  // the Column change, but the row height can change too 
      _beforeUpdateLineContent(currentSelection); //*********************
      var nextSelection = currentSelection.next("." + options.cellSelector);
      
      if (nextSelection.length==0) {
        nextSelection = currentSelection.prev("." + options.cellSelector);
        if (nextSelection.length==0) nextSelection = nextSelection.parents("." + options.columnSelector); 
      }
      
      currentSelection.remove();
      if (nextSelection.length>0) nextSelection.click();    // always true

      _resizeCurrentRow(lineToRefresh);
    }
  }    
  
  // ----------------------------------------------------------------------------------------------
  
  var _resizeCurrentRow = function (rowSel) {
    //if (rowSel.length==0) return;

    var _inFixedRowHeigth = function (container) {
      var p = container.parent().parent()[0].id;
      
      for (var i=0; i<y.length; i++) 
        if ( p == y[i].getParent()[0].id) 
          return true;
            
      return false;
    };

    var lig = rowSel[0].id;
      
    for (var i=0; i<x.length; i++) 
      if ( lig == x[i].getParent()[0].id) 
        x[i].refreshSizes(wRow);
  
    rowSel.find("." + options.columnSelector).each( function(i) {     // columns_ = liste des colonnes
      var col_        = jQuery(this);                                 // col_  = une colonne
      var line_       = col_.parents('.' + options.rowSelector);      // line_ = son parent
      var fixedHeight = _inFixedRowHeigth(line_);                     // vrai si hauteur imposee ici NON 
      var l           = col_.width();

      if (advancedMode) col_.find('.' + options.editColumn).width(l - 2*options.marge);  // existe si advancedMode = true
      
      if (col_.find('.' + options.cellSelector).length > 0) {
        // 1) ON RECALCULE LES LONGUEURS DU CONTENU DE LA COLONNE
        // colSel.width = eleSel.width +2
        //                eleSel.width = cell.width +2
        var e = col_.find('.' + options.cell).width(l - 4*options.marge);    
        
        e.each( function (i) {
          var t = jQuery(this);
          var c = t.children(".contentCell").children();
          
          c.each( function(i) { 
            var e = jQuery(this); 
            if (e.is("iframe") && (e.attr("width")=="100%"))
              e.width(t.width()-4); 
          });
        });
        
        col_.find('.' + options.cellSelector).width(l - 2*options.marge);
        
        //col_.find('.' + options.cellSelector +' .title').width(l - 2*options.marge- 60);
        col_.find('.' + options.cellSelector + ' .' + options.cell + ' .' + options.editCell).each( function(i) { 
          var st = jQuery(this).children("span.title");
          
          if (st.length>0) st.width(l - 2*options.marge- 60); /* agrandir si ajout bouton */
        });
        
        // 2) SI HAUTEUR NON FIXEE, ON RECALCULE HAUTEUR A PARTIR DE L'HAUTEUR DE L'CELL
        if (!fixedHeight) {
          // Be careful! when calling this function during the drop, the "clone" is present (abd don't have id)  
          var elts_ = col_.find("." + options.cellSelector +":[id]").find('.' + options.cell);   // cell = editCell + contentCell
          
          for (var j = 0; j<elts_.length; j++) {
            l = jQuery(elts_[j]).height();
            
            if (j<elts_.length-1)
              jQuery(elts_[j]).parents("." +options.cellSelector).height(l + 2*margeEltY);
            else
              jQuery(elts_[j]).parents("." +options.cellSelector).height(l + 2*options.marge);
          }
        }
      }
      
      if (fixedHeight) {
        l = line_.parent().height();
        line_.height(l - options.marge*2);
        line_.find('.' + options.columnSelector).height(l - 2*options.marge);
      }
      else {
        var allCols_ = line_.find('.' + options.columnSelector);
        allCols_.height("").css("min-height", columnMinHeight)
        
        l = 0;
        
        for (var i = 0; i<allCols_.length; i++) { l = Math.max(l, jQuery(allCols_[i]).height()); }
        
        line_.height(l +4*options.marge/2);

        allCols_.height(l+2*options.marge/2); 
        allCols_.css({"min-height": Math.min(columnMinHeightValue, l+2*options.marge/2)}); //  - options.marge*2

        line_.height(l + 4*options.marge/2);
        line_.find('.' + options.editRow).height(l + options.marge*2/2);
      }
    });
  }
  
  // ----------------------------------------------------------------------------------------------

  this.resizeAll = function (val) { 
    this.master.find("." + options.rowSelector).width($('#contenu').width()-val); // : adjust (common) width of each row
    for (var i=0; i<y.length; i++) y[i].refreshSizes(wRow);       // : adjust height of each row (remark: length(y) <= 1)
    //for (var i=0; i<x.length; i++) x[i].refreshSizes();         // : adjust width of each cols of a row ( x <-- ResizeColumns)

    this.master.find("." + options.rowSelector).each( function(index) { _resizeCurrentRow( jQuery(this) ); });
  }
  
  // ----------------------------------------------------------------------------------------------

  var n1, m1;
  
  this.resize = function(etalon,val) {
    etalon = etalon instanceof jQuery ? etalon : jQuery("#" +etalon);
    this.master.find("." + options.rowSelector).removeAttr("width").css({"width": ""}); 
    this.master.width(etalon.width());
    this.resizeAll(val);

    if ((n1!=undefined) && (m1!=undefined)) {
      if ((this.master.width() == n1) && (etalon.width() == m1)) return;
      n1 = undefined;
      m1 = undefined;
      // (fix bug when zoom used)
    } 
    
    if (this.master.width() != etalon.width()) this.resize(etalon);
  }

  // ----------------------------------------------------------------------------------------------

  this.save = function(id_page) {
    var cols, xi, elts, eltK, rowI, colJ;
    var rows   = this.master.find("." +options.rowSelector);

	
	
    var result = "{ \"nbRows\" : " + rows.length + ", \"rows\" : [";
    
    for (var i=0; i<rows.length; i++) {
      rowI = jQuery(rows[i]);
      cols = rowI.find('.' +options.columnSelector);
      xi   = this.findCurrentResizeColumns( rowI );
      result += "{"
              + (rowI.attr("canRemove") == "no" ? " \"canRemove\" : \"no\", " : "")
              + (rowI.hasClass("noDrag")        ? " \"canMove\" : \"no\", "   : "")    
              + " \"nbColumns\" : " + cols.length  + "," 
              + " \"columns\" : [";
      
      for (var j=0; j<cols.length; j++) {
        colJ = jQuery(cols[j]);
        elts = colJ.find('.' +options.cellSelector);
    
        result += "{" + (colJ.attr("canRemove") == "no" ? " \"canRemove\" : \"no\", " : "")
                      + (colJ.hasClass("noDrag")        ? " \"canMove\" : \"no\", "   : "")   
                      + "\"width\" : \"" + xi.getDimension(j) + "\", \"nbCells\" : " + elts.length + ", \"cells\" : [";

        for (var k=0; k<elts.length; k++) {
          eltK = jQuery(elts[k]);
          //alert(eltK.attr('id'));
		   $.ajax({
					   url:"insert.php",
					   data:"id_page="+id_page+"&id_block="+eltK.attr('id').substring(eltK.attr('id').lastIndexOf("_")+1)+'&cont_block='+eltK.find('.contentCell').html(),
					   success:function(msg){
			//alert(msg);
					  }
					  
					  });
					  
			$.ajax({
					   url:"insert_header.php",
					   data:'id_block=header&cont_block='+$('#header').html(),
					   success:function(msg){
			//alert(msg);
					  }
					  
					  });
		  
          result += "{ \"id\" : \"" + eltK.attr('elt') + "\""
		  		 + ",\"idBlock\" : \"" + eltK.attr('id').substring(eltK.attr('id').lastIndexOf("_")+1) + "\""
                 + ", \"vis\" : \"" + (eltK.find('.' + options.editCell).length == 0 ? "none" : (eltK.find("." +options.editCell + " .collapse").hasClass(iconUp)? "up":"down")) + "\" "
                 + (eltK.attr("canRemove") == "no" ? ", \"canRemove\" : \"no\" " : "") 
                 + (eltK.hasClass("noDrag")        ? ", \"canMove\" : \"no\" "   : "")   
				 //+ ",\"html\" : \"" + eltK.html() + "\"" 
                 + "}";
				 
        
          if (k<elts.length-1) result += ",";
        }
        
        result += "] }";
        
        if (j<cols.length-1) result += ",";
      }
      
      result += "] }";
      
      if (i<rows.length-1) result += ",";
    }
    
    result += "] }";
	$.ajax({
					   url:"return.php",
					   data:"id_page="+id_page+"&result="+result,
					   success:function(msg){
						   //alert(msg);
					  }
					  
					  });
    //return result;
  }
  
  // ----------------------------------------------------------------------------------------------

  this.load = function(idPage,jsonStr, fctTitle, fctContent,id_page) {

    try {
      var json = eval("(" + jsonStr +")");
      var r = undefined, c, n, jsonI, jsonJ, jsonK, jsonID;  
              
      for (var i = 0; i<json.nbRows; i++) {
        jsonI = json.rows[i];
		
        var t = new Array();
        
        r = this.addRow(r, jsonI.canRemove != "no", jsonI.canMove != "no");  // ==> addColumn
        n = jsonI.nbColumns;
        
        for (var j = 0; j<n; j++) {
          jsonJ = jsonI.columns[j]; 
          c = this.addColumn(r, jsonJ.canRemove != "no", jsonJ.canMove != "no");
        }
        
        for (var j = 0; j<n; j++) {
          jsonJ = jsonI.columns[j];
          t[j] = jsonJ.width == undefined ? 100/n +"%" : jsonJ.width;
          c    = r.find("." + options.columnSelector + ":eq(" +j + ")");
		 
          for (var k =0; k <jsonJ.nbCells; k++) {
            jsonK = jsonJ.cells[k];
            var elt = jsonK.id;
            var idBlock = jsonK.idBlock;
			//alert(elt);
            this.addCell(idPage,idBlock,elt, elt, fctContent(idBlock), c, jsonK.canRemove != "no", jsonK.canMove != "no", jsonK.vis);
          }
        }
        
        this.defineWidthColumns(r, t);
      }
    }
    catch (error) {
    }
  }

  // ----------------------------------------------------------------------------------------------

  var refreshInfoWidth = function(lignes) {
    lignes = lignes==undefined ? _this_.master.find('.' + options.rowSelector) : lignes;

    for (var i=0; i< lignes.length; i++) {
      var inp = jQuery(lignes[i]).find('.' + options.editColumn +' input');
      var x   = _this_.findCurrentResizeColumns( jQuery(lignes[i]) );
      
      for (var j=0; j< inp.length; j++) {
        inp[j].value = x.getDimension(j);
      }
    }
  }

  // ----------------------------------------------------------------------------------------------
  // BEGIN
  if (params == undefined) this.init({}); else this.init(params);
  // END
  // ----------------------------------------------------------------------------------------------
}

// ================================================================================================

var _cookie = {
  set : function (name,value,days) {
    if (days) {
      var date = new Date();
      date.setTime(date.getTime()+(days*24*60*60*1000));
      var expires = "; expires="+date.toGMTString();
    }
    else 
      var expires = "";

    document.cookie = name+"="+value+expires+"; path=/";
  },

  get : function (name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }

    return null;
  },

  clear : function (name) {
    set(name,"",-1);
  }
}
// ================================================================================================

var oc = {
    // Public (~this)
    searchIFrame    : _searchIFrame,
    colors          : _colorRoutines,
    
    ResizeColumns   : _ResizeColumns,
    ResizeRows      : _ResizeRows,

    applyStyles     : _applyStyles,
    Neon            : _Neon,
    
    WidgetInterface : _manageRowColumns,
    
    cookie : _cookie
}

