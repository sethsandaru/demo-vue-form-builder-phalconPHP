<script>
    var api_url = "{{ url.get("/api/v1/VueForm/") }}";
</script>

{% for js_file in config.assets.js %}
    <script src="{{ static_url(js_file) }}"></script>
{% endfor %}