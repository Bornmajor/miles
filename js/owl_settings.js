var owl = $('.owl-carousel');
owl.owlCarousel({
  // margin: 10,
  loop: false,
  autoplay:false,
  autoplayTimeout:3000,
  autoplayHoverPause:true,
  responsive: {
    0: {
      items: 1.3,
      
    },
    600: {
      items: 3
    },
    1000: {
      items: 5
    }
  }
})


setTimeout(function(){
  owl.trigger('stop.owl.autoplay');
},5000);