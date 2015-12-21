{% extends "partials/base.html.volt" %}

{% block html_head %}
{% endblock %}

{% block title %}Preview all role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Список всех ролей</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<table class="table table-list_grid_1" width="100%">
    <tbody>
        {% for item in RolesAll %}
        <tr>
            <td align="left">
                <span>{{ item['name'] }} (<a href="#" title="Колличество связей с Пользователями">{{ item['from_users'] }}</a>) {{ item['description'] }}</span>
            </td>
            <td>
                <a href="/administration/role/edit/{{ item['id'] }}">
                    <div class="panel_edit">
                        &nbsp;
                    </div>
                </a>
                
                <a href="/{{ item['role_id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить роль <b>{{ item['name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', '', '{{ item['id'] }}');">
                    <div class="panel_close">
                         &nbsp;
                    </div>
                </a>
            </td>
            {% endfor %}
        </tr>
    </tbody>
</table>

{% endblock %}