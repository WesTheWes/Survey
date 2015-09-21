<html>
<head>

</head>

<body>
<h1>This is the Survey</h1>

<form action="submit.php" method="post">
    {% for question in surveys %}
        {{ question.question }}
        <br>
        {% for option_id, option in question.options %}
            <input type="{{ question.type }}" name="{{ question.id }}[]" value="{{ option_id }}">{{ option }}
            <br>
        {% endfor %}
    {% endfor %}
    <button type="submit">Submit!</button>
</form>
</body>
</html>