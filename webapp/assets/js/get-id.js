
$(document).ready(function(){

    $('.izmeni').click(function(event){
        event.preventDefault();
        let id = $(this).data('id');
      
        $.ajax({
            method: "POST",
            dataType: "json",
            url: "php/ajax-get-id.php",
            data:{
                id : id
            },
            
            success:function(data)
            {
                
                console.log(data);
                echoData(data);
             
            },
            error:function(error)
            {
                console.log(error);
            }
          });
    });
});




$(document).ready(function() {
    $("#chooseSong").change(function(){
        let id = $(this).val();
        
        $.ajax({
            method: "POST",
            dataType: "json",
            url: "php/ajax-get-id.php",
            data:{
                id : id
            },
            
            success:function(data)
            {
                
                console.log(data);
                echoData(data);
             
            },
            error:function(error)
            {
                console.log(error);
            }
    });
});
});
function echoData(data)
{
   
    $("#idSong").val(data.id);
    $("#songname").val(data.song_name);
    $("#desc").val(data.description);
    $("#artist").val(data.artist_name);
    $("#album").val(data.album_name);
}