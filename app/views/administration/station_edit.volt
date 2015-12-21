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
    <span>Редактирование станции</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<form method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{ Station['id'] }}">

{% if Station is defined %}

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Изменение станции</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    
                    <div class="block_width_50">
                        <div class="block_width_100">
                            <input type="text" name="name" placeholder="Название" value="{{ Station['name'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="name_en" placeholder="Назв. (en)" value="{{ Station['name_en'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="code" placeholder="Код" value="{{ Station['code'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="address" placeholder="Адрес" value="{{ Station['address'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="address_en" placeholder="Адр. (en)" value="{{ Station['address_en'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="country_id" value="{{ Station['country_id'] }}" type="hidden">
                                <input type="text" placeholder="Страна" value="{{ Station['country_name'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
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
                                <input name="station_status_id" value="{{ Station['station_status_id'] }}" type="hidden">
                                <input type="text" placeholder="Статус" value="{{ Station['station_status_name'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
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
                            <input type="text" name="l" placeholder="Долгота" value="{{ Station['l'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="w" placeholder="Широта" value="{{ Station['w'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <input type="checkbox" name="airport_0" id="airport_0" class="trigger" {% if Station['airport'] %} checked {% endif %}>
                            <label for="airport_0">Наличие аэропорта</label>
                            <div class="clear_float"></div>
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="airport" placeholder="Аэропорт" value="{{ Station['airport'] }}" class="jsOnKeyup animation_off">
                        </div>
                        
                        <div class="block_width_100">
                            <input type="checkbox" name="branch_office_0" id="branch_office_0" class="trigger" {% if Station['branch_office'] %} checked {% endif %}>
                            <label for="branch_office_0">Станция - филиал</label>
                            <div class="clear_float"></div>
                        </div>
                        
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="branch_office" value="{{ Station['branch_office'] }}" type="hidden">
                                <input type="text" placeholder="Станция" value="{{ Station['branch_office_name'] }}" class="jsOnChange_input animation_off" readonly="readonly" autocomplete="off">
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
                            <input type="text" name="ttl_persons_cache" placeholder="Кэш" value="{{ Station['ttl_persons_cache'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                    </div>
                    <div class="block_width_100">
                        <p><span class="font_style_1">Дата регистрации станции:</span> <span class="font_style_3">{{ Station['date_on_add'] }}</span></p>
                        <p><span class="font_style_1">Дата последних изменений:</span> <span class="font_style_3">{{ Station['date_on_last_edit'] }}</span></p>
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

{% endif %}


{% if StationsAll is defined %}

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td width="100%">
            <div class="input-select">
                <input name="station_id" value="" type="hidden">
                <input placeholder="Станции" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off" type="text">
                <div class="list-select">
                    {% for item in StationsAll %}
                    <div class="item" data-id="{{ item['id'] }}" data-name=" {{ item['name'] }} ({{ item['country_name'] }}) ">
                        <span> {{ item['name'] }} ({{ item['country_name'] }}) </span>
                    </div>
                    {% endfor %}
                </div>
            </div>
        </td>
        <td>
            <input type="submit" name="submit" value="Перейти">
        </td>
    </tr>
</tbody>
</table>

{% endif %}

</form>


{% endblock %}