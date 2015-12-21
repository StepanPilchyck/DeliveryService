{% extends "partials/base.html.volt" %}

{% block html_head %}
<script type="text/javascript">
$(function(){
    var t = $('#blocked_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $(this).parent().find('label[for="blocked_0"] .true').show();
            $(this).parent().find('label[for="blocked_0"] .false').hide();
        }else{
            $(this).parent().find('label[for="blocked_0"] .true').hide();
            $(this).parent().find('label[for="blocked_0"] .false').show();
        }
    });
    t.trigger('change');
    var t = $('#date_on_delete_0');
    t.bind('change',function(){
        if(this.checked)
        {
            $(this).parent().find('label[for="date_on_delete_0"] .true').show();
            $(this).parent().find('label[for="date_on_delete_0"] .false').hide();
        }else{
            $(this).parent().find('label[for="date_on_delete_0"] .true').hide();
            $(this).parent().find('label[for="date_on_delete_0"] .false').show();
        }
    });
    t.trigger('change');
});
</script>
{% endblock %}

{% block title %}Preview all role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Редактирование профиля пользователя</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<form method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="{{ User['id'] }}">

{% if User is defined %}

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Изменение профиля</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    
                    <div class="block_width_50">
                        
                        <p class="font_style_1">Основные данные</p>
                        <div class="block_width_100">
                            <input type="text" name="last_name" placeholder="Фамилия" value="{{ User['last_name'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="first_name" placeholder="Имя" value="{{ User['first_name'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="middle_name" placeholder="Отчество" value="{{ User['middle_name'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="station_id" value="{{ User['station_id'] }}" type="hidden">
                                <input type="text" placeholder="Станция" value="{{ User['station_name'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_station in StationsAll %}
                                    <div class="item" data-id="{{ item_station['id'] }}" data-name="{{ item_station['name'] }}">
                                        <span>{{ item_station['name'] }}</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="role_id" value="{{ User['role_id'] }}" type="hidden">
                                <input type="text" placeholder="Роль" value="{{ User['role_name'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_role in RolesAll %}
                                    <div class="item" data-id="{{ item_role['id'] }}" data-name="{{ item_role['name'] }} ">
                                        <span>{{ item_role['name'] }} </span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        
                        <p class="font_style_1">Авторизационные данные</p>
                        <div class="block_width_50">
                            <input type="text" name="e_mail" placeholder="e-mail" value="{{ User['e_mail'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        <div class="block_width_50">
                            <input type="text" name="password" placeholder="Пароль" value="{{ User['password'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                        
                        <p class="font_style_1">Отмечен удалённым</p>
                        <div class="block_width_100">
                            <input type="checkbox" name="date_on_delete" id="date_on_delete_0" class="trigger" {% if User['date_on_delete'] %} checked {% endif %}>
                            <label for="date_on_delete_0">
                                <span class="false">Аккаунт в активеном состоянии</span>
                                <span class="true">Аккаунт не удалён, но помечен как удаленный</span>
                            </label>
                            <div class="clear_float"></div>
                        </div>
                        
                    </div><!--.block_width_50-->
                    
                    <div class="block_width_50">
                        
                        <p class="font_style_1">Единицы измерения</p>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="unit_id1" value="{{ User['unit_id1'] }}" type="hidden">
                                <input type="text" placeholder="Длина" value="{{ User['unit_name1'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_unit in Units1 %}
                                    <div class="item" data-id="{{ item_unit['id'] }}" data-name="{{ item_unit['short_name'] }} ({{ item_unit['name'] }})">
                                        <span>{{ item_unit['short_name'] }} ({{ item_unit['name'] }})</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="unit_id2" value="{{ User['unit_id2'] }}" type="hidden">
                                <input type="text" placeholder="Вес" value="{{ User['unit_name2'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_unit in Units2 %}
                                    <div class="item" data-id="{{ item_unit['id'] }}" data-name="{{ item_unit['short_name'] }} ({{ item_unit['name'] }})">
                                        <span>{{ item_unit['short_name'] }} ({{ item_unit['name'] }})</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        <div class="block_width_100">
                            <div class="input-select">
                                <input name="unit_id3" value="{{ User['unit_id3'] }}" type="hidden">
                                <input type="text" placeholder="Коллич." value="{{ User['unit_name3'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_unit in Units3 %}
                                    <div class="item" data-id="{{ item_unit['id'] }}" data-name="{{ item_unit['short_name'] }} ({{ item_unit['name'] }})">
                                        <span>{{ item_unit['short_name'] }} ({{ item_unit['name'] }})</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        
                        <p class="font_style_1">Системные настройки</p>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="language_id" value="{{ User['language_id'] }}" type="hidden">
                                <input type="text" placeholder="Язык" value="{{ User['language_name'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_language in LanguagesAll %}
                                    <div class="item" data-id="{{ item_language['id'] }}" data-name="{{ item_language['name'] }}">
                                        <span>{{ item_language['name'] }}</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        <div class="block_width_50">
                            <div class="input-select">
                                <input name="currency_id" value="{{ User['currency_id'] }}" type="hidden">
                                <input type="text" placeholder="Валюта" value="{{ User['currency_name'] }}" class="jsOnChange_input" readonly="readonly" autocomplete="off">
                                <div class="list-select">
                                    {% for item_currency in CurrencyAll %}
                                    <div class="item" data-id="{{ item_currency['id'] }}" data-name="{{ item_currency['short_name'] }} ({{ item_currency['full_name'] }})">
                                        <span>{{ item_currency['short_name'] }} ({{ item_currency['full_name'] }})</span>
                                    </div>
                                    {% endfor %}
                                </div>
                            </div>
                        </div>
                        
                        <p class="font_style_1">Блокировка аккаунта</p>
                        <div class="block_width_100">
                            <input type="checkbox" name="blocked" id="blocked_0" class="trigger" {% if User['blocked'] %} checked {% endif %}>
                            <label for="blocked_0">
                                <span class="false">Аккаунт в активеном состоянии</span>
                                <span class="true">Аккаунт заблокирован</span>
                            </label>
                            <div class="clear_float"></div>
                        </div>
                    </div>
                    
                    <div class="block_width_100">
                        <p class="font_style_1">Короткое описание</p>
                        <div class="block_width_100">
                            <input type="text" name="description" placeholder="Описание" value="{{ User['description'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                        </div>
                    </div>
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
            <br>
            <br>
            <br>
            
            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Статистическая информация аккаунта пользователя</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <div class="block_width_100">
                        <p><span class="font_style_1">Дата регистрации пользователя:</span> <span class="font_style_3">{{ User['date_on_add'] }}</span></p>
                        <p><span class="font_style_1">Дата последних изменений профиля:</span> <span class="font_style_3">{{ User['date_on_last_edit'] }}</span></p>
                        <p><span class="font_style_1">Дата последнего входа в систему:</span> <span class="font_style_3">{{ User['date_on_last_login'] }}</span></p>
                        <p><span class="font_style_1">Дата последнего действия пользователя:</span> <span class="font_style_3">{{ User['date_on_last_action'] }}</span></p>
                        <p><span class="font_style_1">Аккаунт помечен как удаленный:</span> <span class="font_style_3">{{ User['date_on_delete'] }}</span></p>
                    </div>
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
    <tr>
        <td>
            <div class="block_width_100">
                <input name="send_user" id="send_user_0" type="checkbox">
                <label for="send_user_0"><span class="font_style_3">Отправить пользователю письмо о смене данных</span></label>
                <div class="clear_float"></div>
                <br>
                <input type="submit" name="submit" value="Сохранить">
            </div>
        </td>
    </tr>
</tbody>
</table>

{% endif %}


{% if UsersAll is defined %}

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td width="100%">
            <div class="input-select">
                <input name="user_id" value="" type="hidden">
                <input placeholder="Пользователи" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off" type="text">
                <div class="list-select">
                    {% for item in UsersAll %}
                    <div class="item" data-id="{{ item['id'] }}" data-name="{{ item['last_name'] }} {{ item['first_name'] }} {{ item['middle_name'] }} ({{ item['role_name'] }})">
                        <span> {{ item['last_name'] }} {{ item['first_name'] }} {{ item['middle_name'] }} ({{ item['role_name'] }}) </span>
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