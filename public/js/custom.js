function hideDiv() {
    var x = document.getElementById("stream-div");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }