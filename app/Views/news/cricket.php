<!DOCTYPE html>
<html>
<head>
    <title>Cricket Matches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .scrolling-wrapper {
            overflow-x: auto;
            white-space: nowrap;
        }
        .match-card {
            display: inline-block;
            margin-right: 1rem;
            width: 300px;
            vertical-align: top;
        }
    </style>
</head>
<body class="bg-light">

<div class="container my-4">
    <h2>Today’s Matches</h2>
    <div class="scrolling-wrapper">
        <?php foreach ($todayMatches as $match): ?>
            <div class="card match-card">
                <div class="card-body">
                    <h5 class="card-title"><?= $match['team1'] ?> vs <?= $match['team2'] ?></h5>
                    <p class="card-text"><?= $match['status'] ?></p>
                    <p class="card-text"><strong>Date:</strong> <?= $match['date'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="mt-5">Upcoming Matches</h2>
    <div class="scrolling-wrapper">
        <?php foreach ($upcomingMatches as $match): ?>
            <div class="card match-card">
                <div class="card-body">
                    <h5 class="card-title"><?= $match['team1'] ?> vs <?= $match['team2'] ?></h5>
                    <p class="card-text"><strong>Date:</strong> <?= $match['date'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="mt-5">Completed Matches</h2>
    <div class="scrolling-wrapper">
        <?php foreach ($completedMatches as $match): ?>
            <div class="card match-card">
                <div class="card-body">
                    <h5 class="card-title"><?= $match['team1'] ?> vs <?= $match['team2'] ?></h5>
                    <p class="card-text"><strong>Score:</strong> <?= $match['team1Score'] ?> / <?= $match['team2Score'] ?></p>
                    <p class="card-text text-success"><?= $match['result'] ?? 'Completed' ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
