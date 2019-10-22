$(document).ready(function(){

    $('.remove-song').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        
        $.ajax({
            method : "POST",
            url: "../webapp/php/ajax-remove-from-playlist.php",
            data: {
                id : id
            },
            success: function(data)
            {
                $(document).ajaxStop(function(){
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                });
            },
            error: function(errors)
            {

            }
        })
    });

})

function printdata()
{
    
}