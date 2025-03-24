<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | Cricketer Reviews</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center"><?= esc($title) ?></h2>
    
    <ul class="list-group mt-3">
        <?php foreach ($players as $player): ?>
            <li class="list-group-item">
                <strong><?= esc($player['name']) ?></strong> (<?= esc($player['country']) ?>)
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="mt-4 text-center">
        <a href="<?= base_url(); ?>" class="btn btn-primary">Back to Home</a>
    </div>
</div>

</body>
</html>
