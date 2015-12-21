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
    <!--body onload="jsAsync.init();"-->
    <body>
        <div class="main">
        {% include "partials/header.volt" %}
        {% block header %}
        {% endblock %}

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    {% include "partials/content-left_column.volt" %}
                    {% block content_left_column %}
                    {% endblock %}

                        <div class="content-right_column col-sm-offset-3 col-md-offset-2">
                        {% include "partials/content-right_column.volt" %}
                        {% block content_right_column %}
                        {% endblock %}
                        </div>
                    </div>
                </div>
            </div><!--.content-->
        </div><!--.main-->
    </body>
</html>