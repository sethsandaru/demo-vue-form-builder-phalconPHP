{% extends "layouts/application.volt" %}
{% block body %}
    {% for form in forms %}
        {{ form.Title }} <br />
    {% endfor %}
{% endblock %}