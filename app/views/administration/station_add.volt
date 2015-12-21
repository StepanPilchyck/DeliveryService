{% extends "partials/base.html.volt" %}

{% block html_head %}
<script type="text/javascript">
$(function(){
    var t = $('#airport_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $('input[name="airport"]').removeAttr('disabled','');
        }else{
            $('input[name="airport"]').val('');
            $('input[name="airport"]').attr('disabled','');
        }
    });
    t.trigger('change');
    
    var t = $('#branch_office_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $('input[name="branch_office"]').removeAttr('disabled','');
            $('input[name="branch_office"]').parent().find('.jsOnChange_input').removeAttr('disabled','');
        }else{
            $('input[name="branch_office"]').val('');
            $('input[name="branch_office"]').attr('disabled','');
            $('input[name="branch_office"]').parent().find('.jsOnChange_input').val('');
            $('input[name="branch_office"]').parent().find('.jsOnChange_input').attr('disabled','');
        }
    });
    t.trigger('change');
});
</script>
{% endblock %}

{% block title %}Preview all role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Создание станции</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<form method="post" enctype="multipart/form-data" action="/administration/station/preview">
<input type="hidden" name="add" value="new">

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Новая станция</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <div class="block_width_50">
                        <div class="block_width_100">
                            <input type="text" name="name" placeholder="Название" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="name_en" placeholder="Назв. (en)" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="code" placeholder="Код" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="address" placeholder="Адрес" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="address_en" placeholder="Адр. (en)" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="country_id" value="" type="hidden">
                                <input type="text" placeholder="Страна" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_country in CountriesAll %}
                                    <div class="item" data-id="{{ item_country['id'] }}" data-name="{{ item_country['name'] }}">
                                        <span>{{ item_country['name'] }}</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="station_status_id" value="" type="hidden">
                                <input type="text" placeholder="Статус" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_status in StationsStatusAll %}
                                    <div class="item" data-id="{{ item_status['id'] }}" data-name="{{ item_status['name'] }}">
                                        <span>{{ item_status['name'] }}</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="block_width_50">
                        
                        <div class="block_width_50">
                            <input type="text" name="l" placeholder="Долгота" value="0" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="w" placeholder="Широта" value="0" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <input type="checkbox" name="airport_0" id="airport_0" class="trigger">
                            <label for="airport_0">Наличие аэропорта</label>
                            <div class="clear_float"></div>
                        </div>
                        
                        <div class="block_width_100">
                            <input type="text" name="airport" placeholder="Аэропорт" value="" class="jsOnKeyup animation_off">
                        </div>
                        
                        <div class="block_width_100">
                            <input type="checkbox" name="branch_office_0" id="branch_office_0" class="trigger">
                            <label for="branch_office_0">Станция - филиал</label>
                            <div class="clear_float"></div>
                        </div>
                        
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="branch_office" value="" type="hidden">
                                <input type="text" placeholder="Станция" value="" class="jsOnChange_input animation_off" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_station in Stations %}
                                    <div class="item" data-id="{{ item_station['id'] }}" data-name="{{ item_station['name'] }}">
                                        <span>{{ item_station['name'] }}</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        
                        <div class="block_width_100">
                            <p><span class="font_style_1">Время хранение кэша адресной книги (в днях):</span></p>
                        </div>
                        
                        <div class="block_width_100">
                            <input type="text" name="ttl_persons_cache" placeholder="Кэш" value="7" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                    </div>
                    
                    <div class="block_width_100">
                        <p><span class="font_style_1">Дата регистрации станции:</span> <span class="font_style_3"></span></p>
                        <p><span class="font_style_1">Дата последних изменений:</span> <span class="font_style_3"></span></p>
                    </div>
                        
                    
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
    <tr>
        <td>
            <div class="block_width_100">
                <input type="submit" name="submit" value="Сохранить">
            </div>
        </td>
    </tr>
</tbody>
</table>

</form>


{% endblock %}