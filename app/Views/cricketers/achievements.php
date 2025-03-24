<h2><?= esc($title) ?></h2>

<?php if (isset($winners)): ?>
    <ul>
        <?php foreach ($winners as $winner): ?>
            <li><?= esc($winner['year']) ?> - <?= esc($winner['team']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (isset($players)): ?>
    <ul>
        <?php foreach ($players as $player): ?>
            <li><?= esc($player['name']) ?> - <?= esc($player['centuries']) ?> centuries</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
