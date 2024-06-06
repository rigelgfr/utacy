function validatePlaylist() {
    var name = document.getElementById("name").value;
    var description = document.getElementById("description").value;
  
    var feedback = document.querySelector(".feedback");
  
    if (name === "" || description === "") {
      feedback.innerText = "Invalid input";
      feedback.style.color = "red";
      return false;
    } else {
      feedback.innerText = "Success";
      feedback.style.color = "green";
      return true;
    }
  }

function validateSong() {
  var title = document.getElementById("title").value;
  var artist = document.getElementById("artist").value;
  const coverInput = document.getElementById("cover-upload");
  const fileInput = document.getElementById("file-upload"); 

  var feedback = document.querySelector(".feedback");

  if (title === "" || artist === "") {
    feedback.innerText = "Invalid input";
    feedback.style.color = "red";
    return false;
  } 
  else if (!coverInput.files || !fileInput.files) {
    feedback.innerText = "Please select a file";
    feedback.style.color = "red";
    event.preventDefault();
    return false;
  }
  else {
    feedback.innerText = "Success";
    feedback.style.color = "green";
    return true;
  }
}
  