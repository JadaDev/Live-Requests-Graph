function copyUrl() {
  const urlText = document.getElementById('urlText');
  urlText.select();
  document.execCommand('copy');
  alert('URL copied to clipboard!');
}

const playButton = document.getElementById('playButton');
const pauseButton = document.getElementById('pauseButton');
const stopButton = document.getElementById('stopButton');
const volumeControl = document.getElementById('volumeControl');
const audio = new Audio('music.mp3');

// Start the music on page load
window.addEventListener('load', function() {
  audio.play();
});

// Set the volume to 50%
audio.volume = 0.5;

// Loop the audio when it ends
audio.addEventListener('ended', function() {
  audio.currentTime = 0;
  audio.play();
});

playButton.addEventListener('click', function() {
  audio.play();
});

pauseButton.addEventListener('click', function() {
  audio.pause();
});

stopButton.addEventListener('click', function() {
  audio.pause();
  audio.currentTime = 0;
});

volumeControl.addEventListener('input', function() {
  audio.volume = volumeControl.value;
});

const currentTime = document.getElementById('currentTime');
const progressControl = document.getElementById('progressControl');
const duration = document.getElementById('duration');

// Update the music length and current time
audio.addEventListener('loadedmetadata', function() {
  const totalSeconds = audio.duration;
  const formattedDuration = formatTime(totalSeconds);
  duration.textContent = formattedDuration;
});

audio.addEventListener('timeupdate', function() {
  const currentSeconds = audio.currentTime;
  const formattedCurrentTime = formatTime(currentSeconds);
  currentTime.textContent = formattedCurrentTime;

  const progress = (currentSeconds / audio.duration) * 100;
  progressControl.value = progress;
});

// Scroll to a specific time in the music
progressControl.addEventListener('input', function() {
  const seekTime = (progressControl.value / 100) * audio.duration;
  audio.currentTime = seekTime;
});

// Format time in minutes and seconds
function formatTime(timeInSeconds) {
  const minutes = Math.floor(timeInSeconds / 60);
  const seconds = Math.floor(timeInSeconds % 60);
  return `${minutes}:${padZero(seconds)}`;
}

// Pad single-digit seconds with zero
function padZero(number) {
  return number.toString().padStart(2, '0');
}
