$(window).scroll(function(){
  if(window.scrollY > 240){
    $('body').addClass('sticky_header')
  }else{
    $('body').removeClass('sticky_header')
  }
})