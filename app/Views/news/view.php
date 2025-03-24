<h2 class="text-center"><?= esc($cricketer['name']) ?> (<?= esc($cricketer['country']) ?>)</h2>

<div class="container">
    <div class="card p-4 shadow-sm text-center">
        <h3>Career Stats</h3>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Competition</th>
                    <th>Matches</th>
                    <th>Runs</th>
                    <th>Batting Avg</th>
                    <th>100s/50s</th>
                    <th>Top Score</th>
                    <th>Balls Bowled</th>
                    <th>Wickets</th>
                    <th>Bowling Avg</th>
                    <th>Best Bowling</th>
                    <th>Catches</th>
                    <th>Stumpings</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stats as $stat): ?>
                <tr>
                    <td><?= esc($stat['competition']) ?></td>
                    <td><?= esc($stat['matches']) ?></td>
                    <td><?= esc($stat['runs']) ?></td>
                    <td><?= esc($stat['batting_avg']) ?></td>
                    <td><?= esc($stat['hundreds']) ?>/<?= esc($stat['fifties']) ?></td>
                    <td><?= esc($stat['top_score']) ?></td>
                    <td><?= esc($stat['balls_bowled'] ?? '-') ?></td>
                    <td><?= esc($stat['wickets'] ?? '-') ?></td>
                    <td><?= esc($stat['bowling_avg'] ?? '-') ?></td>
                    <td><?= esc($stat['best_bowling'] ?? '-') ?></td>
                    <td><?= esc($stat['catches']) ?></td>
                    <td><?= esc($stat['stumpings']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
