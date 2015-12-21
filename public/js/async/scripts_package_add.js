var ObjPackageAddRegistry = function(){};

// Extended ObjectAsync();
ObjPackageAddRegistry.prototype = new ObjectAsync();
    
ObjPackageAddRegistry.prototype.init = function init()
{
    
    if (this.exist($('div[data-init="tmpl_send_p1"]')))
    {
        this.init_block($('div[data-init="tmpl_send_p1"]'), this.dataItems_sender_p1);
        var panel_1_new = $('div[data-init="tmpl_send_p1"]');
        var field_text = panel_1_new.find('.jsOnFocusout');
        for(var i=0; i<field_text.length; i++)
        {
            field_text.eq(i).wrap('<div style="position:relative; z-index: 0;"></div>');
            var t = field_text.eq(i).parent().next('.isOnClick_ajax');
            if(t.length === 1)
            {
                field_text.eq(i).after(t);
            }
        }
        panel_1_new.find('.jsOnFocusout').wrap('<div style="position:relative; z-index: 0;"></div>');
        jsAsync.onEvent('focusin', panel_1_new.find('.jsOnFocusin'), jsAsync.jsOnFocusin);
        jsAsync.onEvent('focusout', panel_1_new.find('.jsOnFocusout'), jsAsync.jsOnFocusout);
        jsAsync.onEvent('keyup', panel_1_new.find('.jsOnKeyup'), jsAsync.jsOnKeyup);

        jsAsync.onEvent('click', panel_1_new.find('.jsOnChange_input'), jsAsync.jsOnChange_input);
        jsAsync.onEvent('click', panel_1_new.find('.isOnClick_ajax'), jsAsync.isOnClick_ajax);

        if (jsAsync.exist(panel_1_new.find('input[data-validation]')))
        {
            jsAsync.ValidationInit(panel_1_new.find('input[data-validation]'));
            jsAsync.onEvent('keyup change', $('input[data-validation]'), jsAsync.jsValidation);
        }
    }
    if (this.exist($('div[data-init="tmpl_rec_p1"]')))
    {
        this.init_block($('div[data-init="tmpl_rec_p1"]'), this.dataItems_recipient_p1);
        var panel_1_new = $('div[data-init="tmpl_rec_p1"]');
        var field_text = panel_1_new.find('.jsOnFocusout');
        for(var i=0; i<field_text.length; i++)
        {
            field_text.eq(i).wrap('<div style="position:relative; z-index: 0;"></div>');
            var t = field_text.eq(i).parent().next('.isOnClick_ajax');
            if(t.length === 1)
            {
                field_text.eq(i).after(t);
            }
        }
        panel_1_new.find('.jsOnFocusout').wrap('<div style="position:relative; z-index: 0;"></div>');
        jsAsync.onEvent('focusin', panel_1_new.find('.jsOnFocusin'), jsAsync.jsOnFocusin);
        jsAsync.onEvent('focusout', panel_1_new.find('.jsOnFocusout'), jsAsync.jsOnFocusout);
        jsAsync.onEvent('keyup', panel_1_new.find('.jsOnKeyup'), jsAsync.jsOnKeyup);

        jsAsync.onEvent('click', panel_1_new.find('.jsOnChange_input'), jsAsync.jsOnChange_input);
        jsAsync.onEvent('click', panel_1_new.find('.isOnClick_ajax'), jsAsync.isOnClick_ajax);

        if (jsAsync.exist(panel_1_new.find('input[data-validation]')))
        {
            jsAsync.ValidationInit(panel_1_new.find('input[data-validation]'));
            jsAsync.onEvent('keyup change', $('input[data-validation]'), jsAsync.jsValidation);
        }
    }
    if (this.exist($('div[data-init="tmpl_panel_2"]')))
    {
        this.init_block($('div[data-init="tmpl_panel_2"]'), this.dataItems_panel2);
    }
    if (this.exist($('div[data-init="tmpl_panel_3"]')))
    {
        this.init_block($('div[data-init="tmpl_panel_3"]'), null);
    }

    if (this.exist($('.panel_2 .panel_header .panel2_table')))
    {
        this.panel_calculate_count(2, $('.panel_2 .panel_header > .panel2_table'), '.panel_2');
    }





    if (this.exist($('input[name="package_htd_auto"]')))
    {
        this.onEvent('change', $('input[name="package_htd_auto"]'), this.jsOnChange_checkbox_1);
    }
    if (this.exist($('input[name="cont_type"]')))
    {
        this.onEvent('change', $('input[name="cont_type"]'), this.jsOnChange_checkbox_2);
    }
    if (this.exist($('.panel_1 .panel_show-hide')))
    {
        this.onEvent('click', $('.panel_1 .panel_show-hide'), this.jsOnClick_p1_btn_save);
    }
    if (this.exist($('.panel_1 .person_save')))
    {
        this.onEvent('click', $('.panel_1 .person_save'), this.jsOnClick_p1_btn_save);
    }
    if (this.exist($('.panel_1 .panel_close')))
    {
        this.onEvent('click', $('.panel_1 .panel_close'), this.jsOnClick_p1_btn_close);
    }
    if (this.exist($('.panel_1_rec_create input[name="panel_1_create"]')))
    {
        this.onEvent('click', $('.panel_1_rec_create input[name="panel_1_create"]'), this.jsOnClick_p1_btn_create);
    }
    if (this.exist($('.panel_1_send_create input[name="panel_1_create"]')))
    {
        this.onEvent('click', $('.panel_1_send_create input[name="panel_1_create"]'), this.jsOnClick_p1_btn_create);
    }





    if (this.exist($('.panel_2  .panel_show-hide.p2')))
    {
        this.onEvent('click', $('.panel_2 .panel_show-hide.p2'), this.jsOnClick_p2_btn_save);
    }
    if (this.exist($('.panel_2 .panel_close.p2')))
    {
        this.onEvent('click', $('.panel_2 .panel_close.p2'), this.jsOnClick_p2_btn_close);
    }
    if (this.exist($('.panel_2_create input[name="panel_2_create"]')))
    {
        this.onEvent('click', $('.panel_2_create input[name="panel_2_create"]'), this.jsOnClick_p2_btn_create);
    }





    if (this.exist($('.panel_3 .panel_close.p3')))
    {
        this.onEvent('click', $('.panel_3 .panel_close.p3'), this.jsOnClick_p3_btn_close);
    }
    if (this.exist($('.panel_3_create input[name="panel_3_create"]')))
    {
        this.onEvent('click', $('.panel_3_create input[name="panel_3_create"]'), this.jsOnClick_p3_btn_create);
    }

    this.jsOnChange_checkbox_2();
};

/*=======  Public initialization blocks  =======*/
ObjPackageAddRegistry.prototype.init_block = function init_block(elem, dataItems)
{
    elem.html($('#'+elem.attr('data-init')).tmpl(dataItems));
};

ObjPackageAddRegistry.prototype.panel_calculate_count = function panel_calculate_count(panel_num, elem, prev_to)
{

    if(panel_num === 2)
    {
        for (var i=0; i<elem.length; i++)
        {
            var tmp_1 = elem.eq(i).find('input');

            var tmp_2 = elem.eq(i).closest(prev_to).find('.panel_content .panel_header > .panel3_table');

            for (var j=0; j<tmp_1.length; j++)
            {
                if(tmp_1.eq(j).hasClass('p_count'))
                {
                    tmp_1.eq(j).val(i+1);
                }else{
                    var name = tmp_1.eq(j).attr('data-group') + '['+i+']' + tmp_1.eq(j).attr('data-name');
                    tmp_1.eq(j).attr('name',name);
                }
            }

            for (var j=0; j<tmp_2.length; j++)
            {
                var tmp_3 = tmp_2.eq(j).find('input, select');
                for(var k=0; k<tmp_3.length; k++)
                {
                    if (tmp_3.eq(k).hasClass('p_count'))
                    {
                        tmp_3.eq(j).val(j+1);
                    }else{
                        var name = tmp_3.eq(k).attr('data-group') + '['+i+']' + tmp_3.eq(k).attr('data-subgroup')  + '['+j+']' + tmp_3.eq(k).attr('data-name');
                        tmp_3.eq(k).attr('name',name);
                    }
                }
            }
        }
    }

    if(panel_num === 3)
    {
        for (var i=0; i<elem.length; i++)
        {
            var tmp_1 = elem.eq(i).find('.panel_3 .panel_header > .panel3_table');
            for (var j=0; j<tmp_1.length; j++)
            {
                var tmp_2 = tmp_1.eq(j).find('input, select');
                for(var k=0; k<tmp_2.length; k++)
                {
                    if (tmp_2.eq(k).hasClass('p_count'))
                    {
                        tmp_2.eq(k).val(j+1);
                    }else{
                        var tmp_3 = tmp_2.eq(k);
                        var name = tmp_3.attr('data-group') + '['+i+']' + tmp_3.attr('data-subgroup')  + '['+j+']' + tmp_3.attr('data-name');
                        tmp_3.attr('name',name);
                    }
                }
            }
        }
    }
};


/*=======  Public events functions  =======*/
ObjPackageAddRegistry.prototype.jsOnChange_checkbox_1 = function jsOnChange_checkbox_1()
{
    var tmp = $(this).closest('td').find('input[type="text"]');
    if (this.checked)
    {
        tmp.trigger('focusin');
        tmp.val('');
        tmp.attr('disabled','');
        if(tmp.hasClass('no_valid'))
        {
            tmp.removeClass('no_valid');
        }
    }else{
        tmp.removeAttr('disabled');
    }
    return true;
};

ObjPackageAddRegistry.prototype.jsOnChange_checkbox_2 = function jsOnChange_checkbox_2()
{
    var tmp = $('.document_not_document');
    tmp.find('.change_document_not_document').removeClass('active');
    tmp.find('.change_document_not_document').eq(tmp.find('input[name="cont_type"]:checked').val()).addClass('active');
    tmp.find('.change_document_not_document').find('[data-validation]').attr('disabled','');
    tmp.find('.change_document_not_document').find('[data-validation]').removeClass('no_valid');
    tmp.find('.change_document_not_document.active').find('[data-validation]').removeAttr('disabled');
};

//Panel 1
ObjPackageAddRegistry.prototype.jsOnClick_p1_btn_save = function jsOnClick_btn_save()
{
    var tmp = $(this).closest('.panel_1');
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
            tmp.find('.panel_header .panel_name .code').html(tmp.find('.panel_content input.code').val());
            tmp.find('.panel_header .panel_name .name').html(tmp.find('.panel_content input.name').val());
            tmp.find('.panel_header .panel_name .country').html(tmp.find('.panel_content input.country').val());
            tmp.find('.panel_header .panel_name .addr').html(tmp.find('.panel_content input.addr').val());
            tmp.find('.panel_header .panel_name span.details').show();
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
            tmp.find('.panel_header .panel_name span.details').hide();
        });
    }
    return true;
};

ObjPackageAddRegistry.prototype.jsOnClick_p1_btn_close = function jsOnClick_btn_close()
{
    var tmp = $(this).closest('td').find('.panel_1');
    if(tmp.length > 1)
    {
        $(this).closest('.panel_1').hide(300, function()
        {
            var t_tmp = $(this).closest('td').find('.panel_1').length -1;
            if(t_tmp === 1)
            {
                $('.panel_1_rec_create').show(300);
                $('.panel_1_send_create').show(300);
            }

            $(this).remove();
            PackageAddRegistry.panel_count(tmp.find('.panel_header .p_count'));
            return true;
        });
    }
    return true;
};

ObjPackageAddRegistry.prototype.jsOnClick_p1_btn_create = function jsOnClick_btn_create()
{

    if($(this).parent().attr('class') === 'panel_1_send_create')
    {
        if($('.panel_1_rec_create').is(':visible'))
        {
            $('.panel_1_rec_create').hide(300);
        }
        var tmpl = $('#tmpl_send_p1').tmpl(PackageAddRegistry.dataItems_sender_p1);
    }

    if($(this).parent().attr('class') === 'panel_1_rec_create')
    {
        if($('.panel_1_send_create').is(':visible'))
        {
            $('.panel_1_send_create').hide(300);
        }
        var tmpl = $('#tmpl_rec_p1').tmpl(PackageAddRegistry.dataItems_recipient_p1);
    }

    var panel_1 = $(this).closest('td').find('.panel_1').last();

    panel_1.filter('.active').find('.person_save').trigger('click');

    panel_1.after(tmpl);

    var panel_1_new = panel_1.next();

    panel_1_new.animate({height: 'hide'}, 0, function()
    {
        $(this).animate({height: 'show'}, 200);
    });

    jsAsync.onEvent('click', panel_1_new.find('.panel_show-hide'), PackageAddRegistry.jsOnClick_p1_btn_save);
    jsAsync.onEvent('click', panel_1_new.find('.person_save'), PackageAddRegistry.jsOnClick_p1_btn_save);
    jsAsync.onEvent('click', panel_1_new.find('.panel_close'), PackageAddRegistry.jsOnClick_p1_btn_close);

    var field_text = panel_1_new.find('.jsOnFocusout, .jsOnChange_input');
    for(var i=0; i<field_text.length; i++)
    {

        if(!field_text.eq(i).hasClass('jsOnChange_input')){
            field_text.eq(i).wrap('<div style="position:relative; z-index: 0;"></div>');
            var t = field_text.eq(i).parent().next('.isOnClick_ajax');
            if(t.length === 1)
            {
                field_text.eq(i).after(t);
            }
        }

        field_text.eq(i).css({
            'width':(field_text.eq(i).outerWidth() -2)+'px'
        });
    }

    jsAsync.onEvent('focusin', panel_1_new.find('.jsOnFocusin'), jsAsync.jsOnFocusin);
    jsAsync.onEvent('focusout', panel_1_new.find('.jsOnFocusout'), jsAsync.jsOnFocusout);
    jsAsync.onEvent('keyup', panel_1_new.find('.jsOnKeyup'), jsAsync.jsOnKeyup);

    jsAsync.onEvent('click', panel_1_new.find('.jsOnChange_input'), jsAsync.jsOnChange_input);
    jsAsync.onEvent('click', panel_1_new.find('.isOnClick_ajax'), jsAsync.isOnClick_ajax);

    if (jsAsync.exist(panel_1_new.find('input[data-validation]')))
    {
        jsAsync.ValidationInit(panel_1_new.find('input[data-validation]'));
        jsAsync.onEvent('keyup change', $('input[data-validation]'), jsAsync.jsValidation);
    }

    PackageAddRegistry.panel_count($(this).closest('td').find('.panel_1 .panel_header .p_count'));

    return true;
};

ObjPackageAddRegistry.prototype.panel_count = function panel_count(elem)
{
    for (var i=0; i<elem.length; i++)
    {
        elem.eq(i).html(i+1);
    }
};

//Panel 2
ObjPackageAddRegistry.prototype.jsOnClick_p2_btn_save = function jsOnClick_p2_btn_save()
{
    var tmp = $(this).closest('.panel_2');
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

ObjPackageAddRegistry.prototype.jsOnClick_p2_btn_close = function jsOnClick_p2_btn_close()
{
    var tmp_1 = $(this).closest('.block_width_50');
    var tmp_2 = tmp_1.find('.panel_2');
    if(tmp_2.length > 1)
    {
        $('input[name="pack_cont_pl_count_nd"]').val( 1*$('input[name="pack_cont_pl_count_nd"]').val()-1 );
        $(this).closest('.panel_2').hide(300, function()
        {
            $(this).remove();
            PackageAddRegistry.panel_calculate_count(2, tmp_1.find('.panel_2 .panel_header > .panel2_table'), '.panel_2');
            return true;
        });
    }
    return true;
};

ObjPackageAddRegistry.prototype.jsOnClick_p2_btn_create = function jsOnClick_p2_btn_create()
{

    var tmpl = $('#tmpl_panel_2').tmpl(PackageAddRegistry.dataItems_panel2);
    var panel_2 = $(this).closest('.block_width_50').find('.panel_2').last();

    panel_2.filter('.active').find('.panel_show-hide').trigger('click');

    panel_2.after(tmpl);

    var panel_2_new = panel_2.next();

    panel_2_new.animate({height: 'hide'}, 0, function()
    {
        $(this).animate({height: 'show'}, 200);
    });

    jsAsync.onEvent('click', panel_2_new.find('.panel_show-hide.p2'), PackageAddRegistry.jsOnClick_p2_btn_save);
    jsAsync.onEvent('click', panel_2_new.find('.panel_close.p2'), PackageAddRegistry.jsOnClick_p2_btn_close);

    PackageAddRegistry.init_block(panel_2_new.find('div[data-init="tmpl_panel_3"]'), null);

    jsAsync.onEvent('click', panel_2_new.find('.panel_3 .panel_close.p3'), PackageAddRegistry.jsOnClick_p3_btn_close);
    jsAsync.onEvent('click', panel_2_new.find('.panel_3_create input[name="panel_3_create"]'), PackageAddRegistry.jsOnClick_p3_btn_create);

    if (jsAsync.exist(panel_2_new.find('input[data-validation]')))
    {
        jsAsync.ValidationInit(panel_2_new.find('input[data-validation]'));
        jsAsync.onEvent('keyup change', $('input[data-validation]'), jsAsync.jsValidation);
    }

    PackageAddRegistry.panel_calculate_count(2,$(this).closest('.block_width_50').find('.panel_2 .panel_header > .panel2_table'),'.panel_2');

    $('input[name="pack_cont_pl_count_nd"]').val( 1*$('input[name="pack_cont_pl_count_nd"]').val()+1 );

    return true;
};

//Panel 3
ObjPackageAddRegistry.prototype.jsOnClick_p3_btn_close = function jsOnClick_p3_btn_close()
{
    var tmp_1 = $(this).closest('.panel_content');
    var tmp_2 = tmp_1.find('.panel_3');
    if(tmp_2.length > 1)
    {
        $(this).closest('.panel_3').hide(300, function()
        {
            $(this).remove();
            PackageAddRegistry.panel_calculate_count(3, tmp_1.closest('.block_width_50').find('.panel_2 > .panel_content'), '.panel_2');
            return true;
        });
    }
    return true;
};

ObjPackageAddRegistry.prototype.jsOnClick_p3_btn_create = function jsOnClick_p3_btn_create()
{
    var tmpl = $('#tmpl_panel_3').tmpl(PackageAddRegistry.dataItems_p3);
    var panel_3 = $(this).closest('.panel_content').find('.panel_3').last();

    panel_3.filter('.active').find('.panel_show-hide').trigger('click');

    panel_3.after(tmpl);

    var panel_3_new = panel_3.next();

    panel_3_new.animate({height: 'hide'}, 0, function()
    {
        $(this).animate({height: 'show'}, 200);
    });

    jsAsync.onEvent('click', panel_3_new.find('.panel_close.p3'), PackageAddRegistry.jsOnClick_p3_btn_close);

    if (jsAsync.exist(panel_3_new.find('input[data-validation]')))
    {
        jsAsync.ValidationInit(panel_3_new.find('input[data-validation]'));
        jsAsync.onEvent('keyup change', $('input[data-validation]'), jsAsync.jsValidation);
    }

    PackageAddRegistry.panel_calculate_count(3, $(this).closest('.block_width_50').find('.panel_2 > .panel_content'), '.panel_2');

    return true;
};

var PackageAddRegistry = new ObjPackageAddRegistry();

$(function(){
    PackageAddRegistry.init();
});