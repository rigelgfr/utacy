window.onload = function() {
    var playButton = document.getElementById("playPauseButton");
    const audio = document.getElementById("myAudio");
    const progressEl = document.getElementById('seekBar');
    let mouseDownOnSlider = false;
    
    audio.addEventListener("loadeddata", () => {
      progressEl.value = 0;
    });
    
    audio.addEventListener("timeupdate", () => {
      if (!mouseDownOnSlider) {
        progressEl.value = audio.currentTime / audio.duration * 100;
      }
    });
    
    progressEl.addEventListener("change", () => {
      const pct = progressEl.value / 100;
      audio.currentTime = (audio.duration || 0) * pct;
    });
    
    progressEl.addEventListener("mousedown", () => {
      mouseDownOnSlider = true;
    });
    
    progressEl.addEventListener("mouseup", () => {
      mouseDownOnSlider = false;
    });

    audio.addEventListener("ended", function(){
        playButton.className = "bi-play-circle-fill";
      playButton.style.fontSize = "45px";
    })

}
