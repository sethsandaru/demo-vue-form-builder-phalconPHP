<meta charset="utf-8">
<title>{{ config.site_info.site_name }}</title>

{% for css_file in config.assets.css %}
    <link rel="stylesheet" href="{{ static_url(css_file) }}">
{% endfor %}