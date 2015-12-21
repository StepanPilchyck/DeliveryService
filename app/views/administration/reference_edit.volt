{% extends "partials/base.html.volt" %}

{% block html_head %}
{% endblock %}

{% block title %}Preview all role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Редактирование глобальных настроек</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td>
            <ul class="nav nav-tabs">
                <li class="{% if reference == 'countries' %}active{% endif %}"><a href="#countries" data-toggle="tab">Страны</a></li>
                <li class="{% if reference == 'currency' %}active{% endif %}"><a href="#currency" data-toggle="tab">Валюта</a></li>
                <li class="{% if reference == 'units' %}active{% endif %}"><a href="#units" data-toggle="tab">Единицы измерения</a></li>
                <li class="{% if reference == 'languages' %}active{% endif %}"><a href="#languages" data-toggle="tab">Язык</a></li>
                <li class="{% if reference == 'packages_status' %}active{% endif %}"><a href="#packages_status" data-toggle="tab">Статусы посылок</a></li>
                <li class="{% if reference == 'stations_status' %}active{% endif %}"><a href="#stations_status" data-toggle="tab">Типы станций</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane {% if reference == 'countries' %}in active{% else %}fade{% endif %}" id="countries">
                    <br>
                    <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="reference" value="countries">
                    <div class="panel_0">
                        <div class="panel_content">
                            <div class="block_width_100">
                                <table width="100%">
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_100">
                                                <input type="text" name="add" placeholder="Назване страны" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <input type="submit" name="submit" value="Добавить">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="hr">
                                        <td colspan="2" align="center">
                                            <center><hr></center>
                                        </td>
                                    </tr>
                                    
                                    {% for item in CountriesAll %}
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_100">
                                                <input type="text" name="edit[{{ item['id'] }}]" placeholder="Назване страны" value="{{ item['name'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить стану <b>{{ item['name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', 'countries', '{{ item['id'] }}');">
                                                    Удалить
                                                </a>
                                                <span>(
                                                    <a href="#" title="Колличество связей с Посылками">{{ item['from_package'] }}</a>,
                                                    <a href="#" title="Колличество связей с Историей посылок">{{ item['from_package_edit'] }}</a>, 
                                                    <a href="#" title="Колличество связей с Списком станций">{{ item['from_stations_list'] }}</a>
                                                )</span>
                                            </div>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                    
                                </table>
                            </div>
                            
                            <div class="block_width_100">
                                <input type="submit" name="submit" value="Сохранить">
                            </div>
                        </div><!--.panel_content-->
                
                        <div class="panel_bottom"></div><!--.panel_bottom-->
                
                    </div>
                    
                    </form>
                </div><!-- #countries -->
                
                <div class="tab-pane {% if reference == 'currency' %}in active{% else %}fade{% endif %}" id="currency">
                <br>
                    <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="reference" value="currency">
                    <div class="panel_0">
                        <div class="panel_content">
                            <div class="block_width_100">
                                <table width="100%">
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_75">
                                                <input type="text" name="add[name]" placeholder="Полное название" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                            <div class="block_width_25">
                                                <input type="text" name="add[short_name]" placeholder="Сокращённое название" value="" class="jsOnKeyup" maxlength="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <input type="submit" name="submit" value="Добавить">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="hr">
                                        <td colspan="2" align="center">
                                            <center><hr></center>
                                        </td>
                                    </tr>
                                    
                                    {% for item in CurrencyAll %}
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_75">
                                                <input type="text" name="edit[{{ item['id'] }}][name]" title="Полное название" placeholder="Полное название" value="{{ item['full_name'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                            <div class="block_width_25">
                                                <input type="text" name="edit[{{ item['id'] }}][short_name]" title="Сокращённое название" placeholder="Короткое название" value="{{ item['short_name'] }}" class="jsOnKeyup showtext" maxlength="5">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить валюту <b>{{ item['full_name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', 'currency', '{{ item['id'] }}');"">
                                                    Удалить
                                                </a>
                                                <span>(
                                                    <a href="#" title="Колличество связей с Посылками">{{ item['from_package_contents'] }}</a>,
                                                    <a href="#" title="Колличество связей с Историей посылок">{{ item['from_package_contents_edit'] }}</a>, 
                                                    <a href="#" title="Колличество связей с Пользователями">{{ item['from_users'] }}</a>
                                                )</span>
                                            </div>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                    
                                </table>
                            </div>
                            
                            <div class="block_width_100">
                                <input type="submit" name="submit" value="Сохранить">
                            </div>
                        </div><!--.panel_content-->
                
                        <div class="panel_bottom"></div><!--.panel_bottom-->
                
                    </div>
                    </form>
                </div><!-- #currency -->
                
                <div class="tab-pane {% if reference == 'units' %}in active{% else %}fade{% endif %}" id="units">
                    <br>
                    <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="reference" value="units">
                    <div class="panel_0">
                        <div class="panel_content">
                            <div class="block_width_100">
                                <table width="100%">
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_50">
                                                <input type="text" name="add[name]" placeholder="Полное название" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                            <div class="block_width_25">
                                                <input type="text" name="add[short_name]" placeholder="Сокращённое название" value="" class="jsOnKeyup" maxlength="5">
                                            </div>
                                            <div class="block_width_25">
                                                
                                                <div class="input-select">
                                                    <input name="add[type_id]" value="{{ UnitsAll['types'][0]['id'] }}" type="hidden">
                                                    <input type="text" placeholder="Тип" value="{{ UnitsAll['types'][0]['name'] }}" class="jsOnChange_input animation_off showtext" readonly="readonly" autocomplete="off">
                                                    <div class="list-select">
                                                        {% for item in UnitsAll['types'] %}
                                                        <div class="item" data-id="{{ item['id'] }}" data-name="{{ item['name'] }}">
                                                            <span>{{ item['name'] }}</span>
                                                        </div>
                                                        {% endfor %}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <input type="submit" name="submit" value="Добавить">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="hr">
                                        <td colspan="2" align="center">
                                            <center><hr></center>
                                        </td>
                                    </tr>
                                    
                                    {% for item_unit in UnitsAll['units'] %}
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_50">
                                                <input type="text" name="edit[{{ item_unit['id'] }}][name]" placeholder="Полное название" value="{{ item_unit['name'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                            <div class="block_width_25">
                                                <input type="text" name="edit[{{ item_unit['id'] }}][short_name]" placeholder="Сокращённое название" value="{{ item_unit['short_name'] }}" class="jsOnKeyup showtext" maxlength="5">
                                            </div>
                                            <div class="block_width_25">
                                                
                                                <div class="input-select">
                                                    <input name="edit[{{ item_unit['id'] }}][type_id]" value="{{ item_unit['unit_type_id'] }}" type="hidden">
                                                    <input type="text" placeholder="Тип" value="{{ item_unit['type_name'] }}" class="jsOnChange_input animation_off showtext" readonly="readonly" autocomplete="off">
                                                    <div class="list-select">
                                                        {% for item_type in UnitsAll['types'] %}
                                                        <div class="item" data-id="{{ item_type['id'] }}" data-name="{{ item_type['name'] }}">
                                                            <span>{{ item_type['name'] }}</span>
                                                        </div>
                                                        {% endfor %}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <a href="/{{ item_unit['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить стану <b>{{ item_unit['name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', 'units', '{{ item_unit['id'] }}');">
                                                    Удалить
                                                </a>
                                                <span>(
                                                    <a href="#" title="Колличество связей с Вложениями посылок">{{ item_unit['from_package_contents_place'] }}</a>,
                                                    <a href="#" title="Колличество связей с Вложениями посылок">{{ item_unit['from_package_contents_place_attachment'] }}</a>,
                                                    <a href="#" title="Колличество связей с Историей вложений посылок">{{ item_unit['from_package_contents_place_edit'] }}</a>, 
                                                    <a href="#" title="Колличество связей с Историей вложений посылок">{{ item_unit['from_package_contents_place_attachment_edit'] }}</a>, 
                                                    <a href="#" title="Колличество связей с Пользователями">{{ item_unit['from_users'] }}</a>
                                                )</span>
                                            </div>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                    
                                </table>
                            </div>
                            
                            <div class="block_width_100">
                                <input type="submit" name="submit" value="Сохранить">
                            </div>
                        </div><!--.panel_content-->
                
                        <div class="panel_bottom"></div><!--.panel_bottom-->
                
                    </div>
                    </form>
                </div><!-- #units -->
                
                <div class="tab-pane {% if reference == 'languages' %}in active{% else %}fade{% endif %}" id="languages">
                    <br>
                    <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="reference" value="languages">
                    <div class="panel_0">
                        <div class="panel_content">
                            <div class="block_width_100">
                                <table width="100%">
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_75">
                                                <input type="text" name="add[name]" placeholder="Полное название" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                            <div class="block_width_25">
                                                <input type="text" name="add[short_name]" placeholder="Сокращенное название" value="" class="jsOnKeyup" maxlength="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <input type="submit" name="submit" value="Добавить">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="hr">
                                        <td colspan="2" align="center">
                                            <center><hr></center>
                                        </td>
                                    </tr>
                                    
                                    {% for item in LanguagesAll %}
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_75">
                                                <input type="text" name="edit[{{ item['id'] }}][name]" placeholder="Полное название" value="{{ item['name'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                            <div class="block_width_25">
                                                <input type="text" name="edit[{{ item['id'] }}][short_name]" placeholder="Сокращенное название" value="{{ item['short_name'] }}" class="jsOnKeyup showtext" maxlength="2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить запись <b>{{ item['name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', 'languages', '{{ item['id'] }}');">
                                                    Удалить
                                                </a>
                                                <span>(
                                                    <a href="#" title="Колличество связей с Пользователями">{{ item['from_users'] }}</a>
                                                )</span>
                                            </div>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                    
                                </table>
                            </div>
                            
                            <div class="block_width_100">
                                <input type="submit" name="submit" value="Сохранить">
                            </div>
                        </div><!--.panel_content-->
                
                        <div class="panel_bottom"></div><!--.panel_bottom-->
                
                    </div>
                    </form>
                </div><!-- #languages -->
                
                <div class="tab-pane {% if reference == 'packages_status' %}in active{% else %}fade{% endif %}" id="packages_status">
                    <br>
                    <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="reference" value="packages_status">
                    <div class="panel_0">
                        <div class="panel_content">
                            <div class="block_width_100">
                                <table width="100%">
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_25">
                                                <input type="text" name="add[name]" placeholder="Название статуса" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                            <div class="block_width_75">
                                                <input type="text" name="add[description]" placeholder="Описание статуса" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <input type="submit" name="submit" value="Добавить">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="hr">
                                        <td colspan="2" align="center">
                                            <center><hr></center>
                                        </td>
                                    </tr>
                                    
                                    {% for item in PackageStatusAll %}
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_25">
                                                <input type="text" name="edit[{{ item['id'] }}][name]" placeholder="Название статуса" value="{{ item['name'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                            <div class="block_width_75">
                                                <input type="text" name="edit[{{ item['id'] }}][description]" placeholder="Описание статуса" value="{{ item['description'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить запись <b>{{ item['name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', 'packages_status', '{{ item['id'] }}');">
                                                    Удалить
                                                </a>
                                                <span>(
                                                    <a href="#" title="Колличество связей с Транспортом посылок">{{ item['from_package_transport_history'] }}</a>
                                                )</span>
                                            </div>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                    
                                </table>
                            </div>
                            
                            <div class="block_width_100">
                                <input type="submit" name="submit" value="Сохранить">
                            </div>
                        </div><!--.panel_content-->
                
                        <div class="panel_bottom"></div><!--.panel_bottom-->
                
                    </div>
                    </form>
                </div><!-- #packages_status -->
                
                <div class="tab-pane {% if reference == 'stations_status' %}in active{% else %}fade{% endif %}" id="stations_status">
                <br>
                    <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="reference" value="stations_status">
                    <div class="panel_0">
                        <div class="panel_content">
                            <div class="block_width_100">
                                <table width="100%">
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_25">
                                                <input type="text" name="add[name]" placeholder="Название статуса" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                            <div class="block_width_75">
                                                <input type="text" name="add[description]" placeholder="Описание статуса" value="" class="jsOnKeyup" maxlength="255">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <input type="submit" name="submit" value="Добавить">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr class="hr">
                                        <td colspan="2" align="center">
                                            <center><hr></center>
                                        </td>
                                    </tr>
                                    
                                    {% for item in StationsStatusAll %}
                                    <tr>
                                        <td width="100%">
                                            <div class="block_width_25">
                                                <input type="text" name="edit[{{ item['id'] }}][name]" placeholder="Название статуса" value="{{ item['name'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                            <div class="block_width_75">
                                                <input type="text" name="edit[{{ item['id'] }}][description]" placeholder="Описание статуса" value="{{ item['description'] }}" class="jsOnKeyup showtext" maxlength="255">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="block_width_100">
                                                <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить запись <b>{{ item['name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', 'stations_status', '{{ item['id'] }}');">
                                                    Удалить
                                                </a>
                                                <span>(
                                                    <a href="#" title="Колличество связей со Станциями">{{ item['from_stations_list'] }}</a>
                                                )</span>
                                            </div>
                                        </td>
                                    </tr>
                                    {% endfor %}
                                    
                                </table>
                            </div>
                            
                            <div class="block_width_100">
                                <input type="submit" name="submit" value="Сохранить">
                            </div>
                        </div><!--.panel_content-->
                
                        <div class="panel_bottom"></div><!--.panel_bottom-->
                
                    </div>
                    </form>
                </div><!-- #stations_status -->
                
            </div>
        </td>
    </tr>
</tbody>
</table>

{% endblock %}