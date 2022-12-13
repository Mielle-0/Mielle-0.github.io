var playStart = false;
var track = document.createElement('audio');
    track.volume = 0.7;
var trackNum = 0;
var volume = document.querySelector("#volID");

let songs = [{
        name: "I Don't Want to Miss a Thing",
        path: "./music/Aerosmith - I Don't Want to Miss a Thing (Official Music Video).m4a",
        artist: "Aerosmith"
    },
    {
        name: "All Out Of Love",
        path: "./music/Air Supply - All Out Of Love.m4a",
        artist: "Air Supply"
    },
    {
        name: "Apologize",
        path: "./music/Apologize - OneRepublic.m4a",
        artist: "OneRepublic"
    },
    {
        name: "Moment Of Truth",
        path: "./music/FM Static - Moment Of Truth (Lyrics).m4a",
        artist: "FM Static"
    }];


songs.forEach(function (e, i) {
    
    var card = document.createElement('li');
    var title = document.createElement('h5');
    var author = document.createElement('p');
    var h5div = document.createElement('div');
    var pdiv = document.createElement('div');

    title.textContent = e.name;
    title.style.fontSize = '3vh';

    author.textContent = e.artist;

    card.className = "song";
    h5div.appendChild(title);
    pdiv.appendChild(author);
    card.appendChild(h5div);
    card.appendChild(pdiv);
    card.setAttribute("data-path", e.path);
    card.setAttribute("data-index", i);
    card.addEventListener("click", playSong);

    document.querySelector('#list ul').appendChild(card);
});    


function playSong(){

    track.pause();
    document.getElementById("play-btn").src = "./images/pause-svgrepo-com.svg";

    try{
        trackNum = this.getAttribute('data-index');
    }catch(TypeError){
        trackNum = 0;
    }

    track = new Audio(songs[trackNum].path);
    track.currentTime = 0;
    track.play();
}

function playPause(){
    
    if (track.src == ''){

        document.getElementById("play-btn").src = "./images/pause-svgrepo-com.svg";
        playSong();
        return;
    }
    
    if (track.paused){
        
        track.play();
        document.getElementById("play-btn").src = "./images/pause-svgrepo-com.svg";
    }else if (!track.paused){
        
        track.pause();
        document.getElementById("play-btn").src = "./images/play-svgrepo-com.svg";
    }
}

function changeVol(){

    track.volume = volume.value / 100;
}

function placeHolder(){

    // console.log(track.);
}