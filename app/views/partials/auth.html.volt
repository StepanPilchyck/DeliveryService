<!DOCTYPE HTML>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>{% block title %}{% endblock %} - ICS</title>

        {% for file in js %}
        <script type="text/javascript" src="{{file}}"></script>
        {% endfor %}
        
        {% for file in css %}
        <link rel="stylesheet" href="{{file}}" type="text/css" />
        {% endfor %}
        
        {% block html_head %}
        {% endblock %}

    </head>
    <body onload="jsAsync.init();">
        <div class="auth">
            {% block content %}
            {% endblock %}
        </div><!--.main-->
    </body>
</html>