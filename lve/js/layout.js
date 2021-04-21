(function($){
	var initLayout = function() {
		var hash = window.location.hash.replace('#', '');
		var currentTab = $('ul.navigationTabs a')
							.bind('click', showTab)
							.filter('a[rel=' + hash + ']');
		if (currentTab.size() == 0) {
			currentTab = $('ul.navigationTabs a:first');
		}
		showTab.apply(currentTab.get(0));
		$('#colorpickerHolder').ColorPicker({flat: true});
		$('#colorpickerHolder2').ColorPicker({
			flat: true,
			color: '#00ff00',
			onSubmit: function(hsb, hex, rgb) {
				$('#colorSelector2 div').css('background', '#' + hex);
			}
		});
		$('#colorpickerHolder2>div').css('position', 'absolute');
		var widt = false;
		$('#colorSelector2').bind('click', function() {
			$('#colorpickerHolder2').stop().animate({height: widt ? 0 : 173}, 500);
			widt = !widt;
		});
		$('#colorpickerField1').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock1 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField1').val(hex);
				$("#colorpickerBlock1 div").css('background', '#' + hex);
				$('#result').css("background", '#' + hex);
			}
		});
		$('#colorpickerField2').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock2 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField2').val(hex);
				$("#colorpickerBlock2 div").css('background', '#' + hex);
				$('#result #r_corp').css("background", '#' + hex);
			}
		});
		$('#colorpickerField3').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock3 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField3').val(hex);
				$("#colorpickerBlock3 div").css('background', '#' + hex);
				$('#r_footer').css("background", '#' + hex);
			}
		});
		$('#colorpickerField4').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock4 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField4').val(hex);
				$("#colorpickerBlock4 div").css('background', '#' + hex);
				if($("#colorpickerField5").val() == ''){
					col = 'fff'
					
					}else{
						col = $("#colorpickerField5").val();
						}
				
				set_degrade(hex,col);
			}
		});
		$('#colorpickerField5').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock5 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField5').val(hex);
				$("#colorpickerBlock5 div").css('background', '#' + hex);
				
				if($("#colorpickerField4").val() == ''){
					col = 'fff'
					
					}else{
						col = $("#colorpickerField4").val();
						}
				
				
				set_degrade(col,hex);
			}
		});
		$('#colorpickerField6').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock6 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField6').val(hex);
				$("#colorpickerBlock6 div").css('background', '#' + hex);
				if($("#colorpickerField7").val() == ''){
					col = 'fff'
					
					}else{
						col = $("#colorpickerField7").val();
						}
				
				set_degrade_c(hex,col);
			}
		});
		$('#colorpickerField7').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock7 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField7').val(hex);
				$("#colorpickerBlock7 div").css('background', '#' + hex);
				if($("#colorpickerField6").val() == ''){
					col = 'fff'
					
					}else{
						col = $("#colorpickerField6").val();
						}
				
				set_degrade_c(col,hex);
			}
		});
		$('#colorpickerField8').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock8 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField8').val(hex);
				$("#colorpickerBlock8 div").css('background', '#' + hex);
				if($("#colorpickerField9").val() == ''){
					col = 'fff'
					
					}else{
						col = $("#colorpickerField9").val();
						}
				
				set_degrade_f(hex,col);
			}
		});
		$('#colorpickerField9').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock9 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField9').val(hex);
				$("#colorpickerBlock9 div").css('background', '#' + hex);
				if($("#colorpickerField8").val() == ''){
					col = 'fff'
					
					}else{
						col = $("#colorpickerField8").val();
						}
				
				set_degrade_f(col,hex);
			}
		});
		
		$('#colorpickerField10').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock10 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField10').val(hex);
				$("#colorpickerBlock10 div").css('background', '#' + hex);
				$('#result').css("color", '#' + hex);
			}
		});
		
		$('#colorpickerField11').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock11 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField11').val(hex);
				$("#colorpickerBlock11 div").css('background', '#' + hex);
				$('#result a').css("color", '#' + hex);
			}
		});
		
		$('#colorpickerField12').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock12 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField12').val(hex);
				$("#colorpickerBlock12 div").css('background', '#' + hex);
				$('#result a:hover').css("color", '#' + hex);
			}
		});
		$('#colorpickerField13').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock13 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField13').val(hex);
				$("#colorpickerBlock13 div").css('background', '#' + hex);
				$('#result a:hover').css("color", '#' + hex);
			}
		});
		$('#colorpickerField14').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$("#colorpickerBlock14 div").css('background', '#' + hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorpickerField14').val(hex);
				$("#colorpickerBlock14 div").css('background', '#' + hex);
				$('#result a:hover').css("color", '#' + hex);
			}
		});
		$('#colorSelector').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector div').css('background', '#' + hex);
			}
		});
	};
	
	var showTab = function(e) {
		var tabIndex = $('ul.navigationTabs a')
							.removeClass('active')
							.index(this);
		$(this)
			.addClass('active')
			.blur();
		$('div.tab')
			.hide()
				.eq(tabIndex)
				.show();
	};
	
	EYE.register(initLayout, 'init');
})(jQuery)