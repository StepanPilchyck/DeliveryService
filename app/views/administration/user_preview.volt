{% extends "partials/base.html.volt" %}

{% block html_head %}
{% endblock %}

{% block title %}Preview all role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Список всех пользователей</span>
</div>

{% for item in messages %}
    
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
    
{% endfor %}

<table class="table table-list_grid_1" width="100%">
    <tbody>
        <tr>
            <th align="left"><span>Код</span></th>
            <th align="left"><span>ФИО</span></th>
            <th align="left"><span>Роль</span></th>
            <th align="left"><span>Станция</span></th>
            <th align="left"><span>Статус</span></th>
            <th align="left"><span>Дата создания</span></th>
            <th align="center"><span>Последний вход</span></th>
            <th align="center" width="130px"><span>&nbsp;</span></th>
            <th align="center" width="1px"><span>&nbsp;</span></th>
        </tr>
        {% for item in UsersAll %}
        <tr>
            <td align="left">
                <span>{{ item['id'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['last_name'] }} {% if item['first_name'] %}{{ item['first_name'] }} {% endif %}  {% if item['middle_name'] %}{{ item['middle_name'] }} {% endif %}</span>
            </td>
            <td align="left">
                <span>{{ item['role_name'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['station_name'] }}</span>
            </td>
            <td align="left">
                <span>{% if item['blocked'] %} Заблокирован {% else %} Активен {% endif %}</span>
            </td>
            <td align="left">
                <span>{{ item['date_on_add'] }}</span>
            </td>
            <td align="center">
                <span>{{ item['date_on_last_login'] }}</span>
            </td>
            <td align="center">
                <span>
                    <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить запись <b>{{ item['first_name'] }} {{ item['last_name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', '', '{{ item['id'] }}');">
                        Удалить
                    </a>(
                    <a href="#" title="Колличество связей с Сообщениями (отправленными)">{{ item['from_users_message'] }}</a>,
                    <a href="#" title="Колличество связей с Сообщениями (принятыми)">{{ item['from_message'] }}</a>, 
                    <a href="#" title="Колличество связей с Транспортом посылок">{{ item['from_package_transport_history'] }}</a>,
                    <a href="#" title="Колличество связей с Историей посылок">{{ item['from_package_vcs'] }}</a>
                )</span>
            </td>
            <td align="center">
                <span>
                    <a href="/administration/user/edit/{{ item['id'] }}">
                        <div class="panel_edit relative">
                            &nbsp;
                        </div>
                    </a>
                </span>
            </td>
            {% endfor %}
        </tr>
    </tbody>
</table>

{% endblock %}