var s = 0;
var t;

function menu(section, state, x) {
	if (state) {
		var w = document.klm.width;
		if (s != '0') hide();

		document.getElementById("menu_" + section).style.visibility = "visible";
		document.getElementById("menu_" + section).style.left = (w - 700) / 2 + (section == "news" ? 554 : x);

		s = section;
	}
	else t = window.setTimeout("hide()", 3000);

	return;
}

function hide() {
	if (s != '0') document.getElementById("menu_" + s).style.visibility = "hidden";
	s = '0';
	if (t) window.clearTimeout(t);

	return;
}

function imgbig(src, w, h) {
	w = window.open("", "", "width="+w+",height="+h+",left=50,top=50");
	w.document.write("<html>");
	w.document.write("<head>");
	w.document.write("</head>");
	w.document.write("<body style=\"margin: 0px\">");
	w.document.write("<table cellPadding=\"0\" cellSpacing=\"0\" width=\"100%\" height=\"100%\">");
	w.document.write("<tr>");
	w.document.write("<td><img src=\"../imgs/produits/" + src + "\"></td>");
	w.document.write("</tr>");
	w.document.write("</table>");
	w.document.write("</body>");
	w.document.write("<html>");
}


/*

* Le code suivant va apprendre la balise blink à IE

*/

if ( document.all )

{

	function blink_show()

	{

		blink_tags  = document.all.tags('blink');

		blink_count = blink_tags.length;

		for ( i = 0; i < blink_count; i++ )

		{

			blink_tags[i].style.visibility = 'visible';

		}

		

		window.setTimeout( 'blink_hide()', 500 );

	}

	

	function blink_hide()

	{

		blink_tags  = document.all.tags('blink');

		blink_count = blink_tags.length;

		for ( i = 0; i < blink_count; i++ )

		{

			blink_tags[i].style.visibility = 'hidden';

		}

		

		window.setTimeout( 'blink_show()', 500 );

	}

	

	window.onload = blink_show;

}

