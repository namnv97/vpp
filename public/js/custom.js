$('.banner-home').owlCarousel({
    loop:true,
    margin:30,
    nav:false,
    loop: true,
    navigation:true,
    autoplay: true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
    items: 1,
    dots: false,
});

$('.product_by_cat').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    navigation:true,
    autoplay: true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    items: 4,
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:4,
        }
    }
});

jQuery(document).ready(function(){
  jQuery('#table_category').dataTable();
    $(document).ready(function() {

      var sync1 = $("#sync1");
      var sync2 = $("#sync2");
      var slidesPerPage = 7;
      var syncedSecondary = true;

      sync1.owlCarousel({
        items : 1,
        slideSpeed : 2000,
        nav: true,
        autoplay: true,
        dots: false,
        margin: 10,
        loop: true,
        responsiveRefreshRate : 200,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    }).on('changed.owl.carousel', syncPosition);

      sync2
      .on('initialized.owl.carousel', function () {
          sync2.find(".owl-item").eq(0).addClass("current");
      })
      .owlCarousel({
        items : slidesPerPage,
        dots: false,
        nav: true,
        margin: 5,
        smartSpeed: 200,
        slideSpeed : 500,
    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
    responsiveRefreshRate : 100
}).on('changed.owl.carousel', syncPosition2);

      function syncPosition(el) {
        var count = el.item.count-1;
        var current = Math.round(el.item.index - (el.item.count/2) - .5);

        if(current < 0) {
          current = count;
      }
      if(current > count) {
          current = 0;
      }

      sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
      var onscreen = sync2.find('.owl-item.active').length - 1;
      var start = sync2.find('.owl-item.active').first().index();
      var end = sync2.find('.owl-item.active').last().index();

      if (current > end) {
          sync2.data('owl.carousel').to(current, 100, true);
      }
      if (current < start) {
          sync2.data('owl.carousel').to(current - onscreen, 100, true);
      }
  }

  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
  }
}

sync2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
});
});



    jQuery('.header-main').scrollToFixed();
});


jQuery(document).ready(function(){
  
  jQuery('.product_by_cat').find('.owl-nav').removeClass('disabled');
  jQuery('.product_by_cat').on('changed.owl.carousel', function(event) {
    jQuery(this).find('.owl-nav').removeClass('disabled');
  });

  jQuery('body').on('click','.quantity button.btn-up',function(){
    var num = jQuery(this).parent().find('input').val();
    jQuery(this).parent().find('input').val(parseInt(num)+1);
    jQuery(this).parent().find('input').trigger('change');
  });

  jQuery('body').on('click','.quantity button.btn-down',function(){
    var num = jQuery(this).parent().find('input').val();
    if(num == 1) return false;
    jQuery(this).parent().find('input').val(parseInt(num)-1);
    jQuery(this).parent().find('input').trigger('change');
  });

  jQuery('body').on('click','.btn-add',function(){
    var id = jQuery(this).data('value');
    var sl = jQuery(this).parents('.buy_pro').find('input').val();
    if(typeof sl === "undefined") sl = 1;
    jQuery.ajax({
      url: ajax+'AddSession',
      type: 'post',
      dataType: 'html',
      data: {
        id: id,
        sl: sl,
        action: 'AddSession', 
      },
      beforeSend: function(){

      },
      success: function(res){
        if(res == 1)
          {
            Swal.fire({
              position: 'center',
              type: 'success',
              title: 'Sản phẩm đã thêm vào giỏ',
              showConfirmButton: false,
              timer: 1000
            })
            var span = jQuery('.shopping-cart').find('span').text();
            jQuery('.shopping-cart span').remove();
            if(span.length == 0){
              jQuery('.shopping-cart').append('<span>1</span>');
            }
            else {
              jQuery('.shopping-cart').append('<span>'+(parseInt(span)+1)+'</span>');
            }
            // window.location.href = 'http://localhost/VPP';
          }
        else
        {
          Swal.fire({
            type: 'error',
            // title: 'Oops...',
            text: 'Sản phẩm đã có trong giỏ hàng'
          })
        }
      },
      error: function(){
      }
    });
  });

  jQuery('body').on('change','.list_pro .item .item-text input',function(){
    var sprice = jQuery(this).parents('.item-text').find('.price').find('span').data('price');
    var num = jQuery(this).val();
    var id = jQuery(this).data('id');
    jQuery(this).parents('.item-text').find('.single_total').find('span').html(numberWithCommas(parseInt(sprice)*num) + ' VND');
    

    jQuery.ajax({
      url: ajax+'UpdateCart',
      type: 'post',
      dataType: 'html',
      data: {
        id: id,
        sl: num,
        action: 'UpdateCart', 
      },
      beforeSend: function(){

      },
      success: function(res){
        // console.log(res);
      },
      error: function(){
      }
    });


    var total = check_price();
    if(typeof total != "undefined") 
    {
      jQuery('#total').html(numberWithCommas(total)+' VND');
      jQuery('#dh_cart').prev().val(total);
    }
  });

  jQuery('.item-text>i.fa-trash').on('click',function(){
    Swal.fire({
      text: "Bạn muốn xóa sản phẩm này?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xác nhận'
    }).then((result) => {
      if (result.value) {
        var id = jQuery(this).data('delete');

        var parr = jQuery(this);



        jQuery.ajax({
          url: ajax+'DeleteProduct',
          type: 'post',
          dataType: 'html',
          data: {
            id: id,
            action: 'DeleteProduct', 
          },
          beforeSend: function(){
            parr.after('<span id="loading"></span>');
          },
          success: function(res){
            if(res == 11) window.location.href = '';
            parr.next().remove();
            if(res == 1)
            {
              parr.parents('.item').next().remove();

              parr.parents('.item').remove();
              var cat = jQuery('.shopping-cart>span').text();
              if(parseInt(cat) == 1) jQuery('.shopping-cart>span').remove();
              else jQuery('.shopping-cart>span').text(parseInt(cat)-1);
            }
          },
          error: function(){
          }
        });
      }
    })
  });

  jQuery('body').on('click','#dh_cart',function(e){
    // e.preventDefault();
    if(!jQuery('*').hasClass('list_pro'))
    {
      alert("Bạn chưa có đơn hàng nào. Vui lòng thêm sản phẩm trước khi đặt hàng");
      return false;
    }
    var list_sp = [];
    jQuery('.list_pro .item').each(function(){
      var id = jQuery(this).find('input').data('id');
      var sl = jQuery(this).find('input').val();
      var element = {};
      element.id = id;
      element.sl = sl;
      list_sp.push(element);
    });
    list_sp = JSON.stringify(list_sp);
    list_sp = list_sp.split('"').join("'");

    var name = jQuery('#form_dat_hang input[name=hoten]').val();
    if(name.length == 0)
    {
      alert('Vui lòng nhập họ tên');
      jQuery('#form_dat_hang input[name=hoten]').focus();
      return false;
    }

    var phone = jQuery('#form_dat_hang input[name=phone]').val();
    if(phone.length == 0)
    {
      alert('Vui lòng nhập số điện thoại');
      jQuery('#form_dat_hang input[name=phone]').focus();
      return false;
    }

    var email = jQuery('#form_dat_hang input[name=email]').val();
    if(email.length == 0)
    {
      alert('Vui lòng nhập email');
      jQuery('#form_dat_hang input[name=email]').focus();
      return false;
    }

    if(!validateEmail(email))
    {
      alert("Vui lòng kiểm tra định dạng Email");
      jQuery('#form_dat_hang input[name=email]').focus();
      return false;
    }


    var address = jQuery('#form_dat_hang textarea[name=address]').val();
    if(address.length == 0)
    {
      alert('Vui lòng nhập địa chỉ');
      jQuery('#form_dat_hang textarea[name=address]').focus();
      return false;
    }


    jQuery(this).before("<input type='hidden' name='list_sp' value=''>");
    jQuery('input[name=list_sp]').val(list_sp);
    jQuery('#form_dat_hang').submit();
  });

  jQuery('body').on('click','.userlogin>p>span',function(){
    jQuery(this).parents('.userlogin').find('ul.list_info').slideToggle(400);
  });

  jQuery('#info_user button[type=submit]').on('click',function(e){
    // e.preventDefault();
    // var fullname = jQuery('#info_user input[name=fullname]').val();
    // if(fullname.length == 0) {
    //   alert('Vui lòng nhập họ tên');
    //   jQuery('#info_user input[name=fullname]').focus();
    //   return false;
    // }

    // var email = jQuery('#info_user input[name=email]').val();
    // if(email.length == 0) {
    //   alert('Vui lòng nhập email');
    //   jQuery('#info_user input[name=email]').focus();
    //   return false;
    // }

    // var phone = jQuery('#info_user input[name=phone]').val();
    // if(phone.length == 0) {
    //   alert('Vui lòng nhập số điện thoại');
    //   jQuery('#info_user input[name=phone]').focus();
    //   return false;
    // }

    // var address = jQuery('#info_user textarea[name=address]').val();
    // if(address.length == 0) {
    //   alert('Vui lòng nhập địa chỉ');
    //   jQuery('#info_user textarea[name=address]').focus();
    //   return false;
    // }

    // var newpass = jQuery('#info_user input[name=newpassword]').val();

    // if(newpass.length > 0)
    // {
    //   var pass = jQuery('#info_user input[name=password]').val();
    //   if(pass.length == 0)
    //   {
    //     alert('Vui lòng nhập Mật khẩu cũ');
    //     jQuery('#info_user input[name=password]').focus();
    //     return false;
    //   }
    // }

    // jQuery('#info_user').submit();

  });

  jQuery('.bar_mobile .bar_menu button').click(function(){
    jQuery('.header-main .main-menu .menu-main-menu').slideToggle(600);
  });

  jQuery('#form_dat_hang input[name=phone]').on('keypress',function(e){
    if(e.keyCode < 48 || e.keyCode > 57) return false;
  });


jQuery('input[name=pay]').on('change',function(){
  jQuery('.info>div').slideUp(400);
  if(jQuery(this).attr('id') == 'visa')
  {
    jQuery('.info .visa').slideDown(400);
  }
  if(jQuery(this).attr('id') == 'atm')
  {
    jQuery('.info .atm').slideDown(400);
  }
});

var arr = [96, 126, 33, 64, 35, 36, 37, 94, 38, 42, 40, 41, 95, 43, 45, 61, 417, 93, 416, 125, 92, 124, 59, 58, 39, 34, 44, 60, 46, 62, 47, 63, 42];

jQuery('input[name=s]').on('keypress',function(e){
  // if(e.keyCode in_array())
});

jQuery('input').attr('autocomplete','off');

});


jQuery(document).ready(function()
{
    jQuery('body').on('click','.showmore',function(){
        var btn = jQuery(this);
        jQuery(this).attr('disabled','disabled');
        var offset = jQuery(this).data('num');
        var arr = jQuery(this).data('id');
        jQuery.ajax({
            url: ajax+'get_more',
            type: 'post',
            dataType: 'html',
            data: {
                arr: arr,
                offset: offset,
            },
            beforeSend: function(){
                btn.find('img').removeClass('hide');
            },
            success: function(res){
                jQuery('.item_cate').last().after(res);
                btn.parent().remove();
            },
            error: function(){
            }
        });
    });

    /*Phân trang Ajax*/

    var i = 0;

    jQuery(function($){
      jQuery('.pagation .page').each(function(){
        if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next'))) i ++;
      });
      if(i < 5)
      {
        jQuery('.pagation .page.next, .pagation .page.prev').remove();
      }
      else
      {
          jQuery('.pagation .page').each(function(){
            if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
            {
              if(parseInt(jQuery(this).text()) > 5) jQuery(this).addClass('hide');
            }
          });
      }
    });

    jQuery('body').on('click','.pagation a.page',function(e){
      e.preventDefault();
      if(jQuery(this).hasClass('current')) return false;
      if(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')) return false;
      if(jQuery(this).text() <= 3)
      {
        jQuery('.pagation a.page.current').removeClass('current');
        jQuery('.pagation .page').removeClass('hide');
        jQuery('.pagation .page').each(function(){
          if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
          {
            if(parseInt(jQuery(this).text()) > 5) jQuery(this).addClass('hide');
          }
        });
        jQuery(this).addClass('current');
      }
      else{
        if(jQuery(this).text() > i-3)
        {
          jQuery('.pagation a.page.current').removeClass('current');
          jQuery('.pagation .page').removeClass('hide');
          jQuery('.pagation .page').each(function(){
            if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
            {
              if(parseInt(jQuery(this).text()) <= i-5) jQuery(this).addClass('hide');
            }
          });
          jQuery(this).addClass('current');
        }
        else
        {
          jQuery('.pagation a.page.current').removeClass('current');
          jQuery('.pagation .page').removeClass('hide');
          var cub = jQuery(this).text();
          jQuery('.pagation .page').each(function(){
            if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
            {
              if(parseInt(jQuery(this).text()) > (parseInt(cub)+2) || parseInt(jQuery(this).text()) < (parseInt(cub)-2)) jQuery(this).addClass('hide');
            }
          });
          jQuery(this).addClass('current');
        }
      }

      var page = jQuery('.pagation a.page.current').text();
      jQuery.ajax({
        url: ajax+'get_post',
        type: 'post',
        dataType: 'html',
        data: {
          page: page
        },
        beforeSend: function(){

        },
        success: function(res){
          jQuery('.categorypost').remove();
          jQuery('h2.title').after(res);
          jQuery('body,html').animate({
            scrollTop: jQuery('h2.title').offset().top-50,
          },500);
        },
        error: function(){
        }
      });

    });

    jQuery('body').on('click','.pagation a.page.prev',function(){
      var num = jQuery('.pagation a.page.current').text();
      var cur = jQuery('.pagation a.page.current').addClass('del');
      if(parseInt(num) == 1) return false;

      jQuery('.pagation a.page.current').prev().trigger('click');
      jQuery('.pagation a.page.current.del').removeClass('current');
      jQuery('.pagation a.page.del').removeClass('del');
    });

    jQuery('body').on('click','.pagation a.page.next',function(){
      var num = jQuery('.pagation a.page.current').text();
      var cur = jQuery('.pagation a.page.current').addClass('del');
      if(parseInt(num) == i) return false;

      jQuery('.pagation a.page.current').next().trigger('click');
      jQuery('.pagation a.page.current.del').removeClass('current');
      jQuery('.pagation a.page.del').removeClass('del');
    });


    jQuery('.numcus').on('keypress',function(e){
      if(e.keyCode < 48 || e.keyCode > 57) return false;
    });
    jQuery('.numcus').on('change',function(){
      var num = jQuery(this).val();
      if(num < 1) jQuery(this).val('1');
    });
});


function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
} 

// function validateemail

function check_price()
{
  var total = 0;
  jQuery('.list_pro .item').each(function(){
      var num = jQuery(this).find('input').val();
      var s_price = jQuery(this).find('.price').find('span').data('price');
      total += parseInt(num)*parseInt(s_price);
    });
  return total;
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});