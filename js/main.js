$(function() {
    $('#menu-navegacao').find('a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

    
    $("#modal01").modal({backdrop:false});
                        
    $("#modal01").modal("show");
    
    setTimeout(function(){
        $("#modal01").modal("hide");
    },3000);
    
    $(".ttp").tooltip({
        animation:false,
        delay: {show :1000,hide : 3000}
        
    });
    
    $(".ppv").popover({
        title : "Título do POP OVER",
        trigger : "hover focus"
    });
    
    $(".btnjs").button();
    
    $("#troca-estado").click(function(){
       var btn = $(this);
        btn.button("loading");
        setTimeout(function(){
            btn.button("reset");
        },3000);
    
    });
});