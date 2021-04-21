<script language="Javascript">
var t = false;
// ------------------------------------------------------------------------------------------------
function idNewBlock(){
	newid = $.ajax({
          url: "newid.php",
		  data:"idpage=<?php echo $id_page; ?>",
          async: false
         }).responseText;
		 if(t==false){
		 jQuery("#newid").val(newid);
		 t =true;
		 }else{
		v = parseInt(jQuery("#newid").val())+1
		jQuery("#newid").val(v); 
		 }
	}


// ------------------------------------------------------------------------------------------------
function myCaption(i) {
  switch (parseInt(i)) {
    case 0: return "Contenu";
    case 1: return "Slider";
    case 2: return "Galerie";
  }
}
// ------------------------------------------------------------------------------------------------
var d = 0;  // global variable to use distinct instances of oc.Neon

function myWidget(i) {
	var html = $.ajax({
          url: "load.php",
		  data:"id_page=<?php echo $id_page; ?>&id_block="+i,
          async: false
         }).responseText;
		return html;	
}

function exExample() {
   // construct the default configuration
   var theLine, theColumn, cell, elt;

   theLine = widgetI.addRowColumn(theLine);
       // the next widget is collapsed (down; by default: up) 
       elt = "100"; cell = widgetI.addCell(<?php echo $id_page; ?>,'100',elt, myCaption(0), myWidget(elt), theLine, true, true);  
     theColumn = widgetI.addColumn(theLine);
       elt = "101"; cell = widgetI.addCell(<?php echo $id_page; ?>,'101',elt, myCaption(0), myWidget(elt), theColumn, true, true);  
     theColumn = widgetI.addColumn(theLine);
       elt = "102"; cell = widgetI.addCell(<?php echo $id_page; ?>,'102',elt, myCaption(0), myWidget(elt), theColumn);  
     theColumn = widgetI.addColumn(theLine);

   theLine = widgetI.addRowColumn();
       // the next widget is collapsed (down) and can't be removed, even in advanced mode
       elt = "103"; cell = widgetI.addCell(<?php echo $id_page; ?>,'103',elt, myCaption(0), myWidget(elt), theLine, true, true); 
       elt = "104"; cell = widgetI.addCell(<?php echo $id_page; ?>,'104',elt, myCaption(0), myWidget(elt), theLine);  
     theColumn = widgetI.addColumn(theLine); 
       elt = "105"; cell = widgetI.addCell(<?php echo $id_page; ?>,'105',elt, myCaption(0), myWidget(elt), theColumn); 
   widgetI.defineWidthColumns(theLine, new Array("100%","400px"));
}

// ------------------------------------------------------------------------------------------------
function controlState(b) {
  if (b==undefined) { 
    jQuery("#binsert").attr("disabled", "disabled");
    jQuery("#info").html("");
  }
  else if (b.hasClass("cellSelector")) { 
    jQuery("#binsert").removeAttr("disabled"); 
	jQuery("#info").html("un widget est s&eacute;lectionn&eacute;");
  } else {
    jQuery("#binsert").attr("disabled", "disabled");
	
    if (b.hasClass("columnSelector")) { 
      jQuery("#info").html("une colonne est s&eacute;lectionn&eacute;e");
    } else if (b.hasClass("rowSelector")) {
      jQuery("#info").html("une ligne est s&eacute;lectionn&eacute;e");
    }
	else
      jQuery("#info").html("");
  }
}

// ------------------------------------------------------------------------------------------------
// after the page loading...
jQuery( function() {
  // update dynamicaly the "select" html tag
  var jQadd = jQuery("#add");
  for (var i= 0;i<=2; i++) jQadd.append('<option value="' +i +'" ' +(i==0? 'selected':'')+ '>' +myCaption(i) +'</option>');

  // read the cookie if exist
 // var cook = oc.cookie.get("ocWInterface");   
  
  // creation of the widget and initialization
  widgetI = new oc.WidgetInterface("tout", { marge : 6, onSelected : controlState });
  widgetI.initClassesEvents();
  widgetI.cantberemoved = "op&eacute;ration interdite";

  //if (cook != null) {
    // load the last configuration
	var cook = $.ajax({
          url: "get_param.php",
		  data:"idpage=<?php echo $id_page; ?>",
          async: false
         }).responseText;
		
    widgetI.load(<?php echo $id_page; ?>,cook, myCaption, myWidget);
 //}
  
  function resizeX() { 
  }
  jQuery(window).on("resize", resizeX);
  resizeX();
});
</script> 