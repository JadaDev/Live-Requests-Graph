<?php
require 'config.php';

$conn = mysqli_connect($servername, $username, $password, $database);

$ip = $_SERVER['REMOTE_ADDR'];
$time = time();

$sql = "INSERT INTO visitor_data (ip, time) VALUES ('$ip', '$time')";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <h1>JADA Live Graph Requests</h1>
    <link rel="stylesheet" href="main.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateStatistics() {
                $.ajax({
                    url: "statistics.php",
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#total-id-count").text(data.totalIdCount);
                        $("#last-60-seconds-count").text(data.last60SecondsIdCount);
                    },
                    error: function(xhr, status, error) {
                        console.log("An error occurred while retrieving statistics: " + error);
                    }
                });
            }

            updateStatistics();

            setInterval(function() {
                updateStatistics();
            }, 5000);
        });
    </script>
  </head>
  <body>
      <h1>JADA Live Requests Graph</h1>

    <?php
    require 'config.php';

    $conn = new mysqli($servername, $username, $password, $database, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $totalIdCount = 0;
    $sql = "SELECT COUNT(id) AS total_count FROM visitor_data";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalIdCount = $row["total_count"];
    }

    $currentTimestamp = time();
    $last60SecondsTimestamp = $currentTimestamp - 60;
    $last60SecondsIdCount = 0;
    $sql = "SELECT COUNT(id) AS count_60_seconds FROM visitor_data WHERE time >= $last60SecondsTimestamp";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last60SecondsIdCount = $row["count_60_seconds"];
    }

    $conn->close();
    ?>



    <div class="links-container">
      <a>If you want to be in the LeaderBoard Just send proof to :</a>
      <a href="https://t.me/jadadev2723" target="_blank"> @jadadev2723</a>
    </div>
    <div>
      <input type="text" id="urlText" class="url-text" value="https://www.how-tiktok.online/" readonly>
      <button class="button copy-button" onclick="copyUrl()">Copy URL</button>
    </div>
	<div class="music-controls">
	      <button id="playButton" class="button play-button">Play</button>
	  <button id="pauseButton" class="button play-button">Pause</button>
      <button id="stopButton" class="button stop-button">Stop</button>
	</div>
	<div class="music-controls">
      <div class="volume-control">
        <label for="volumeControl">Music Volume Controller : </label>
        <div class="volume-slider">
          <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="0.5">
        </div>
      </div>
    </div>
	    <div class="music-time">
		<a> Music Time Controller : </a>
      <span id="currentTime">0:00</span>
      <input type="range" id="progressControl" min="0" max="100" step="0.01" value="0">
      <span id="duration">0:00</span>
    </div>

    <div class="graph-container">
      <iframe src="graph.php" width="820" height="450"></iframe>
    </div>
		  <div class="text">
<p>Total Requests : <span id="total-id-count">Loading...</span></p>
    <p>Total Requests in the Last 60s : <span id="last-60-seconds-count">Loading...</span></p>
	</div>
	<div id="leaderboard">
  <h1>Leaderboard</h1>
  <table>
    <tr>
      <th>Rank</th>
      <th>Username</th>
      <th>Servers</th>
      <th>60 Seconds Requests</th>
      <th>Link</th>
    </tr>
    <tr>
      <td>1</td>
      <td>HEXSTRESSER.ORG</td>
      <td>1con [FLOOD-HTTP] Free</td>
      <td>4340</td>
      <td><a href="https://t.me/HexstresserV2" target="_blank">Telegram</a></td>
    </tr>
    <tr>
      <td>2</td>
      <td>IPSTRESSER.GG</td>
      <td>1con [HTTP-BYPASS] Free</td>
      <td>2500</td>
      <td><a href="https://t.me/ipstressergg" target="_blank">Telegram</a></td>
    </tr>	
    <tr>
      <td>3</td>
      <td>username3</td>
      <td>1con</td>
      <td>0</td>
      <td><a href="https://www.how-tiktok.online/" target="_blank">Telegram</a></td>
    </tr>
	<tr>
      <td>4</td>
      <td>username4</td>
      <td>1con</td>
      <td>0</td>
      <td><a href="https://www.how-tiktok.online/" target="_blank">Telegram</a></td>
    </tr>
	<tr>
      <td>5</td>
      <td>username5</td>
      <td>1con</td>
      <td>0</td>
      <td><a href="https://www.how-tiktok.online/" target="_blank">Telegram</a></td>
    </tr>
	<tr>
      <td>6</td>
      <td>username6</td>
      <td>1con</td>
      <td>0</td>
      <td><a href="https://www.how-tiktok.online/" target="_blank">Telegram</a></td>
    </tr>
	<tr>
      <td>6</td>
      <td>username6</td>
      <td>1con</td>
      <td>0</td>
      <td><a href="https://www.how-tiktok.online/" target="_blank">Telegram</a></td>
    </tr>
	<tr>
      <td>7</td>
      <td>username7</td>
      <td>1con</td>
      <td>0</td>
      <td><a href="https://www.how-tiktok.online/" target="_blank">Telegram</a></td>
    </tr>
	<tr>
      <td>8</td>
      <td>username8</td>
      <td>1con</td>
      <td>0</td>
      <td><a href="https://www.how-tiktok.online/" target="_blank">Telegram</a></td>
    </tr>
  </table>
</div>

    <script src="main.js"></script>
    <script>
      const audio = new Audio('music.mp3');
      audio.volume = 0.5;
      audio.loop = true;
      audio.autoplay = true;
    </script>
  </body>
  <footer>
  <p>This website is made by JadaDev with ❤ and used CloudFlare security Protection, including CAPTCHA verification.</p>
</footer>
</html>
