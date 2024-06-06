function toggleLoop() {
  var audio = document.getElementById("myAudio");
  audio.loop = !audio.loop;

  var loopButton = document.getElementById("loopButton");
  if (audio.loop) {
    loopButton.style.color = "hsl(158, 82%, 57%, 85%)";
  } else {
    loopButton.style.color = "white";
  }
}