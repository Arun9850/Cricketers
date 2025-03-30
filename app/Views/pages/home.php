<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricketer Reviews | The Cricket Hub</title>
    <meta name="description" content="Explore reviews of the world's greatest cricketers, their stats, achievements, and career highlights.">
    <meta name="keywords" content="cricket, cricketer reviews, cricket stats, batting average, world cup winners">
    
    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(35, 209, 90);
        }
        .hero {
            background: url('<?= base_url("assets/images/cricket-banner.jpg"); ?>') no-repeat center center/cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 4px 3px 10px rgba(0, 0, 0, 0.7);
        }
        .card {
            transition: 0.3s;
            border: none;
            border-radius: 10px;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .btn-view {
            background-color: #d92332;
            color: white;
        }
        .btn-view:hover {
            background-color: #b81d2a;
        }
        .footer-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>


<!-- Hero Section -->
<div class="hero">
    <h1>Welcome to Cricketer Reviews - Celebrating Legends of Cricket</h1>
</div>

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <!-- Main Content Section -->
        <div class="col-md-8">
            <h2>Why Cricket?</h2>
            <p>Cricket is not just a game; it's an emotion. From thrilling T20 matches to historic Test cricket, this sport has produced countless legends.</p>
            
            <h3>Top Cricketers</h3>
            <p>Explore our top-rated cricketers based on their performance and achievements.</p>

            <ul class="list-group">
                <li class="list-group-item">🏏 <strong>Sachin Tendulkar (India)</strong> - 34000 Runs, Avg: 58.65</li>
                <li class="list-group-item">🏏 <strong>Virat Kohli (India)</strong> - 25000 Runs, Avg: 55.4</li>
                <li class="list-group-item">🏏 <strong>Joe Root (England)</strong> - 17000 Runs, Avg: 50.8</li>
                <li class="list-group-item">🏏 <strong>Steve Smith (Australia)</strong> - 19000 Runs, Avg: 58.1</li>
                <li class="list-group-item">🏏 <strong>Babar Azam (Pakistan)</strong> - 14000 Runs, Avg: 54.2</li>
                <li class="list-group-item">🏏 <strong>Paras Khadka (Nepal)</strong> - 18000 Runs, Avg: 56.45</li>
            </ul>

            <h3 class="mt-4">Join the Discussion</h3>
            <p>Want to add your favorite cricketer or review a match? <a href="<?= base_url('news/new'); ?>" class="btn btn-sm btn-view">Add a Cricketer</a></p>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <h3>Cricketer Categories</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="<?= base_url('top-batsmen'); ?>">🏏 Top Batsmen</a></li>
                <li class="list-group-item"><a href="<?= base_url('legendary-bowlers'); ?>">🔥 Legendary Bowlers</a></li>
                <li class="list-group-item"><a href="<?= base_url('all-rounders'); ?>">🌟 All-Rounders</a></li>
                <li class="list-group-item"><a href="<?= base_url('emerging-stars'); ?>">🚀 Emerging Stars</a></li>
            </ul>

            <h3 class="mt-4">Cricket Achievements</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="<?= base_url('world-cup-winners'); ?>">🏆 World Cup Winners</a></li>
                <li class="list-group-item"><a href="<?= base_url('ipl-champions'); ?>">🥇 IPL Champions</a></li>
                <li class="list-group-item"><a href="<?= base_url('most-centuries'); ?>">🏅 Most Centuries</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p>&copy; 2025 Cricketer Reviews. All Rights Reserved.</p>
        <div class="footer-links">
            <a href="<?= base_url('pages/about'); ?>">About Us</a> |
            <a href="<?= base_url('pages/contact'); ?>">Contact</a> |
            <a href="<?= base_url('pages/privacy'); ?>">Privacy Policy</a> |
            <a href="<?= base_url('pages/terms'); ?>">Terms & Conditions</a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
