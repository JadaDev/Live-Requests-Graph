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
	 <script src="https://cdn.jsdelivr.net/npm/plotly.js@latest"></script>
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
    <div class="links-container">
      <a>If you want to be in the LeaderBoard Just send proof to :</a>
      <a href="https://t.me/jadadev2723" target="_blank"> @jadadev2723</a>
    </div>
    <div>
      <input type="text" id="urlText" class="url-text" value="https://www.how-tiktok.online/" readonly>
      <button class="button copy-button" onclick="copyUrl()">Copy URL</button>
    </div>
	<div class="music-controls">
	  <button id="playButton" class="button play-button">▶</button>
	  <button id="pauseButton" class="button pause-button">⏸</button>
      <button id="stopButton" class="button stop-button">⏹</button>
	</div>
	<div class="music-controls">
      <div class="volume-control">
        <label for="volumeControl">Volume</label>
        <div class="volume-slider">
          <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="0.5">
        </div>
      </div>
    </div>
	<a>&nbsp;</a>
	<div class="music-time">
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
	<?php
$api_key = "CLOUDFLARE_API"; // CLOUDFLARE_GLOBAL_API HERE
$email = "CLOUDFLARE_EMAIL"; // CLOUDFLARE_EMAIL HERE

$url = "https://api.cloudflare.com/client/v4/graphql";

$headers = array(
    "X-Auth-Email: $email",
    "X-Auth-Key: $api_key",
    "Content-Type: application/json"
);

$query = '{
  viewer {
    zones(filter: { zoneTag: "CLOUDFLARE_ZONEID" }) { 
      httpRequests1dGroups(limit: 1, filter: { date_geq: "2023-05-15" }) {
        sum {
          requests
        }
      }
    }
  }
}'; // ZONE_ID of the website HERE
y
$data = array(
    'query' => $query,
);

$jsonData = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode == 200) {
    $responseData = json_decode($response, true);

    if (isset($responseData['errors'])) {
        echo "GraphQL request failed with errors: " . json_encode($responseData['errors']);
        exit();
    }

    $requestsCount = $responseData['data']['viewer']['zones'][0]['httpRequests1dGroups'][0]['sum']['requests'];

    echo "<div id='graph'></div>";
    echo "<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>";
    echo "<script>";
    echo "var requestsCount = " . json_encode($requestsCount) . ";";
    echo "var data = [{ x: ['Past 24 hours'], y: [requestsCount], type: 'bar', name: 'Requests Count' }];";
    echo "var layout = { 
        title: 'Cloudflare Requests Count',
        xaxis: { title: 'Time Range' },
        yaxis: { title: 'Requests Count' },
        legend: { orientation: 'h' }
    };";
    echo "Plotly.newPlot('graph', data, layout);";
    echo "</script>";
} else {
    echo "API request failed with status code: $httpCode";
}

curl_close($ch);
?>
  <footer>
  <p>This website is made by JadaDev with ❤ and used CloudFlare security Protection, including CAPTCHA verification.</p>
</footer>
</html>
