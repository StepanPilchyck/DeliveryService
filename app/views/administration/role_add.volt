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

{% block title %}Create role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Создание роли</span>
</div>

<form method="post" enctype="multipart/form-data" action="/administration/role/preview">
<input type="hidden" name="add" value="new">

<table width="100%" class="table_content">
<tbody>
    <tr>
        <td>

            <div class="panel_1 active">
                
                <div class="panel_header">
                    <div class="panel_name">
                        <span>Новая роль</span>
                    </div>
                </div><!--.panel_header-->
                
                <div class="panel_content">
                    <div class="block_width_100">
                        <input type="text" name="name" placeholder="Название" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
                    </div>
                    <div class="block_width_100">
                        <input type="text" name="description" placeholder="Описание" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup">
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
                                    <input type="checkbox" name="rights[package_add_file][-sel]" id="right_selected_0" class="trigger">
                                    <label for="right_selected_0">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. Из файла.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-add]" id="right_add_0">
                                    <label for="right_add_0">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-edit]" id="right_edit_0">
                                    <label for="right_edit_0">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_file][-delete]" id="right_delete_0">
                                    <label for="right_delete_0">&nbsp;</label>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-sel]" id="right_selected_1" class="trigger">
                                    <label for="right_selected_1">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. С регистрацией.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-add]" id="right_add_1">
                                    <label for="right_add_1">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-edit]" id="right_edit_1">
                                    <label for="right_edit_1">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_register][-delete]" id="right_delete_1">
                                    <label for="right_delete_1">&nbsp;</label>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-sel]" id="right_selected_2" class="trigger">
                                    <label for="right_selected_2">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Посылки. Приём. Единичынй.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-add]" id="right_add_2">
                                    <label for="right_add_2">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-edit]" id="right_edit_2">
                                    <label for="right_edit_2">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[package_add_one][-delete]" id="right_delete_2">
                                    <label for="right_delete_2">&nbsp;</label>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-sel]" id="right_selected_3" class="trigger">
                                    <label for="right_selected_3">&nbsp;</label>
                                </td>
                                <td>
                                    <span>Создание отчётов.</span>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-add]" id="right_add_3">
                                    <label for="right_add_3">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-edit]" id="right_edit_3">
                                    <label for="right_edit_3">&nbsp;</label>
                                </td>
                                <td align="center">
                                    <input type="checkbox" name="rights[report_create][-delete]" id="right_delete_3">
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
</form>


{% endblock %}