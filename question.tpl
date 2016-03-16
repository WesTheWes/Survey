<div class="form-group current" {% if question.required %}data-required{% endif %}>
    <p><strong>{{question.title}}</strong></p> 
    {% for option_id, option in question.options %}
        <input type="{{question.type}}" name="{{question.id}}[]" value="{{option_id}}">{{option}}</input>
        </br>
    {% endfor %}
</div>
