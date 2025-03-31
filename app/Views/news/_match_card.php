<div class="col">
    <div class="card h-100 shadow-sm border-0">
        <div class="card-body d-flex">
            <!-- Logos -->
            <div class="text-center me-4">
                <img src="<?= base_url('assets/images/default1.png') ?>" width="60" height="60" class="mb-2 rounded-circle border" alt="Team 1">
                <div><strong>vs</strong></div>
                <img src="<?= base_url('assets/images/default2.png') ?>" width="60" height="60" class="mt-2 rounded-circle border" alt="Team 2">
            </div>

            <!-- Match Info -->
            <div class="flex-grow-1">
                <?php
                    // Safely extract team names from CricAPI
                    $team1 = $match['teamInfo'][0]['name'] ?? 'Team A';
                    $team2 = $match['teamInfo'][1]['name'] ?? 'Team B';

                    // Format date
                    $date = isset($match['date']) ? date('Y-m-d', strtotime($match['date'])) : 'N/A';
                ?>
                <h5 class="card-title"><?= esc($team1) ?> vs <?= esc($team2) ?></h5>
                <p><strong>Type:</strong> <?= strtoupper(esc($match['matchType'] ?? 'N/A')) ?></p>
                <p><strong>Venue:</strong> <?= esc($match['venue'] ?? 'Unknown') ?></p>
                <p><strong>Date:</strong> <span class="badge bg-primary"><?= esc($date) ?></span></p>
                <p><strong>Status:</strong> <span class="badge bg-warning text-dark"><?= esc($match['status'] ?? 'N/A') ?></span></p>
            </div>
        </div>
    </div>
</div>
