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
                <h5 class="card-title">
                    <?= esc($match['localteam']['name'] ?? 'Team A') ?> vs <?= esc($match['visitorteam']['name'] ?? 'Team B') ?>
                </h5>
                <p><strong>Type:</strong> <?= strtoupper(esc($match['type'] ?? 'N/A')) ?></p>
                <p><strong>Venue:</strong> <?= esc($match['venue'] ?? 'Unknown') ?></p>
                <p><strong>Date:</strong> <span class="badge bg-primary"><?= esc($match['date'] ?? 'N/A') ?></span></p>
                <p><strong>Status:</strong> <span class="badge bg-warning text-dark"><?= esc($match['status'] ?? 'N/A') ?></span></p>
            </div>
        </div>
    </div>
</div>
