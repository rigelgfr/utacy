window.onload = function() {
    var audio = document.getElementById('myAudio');
    var currentTime = document.getElementById('currentTime');
    var duration = document.getElementById('duration');
    var seekBar = document.getElementById('seekBar');
    var playButton = document.getElementById("playPauseButton");

    function updateTime() {
        var current = audio.currentTime;
        var minutes = Math.floor(current / 60);
        var seconds = Math.floor(current % 60);
        currentTime.innerHTML = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        seekBar.value = (current / audio.duration) * 100;
    }

    function updateDuration() {
        var durationTime = audio.duration;
        var minutes = Math.floor(durationTime / 60);
        var seconds = Math.floor(durationTime % 60);
        duration.innerHTML = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    }

    seekBar.addEventListener('input', function() {
        var time = audio.duration * (seekBar.value / 100);
        audio.currentTime = time;
      });

    audio.addEventListener("ended", function(){
        playButton.className = "bi-play-circle-fill";
        playButton.style.fontSize = "45px";
    })

    audio.addEventListener('timeupdate', updateTime);
    audio.addEventListener('durationchange', updateDuration);
    audio.addEventListener('loadedmetadata', updateDuration);
}
