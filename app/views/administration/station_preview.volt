{% extends "partials/base.html.volt" %}

{% block html_head %}
{% endblock %}

{% block title %}Preview all role{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Список всех станций</span>
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
            <th align="left"><span>Название</span></th>
            <th align="left"><span>Дата создания</span></th>
            <th align="left"><span>Страна</span></th>
            <th align="left"><span>Статус</span></th>
            <th align="center" width="130px"><span>&nbsp;</span></th>
            <th align="center" width="1px"><span>&nbsp;</span></th>
        </tr>
        {% for item in StationsAll %}
        <tr>
            <td align="left">
                <span>{{ item['code'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['name'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['date_on_add'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['country_name'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['station_status_name'] }}</span>
            </td>
            <td align="center">
                <span>
                    <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить запись <b>{{ item['name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', '', '{{ item['id'] }}');">
                        Удалить
                    </a>(
                    <a href="#" title="Колличество связей с Пользователями">{{ item['from_users'] }}</a>,
                    <a href="#" title="Колличество связей с Транспортом посылок">{{ item['from_package_transport_history'] }}</a>, 
                    <a href="#" title="Колличество связей с Реестрами">{{ item['from_registry'] }}</a>,
                    <a href="#" title="Колличество связей с Манифестами">{{ item['from_manifests'] }}</a>
                    <a href="#" title="Колличество связей с кэшом Адресной книги">{{ item['from_persons_cache'] }}</a>
                )</span>
            </td>
            <td align="center">
                <span>
                    <a href="/administration/station/edit/{{ item['id'] }}">
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