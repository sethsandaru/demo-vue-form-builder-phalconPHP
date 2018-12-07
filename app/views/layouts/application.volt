<html>
<head>
    {% include "layouts/header.volt" %}
</head>
<body>
    {% include "layouts/navbar.volt" %}

    {% block body %}
    {% endblock %}

    {% include "layouts/footer.volt" %}
</body>
</html>