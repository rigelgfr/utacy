function skipBack() {
    var audio = document.getElementById('myAudio');
    
    if (audio.currentTime > 3) {
      // If song has played more than 3 seconds, reset the song
      audio.currentTime = 0;
    } else {
      // If song is less than 3 seconds, skip to previous song using AJAX
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "skip_previous.php", true);
      xhr.send();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Handle the response from the server if needed
          console.log(this.responseText);
          alert('AJAX request successful');
        } else {
          alert('Error: ' + this.statusText);
        }
      };
    }
  }
  