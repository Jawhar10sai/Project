
var gallery = {
	o: {
		xmlArray 	: [], 				// convert data from ajax to array
		xmlUrl 		: '', 				// url tp xml file
		ajaxData	: '', 				// temporary store ajax data
		elm 	: '.gallery-list',
		navHover : 'div.gallery-nav-wrapper',
		moveItems: 1,
		showItems: 10,
		itemsWidth: 86,
		currStep: 0,
		duration: {
			navHover: 400,
			carusel: 500
		},
		lightBoxHeight: 230,
		running: false,
		caruselRun: false,
		ajaxUrl: '',
		igePreviewImg: ''
	},
	// just init
	option:{},
	
	init: function(customOption) {
		var self = this;
		
		// extend default option
		self.option = $.extend({}, self.o, customOption);
		
		//alert('ceva');
		
		self.lightboxObserver();
		
		self.openLightboxObserver();
		
		// start carusel click observer - temp
		self.observCarusel();
		
		
		// init map dinamyc loading
		self.loadInfo();
	},
	
	loadInfo: function() {
		var self = this;
	
		// init ajax loader
		$(".ajaxLoader").fadeIn(100);
		$.ajax({
			type: "GET",
			url:  self.option.xmlUrl,
			dataType: "xml",
			success: function(xml) {
				var i = 0;
				$(xml).find('content item').each(function(){
					self.ajaxObject = $(this); // Cache object
					
					var str = "";
						str += '<li id="dynamicItem-' + i + '"><a title="' + self.ajaxObject.attr('caption') + '"  href="' + self.ajaxObject.attr('large') + '" ' + (i == 0 ? "class=\"on tooltip\"" : "class=\"tooltip\"") + '><img src="' + self.ajaxObject.attr('thumb') + '" height="50" /></a></li>';
						
						
					$("#gallery-items").append(str);
					$("#dynamicItem-" + i).data("type", self.ajaxObject.attr('type'));
					$("#dynamicItem-" + i).data("color", self.ajaxObject.attr('color'));
					$("#dynamicItem-" + i).data("caption", self.ajaxObject.attr('caption'));
					$("#dynamicItem-" + i).data("text", self.ajaxObject.find("text").text());
					
					// preload image
					if(self.ajaxObject.attr('type') != 'embed'){
						// ie crash
						//$("#preloadImage").append('<img src="' + self.ajaxObject.attr('large') + '" width="1" height="1">');
					}
					i++;
				}); // close each
				
				// init images preview
				self.imagePreview();	
				
				// init mouse over tooltip
				self.tooltip();
				
				// show navigation box
				$("div.gallery-nav-wrapper").animate({bottom: 0}, 400);
				
				// autoload first image
				setTimeout(function(){self.openLightBox($("#dynamicItem-0 a"));}, 800);
		
				// reset nav carusel
				$(".gallery-nav-mask").animate({scrollLeft:  0}, 1);
			} // close success()
		}); // close ajax
	},
	
	openLightboxObserver: function(){
		var self = this;
		
		$(self.option.elm).find('a').click(function(){
			// open lightbox
			self.openLightBox($(this));
			
			// observe if is close
			$('.closeLightbox').live('click', function() {
				self.closeLightbox();
				return false;
			});
			
			return false;
		});
	},
	
	openLightBox: function($this, direction){
		var self = this;
		
		// open loading
		$(".ajaxLoader").fadeIn(100);
		$(".right-arrow").css('display', 'none');
		$(".left-arrow").css('display', 'none');
		$("#expandImg").css('opacity', 0);
		
		//$("div.imageBlock").fadeOut(100);
					
		// show lightbox
		$("div.lightbox-frame").css('display', 'block');
		
		// store current extra data ex: color, text, caption
		var currentData = $this.parent('li').data();
		
		// change lightbox frame
		$(".lightbox-frame").css({
			'background-color' : "#" + currentData.color
		});
		
		// remove last on class
		$("#gallery-items")
			.find('.on').removeClass('on')
				.parent('li')
				.css('-moz-transform', 'scale(1)')
				.css('-webkit-transform', 'scale(1)')
				.css('background-color', "#fff");
		
		// add class on for features
		$this.addClass('on');
		$this.parent('li')
		.css('background-color', "#" + currentData.color)
		.css('-moz-transform', 'scale(0.9)')
		.css('-webkit-transform', 'scale(0.9)');
		
		var openElmIndex = $this.parent('li').index();
		if(direction == 'next'){
			var nextElm = openElmIndex + 1;
			var __lenght = $("#gallery-items").find('li').size();
			if(nextElm >= __lenght){
				nextElm = 0;
		}
		}else{
			var nextElm = openElmIndex - 1;
			var __lenght = $("#gallery-items").find('li').size();
			if(nextElm < 0){
				nextElm = __lenght - 1;
			}
		}
		$("#imagePreview").html('<img src="' + ($("#dynamicItem-" +  nextElm).find('img').attr('src')) + '" width="160">');

		// if img element already exist
		
		if($('#maxImg').length) {
			
			// hide block in marginleft 1200px
			$("div.imageBlock").animate({
				'margin-top' : "0px"
			}, 800, 'easeOutCirc', function(){
				// show img
				self.showImg($this, currentData);
			});
			
			// hide max image in opacity 0
			$('#maxImg').animate({
				opacity: 0
			}, 800);
			$('#dynamicCaption').animate({opacity: 0}, 500);
		}else{
			// show img
			self.showImg($this, currentData);
		}
	},
	
	showImg: function($this, currentData){
		var self = this;
		
		if(currentData.type == 'embed'){
		
			var width = "640";
			var height = "385";
			var str = '';
				str+= '<div id="maxEmbed"><object width="' + width + '" height="' + height + '"><param name="movie" value="http://www.youtube.com/v/'+ $this.attr('href') +'?fs=1&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'+ $this.attr('href') +'?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' + width + '" height="' + height + '"></embed></object></div>';
			
			// align image in center
			
			
			// write in dom
			$('#ajaxResponse').html(str);	
				
			// align image in center
			//$("div.imageBlock").css({'margin-left' : "-" + ((parseInt(width) / 2) + 11) + "px"});
			//$("div.imageBlock").animate({'margin-top' : "190px"}, 800, 'easeOutCirc');
			
			// show left right navigation
			$(".right-arrow").fadeIn(300);
			$(".left-arrow").fadeIn(300);

			// close loading
			$(".ajaxLoader").fadeOut(100);	
			
		}
		else {
			
			// if type = image (or other then embed)
			$('#ajaxResponse').html('<img id="maxImg" src="" alt="' + currentData.caption + '" style="display: block;"><a href="' + $this.attr('href') + '" class="tooltip" id="expandImg" title="Expand ' + currentData.caption + ' in new windows" target="_blank"><img src="images/top_right_expand.png" height="55" alt="expand" /></a>');
			
			$("#expandImg").css('opacity', 0);
			
			// align image in center
			
			
			// hack get image real width
			$('#maxImg')
			.attr('src',  $this.attr('href'))
			.css('opacity', 0)
			.attr('height', $(document).height() - self.option.lightBoxHeight)
			.load(function () {
				if($(this).height() > 100) {
					// get image size
					var tmpW = $(this).width(); 
					var tmpH = $(this).height(); 
					
					// align image in center
					//$("div.imageBlock").css({'margin-left' : "-" + ((parseInt(tmpW) / 2) + 11) + "px"});
					//$("div.imageBlock").animate({'margin-top' : "98px"}, 800, 'easeOutCirc');
					
					// show img
					$('#maxImg').animate({opacity: 1}, 100, function(){
							
						// close loading
						$(".ajaxLoader").fadeOut(100);
						
						// show left right navigation
						$(".right-arrow").fadeIn(300);
						$(".left-arrow").fadeIn(300);
						
						$('#maxImg').after('<div class="caption" id="dynamicCaption"></div>');
						$("#dynamicCaption")
							.css('opacity', 0)
							.css('width', tmpW - 20 + "px")
							.html(currentData.text)
							.animate({opacity : .8}, 200);
						$("#expandImg").css('opacity', .8);	
						
						
					});	
				}					
			});
		}
	},
	
	moveCarusel: function(direction){
		var self = this;
		
		if(self.option.caruselRun == true){return false;}
		
		// prevent click collision
		self.option.caruselRun = true;
		
		if(direction == 'next'){
			var goTo = "+=" + (self.option.moveItems * self.option.itemsWidth);
			
			// total number of items
			var __lenght = $(".gallery-nav-mask").find('li').size();
			if(self.option.currStep == __lenght - self.option.showItems){
				goTo = 0;
				self.option.currStep = 0;
			}else{
				self.option.currStep++;
			}
			
			$(".gallery-nav-mask").animate({scrollLeft:  goTo}, self.option.duration.carusel, 'easeInOutQuart', function(){
				// unblock script
				self.option.caruselRun = false;
			});
		}else if(direction == 'prev'){
			
			var goTo = "-=" + (self.option.moveItems * self.option.itemsWidth);
			
			// total number of items
			var __lenght = $(".gallery-nav-mask").find('li').size();
			if(self.option.currStep == __lenght - self.option.showItems){
				goTo = 0;
				self.option.currStep = 0;
			}else{
				self.option.currStep++;
			}
			
			$(".gallery-nav-mask").animate({scrollLeft:  goTo}, self.option.duration.carusel, 'easeInOutQuart', function(){
				// unblock script
				self.option.caruselRun = false;
			});
		}
	},
	
	observCarusel: function(){
		var self = this;

		// click on item from nav bar
		$("#gallery-items > li a").live('click', function() {
			// open lightbox
			self.openLightBox($(this));			
			return false;
		});
		
		
		// right (next)
		$(".right-arrow").live('click', function() {
			// get current open element
			var openElmIndex = $("#gallery-items").find('.on').parent('li').index();
			
			var nextElm = openElmIndex + 1;
			var __lenght = $("#gallery-items").find('li').size();
			if(nextElm >= __lenght){
				nextElm = 0;
			}
			// open lightbox
			self.openLightBox($("#dynamicItem-" +  nextElm).find('a'), 'next');	
			return false;
		});
		
		$(".right-arrow").hover(function(e){
			var $this = $(this);
			// get current open element
			var openElmIndex = $("#gallery-items").find('.on').parent('li').index();
			
			var nextElm = openElmIndex + 1;
			var __lenght = $("#gallery-items").find('li').size();
			if(nextElm >= __lenght){
				nextElm = 0;
			}
			$("#imagePreview").html('<img src="' + ($("#dynamicItem-" +  nextElm).find('img').attr('src')) + '" width="150">');
		});
		
		// left (prev)
		$(".left-arrow").live('click', function() {
			// get current open element
			var openElmIndex = $("#gallery-items").find('.on').parent('li').index();
			
			var nextElm = openElmIndex - 1;
			var __lenght = $("#gallery-items").find('li').size();
			if(nextElm < 0){
				nextElm = __lenght - 1;
			}
			// open lightbox
			self.openLightBox($("#dynamicItem-" +  nextElm).find('a'), 'prev');	
			return false;
		});
		
		$(".left-arrow").hover(function(e){
			var $this = $(this);
			// get current open element
			var openElmIndex = $("#gallery-items").find('.on').parent('li').index();
			
			var nextElm = openElmIndex - 1;
			var __lenght = $("#gallery-items").find('li').size();
			if(nextElm < 0){
				nextElm = __lenght - 1;
			}
			$("#imagePreview").html('<img src="' + ($("#dynamicItem-" +  nextElm).find('img').attr('src')) + '" width="150">');
		});
		
		$(".n-right-arrow").click(function() {
			self.moveCarusel('next')
			return false;
		});
		
		$(".n-left-arrow").click(function() {
			self.moveCarusel('prev')
			return false;
		});
	},
	
	imagePreview: function(){		
		$("a.imagePreview").hover(function(e){	
			if($(this).hasClass('aLeft')){
				xOffset = 55;
				yOffset = 30;	
			}else{
				xOffset = 55;
				yOffset = -180;	
			}
			
			this.t = this.title;
			this.title = "";			
		},
		function(){
			this.title = this.t;		
			$("#imagePreview").css('display', 'none');
		});	
		$("a.imagePreview").mousemove(function(e){
		});			
	},
	
	tooltip: function(){	
		/* CONFIG */		
			t_xOffset = 10;
			t_yOffset = 20;		
			// these 2 variable determine popup's distance from the cursor
			// you might want to adjust to get the right result		
		/* END CONFIG */		
		$("a.tooltip").hover(function(e){											  
			this.t = this.title;
			this.title = "";									  
			$("body").append("<p id='tooltip'>"+ this.t +"</p>");
			$("#tooltip")
				.css("top",(e.pageY - t_xOffset) + "px")
				.css("left",(e.pageX + t_yOffset) + "px")
				.fadeIn("fast");		
		},
		function(){
			this.title = this.t;		
			$("#tooltip").remove();
		});	
		$("a.tooltip").mousemove(function(e){
			$("#tooltip")
				.css("top",(e.pageY - t_xOffset) + "px")
				.css("left",(e.pageX + t_yOffset) + "px");
		});			
	},

	
	lightboxObserver: function(customOption) {
		var self = this;
		
		return false;
		$(self.option.navHover).hover(function(){
			if(self.option.running){return false;}
			
			// set script running
			self.option.running = true;
		
			$(this).stop().animate({
				bottom: "-30px"
			}, self.option.duration.navHover, 'easeInOutQuart');
			
		}, function(){
			$(this).stop().animate({
				bottom: "-155px"
			}, self.option.duration.navHover, 'easeInOutQuart', function(){
				
				// unblock script
				self.option.running = false;
			});
		});
	}
}
