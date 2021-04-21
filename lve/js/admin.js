  $(function(){
      $(".containerPlus").buildContainers({
        containment:"document",
        elementsPath:"elements/",
        onClose:function(o){},
        onRestore:function(o){},
        onIconize:function(o){},
        effectDuration:200
      });
    });


    $.fn.mb_expand=function(path){
		$(".containerPlus").css("visibility","visible");
      if($(this).mb_getState('closed'))
        $(this).mb_open();
      if(path)
        $(this).mb_changeContainerContent(path);

      if(!$(this).mb_getState('iconized')) return;
      $(this).mb_iconize();
    }