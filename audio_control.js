window.addEventListener("DOMContentLoaded", event => {
    const audio = document.getElementById("myAudio");
    audio.volume = 0.5;
    audio.play();
  });

function playPause() {
    var playButton = document.getElementById("playPauseButton");
    var audio = document.getElementById("myAudio");

    if (audio.paused) {
        audio.play();
        playButton.className = "bi-pause-circle-fill";
        playButton.style.fontSize = "45px";
    } else {
        audio.pause();
        playButton.className = "bi-play-circle-fill";
        playButton.style.fontSize = "45px";
    }
};


