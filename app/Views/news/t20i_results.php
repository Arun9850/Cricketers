<!-- app/Views/news/t20i_results.php -->
<div class="container mt-4">

    <h2>Today's Matches</h2>
    <?php foreach ($todayMatches as $match): ?>
        <?= view('news/_match_card', ['match' => $match]) ?>
    <?php endforeach; ?>

    <h2>Upcoming Matches</h2>
    <?php foreach ($upcomingMatches as $match): ?>
        <?= view('news/_match_card', ['match' => $match]) ?>
    <?php endforeach; ?>

    <h2>Completed Matches</h2>
    <?php foreach ($completedMatches as $match): ?>
        <?= view('news/_match_card', ['match' => $match]) ?>
    <?php endforeach; ?>

</div>
