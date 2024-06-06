function SetVolume(val)
    {
        var volumeIcon = document.getElementById('volumeIcon');
        var audio = document.getElementById('myAudio');
        console.log('Before: ' + audio.volume);
        audio.volume = val / 100;
        console.log('After: ' + audio.volume);

        if(val == 0){
            volumeIcon.className = "bi-volume-mute-fill";
            volumeIcon.style.fontSize = "25px";
            volumeIcon.style.lineHeight = "19px";
        }
        else {
            volumeIcon.className = "bi-volume-down-fill";
            volumeIcon.style.fontSize = "25px";
            volumeIcon.style.lineHeight = "19px";
        }
    }
