<h2 class="text-center"><?= esc($cricketer['name']) ?> (<?= esc($cricketer['country']) ?>)</h2>

<div class="container">
    <div class="card p-4 shadow-sm text-center">
        <h3><?= esc($cricketer['name']) ?></h3>
        <p><strong>Matches:</strong> <?= esc($cricketer['matches']) ?></p>
        <p><strong>Runs:</strong> <?= esc($cricketer['runs']) ?></p>
        <p><strong>Avg:</strong> <?= esc($cricketer['average']) ?></p>
        <p><strong>Achievements:</strong> <?= esc($cricketer['achievements']) ?></p>
    </div>

    <!-- Section for Live Player Stats -->
    <div class="card mt-4 p-3 shadow-sm">
        <h3 class="text-center">Live Stats</h3>
        <div id="playerStats" class="text-center">Loading...</div>
    </div>

    <!-- Back to reviews button -->
    <div class="text-center mt-3">
        <a href="<?= site_url('news') ?>" class="btn btn-secondary">Back to Reviews</a>
    </div>
</div>

<script>
    function fetchPlayerStats(playerId) {
        fetch('<?= site_url('apis/getPlayerStats/') ?>' + playerId)
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
