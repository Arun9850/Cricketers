<h2 class="text-center"><?= esc($cricketer['name']) ?> (<?= esc($cricketer['country']) ?>)</h2>

<div class="container">
    <div class="card p-4 shadow-sm text-center">
        <h3><?= esc($cricketer['name']) ?></h3>
        <p><strong>Matches:</strong> <?= esc($cricketer['matches']) ?></p>
        <p><strong>Runs:</strong> <?= esc($cricketer['runs']) ?></p>
        <p><strong>Avg:</strong> <?= esc($cricketer['average']) ?></p>
        <p><strong>Achievements:</strong> <?= esc($cricketer['achievements']) ?></p>
    </div>
</div>
