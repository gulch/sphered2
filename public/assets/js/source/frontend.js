/**
 * @see http://github.com/NV/placeholder.js
 */
jQuery.fn.textPlaceholder = function () {

    return this.each(function(){

        var that = this;

        if (that.placeholder && 'placeholder' in document.createElement(that.tagName)) return;

        var placeholder = that.getAttribute('placeholder');
        var input = jQuery(that);

        if (that.value === '' || that.value == placeholder) {
            input.addClass('text-placeholder');
            that.value = placeholder;
        }

        input.focus(function(){
            if (input.hasClass('text-placeholder')) {
                this.value = '';
                input.removeClass('text-placeholder')
            }
        });

        input.blur(function(){
            if (this.value === '') {
                input.addClass('text-placeholder');
                this.value = placeholder;
            } else {
                input.removeClass('text-placeholder');
            }
        });

        that.form && jQuery(that.form).submit(function(){
            if (input.hasClass('text-placeholder')) {
                that.value = '';
            }
        });

    });

};

/* ------->> MAIN <<-------- */
// Instantiate theme global object
$Sphered = Object();

$Sphered.email = Object();

// Instantiate theme collapse element object
$Sphered.collapse = Object();

// New project form
$Sphered.form = Object();
$Sphered.form.project = '#new_project';

// Forms
$Sphered.form = Object();
$Sphered.form.errorClass = 'error';

$Sphered.form.contact = Object();
$Sphered.form.contact.id = '#contact_form';

$Sphered.form.newProject = Object();
$Sphered.form.newProject.id = '#new_project';
$Sphered.form.newProject.successMsg = 'SENT';

$Sphered.form.subscribe = Object();
$Sphered.form.subscribe.id = '#subscribe';

$(document).ready(function()
{

    $("[placeholder]").textPlaceholder();

    $(".embed-code").click(function(){
        $(".get-ecode").toggle("fast");
    });
    
    /* TESTIMONIALS */
    $('.testimonials .content a.arrow').click(function (e){
        e.preventDefault();
        e.stopPropagation();
        
        var trigger = $(this).attr('id');
        var list = $(this).parent().find('ul');
        var total_items = list.children().length;
        var index = list.children('li.active').index();
        
        var next;
        if(trigger === 'next')
            next = ((index + 1) >= total_items) ? 0 : index + 1;
        else if(trigger === 'prev')
            next = ((index - 1) <= 0) ? total_items - 1 : index - 1;
        
        list.children().eq(index).fadeOut(1000).toggleClass('active');
        list.children().eq(next).fadeIn(1000).toggleClass('active');
        
        return false;
    });

    /* ACCORDION */
    $(".accordion-toggle").click(function() {
        if($(this).parent().hasClass('active')){
            $Sphered.collapse.close($(this).parent().parent());
            return;
        }
        $('#accordion').children('.accordion-group').each(function(i, elem) {
            $Sphered.collapse.close(elem);
        });
        $Sphered.collapse.open(this);
    });

    $($Sphered.form.project).submit(function(e) {
        e.preventDefault();
    });

    /* ================= CONTACTS FORM ================= */
    $($Sphered.form.contact.id).submit(function() {
        var form = $(this);
        if($Sphered.form.validate(form)){
            form.find('.alert').fadeOut();
            form.find('.alert').removeAttr('class').addClass('alert hide');
             $.post(form.attr('action'), form.serialize(), function(result){
                switch(result.status)
                {
                    case 1:
                        form.find('.alert').addClass('a_welldone').fadeIn();
                        form.find('.alert i').attr('class','').addClass('fa fa-check-circle-o fa-3x');
                        form.find('.alert span').text(result.msg);
                        form.find('textarea').val('');
                        form.find('input').each(function(){
                            if(this.type!='submit') $(this).val('');
                        });
                        break;
                    case 2:
                        form.find('.alert').addClass('a_warning').fadeIn();
                        form.find('.alert i').attr('class','').addClass('fa fa-times-circle-o fa-3x');
                        form.find('.alert span').text(result.msg);
                        break;
                    default:
                        form.find('.alert').addClass('a_warning').fadeIn();
                        form.find('.alert i').attr('class','').addClass('fa fa-times-circle-o fa-3x');
                        form.find('.alert span').text(result.msg);
                        break;
                }
            },"json");
        }
        return false;
    });
    
    /* ================= NEW PROJECT FORM ================= */
    $($Sphered.form.newProject.id).submit(function() {
        var form = $(this);
        form.find('.alert').fadeOut();
        form.find('.alert').removeAttr('class').addClass('alert hide');
        $.post(form.attr('action'), form.serialize(), function(result){
            form.slideUp(100);
            var alert = form.find('.alert');
            form.html(alert[0].outerHTML).slideDown(500);
            switch(result.status)
            {
                case 1:
                    form.find('.alert').addClass('a_welldone').fadeIn();
                    form.find('.alert i').attr('class','').addClass('fa fa-check-circle-o fa-3x');
                    form.find('.alert span').text(result.msg);
                    form.find('textarea').val('');
                    form.find('input').each(function(){
                        if(this.type!='submit') $(this).val('');
                    });
                    break;
                case 2:
                    form.find('.alert').addClass('a_warning').fadeIn();
                    form.find('.alert i').attr('class','').addClass('fa fa-times-circle-o fa-3x');
                    form.find('.alert span').text(result.msg);
                    break;
                default:
                    form.find('.alert').addClass('a_warning').fadeIn();
                    form.find('.alert i').attr('class','').addClass('fa fa-times-circle-o fa-3x');
                    form.find('.alert span').text(result.msg);
                    break;
            }
        },"json");
        return false;
    });
    
    /* ================= SUBSCRIBE FORM ================= */
    $($Sphered.form.subscribe.id).submit(function() {
        var form = $(this);
        var input = form.find('input');
        var input_ph = $(input).attr('placeholder');
        var url = form.attr('action');
        if($Sphered.form.validate(form))
        {
            form.find('.msg').fadeOut();
            $.post(url, form.serialize(), function(result)
            {
                $(input).val('');
                if(result.status)
                {
                    form.find('.msg').text(result.msg).fadeIn();
                }
                else
                {
                    form.find('.msg').text(result.msg).fadeIn();
                }
            },"json");
       }
       else
       {
           setTimeout(function(){$(input).removeClass('error');},1200);
       }
       return false;
    });

    $('.close').click(function(){
        $(this).parent().fadeOut();
    });

    /* getSocialCount(); */
});

/* ACCORDION STATE MANAGER */
$Sphered.collapse.close = function close(element) {
    console.log('close');
    $(element).children('.accordion-heading').removeClass('active');
    $(element).children('.accordion-heading').find('.plus').html('+');
};
$Sphered.collapse.open = function open(element) {
    $(element).parent().toggleClass('active');
    $(element).find('.plus').html('-');
};
/* --------------------------- */


/*  EMAIL VALIDATION FUNCTION */
$Sphered.email.validate = function(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};
/* --------------------------- */


/*  FORM ELEMENT VALIDATION FUNCTION */
$Sphered.form.validate = function validate(form){
    var valid = true;
    $.each(form.find(':input'), function (index, input){
        var val = $(input).val();
        if($.trim(val) === ''){
            $Sphered.form.inputError(input);
            valid = false;
            return false;
        }
        if($(input).attr('name') === 'email'){
            if(!$Sphered.email.validate(val)){
                $Sphered.form.inputError(input);
                valid = false;
                return false;
            }
        }
    });
    return valid;
};

$Sphered.form.inputError = function inputError(input){
    if(!$(input).hasClass($Sphered.form.errorClass))
        $(input).addClass($Sphered.form.errorClass);
    $(input).focus();
};




/* --- SOCIAL SHARE PLUGIN -(Alpha Version)-- */

function getSocialCount()
{
    rUrl = 'http://www.unian.ua/inc/ajax_soccount.php';
    socUrl = document.URL;
    $.ajax({
        url: rUrl,
        data: 'url='+socUrl,
        dataType: "json",
        type: 'GET',
        success: function(data) {
            $('.fb_count').text(data.fb);
            $('.vk_count').text(data.vk);
            $('.od_count').text(data.od);
            $('.gp_count').text(data.gp);
        }
    });
}

Share = {
    vkontakte: function(purl, ptitle, pimg) {
        url  = 'http://vkontakte.ru/share.php?';
        url += 'url='          + encodeURIComponent(purl);
        url += '&title='       + encodeURIComponent(ptitle);
        //url += '&description=' + encodeURIComponent(text);
        url += '&image='       + encodeURIComponent(pimg);
        url += '&noparse=true';
        Share.popup(url);
    },
    odnoklassniki: function(purl) {
        url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
        //url += '&st.comments=' + encodeURIComponent(text);
        url += '&st._surl='    + encodeURIComponent(purl);
        Share.popup(url);
    },
    facebook: function(purl, ptitle, pimg) {
        url  = 'http://www.facebook.com/sharer.php?s=100';
        url += '&p[title]='     + encodeURIComponent(ptitle);
        //url += '&p[summary]='   + encodeURIComponent(text);
        url += '&p[url]='       + encodeURIComponent(purl);
        url += '&p[images][0]=' + encodeURIComponent(pimg);
        Share.popup(url);
    },
    googleplus: function(purl, ptitle, pimg) {
        url  = 'https://plus.google.com/share?';
        url += 'url='          + encodeURIComponent(purl);
        Share.popup(url)
    },

    popup: function(url) {
        window.open(url,'','toolbar=0,status=0,width=626,height=436');
    }
};