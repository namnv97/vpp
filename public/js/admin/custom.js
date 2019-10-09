jQuery(document).ready(function(){
    jQuery('input').attr('autocomplete','off');
	jQuery('#table_category').dataTable({
        stateSave: false
    });

    // jQuery('body').on('click',function(){
    //     jQuery('#table_category').find('tbody').html('<tr><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td></tr>');
    //     var tbl = jQuery('#table_category').html();
    //     jQuery('#table_category_wrapper').before('<table id="table_category" class="table table-bordered">'+tbl+'</table>');
    //     jQuery('#table_category_wrapper').remove();
    //     jQuery('#table_category').dataTable({
    //         stateSave: false,
    //         destroy: true,
    //     });

    // });


	jQuery('.form_add input[name=name]').on('change',function(){
		var name = jQuery(this).val();
		var slug = jQuery('.form_add input[name=slug]').val();
		if(slug.length == 0) jQuery('.form_add input[name=slug]').val(ChangeToSlug(name));
	});

    

    jQuery('.choose span').on('click',function(){
        jQuery(this).next().trigger('click');
    });

    jQuery('#add_product button[type=submit]').on('click',function(e){
        e.preventDefault();
        var name = jQuery('#add_product input[name=name]').val();
        if(name.length == 0)
        {
            alert('Vui lòng nhập tên sản phẩm');
            jQuery('#add_product input[name=name]').focus();
            return false;
        }
        var desc = jQuery('#add_product textarea[name=description]').val();
        if(desc.length == 0) {
            alert("Vui lòng nhập mô tả sản phẩm");
            jQuery('#add_product textarea[name=description]').focus();
            return false;
        }

        var cat_id = jQuery('#add_product select[name=cat_id]').val();
        if(cat_id == 0)
        {
            alert("Vui lòng chọn danh mục sản phẩm");
            return false;
        }

        jQuery('#add_product').submit();
    });

    jQuery('#add_product input[name=name]').on('change',function(){
        var name = jQuery(this).val();
        var slug = jQuery('#add_product input[name=slug]').val();
        if(slug.length == 0) jQuery('#add_product input[name=slug]').val(ChangeToSlug(name));
    });

    jQuery('#add_product input[name=price]').on('keypress',function(e){
        var num = e.keyCode;
        if(num < 48 || num > 57) return false;
    });

    jQuery('#add_product input[name=sale]').on('keypress',function(e){
        var num = e.keyCode;
        if(num < 48 || num > 57) return false;
        var nums = jQuery(this).val()+e.key;
        if(parseInt(nums) > 100) return false;
    });

    jQuery('#add_user input[name=phone]').on('keypress',function(e){
        var num = e.keyCode;
        if(num < 48 || num > 57) return false;
        var num = jQuery(this).val();
        console.log(num.length)
        if(num.length > 10) return false;
    });

    jQuery('#add_user input[name=username]').on('change',function(){
        var username = jQuery(this).val();
        jQuery.ajax({
            url: ajax_admin+'check_username',
            type: 'post',
            dataType: 'html',
            data: {
                username: username, 
            },
            beforeSend: function(){
                jQuery('#add_user input[name=username]').next().remove();
            },
            success: function(res){
                if(res == 0)
                {
                    jQuery('#add_user input[name=username]').after('<label class="error">Username đã được sử dụng</label>');
                }
            },
            error: function(){
            }
        });
    });

     jQuery('#add_user input[name=email]').on('change',function(){
        var email = jQuery(this).val();
        jQuery.ajax({
            url: ajax_admin+'check_email',
            type: 'post',
            dataType: 'html',
            data: {
                email: email, 
            },
            beforeSend: function(){
                jQuery('#add_user input[name=email]').next().remove();
            },
            success: function(res){
                if(res == 0)
                {
                    jQuery('#add_user input[name=email]').after('<label class="error">Email đã được sử dụng</label>');
                }
            },
            error: function(){
            }
        });
    });

    jQuery('#add_user button[type=submit]').on('click',function(e){
        e.preventDefault();
        var username = jQuery(this).parents('#add_user').find('input[name=username]').val();
        if(username.length == 0) 
        {
            alert("Vui lòng nhập Username");
            jQuery(this).parents('#add_user').find('input[name=username]').focus();
            return false;
        }

        var pass = jQuery('#add_user input[name=password]').val();
        if(pass.length == 0) 
        {
            alert("Vui lòng nhập Password");
            jQuery('#add_user input[name=password]').focus();
            return false;
        }
        var name = jQuery('#add_user input[name=fullname]').val();
        if(name.length == 0) 
        {
            alert("Vui lòng nhập Họ tên");
            jQuery('#add_user input[name=fullname]').focus();
            return false;
        }
        var email = jQuery('#add_user input[name=email]').val();
        if(email.length == 0) 
        {
            alert("Vui lòng nhập Email");
            jQuery('#add_user input[name=email]').focus();
            return false;
        }


        var phone = jQuery('#add_user input[name=phone]').val();
        if(phone.length == 0) 
        {
            alert("Vui lòng nhập Số điện thoại");
            jQuery('#add_user input[name=phone]').focus();
            return false;
        }

        var address = jQuery('#add_user textarea[name=address]').val();
        if(address.length == 0) 
        {
            alert("Vui lòng nhập Địa chỉ");
            jQuery('#add_user textarea[name=address]').focus();
            return false;
        }

        if(jQuery('#add_user *').hasClass('error')) return false;
        else jQuery('#add_user').submit();
    });

    jQuery('body').on('click','.changepass.create',function(){
        jQuery(this).parent().after('<label>Password</label><input type="password" name="password" class="form-control">');
        jQuery(this).text("Hủy");
        jQuery(this).toggleClass('create').toggleClass('cancel');
    });
    jQuery('body').on('click','.changepass.cancel',function(){
        jQuery(this).parent().next().remove();
        jQuery(this).parent().next().remove();
        jQuery(this).text("Thay đổi mật khẩu");
        jQuery(this).toggleClass('create').toggleClass('cancel');
    });


});


jQuery(document).ready(function(){
    jQuery('body').on('click','#choose span.add',function(){
        CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    jQuery('#thum').find('img').attr('src',file.getUrl());
                    jQuery('#choose input').val(file.getUrl());
                    jQuery('#thum').css('display','block');
                    jQuery('#choose span').addClass('delete');
                    jQuery('#choose span').removeClass('add');
                    jQuery('#choose span').text('Xóa ảnh đại diện');
                    jQuery('#choose.logo span').text('Xóa ảnh');
                } );
            }
        } );
    });

    jQuery('body').on('click','#choose span.delete',function(){
        jQuery('#thum').css('display','none');
        jQuery('#thum img').removeAttr('src');
        jQuery('#choose span').removeClass('delete');
        jQuery('#choose span').addClass('add');
        jQuery('#choose input').val('');
        jQuery('#choose span').text("Thêm ảnh đại diện");
        jQuery('#choose.logo span').text("Thêm ảnh");
    });

    jQuery('body').on('click','.fa-star.opa',function(){
        if(confirm("Sản phẩm này sẽ được chọn là sản phẩm bán chạy?"))
        {
            var id = jQuery(this).data('id');
            var star = jQuery(this);
            jQuery.ajax({
                url: ajax_admin+'best_seller',
                type: 'post',
                dataType: 'html',
                data: {
                    id: id,
                    stt: 1,
                },
                beforeSend: function(){
                    
                },
                success: function(res){
                    if(res == 1)
                    {
                        star.removeClass('opa');
                        star.addClass('orange');
                    }
                },
                error: function(){
                }
            });
        }
    });

    jQuery('body').on('click','.fa-star.orange',function(){
        if(confirm("Sản phẩm này sẽ không còn là sản phẩm bán chạy?"))
        {
            var id = jQuery(this).data('id');
            var star = jQuery(this);
            jQuery.ajax({
                url: ajax_admin+'best_seller',
                type: 'post',
                dataType: 'html',
                data: {
                    id: id,
                    stt: 0,
                },
                beforeSend: function(){
                    
                },
                success: function(res){
                    if(res == 1)
                    {
                        star.removeClass('orange');
                        star.addClass('opa');
                    }
                },
                error: function(){
                }
            });
        }
    });



});

jQuery(document).ready(function(){
    jQuery('body').on('click','.item_slide .add_sl',function(e){
        e.preventDefault();
        var curr = jQuery(this);
        CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    console.log(evt);
                    var file = evt.data.files.first();
                    curr.parents('.left').find('img').attr('src',file.getUrl());
                    curr.parents('.left').find('input').val(file.getUrl());
                    curr.parents('.left').find('.img_sl').removeClass('hide');
                    curr.hide();
                } );
            }
        } );
    });

    jQuery('body').on('click','.option_slide .add_row',function(e){
        e.preventDefault();
        jQuery(this).parent().before('<div class="item_slide"><div class="left" style="width: 95%;"><div class="img_sl hide"><img alt="slide"><input type="hidden" name="slide[]"></div><p class="add_sl"><span class="btn btn-md btn-success">Thêm ảnh</span></p></div><div class="right text-center" style="width: 5%;"><span>-</span></div></div>');
    });

    jQuery('body').on('click','.item_slide .right span',function(){
        if(confirm("Bạn chắc chắn muốn xóa dòng này?"))
        {
            jQuery(this).parents('.item_slide').remove();
        }
    });

    // jQuery('.option_slide').sortable();
    // jQuery('.option_slide').disableSelection();

    if(jQuery('*').hasClass('option_slide'))
    {
        jQuery( ".option_slide" ).sortable({
          connectWith: ".connected-sortable",
          stack: '.connected-sortable ul'
      }).disableSelection();
    }

    jQuery('input[name=username]').on('keypress',function(e){
        console.log(e.keyCode);
        var arr = [126, 35, 36, 37, 94, 38, 42, 40, 41, 95, 43, 45, 61,96,123,125,91,93,58,59,34,39,44,46,60,62,47,63];
        var a = arr.indexOf(e.keyCode);
        if(a >= 0) return false;
    });



    jQuery('body').on('click','.attr_item label span.add',function(e){
        e.preventDefault();
        var curr = jQuery(this);
        CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    console.log(evt);
                    var file = evt.data.files.first();
                    curr.parent().find('img').attr('src',file.getUrl());
                    curr.parent().next().val(file.getUrl());
                    curr.parent().find('img').css('display','block');
                    curr.text("Xóa ảnh");
                    curr.toggleClass('add').toggleClass('del');
                } );
            }
        } );
    });
    jQuery('body').on('click','.attr_item label span.del',function(){
        jQuery(this).toggleClass('add').toggleClass('del');
        jQuery(this).parent().next().val('');
        jQuery(this).parent().find('img').css('display','none');
        jQuery(this).parent().find('img').attr('src','');
        jQuery(this).text('Thêm ảnh');
    });

});






function ChangeToSlug(str)
{
    var slug;

    slug = str.toLowerCase();

    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');

    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/\&/gi, 'va');

    slug = slug.replace(/ /gi, "-");

    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');

    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    return slug;
}

var openFile = function(file) {
    var input = file.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      jQuery('.thum').html('<img alt="thumbnails" id="output" style="max-width: 100%;">');
      var output = document.getElementById('output');
      output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
  jQuery('.choose span').text("Thay đổi ảnh");
};



