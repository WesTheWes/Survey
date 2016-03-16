var q_num = 0;

$( document ).ready(function(){

    $('button#next').on("click", function(){
        if (q_num == total-1) {
            return true;
        }
        if ($('.current[data-required]').length && !$('.current :checked').length && $("#next").html() != "Start!") {
            $('#errors').html('This question is required!');
        } else {
            $('#errors').html('');
            $('.current').removeClass('current').addClass('hidden');
            $this = $(this);
            var data = {q_num: q_num};
            $.ajax({
                url: "question.php",
                data: data,
                type: "POST",
                dataType: "html", 
            })
            .success(function(html){
                if (q_num == 0) {
                    $this.html("Next"); 
                } else if (q_num == total-2) {
                    $this.html("Submit"); 
                } 
                $this.before(html);
                q_num += 1;
             });
         }
         return false;
    });
})
