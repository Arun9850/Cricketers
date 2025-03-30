<?= $this->include('templates/header') ?>

<div id="weather" class="alert alert-info mt-4">
  🌍 Detecting weather...
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">📻 Cricbuzz Live Matches</h2>

    <?php if (!empty($matches)) : ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($matches as $match) :
                $teams = $match['teams'] ?? [];
                $teamA = is_array($teams) && isset($teams[0]) ? $teams[0] : 'Team A';
                $teamB = is_array($teams) && isset($teams[1]) ? $teams[1] : 'Team B';
                $venue = $match['venue'] ?? 'Unknown Venue';
                $matchId = $match['id'] ?? null;
                $status = $match['status'] ?? 'Status Unknown';

                // Score can be string or array or nested
                $scoreText = '-';
                if (!empty($match['score'])) {
                    if (is_string($match['score'])) {
                        $scoreText = $match['score'];
                    } elseif (is_array($match['score'])) {
                        // Convert any nested arrays into flat strings
                        $parts = [];
                        foreach ($match['score'] as $val) {
                            $parts[] = is_array($val) ? implode(' ', $val) : $val;
                        }
                        $scoreText = implode(' | ', $parts);
                    }
                }
            ?>
                <div class="col">
                    <div class="card shadow border-info h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= esc($teamA) ?> vs <?= esc($teamB) ?>
                            </h5>
                            <p><strong>Status:</strong> <?= esc($status) ?></p>
                            <p><strong>Scores:</strong> <?= esc($scoreText) ?></p>
                            <p><strong>Venue:</strong> <?= esc($venue) ?></p>
                            <?php if ($matchId) : ?>
                                <a href="<?= base_url('cricbuzz/commentary/' . $matchId) ?>" class="btn btn-sm btn-outline-primary">🎙 View Commentary</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php elseif (!empty($commentary)) : ?>
        <h4 class="mt-5 mb-3">🎙️ Live Commentary</h4>
        <ul class="list-group shadow">
            <?php foreach ($commentary as $line) : ?>
                <li class="list-group-item">
                    <strong><?= esc($line['ball'] ?? '-') ?>:</strong>
                    <?= esc($line['text'] ?? 'No commentary') ?>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php else : ?>
        <div class="alert alert-warning text-center">No matches or commentary available.</div>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer') ?>

<!-- ✅ Weather Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const weatherDiv = document.getElementById('weather');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            const apiKey = '20b66f95f110ecedba219f431ed391d1';

            const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    const temp = data.main.temp;
                    const city = data.name;
                    const weatherText = `🌤 Weather in <strong>${city}</strong>: ${temp}°C`;

                    if (weatherDiv) weatherDiv.innerHTML = weatherText;

                    const weatherCards = document.querySelectorAll('[id^="weather-card-"]');
                    weatherCards.forEach(card => {
                        card.innerHTML = weatherText;
                    });
                })
                .catch(() => {
                    weatherDiv.textContent = "Failed to fetch weather data.";
                });
        }, function() {
            weatherDiv.textContent = "Unable to retrieve your location.";
        });
    } else {
        weatherDiv.textContent = "Geolocation is not supported by this browser.";
    }
});
</script>
