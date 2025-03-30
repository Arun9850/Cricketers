<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .card-title {
            font-weight: bold;
        }
        .list-group-item {
            font-size: 18px;
        }
        .highlight {
            background-color: #ffc107;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center text-primary"><?= esc($title) ?></h2>

    <?php if (isset($winners)): ?>
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4>🏆 World Cup Winners</h4>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($winners as $winner): ?>
                    <li class="list-group-item">
                        <span class="highlight"><?= esc($winner['year']) ?></span> - <?= esc($winner['team']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (isset($players)): ?>
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h4>🏏 Most Centuries</h4>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($players as $player): ?>
                    <li class="list-group-item">
                        <?= esc($player['name']) ?> - <span class="highlight"><?= esc($player['centuries']) ?></span> centuries
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
