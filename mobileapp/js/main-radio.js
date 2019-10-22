
var app = new Framework7();

var song_name_for_display;

var $$ = Dom7;
app.request.get('http://mijnautoadverteren.nl/moderne-woningen/php/get-first.php', function(data){
    var song = JSON.parse(data);
    // console.log(song.songName);

    
    var songurl = song.song_url;
    // url prve pesme
    // console.log(song);
    var path = "http://mijnautoadverteren.nl/moderne-woningen/webapp/";
    // prva pesma
    document.getElementById('audio').src = path + songurl;
    document.getElementById('audio-2').src = path + songurl;

    document.getElementById('active-link').href= path + songurl;
    document.getElementById('active-link').innerHTML= song.song_name;
    document.getElementById('songic').innerHTML = song.songName;

});

app.request.get('http://mijnautoadverteren.nl/moderne-woningen/php/get-all-withouth-first.php', function(data){
    var songs = JSON.parse(data);
    // console.log(songs);
    // lista pesama koje se ne vide
    var text = ``;
    songs.forEach(function(element){
       text+= `<li><a data-songname='${element['SongName']}' href="http://mijnautoadverteren.nl/moderne-woningen/webapp/${element['urlSong']}">${element['SongName']}</a></li>`;

    });
 
    document.getElementById('all-songs').innerHTML = text;
});
 
    var audio;
    var playlist;
    var tracks;
    var current;

    init();
    function init(){
    current = 0;
    audio = $$('audio');
    playlist = $$('#playlist');
    tracks = playlist.find('li a');
    len = tracks.length - 1;
    audio[0].volume = .10;
    audio[0].play;
    

    playlist.find('a').click(function(e){
        e.preventDefault();
        link = $$(this);
        
        current = link.parent().index();
        run(link, audio[0]);
    });
    audio[0].addEventListener('ended',function(e){
        current++;
        if(current == len){
            current = 0;
            link = playlist.find('a')[0];
        }else{
            link = playlist.find('a')[current];    
        }
        document.getElementById('active-link').innerHTML= link.getAttribute('data-songname');
        document.getElementById('songic').innerHTML = link.getAttribute('data-songname');
        console.log(link.getAttribute('data-songname'));
        run($$(link),audio[0]);
    });
    }
    function run(link, player){
        player.src = link.attr('href');
        par = link.parent();
        par.addClass('active').siblings().removeClass('active');
        audio[0].load();
        audio[0].play();
        // console.log(audio[0]);
        // console.log('here');
    }        
    //document.getElementById('pokazi').style.display = "block";

