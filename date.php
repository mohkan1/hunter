<!DOCTYPE html>
<html>
<body>

<audio id="myAudio">
  <source src="Lucky You (Feat. Joyner Lucas) [Official Audio].mp3" type="audio/ogg">
  <source src="" type="">
  Your browser does not support the audio element.
</audio>

<p>Click the buttons to play or pause the audio.</p>

<button onclick="playAudio()" type="button">Play Audio</button>
<button onclick="pauseAudio()" type="button">Pause Audio</button>

<script>
var x = document.getElementById("myAudio");

function playAudio() {
  x.play();
}

function pauseAudio() {
  x.pause();
}
</script>

</body>
</html>
