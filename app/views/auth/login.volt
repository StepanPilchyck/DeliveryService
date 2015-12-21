{% extends "partials/auth.html.volt" %}

{% block title %}Login{% endblock %}

{% block content %}
<div class="login">
    <div class="logo">
        <img src="/img/logo-auth.png">
    </div>
    <div class="form">
        <form method="post">
            <input type="text" name="user_email" placeholder="Почта" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup"><br>
            
            <input type="password" name="user_password" placeholder="Пароль" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup"><br>
            
            <input type="submit" name="user_submit" value="Войти">
        </form>
    </div>
    {% if messages %}
        <div class="login-message">
            {% for item in messages %}
            <div class="alert {{ item['class'] }}">
                {{ item['text'] }}
            </div>
            {% endfor %}
        </div>
    {% endif %}
</div>

{% endblock %}