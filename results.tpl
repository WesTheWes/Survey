<html>
<head>

</head>

<body>
<h1>Results</h1>
<table>
    {% for gender, result in results %}
        <tr><td><h2>{{ gender }}</h2></td></tr>
        {% for question, answer in result %}
            <tr><td><b>{{ question }}</b></td></tr>
            {% for response, count in answer %}
                <tr><td><li>{{ response}}</li></td><td>{{ count }}</td></tr>
            {% endfor %}
        {% endfor %}
        <tr><td>-------------</td></tr>
    {% endfor %}
</table>
</body>
</html>