function showCheckmark() {
    // Create a new element for the checkmark
    var checkmark = document.createElement("span");
    checkmark.innerHTML = "&#10004;"; // Add a checkmark symbol to the element
    checkmark.style.position = "absolute"; // Set the position of the checkmark to absolute
    checkmark.style.top = "50%"; // Center the checkmark vertically
    checkmark.style.left = "50%"; // Center the checkmark horizontally
    checkmark.style.transform = "translate(-50%, -50%)"; // Adjust the position of the checkmark to center it precisely
    checkmark.style.fontSize = "5rem"; // Increase the font size of the checkmark

    // Get the container element for the checkmark
    var container = document.getElementById("checkmark-container");

    // Append the checkmark element to the container
    container.appendChild(checkmark);

    // Set a timeout to remove the checkmark after 2 seconds
    setTimeout(function() {
        checkmark.remove();
    }, 2000);
}
