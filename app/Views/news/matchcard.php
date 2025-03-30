<!-- app/Views/news/_match_card.php -->
<div class="col-12 mb-3">
    <div class="card shadow-sm border-0">
        <div class="card-body d-flex align-items-center">
            <div class="text-center me-4">
                <img src="<?= base_url('assets/images/default1.png') ?>" width="60" height="60" class="mb-2 rounded-circle border" alt="Team 1">
                <div><strong>vs</strong></div>
                <img src="<?= base_url('assets/images/default2.png') ?>" width="60" height="60" class="mt-2 rounded-circle border" alt="Team 2">
            </div>

            <div class="flex-grow-1">
                <h5 class="card-title"><?= esc($match['name']) ?></h5>
                <p><strong>Type:</strong> <?= strtoupper(esc($match['matchType'] ?? '')) ?></p>
                <p><strong>Venue:</strong> <?= esc($match['venue'] ?? 'Unknown') ?></p>

                <?php if (isset($match['note'])): ?>
                    <p><strong>Note:</strong> <?= esc($match['note']) ?></p>
                <?php else: ?>
                    <p><strong>Date:</strong> <?= date('D, d M Y', strtotime($match['starting_at'])) ?></p>
                <?php endif; ?>

                <p><strong>Round:</strong> <?= esc($match['round'] ?? 'N/A') ?></p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-warning text-dark"><?= esc($match['status'] ?? 'N/A') ?></span>
                </p>
            </div>
        </div>
    </div>
</div>
