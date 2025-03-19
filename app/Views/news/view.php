<h2><?= esc($cricketer['title']) ?> (<?= esc($cricketer['country']) ?>)</h2>
<p><strong>Stats:</strong> <?= esc($cricketer['stats']) ?></p>
<p><strong>Achievements:</strong> <?= esc($cricketer['achievements']) ?></p>

<!-- Section for Live Player Stats -->
<h3>Live Stats</h3>
<div id="playerStats">Loading...</div>

<script>
    function fetchPlayerStats(playerId) {
        fetch('/apis/getPlayerStats/' + playerId)
            .then(response => response.json())
            .then(data => {
                document.getElementById("playerStats").innerHTML = 
                    "<p><strong>Matches:</strong> " + data.matches + "</p>" +
                    "<p><strong>Runs:</strong> " + data.runs + "</p>" +
                    "<p><strong>Wickets:</strong> " + data.wickets + "</p>";
            })
            .catch(err => console.log(err));
    }

    // Replace with the actual player ID if available
    fetchPlayerStats("player-id-example");
</script>

<!-- Back to reviews link -->
<a href="/">Back to Reviews</a>
