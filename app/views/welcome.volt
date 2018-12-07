{% extends "layouts/application.volt" %}
{% block body %}
    <div class="container text-center mt-2">
        <h2>Welcome to {{ config.site_info.site_name }}</h2>
        <p>Please choose the feature you wish to see/review/try</p>

        <p>
            <a href="{{ url.get('/template') }}" class="btn btn-success">Template (Configuration)</a>
            <a href="#" class="btn btn-info">GUI (End-user using)</a>
        </p>
    </div>
{% endblock %}