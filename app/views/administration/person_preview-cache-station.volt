{% extends "partials/base.html.volt" %}

{% block html_head %}
{% endblock %}

{% block title %}Preview persons{% endblock %}

{% block content_right_column %}

<div class="page_name">
    <span>Список адресной книги (кэш данной станции)</span>
</div>

{% for item in messages %}
    <div class="alert fade in {{ item['class'] }}">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ item['text'] }}
    </div>
{% endfor %}

<textarea>
    <?php print_r($test); ?>
</textarea>

<table class="table table-list_grid_1" width="100%">
    <tbody>
        <tr>
            <th align="left"><span>Код</span></th>
            <th align="left"><span>ФИО</span></th>
            <th align="left"><span>Адрес</span></th>
            <th align="left"><span>Страна</span></th>
            <th align="left"><span>Телефон</span></th>
            <th align="left"><span>Дата создания</span></th>
            <th align="center"><span>К-во обращений</span></th>
            <th align="center" width="130px"><span>&nbsp;</span></th>
            <th align="center" width="1px"><span>&nbsp;</span></th>
        </tr>
        {% for item in PersonsCacheAll %}
        <tr>
            <td align="left">
                <span>{{ item['person_code'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['person_full_name'] }} {% if item['first_name'] %}{{ item['first_name'] }} {% endif %}  {% if item['middle_name'] %}{{ item['middle_name'] }} {% endif %}</span>
            </td>
            <td align="left">
                <span>{{ item['person_full_address'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['person_country_name'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['person_phone'] }}</span>
            </td>
            <td align="left">
                <span>{{ item['date_on_add'] }}</span>
            </td>
            <td align="center">
                <span>{{ item['weight'] }}</span>
            </td>
            <td align="center">
                <span>
                    <a href="/{{ item['id'] }}" onClick="jsAsync.ShowModal(event, '<p>Подтвердите удаление</p>', '<p>Вы действительно хотите удалить запись <b>{{ item['first_name'] }} {{ item['last_name'] }}</b> ?</p>', 'Да', 'Нет', 'delete', '', '{{ item['id'] }}');">
                        Удалить
                    </a>
                </span>
            </td>
            <td align="center">
                <span>
                    <a href="/administration/person/edit/{{ item['id'] }}">
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