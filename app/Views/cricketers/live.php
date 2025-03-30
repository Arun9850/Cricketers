<?= $this->include('templates/header') ?>

<div id="weather" class="alert alert-info mt-4">
  🌍 Detecting weather...
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">📻 Cricbuzz Live Matches</h2>

    <?php if (!empty($matches)) : ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($matches as $match) :
                $info = $match['matchInfo'] ?? null;
                if (!$info) continue;
                $team1 = $info['team1']['teamName'] ?? 'Team A';
                $team2 = $info['team2']['teamName'] ?? 'Team B';
                $team1Logo = $info['team1']['teamSName'] ?? 'TeamA';
                $team2Logo = $info['team2']['teamSName'] ?? 'TeamB';
                $status = $info['status'] ?? 'Unknown';
                $venue = $info['venueInfo']['ground'] ?? 'Unknown Venue';
                $city = $info['venueInfo']['city'] ?? '';
            ?>
                <div class="col">
                    <div class="card shadow border-success h-100">
                        <div class="card-body">
                            <a href="<?= base_url('cricbuzz/commentary/' . ($info['matchId'] ?? 0)) ?>" class="text-decoration-none text-dark">
                                <h5 class="card-title">
                                    <img src="<?= base_url('assets/logos/' . $team1Logo . '.png') ?>" alt="<?= esc($team1) ?>" style="height: 30px;">
                                    <?= esc($team1) ?> vs
                                    <img src="<?= base_url('assets/logos/' . $team2Logo . '.png') ?>" alt="<?= esc($team2) ?>" style="height: 30px;">
                                    <?= esc($team2) ?>
                                </h5>
                            </a>
                            <p><strong>Format:</strong> <?= esc($info['matchFormat'] ?? '-') ?></p>
                            <p><strong>Venue:</strong> <?= esc($venue) ?>, <?= esc($city) ?></p>
                            <p><strong>Status:</strong> <span class="badge bg-warning text-dark"><?= esc($status) ?></span></p>
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
                    <strong><?= esc($line['ball']) ?></strong>
                    <span class="text-muted"> (<?= esc($line['batsman']) ?>)</span><br>
                    <?= esc($line['text']) ?>
                </li>
            <?php endforeach; ?>
        </ul>

    <?php else : ?>
        <div class="alert alert-warning text-center">No matches or commentary available right now.</div>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer') ?>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const weatherDiv = document.getElementById('weather');

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error);
  } else {
    weatherDiv.textContent = "Geolocation is not supported by this browser.";
  }

  function success(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    const apiKey = 'your_openweathermap_api_key';

    const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;

    fetch(url)
      .then(res => res.json())
      .then(data => {
        const temp = data.main.temp;
        const city = data.name;
        weatherDiv.innerHTML = `🌤 Weather in <strong>${city}</strong>: ${temp}&deg;C`;
      })
      .catch(() => {
        weatherDiv.textContent = "Failed to fetch weather data.";
      });
  }

  function error() {
    weatherDiv.textContent = "Unable to retrieve your location.";
  }
});
</script>
