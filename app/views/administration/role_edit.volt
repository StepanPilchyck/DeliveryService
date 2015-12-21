{% extends "partials/base.html.volt" %}

{% block html_head %}
<script type="text/javascript">
$(function(){
    var t = $('input:checkbox:not(:checked).trigger').closest('tr');
    t.find('input:checkbox:not(.trigger)').attr('disabled','');
    $('input:checkbox.trigger').bind('change',function(){
        if(!this.checked)
        {
            $(this).closest('tr').find('input:checkbox:not(.trigger)').attr('checked',false);
            $(this).closest('tr').find('input:checkbox:not(.trigger)').attr('disabled','');
        }else{
            $(this).closest('tr').find('input:checkbox:not(.trigger)').removeAttr('disabled');
        }
    });
});
</script>
{% endblock %}

{% block title %}Preview all role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Редактирование роли</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<form method="post" enctype="multipart/form-data">

{% if RoleRites is defined %}

<table width="100%" class="table_content">
<tbody>

    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Изменение роли</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <input type="hidden" name="id" value="{{ RoleRites['role']['id'] }}">
                    <div class="block_width_100">
                        <input type="text" name="name" placeholder="Название" value="{{ RoleRites['role']['name'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                    </div>
                    <div class="block_width_100">
                        <input type="text" name="description" placeholder="Описание" value="{{ RoleRites['role']['description'] }}" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                    </div>
                    
                    <br>
                    
                    <div class="block_width_100">
                        <table width="100%" class="admin_role-add table-list_grid">
                        <tbody>
                            <tr>
                                <th align="center"><span>Вкл./Выкл.</span></th>
                                <th><span>Название функции</span></th>
                                <th align="center"><span>Добавление</span></th>
                                <th align="center"><span>Изменение</span></th>
                                <th align="center"><span>Удаление</span></th>
                            </tr>
                            <tr>
                                <td align="center">
                                    {% set package_add_file = "" %}
                                    {% if RoleRites['right']['package_add_file'] is defined %}
                                    {% set package_add_file = RoleRites['right']['package_add_file']['description'] %}
                                    <input type="hidden" name="rights[package_add_file][id]" value="{{ RoleRites['right']['package_add_file']['id'] }}">
                                    {% endif %}
                                    <input type="checkbox" name="rights[package_add_file][-sel]" id="right_selected_0" class="trigger" {% if "sel" in package_add_file %} checked {% endif %}>
                                    <label for="right_selected_0">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. Из файла.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-add]" id="right_add_0" {% if "add" in package_add_file %} checked {% endif %}>
                                    <label for="right_add_0">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-edit]" id="right_edit_0" {% if "edit" in package_add_file %} checked {% endif %}>
                                    <label for="right_edit_0">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-delete]" id="right_delete_0" {% if "delete" in package_add_file %} checked {% endif %}>
                                    <label for="right_delete_0">&nbsp;</label>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="center">
                                    {% set package_add_register = "" %}
                                    {% if RoleRites['right']['package_add_register'] is defined %}
                                    {% set package_add_register = RoleRites['right']['package_add_register']['description'] %}
                                    <input type="hidden" name="rights[package_add_register][id]" value="{{ RoleRites['right']['package_add_register']['id'] }}">
                                    {% endif %}
                                    <input type="checkbox" name="rights[package_add_register][-sel]" id="right_selected_1" class="trigger" {% if "sel" in package_add_register %} checked {% endif %}>
                                    <label for="right_selected_1">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. С регистрацией.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-add]" id="right_add_1" {% if "add" in package_add_register %} checked {% endif %}>
                                    <label for="right_add_1">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-edit]" id="right_edit_1" {% if "edit" in package_add_register %} checked {% endif %}>
                                    <label for="right_edit_1">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-delete]" id="right_delete_1" {% if "delete" in package_add_register %} checked {% endif %}>
                                    <label for="right_delete_1">&nbsp;</label>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td align="center">
                                    {% set package_add_one = "" %}
                                    {% if RoleRites['right']['package_add_one'] is defined %}
                                    {% set package_add_one = RoleRites['right']['package_add_one']['description'] %}
                                    <input type="hidden" name="rights[package_add_one][id]" value="{{ RoleRites['right']['package_add_one']['id'] }}">
                                    {% endif %}
                                    <input type="checkbox" name="rights[package_add_one][-sel]" id="right_selected_2" class="trigger" {% if "sel" in package_add_one %} checked {% endif %}>
                                    <label for="right_selected_2">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. Единичынй.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-add]" id="right_add_2" {% if "add" in package_add_one %} checked {% endif %}>
                                    <label for="right_add_2">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-edit]" id="right_edit_2" {% if "edit" in package_add_one %} checked {% endif %}>
                                    <label for="right_edit_2">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-delete]" id="right_delete_2" {% if "delete" in package_add_one %} checked {% endif %}>
                                    <label for="right_delete_2">&nbsp;</label>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td align="center">
                                    {% set report_create = "" %}
                                    {% if RoleRites['right']['report_create'] is defined %}
                                    {% set report_create = RoleRites['right']['report_create']['description'] %}
                                    <input type="hidden" name="rights[report_create][id]" value="{{ RoleRites['right']['report_create']['id'] }}">
                                    {% endif %}
                                    <input type="checkbox" name="rights[report_create][-sel]" id="right_selected_3" class="trigger" {% if "sel" in report_create %} checked {% endif %}>
                                    <label for="right_selected_3">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Создание отчётов.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-add]" id="right_add_3" {% if "add" in report_create %} checked {% endif %}>
                                    <label for="right_add_3">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-edit]" id="right_edit_3" {% if "edit" in report_create %} checked {% endif %}>
                                    <label for="right_edit_3">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-delete]" id="right_delete_3" {% if "delete" in report_create %} checked {% endif %}>
                                    <label for="right_delete_3">&nbsp;</label>
                                </td>
                            </tr>
                            
                        </tbody>
                        </table>
                    </div>
                    
                    
                </div><!--.panel_content-->
                
                <div class="panel_bottom"></div><!--.panel_bottom-->
                
            </div><!--.panel_1-->
            
        </td>
    </tr>
    <tr>
        <td>
            <div class="block_width_100">
                <input type="submit" name="role_submit" value="Сохранить">
            </div>
        </td>
    </tr>
</tbody>
</table>

{% endif %}


{% if RolesAll is defined %}

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td width="100%">
            <div class="input-select">
                <input name="role_id" value="" type="hidden">
                <input placeholder="Роли" value="" class="jsOnChange_input" readonly="readonly" autocomplete="off" type="text">
                <div class="list-select">
                    {% for item in RolesAll %}
                    <div class="item" data-id="{{ item['id'] }}" data-name=" {{ item['name'] }} ({{ item['from_users'] }}) ">
                        <span> {{ item['name'] }} ({{ item['from_users'] }}) <small>{{ item['description'] }}</small> </span>
                    </div>
                    {% endfor %}
                </div>
            </div>
        </td>
        <td>
            <input type="submit" name="role_submit" value="Перейти">
        </td>
    </tr>
</tbody>
</table>

{% endif %}

</form>


{% endblock %}