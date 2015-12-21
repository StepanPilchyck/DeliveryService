{% extends "partials/base.html.volt" %}

{% block html_head %}
{% endblock %}

{% block title %}Person add{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Добавление новой записи в адресную книгу</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<form method="post" enctype="multipart/form-data" action="/administration/person/preview-cache-station">
<input type="hidden" name="add" value="new">

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Новая запись</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    
                    <div class="block_width_50">
                        <p class="font_style_1">Код адресной книги:</p>
                        <div class="block_width_100">
                            <input type="text" name="code" placeholder="Код" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <input type="text" name="phone" placeholder="Телефон" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                    </div>
                    
                    <div class="block_width_50">
                        <p class="font_style_1">Полные Ф.И.О.:</p>
                        <div class="block_width_100">
                            <input type="text" name="full_name" placeholder="ФИО" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="country_id" value="" type="hidden">
                                <input type="text" placeholder="Страна" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item in CountriesAll %}
                                    <div class="item" data-id="{{ item['id'] }}" data-name="{{ item['name'] }}">
                                        <span>{{ item['name'] }}</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="block_width_100">
                        <p class="font_style_1">Полный адрес:</p>
                        <div class="block_width_100">
                            <input type="text" name="address" placeholder="Адрес" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                    </div><!--.block_width_100-->
                    
                    
                    
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