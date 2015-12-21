{% extends "partials/base.html.volt" %}


{% block title %}Searching packages{% endblock %}


{% block content_right_column %}



<div class="page_name">
    <span>Поиск посылок</span>
</div>

{% for item in messages %}
    
    <div class="alert {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<!--textarea style="height: 620px;">
<?php print_r($result_search); ?>
</textarea><!-- -->

<form method="get" enctype="multipart/form-data" action="">
    
<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 {% if !post['submit'] %} active {% endif %}">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Параметры поиска</span>
                    </div>
                    <div class="panel_show-hide">&nbsp</div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <div class="block_width_75">
                        <p class="font_style_3">Фильтр по параметрам посылок.</p>
                        <div class="block_width_100">
                            
                            <div class="block_width_100">
                                <p class="font_style_2">Поиск по ДТД:</p>
                                <input type="text" name="package[htd]" placeholder="ДТД" value="{% if post['package']['htd'] %}{{ post['package']['htd'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <p class="font_style_2">Дата приёма сотрудником ICS:</p>
                            <div class="block_width_50">
                                <input type="text" name="package[date_on_reception_to]" placeholder="Дата с" value="{% if post['package']['date_on_reception_to'] %}{{ post['package']['date_on_reception_to'] }}{% endif %}" class="jsOnKeyup jsOnClick_date showtext animation_off" readonly="true">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="package[date_on_reception_do]" placeholder="Дата по" value="{% if post['package']['date_on_reception_do'] %}{{ post['package']['date_on_reception_do'] }}{% endif %}" class="jsOnKeyup jsOnClick_date showtext animation_off" readonly="true">
                            </div>
                            
                            <p class="font_style_2">Стоимость посылки:</p>
                            <div class="block_width_50">
                                <input type="text" name="package[content_price_to]" placeholder="С" value="{% if post['package']['content_price_to'] %}{{ post['package']['content_price_to'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            <div class="block_width_50">
                                <input type="text" name="package[content_price_do]" placeholder="По" value="{% if post['package']['content_price_do'] %}{{ post['package']['content_price_do'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_50">
                                <p class="font_style_2">Станция:</p>
                                
                                <div class="input-select">
                                    <input type="hidden" value="{% if post['package']['station_id'] %}{{ post['package']['station_id'] }}{% endif %}" name="package[station_id]">
                                    <input type="text" placeholder="Станция" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        {% for station in StationsAll %}
                                        <div class="item" data-id="{{ station['id'] }}" data-name="{{ station['name'] }}">
                                            <span>{{ station['name'] }}</span>
                                        </div>
                                        {% endfor %}
                                    </div>
                                </div>
                                
                            </div>
                            <div class="block_width_50">
                                <p class="font_style_2">Статус:</p>
                                <div class="input-select">
                                    <input type="hidden" value="{% if post['package']['statys_id'] %}{{ post['package']['statys_id'] }}{% endif %}" name="package[statys_id]">
                                    <input type="text" placeholder="Статус" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        {% for pstatus in PackageStatusAll %}
                                        <div class="item" data-id="{{ pstatus['id'] }}" data-name="{{ pstatus['name'] }}">
                                            <span>{{ pstatus['name'] }}</span>
                                        </div>
                                        {% endfor %}
                                    </div>
                                </div>
                                
                            </div>
                            
                            <p class="font_style_2">Фильтр по посылкам.</p>
                            
                            <div class="block_width_50">
                                <input type="text" name="package[full_name]" placeholder="ФИО" value="{% if post['package']['full_name'] %}{{ post['package']['full_name'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_50">
                                <input type="text" name="package[phone]" placeholder="Телефон" value="{% if post['package']['phone'] %}{{ post['package']['phone'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_50">
                                
                                <div class="input-select">
                                    <input type="hidden" value="{% if post['package']['country_id'] %}{{ post['package']['country_id'] }}{% endif %}" name="package[country_id]">
                                    <input type="text" placeholder="Страна" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        {% for item in CountriesAll %}
                                        <div class="item" data-id="{{ item['id'] }}" data-name="{{ item['name'] }}">
                                            <span>{{ item['name'] }}</span>
                                        </div>
                                        {% endfor %}
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="block_width_50">
                                <input type="text" name="package[full_address]" placeholder="Адрес" value="{% if post['package']['full_address'] %}{{ post['package']['full_address'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                            </div>
                            
                            <div class="block_width_100">
                                <p class="font_style_2">Фильтр по типу посылки.</p>
                                <input type="radio" name="package[content_type]" value="NULL" {% if !post['package']['content_type'] OR post['package']['content_type'] == "NULL" %} checked {% endif %} id="content_type-2">
                                <label for="content_type-2">Все</label>
                                <input type="radio" name="package[content_type]" value="FALSE" {% if post['package']['content_type'] == "FALSE" %} checked {% endif %} id="content_type-0">
                                <label for="content_type-0">Не документ</label>
                                <input type="radio" name="package[content_type]" value="TRUE" {% if post['package']['content_type'] == "TRUE" %} checked {% endif %} id="content_type-1">
                                <label for="content_type-1">Документ</label>
                                <div class="float_clear">&nbsp;</div>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="block_width_25">
                        
                        <p class="font_style_3">Фильтр по адресной книге.</p>
                        <div class="block_width_100">
                            <p class="font_style_2">Данные отправителя и/или адресата:</p>
                            <input type="text" name="person[code]" placeholder="Код" value="{% if post['person']['code'] %}{{ post['person']['code'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Полные Ф.И.О.:</p>
                            <input type="text" name="person[full_name]" placeholder="ФИО" value="{% if post['person']['full_name'] %}{{ post['person']['full_name'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Номер телефона:</p>
                            <input type="text" name="person[phone]" placeholder="Телефон" value="{% if post['person']['phone'] %}{{ post['person']['phone'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Список стран:</p>
                            <div class="input-select">
                                    <input type="hidden" value="{% if post['person']['country_id'] %}{{ post['person']['country_id'] }}{% endif %}" name="person[country_id]">
                                    <input type="text" placeholder="Страна" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                    <div class="list-select">
                                        <div class="item" data-id="" data-name="">
                                            <span> &nbsp; </span>
                                        </div>
                                        {% for item in CountriesAll %}
                                        <div class="item" data-id="{{ item['id'] }}" data-name="{{ item['name'] }}">
                                            <span>{{ item['name'] }}</span>
                                        </div>
                                        {% endfor %}
                                    </div>
                                </div>
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Полный адрес:</p>
                            <input type="text" name="person[full_address]" placeholder="Адрес" value="{% if post['person']['full_address'] %}{{ post['person']['full_address'] }}{% endif %}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <div class="block_width_100">
                            <p class="font_style_2">Фильтр по типу отправитель и/или адресат.</p>
                            <input type="checkbox" name="person[status1]" value="1" {% if post['person']['status1'] %} checked {% endif %} id="person_status-0">
                            <label for="person_status-0">Отправитель</label>
                            <input type="checkbox" name="person[status2]" value="2" {% if post['person']['status2'] %} checked {% endif %} id="person_status-1">
                            <label for="person_status-1">Адресат</label>
                            <div class="float_clear">&nbsp;</div>
                        </div>
                        
                    </div>
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom">
                    <input type="submit" name="submit" value="Поиск">
                </div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
</tbody>
</table>

</form>

<table class="table table-list_grid_1" width="100%">
    <tbody>
        <tr>
            <th align="center"><span>ДТД</span></th>
            <th align="center"><span>Дата</span></th>
            <th align="center"><span>Комментарий</span></th>
            <th align="center"><span>Стр. отправителя</span></th>
            <th align="center"><span>ФИО отправителя</span></th>
            <th align="center"><span>Стр. получателя</span></th>
            <th align="center"><span>ФИО получателя</span></th>
            <th align="center"><span>К-во мест</span></th>
            <th align="center"><span>Общий вес</span></th>
            <th align="center"><span>Стоимость</span></th>
            <th align="center"><span>Валюта</span></th>
            <th align="center"><span>Состояние</span></th>
            <th align="center"><span>Станция</span></th>
            <th align="center"><span>Подробнее</span></th>
        </tr>

{% for item in result_search %}

        <tr>
            <td align="center"><span>{{ item['htd'] }}</span></td>
            <td align="center"><span>{{ item['date_on_add'] }}</span></td>
            <td align="center"><span>{{ item['comment'] }}</span></td>
            <td align="center"><span>{{ item['sender_county_name'] }}</span></td>
            <td align="center"><span>{{ item['sender_full_name'] }}</span></td>
            <td align="center"><span>{{ item['recipient_county_name'] }}</span></td>
            <td align="center"><span>{{ item['recipient_full_name'] }}</span></td>
            <td align="center"><span>{{ item['place_count'] }}</span></td>
            <td align="center"><span>{{ item['full_weight'] }}</span></td>
            <td align="center"><span>{{ item['content_price'] }}</span></td>
            <td align="center"><span>{{ item['short_name'] }}</span></td>
            <td align="center"><span>{{ item['status_name'] }}</span></td>
            <td align="center"><span>{{ item['station_name'] }}</span></td>
            <td align="center"><span>&nbsp;</span></td>
        </tr>
    
{% endfor %} 
    
    </tbody>
</table>

{% endblock %}