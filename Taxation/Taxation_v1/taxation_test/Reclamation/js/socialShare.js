/*Twitter
http://twitter.com/home?status=[TITLE]+[URL]

Pinterest
http://pinterest.com/pin/create/bookmarklet/?media=[MEDIA]&url=[URL]&is_video=false&description=[TITLE]

Facebook
http://www.facebook.com/share.php?u=[URL]&title=[TITLE]

Google+
https://plus.google.com/share?url=[URL]

Reddit
http://www.reddit.com/submit?url=[URL]&title=[TITLE]

Delicious
http://del.icio.us/post?url=[URL]&title=[TITLE]]&notes=[DESCRIPTION]

Tapiture
http://tapiture.com/bookmarklet/image?img_src=[IMAGE]&page_url=[URL]&page_title=[TITLE]&img_title=[TITLE]&img_width=[IMG WIDTH]img_height=[IMG HEIGHT]

StumbleUpon
http://www.stumbleupon.com/submit?url=[URL]&title=[TITLE]

Linkedin
http://www.linkedin.com/shareArticle?mini=true&url=[URL]&title=[TITLE]&source=[SOURCE/DOMAIN]

Slashdot
http://slashdot.org/bookmark.pl?url=[URL]&title=[TITLE]

Technorati
http://technorati.com/faves?add=[URL]&title=[TITLE]

Posterous
http://posterous.com/share?linkto=[URL]

Tumblr
http://www.tumblr.com/share?v=3&u=[URL]&t=[TITLE]

Google Bookmarks
http://www.google.com/bookmarks/mark?op=edit&bkmk=[URL]&title=[title]&annotation=[DESCRIPTION]

Newsvine
http://www.newsvine.com/_tools/seed&save?u=[URL]&h=[TITLE]

Ping.fm
http://ping.fm/ref/?link=[URL]&title=[TITLE]&body=[DESCRIPTION]

Evernote
http://www.evernote.com/clip.action?url=[URL]&title=[TITLE]

Friendfeed
http://www.friendfeed.com/share?url=[URL]&title=[TITLE]
*/	
var array = {"/":"%2F", ":":"%3A", "?":"%3F", "&":"%26", "#":"%23"};

	
$(function(){
		
$('.bloc_share').on({
    mouseenter : function() {
         $(this).find('.share').stop().fadeIn();
         $(this).find('.shareVideo').stop().fadeIn();
         $(this).find('.shareArticle').stop().fadeIn();
         $(this).find('.shareAnnonce').stop().fadeIn();
         $(this).find('.shareCatalogue').stop().fadeIn();
         $(this).find('.shareAccorOngl').stop().fadeIn();
         $(this).find('.shareDocument').stop().fadeIn();
         $(this).find('.shareCarte').stop().fadeIn();
    },
    mouseleave : function() {
         $(this).find('.share').stop().fadeOut();
         $(this).find('.shareVideo').stop().fadeOut();
         $(this).find('.shareArticle').stop().fadeOut();
         $(this).find('.shareAnnonce').stop().fadeOut();
         $(this).find('.shareCatalogue').stop().fadeOut();
         $(this).find('.shareAccorOngl').stop().fadeOut();
         $(this).find('.shareDocument').stop().fadeOut();
         $(this).find('.shareCarte').stop().fadeOut();
    }

});
//texte, image
$('.share img').click(function(){
	path = window.location;
	title = '';
	img = $(this).parent().parent().find('.dragbox-content').find('img').attr('src');
	texte = $(this).parent().parent().find('.dragbox-content').text();
	
	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}
	
	if(img == undefined){
		img_path = '';
		}else{
		img_path = '<img src="'+img+'"\><br>';	
	}

	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+img_path+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
		
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
   
}
 				
});
//texte, video
$('.shareVideo img').click(function(){
	path = window.location;
	title = '';
	img = $(this).parent().parent().find('.dragbox-content').find('iframe').attr('src');
	texte = $(this).parent().parent().find('.dragbox-content').text();
	
	
	
	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}
	
	
	if(img == undefined){
		img_path = '';
		}else{
		img_path = img;	
	}
//alert(img_path);
	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+img_path+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
   
}
 				
});

//Articles
$('.shareArticle img').click(function(){	
	path = window.location;
	title = $(this).parent().parent().find('.dragbox-content').find('.blog-title a').text();
	img = $(this).parent().parent().find('.dragbox-content').find('img#view_article').attr('src');
	texte = $(this).parent().parent().find('.dragbox-content').find('.blog-text p').text();

	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    title = title.split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}
	
	if(img == undefined){
		img_path = '';
	}else{
		img_path = '<img src="'+img+'"\><br>';	
	}
	
	
	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+img_path+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
   
}
 				
});

//Annonce
$('.shareAnnonce img').click(function(){
	path = window.location;
	title = $(this).parent().parent().find('.dragbox-content').find('h3:first').text();
	img = $(this).parent().parent().find('.dragbox-content').find('img#view_annonce').attr('src');
	texte = $(this).parent().parent().find('.dragbox-content').find('.blog-text p').text();
	
	
	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    title = title.split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}
	
	if(img == undefined){
		img_path = '';
		}else{
		img_path = '<img src="'+img+'"\><br>';	
	}
	
	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+img_path+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
   
}
 				
});

//Annonce
$('.shareCatalogue img').click(function(){
	path = window.location;
	title = $(this).parent().parent().find('.dragbox-content').find('h3:first').text();
	img = $(this).parent().parent().find('.dragbox-content').find('img:first').attr('src');
	texte = $(this).parent().parent().find('.dragbox-content').find('.blog-text p').text();
	
	
	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    title = title.split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}
	
	if(img == undefined){
		img_path = '';
		}else{
		img_path = '<img src="'+img+'"\><br>';	
	}
	
	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+img_path+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
   
}
 				
});

//Annonce
$('.shareAccorOngl img').click(function(){
	path = window.location;
	title = '';
	img = '';
	texte = $(this).parent().parent().find('.dragbox-content').text();
	
	
	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    title = title.split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}
	
	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
}
 				
});

//Document
$('.shareDocument img').click(function(){
	path = window.location;
	title = '';
	img = '';
	texte = $(this).parent().parent().find('.dragbox-content').text();
	
	
	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    title = title.split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}

	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
   
}
 				
});

//Document
$('.shareCarte img').click(function(){
	path = window.location;
	title = $(this).parent().parent().find('.dragbox-content').find('h3:first').text();
	img = $(this).parent().parent().find('.dragbox-content').find('img:first').attr('src');
	texte = $(this).parent().parent().find('.dragbox-content').find('table').text();
	
	
	for (var val in array){
	path =  (path + '').split(val).join(array[val]);
    title = title.split(val).join(array[val]);
    img = img.split(val).join(array[val]);
    texte = texte.split(val).join(array[val]);
	}

	if(img == undefined){
		img_path = '';
		}else{
		img_path = '<img src="'+img+'"\><br>';	
	}
	
	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+img_path+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	case 'plus': 
		var order = 'id='+$(this).attr("data-bloc")+'&type='+$(this).attr("data-type");
			$.post("../social.php", order, function(theResponse){
			$('#plus_partage').html(theResponse);
			$('#plus_partage').dialog('open');
			}); 
		break;
   
}
 				
});


$(document).on("click", "#plus_partage img", function(){ 

	switch ($(this).attr('title')) {
		
    case 'facebook': window.open('https://www.facebook.com/sharer/sharer.php?s=100&p%5Burl%5D='+path+'&p%5Bimages%5D%5B0%5D='+img+'&p%5Btitle%5D='+title+'&p%5Bsummary%5D='+texte);break;
	
    case 'twitter': window.open('http://twitter.com/intent/tweet?source=sharethiscom&text='+texte+'&url='+path);break;
	
    case 'linkedin': window.open('http://www.linkedin.com/shareArticle?mini=true&url='+path+'&title='+title+'&summary='+texte+'&source='+path);break;
	
    case 'blogger': window.open('http://www.blogger.com/blog_this.pyra?t='+img_path+texte+'<br><a href="'+path+'"\>'+path+'</a>&amp;u=&amp;n='+title);break;
	
    case 'google': window.open('https://plus.google.com/share?url='+path);break;
	
    case 'delicious': window.open('http://del.icio.us/post?url='+path+'&title='+title+'&notes='+texte);break;
	
    case 'stumbleupon': window.open('http://www.stumbleupon.com/submit?url='+path+'&title='+title+texte);break;
	
    case 'reddit': window.open('http://www.reddit.com/submit?url='+path+'&title='+title+texte);break;
	
    case 'technorati': window.open('http://technorati.com/faves?add='+path+'&title='+title+texte);break;
	
    case 'posterous': window.open('http://posterous.com/share?linkto='+path);break;
	
    case 'tumblr': window.open('http://www.tumblr.com/share?v=3&u='+path+'&t='+title+texte);break;
	
    case 'newsvine': window.open('http://www.newsvine.com/_tools/seed&save?u='+path+'&h='+title+texte);break;
	
    case 'evernote': window.open('http://www.evernote.com/clip.action?url='+path+'&title='+title+texte);break;
	
    case 'friendfeed': window.open('http://www.friendfeed.com/share?url='+path+'&title='+title+texte);break;
	
    case 'tapiture': window.open('http://tapiture.com/bookmarklet/image?img_src='+img+'&page_url='+path+'&page_title='+title+texte+'&img_title='+title+'&img_width=img_height=');break;
	
    case 'bebo': window.open('http://www.bebo.com/c/share?Url='+path+'&Title='+title+texte);break;
	
    case 'digg': window.open('http://digg.com/submit?url='+path+'&title='+title+texte);break;
	
    case 'viadeo': window.open('http://www.viadeo.com/shareit/share/?url='+path+'&title='+title+'&overview='+texte+'&urllanguage=fr&urlaffiliate=32003&encoding=UTF-8&urlpicture='+img);break;
	
    case 'myspace': window.open('http://www.myspace.com/Modules/PostTo/Pages/?c'+path);break;
	
	case 'yahoo': window.open('http://buzz.yahoo.com/buzz?targetUrl'+path);break;
	
    case 'email': var order = 'url='+path+'&title='+title+'&texte='+texte;
			$.post("../sendSocial.php", order, function(theResponse){
			$('#email_partage').empty().html(theResponse);
			$('#plus_partage').dialog('close');	
			$('#email_partage').dialog('open');
			$("#email_partage").css({'position':'relative','z-index':'1000001'});
			}); 
		break;
	
	default:alert('Service en cours!!');break;
	
	
	

}

 });


});