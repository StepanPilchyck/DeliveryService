function ObjectAsync(){};

ObjectAsync.prototype.init = function init()
{

    this._elem = null;

    //OnLoad event from BODY:
    this.jsOnLoad_body();

    if (this.exist($('.jsOnFocusin'))) this.onEvent('focusin', $('.jsOnFocusin'), this.jsOnFocusin);
    if (this.exist($('.jsOnFocusout'))) this.onEvent('focusout', $('.jsOnFocusout'), this.jsOnFocusout);
    if (this.exist($('.jsOnKeyup'))) this.onEvent('keyup', $('.jsOnKeyup'), this.jsOnKeyup);
    if (this.exist($('.jsOnChange_input'))) this.onEvent('click', $('.jsOnChange_input'), this.jsOnChange_input);
    if (this.exist($('.jsOnSubmit_validation'))) this.onEvent('submit', $('.jsOnSubmit_validation'), this.jsOnSubmit_validation);

    if (this.exist($('.isOnClick_ajax'))) this.onEvent('click', $('.isOnClick_ajax'), this.isOnClick_ajax);

    if (this.exist($('.jsOnClick_menu'))) this.onEvent('click', $('.jsOnClick_menu'), this.jsOnClick_menu);
    if (this.exist($('.jsOnClick_submenu'))) this.onEvent('click', $('.jsOnClick_submenu'), this.jsOnClick_submenu);

    //Validation form:
    if (this.exist($('input[data-validation]'))) this.onEvent('keyup change', $('input[data-validation]'), this.jsValidation);

    //External class:
    if (this.exist($('.panel_show-hide'))) this.onEvent('click', $('.panel_show-hide'), this.jsOnClick_panel_showhide);
};

/*=======  Public system functions  =======*/
ObjectAsync.prototype.exist = function exist(elem)
{
    if (elem.length !== 0)
    {
        return true;
    }
    return false;
};

ObjectAsync.prototype.onEvent = function onEvent(event, elem, func)
{
    elem.bind(event, func);
    return false;
};

ObjectAsync.prototype.MobileVersion = function MobileVersion()
{
    return $(document).width() < 768;
};

ObjectAsync.prototype.ValidationInit = function ValidationInit(elem)
{
    for (var i=0; i<elem.length; i++)
    {
        var field_text_i = elem.eq(i);
        var arr = field_text_i.attr('data-validation').split(' ');

        if(arr.indexOf('8') > -1) field_text_i.attr('maxlength','8');
        if(arr.indexOf('12') > -1) field_text_i.attr('maxlength','12');
        if(arr.indexOf('24') > -1) field_text_i.attr('maxlength','24');
        if(arr.indexOf('255') > -1) field_text_i.attr('maxlength','255');

        if(arr.indexOf('int') > -1) field_text_i.attr('pattern','^\\d+$');
        if(arr.indexOf('real') > -1) field_text_i.attr('pattern','^\\d+(\\.{0,1}\\d*$)');
        if(arr.indexOf('int-chrEN') > -1) field_text_i.attr('pattern','^[A-Za-z0-9\-\_]*$');
        if(arr.indexOf('all') > -1) field_text_i.attr('pattern','^.+$');
        if(arr.indexOf('phone') > -1) field_text_i.attr('pattern','^[0-9]*$');
        if(arr.indexOf('phone') > -1) field_text_i.attr('datetime','\\d{2}\\.\\d{2}\\.\\d{4}\\s\\d{2}\\:\\d{2}\\:*\\d{0,1}');
    }
};

/*=======  Public events functions  =======*/
ObjectAsync.prototype.jsOnLoad_body = function jsOnLoad_body()
{
    var field_text = $('.jsOnFocusout, .jsOnChange_input');
    if (jsAsync.exist(field_text))
    {
        for(var i=0; i<field_text.length; i++)
        {
            if(!field_text.eq(i).hasClass('jsOnChange_input'))
            {
                field_text.eq(i).wrap('<div style="position:relative; z-index: 0;"></div>');
                var t = field_text.eq(i).parent().next('.isOnClick_ajax');
                if(t.length === 1)
                {
                    field_text.eq(i).after(t);
                }
            }
            
            if(field_text.eq(i).hasClass('jsOnChange_input'))
            {
                var field_hidden = field_text.eq(i).parent().find(' > input[type="hidden"]');
                if(field_hidden.val() !== '')
                {
                    var item = field_text.eq(i).parent().find('.list-select .item[data-id="'+field_hidden.val()+'"]');
                    field_text.eq(i).val(item.attr('data-name'));
                }
            }

            if (field_text.eq(i).val() !== "")
            {
                field_text.eq(i).before('<span class="showlable">'+field_text.eq(i).attr('placeholder')+'</span>');
                field_text.eq(i).prev().css({
                    'width':60,
                    'font-size':0.62+'em',
                    'padding-left':8
                });
                field_text.eq(i).addClass('showtext');
                field_text.eq(i).css({
                    'margin-left':'-60px',
                    'padding-left':'60px',
                    'width':(field_text.eq(i).outerWidth() -2)+'px'
                });
            }
            else
            {
                field_text.eq(i).css({
                    'width':(field_text.eq(i).outerWidth() -2)+'px'
                });
            }
            
        }
    }

    var field_text = $('.jsOnClick_date');
    if (jsAsync.exist(field_text))
    {
        field_text.will_pickdate(
        {
            format: 'd.m.Y',
            inputOutputFormat: 'Y.m.d',
            days: ['Пн', 'Вт', 'Ср', 'Чт','Пт', 'Сб', 'Вс'],
            months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            allowEmpty:true,
            yearsPerPage:3
        });
    }

    var field_text = $('.jsOnClick_datetime');
    if (jsAsync.exist(field_text))
    {
        field_text.will_pickdate(
        {
            format: 'd.m.Y H:i:s',
            inputOutputFormat: 'Y.m.d H:i:s',
            days: ['Пн', 'Вт', 'Ср', 'Чт','Пт', 'Сб', 'Вс'],
            months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            timePicker: true,
            militaryTime: true,
            allowEmpty:true,
            yearsPerPage:3
        });
    }

    var field_text = $('input[data-validation]');
    if (jsAsync.exist(field_text))
    {
        jsAsync.ValidationInit(field_text);
    }

    var left_column = $('.content-left_column');
    if (jsAsync.exist(left_column))
    {
        left_column.animate({height: "hide"}, 0);
        if(!jsAsync.MobileVersion())
        {
            var left_column_menu = left_column.eq($('.header-btn ul > li').index($('.header-btn ul > li.active')));
            if(left_column_menu.length === 1)
            {
                left_column_menu.animate({height: "show"}, 0);
            }
        }
    }

    var left_column = $('.content-left_column');
    if (jsAsync.exist(left_column))
    {
        var StatWidth = jsAsync.MobileVersion();
        var field_text = $('.jsOnFocusout, .jsOnChange_input');
        $(window).bind('resize', function()
        {
            if(StatWidth !== jsAsync.MobileVersion())
            {
                StatWidth = jsAsync.MobileVersion();
                left_column.animate({height: "hide"}, 0);
                if(!StatWidth)
                {
                    var left_column_menu = left_column.eq($('.header-btn ul > li').index($('.header-btn ul > li.active')));
                    if(left_column_menu.length === 1)
                    {
                        left_column_menu.animate({height: "show"}, 0);
                    }
                }
            }

            if (jsAsync.exist(field_text))
            {
                field_text.css({'width':'100%'});
            }

        });
        $(window).trigger('resize');
    }

    return true;
};

ObjectAsync.prototype.jsOnClick_body_tmp = function jsOnClick_body_tmp()
{
    if(!jsAsync._elem.hasClass('animation_off'))
    {
        jsAsync._elem.bind('focusout',jsAsync.jsOnFocusout);
        jsAsync._elem.trigger('focusout');
        jsAsync._elem.unbind('focusout',jsAsync.jsOnFocusout);
    }
    //jsAsync._elem.parent().find(' > .list-select').css({'display':'none'});
    $(this).find('.input-select > .list-select').css({'display':'none'});
    $(this).unbind('click',jsOnClick_body_tmp);
};

ObjectAsync.prototype.jsOnFocusin = function jsOnFocusin()
{
    var t_elem = $(this);
    if(t_elem.val() !== "")
    {
        var t1 = t_elem;
        var t2 = t_elem.parent().find(' > span.showlable');

        t2.animate(
        {
            'width':0
        },
        {
            step: function(now, fx)
            {
                var k = (now / 60);
                var t1pl = parseInt(t1.css('padding-left')) * k+11;
                var t2fs = parseInt(t2.css('font-size')) * k;
                var t2pl = parseInt(t2.css('padding-left')) * k;

                t1.css({'margin-left':-now, 'padding-left':t1pl});
                t2.css({'width':now, 'font-size':t2fs, 'padding-left':t2pl});
            },
            complete: function()
            {
                t2.remove();
                if(t_elem.hasClass('showtext'))
                {
                    t_elem.removeClass('showtext');
                }
            }
        }
        );
    }
    return true;
};

ObjectAsync.prototype.jsOnFocusout = function jsOnFocusout()
{
    var t_elem = $(this);
    if(t_elem.val() !== "")
    {
        var t1 = t_elem;
        t1.parent().find(' > span.showlable').remove();
        t1.before('<span class="showlable">'+t1.attr('placeholder')+'</span>');
        var t2 = t_elem.prev();

        t2.animate(
        {
            'width':60
        },
        {
            step: function(now, fx)
            {
                var t1pl = now;
                var t2fs = now *(0.62/60);
                var t2pl = now *(8/60);

                t1.css({'margin-left':-now, 'padding-left':t1pl});
                t2.css({'width':now, 'font-size':t2fs+'em', 'padding-left':t2pl});
            },
            complete: function()
            {
                if(!t_elem.hasClass('showtext'))
                {
                    t_elem.addClass('showtext');
                }
            }
        }
        );
    }
    return true;
};

ObjectAsync.prototype.jsOnKeyup = function jsOnKeyup()
{
    var t_elem = $(this);
    if(t_elem.val() !== "")
    {
        t_elem.addClass('showtext');
    }else{
        t_elem.removeClass('showtext');
    }
    return true;
};

ObjectAsync.prototype.jsOnChange_input = function jsOnChange_input()
{
    $('.input-select > .list-select').css({'display':'none'});
    var field_text = $(this);
    var field_hidden = $(this).parent().find(' > input[type="hidden"]');
    var list_select = $(this).parent().find(' > .list-select');
    if(!list_select.is(':visible'))
    {
        list_select.css({'display':'block'});
        list_select.find('.item').bind('click',function()
        {
            field_hidden.val($(this).attr('data-id'));
            field_text.val($(this).attr('data-name'));

            var validation = field_text.attr('data-validation');
            if (validation !== '')
            {
                field_text.trigger('keyup');
            }

            list_select.css({'display':'none'});
            list_select.find('.item').unbind('click');
            //return false;
           return ;
        });

        if(!field_text.hasClass('animation_off'))
        {
            $(this).bind('focusin',jsAsync.jsOnFocusin);
            $(this).trigger('focusin');
            $(this).unbind('focusin');
        }

        jsAsync._elem = $(this);
        jsAsync.onEvent('click', $('body'), jsAsync.jsOnClick_body_tmp);
        return false;
    }else{
        list_select.css({'display':'none'});
    }

    return false;
};

ObjectAsync.prototype.jsOnSubmit_validation = function jsOnSubmit_validation(e)
{
    var field_text = $('input[data-validation]:not([disabled])');
    if (jsAsync.exist(field_text))
    {
        field_text.trigger('keyup');
         return !field_text.hasClass('no_valid');
    }
    //e.preventDefault();
};

ObjectAsync.prototype.isOnClick_ajax = function isOnClick_ajax()
{
    var elem = $(this);
    switch(elem.attr('data-url'))
    {
        case '/ajax/person/search':
            $.post(
                elem.attr('data-url'),
                {},
                function(msg)
                {
                    console.log(msg);
                }
            );
            break;
    }
};

ObjectAsync.prototype.jsOnClick_menu = function jsOnClick_menu(e)
{
    var t_elem = $(this);
    if(jsAsync.MobileVersion())
    {
        e.preventDefault();

        var top_menu_index = t_elem.parent().find(' > li').index(t_elem);
        var left_column = $('.content-left_column').eq(top_menu_index);
        if(left_column.length !== 1){
            return false;
        }
        var left_column_visible = $('.content-left_column:visible');
        var left_column_visible_index = -1;
        if(left_column_visible.length === 1)
        {
            left_column_visible_index = left_column_visible.parent().find('.content-left_column').index(left_column_visible);
        }
        if(left_column_visible.length > 0)
        {
            left_column_visible.animate({height: "hide"}, 300, function()
            {
                if(top_menu_index !== left_column_visible_index)
                {
                    left_column.animate({height: "show"}, 300);
                }
            });
        }else{
            left_column.animate({height: "show"}, 300);
        }
    }
    return true;
};

ObjectAsync.prototype.jsOnClick_submenu = function jsOnClick_submenu()
{
    var t_elem = $(this);
    if (t_elem.hasClass('selected'))
    {
        t_elem.find(' > ul').hide('100', function()
        {
            $(this).parent().removeClass('selected');
        });
    }else{
        t_elem.find(' > ul').show('100', function()
        {
            $(this).parent().addClass('selected');
        });
    }
    return true;
};

ObjectAsync.prototype.ShowModal = function ShowModal(e, title, message, button_ok, button_cancel, reception, tdb, id)
{
    e.preventDefault();

    var html =
    $('<div class="popup_window-modal">'+
    '   <div class="popup_window-inforlation">'+
    '       <div class="popup_window-header">'+
            title+
    '       </div>'+
    '       <div class="popup_window-content">'+
            message+
    '       </div>'+
    '       <div class="popup_window-bottom">'+
    '           <form method="post">'+
    '               <input type="button" name="ok" value="'+button_ok+'">'+
    '               <input type="button" name="cancel" value="'+button_cancel+'">'+
    '               <input type="hidden" name="'+reception+'" value="1">'+
    '               <input type="hidden" name="reference" value="'+tdb+'">'+
    '               <input type="hidden" name="id" value="'+id+'">'+
    '           </form>'+
    '       </div>'+
    '   </div>'+
    '</div>');

    html.find('.popup_window-bottom input[name="ok"]').bind('click', function(){
        $(this).closest('form').submit();
        //return false;
    });

    html.find('.popup_window-bottom input[name="cancel"]').bind('click', function(){
        $(this).closest('.popup_window-modal').remove();
        //return false;
    });

    $('body').prepend(html);
    return false;
};

ObjectAsync.prototype.jsValidation = function jsValidation()
{
    var t_elem = $(this);
    var valid = new RegExp(t_elem.attr('pattern'));
    if(valid.test(t_elem.val()))
    {
        if(t_elem.hasClass('no_valid'))
        {
            t_elem.removeClass('no_valid');
        }
    }
    else
    {
        if(!t_elem.hasClass('no_valid'))
        {
            t_elem.addClass('no_valid');
        }
    }
};

ObjectAsync.prototype.jsOnClick_panel_showhide = function jsOnClick_panel_showhide()
{
    var tmp = false;

    if($(this).closest('.panel_1').length > 0) tmp = $(this).closest('.panel_1');
    if(tmp === false) return false;

    if(tmp.hasClass('active'))
    {
        tmp.find('.panel_bottom, .panel_content').animate(
        {
            height: 'hide'
        },
        200,
        function()
        {
            tmp.removeClass('active');
        });
    }else{
        tmp.find('.panel_bottom, .panel_content').animate(
        {
            height: 'show'
        },
        200,
        function()
        {
            tmp.addClass('active');
        });
    }
    return true;
};

var jsAsync = new ObjectAsync();

$(function(){
    jsAsync.init();
});
