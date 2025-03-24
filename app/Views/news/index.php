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
            background: #f8f9fa;
        }
        .hero {
            background: url('<?= base_url("assets/images/cricket-banner.jpg"); ?>') no-repeat center center/cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }
        .card {
            transition: 0.3s;
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
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">Cricket Hub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('news'); ?>">Cricketers</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('news/new'); ?>">Add Cricketer</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('pages/contact'); ?>">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <h1>Welcome to Cricketer Reviews</h1>
</div>

<!-- Main Content -->
<div class="container mt-4">
    <div class="row">
        <?php if (!empty($cricketer_list)): ?>
            <?php foreach ($cricketer_list as $cricketer): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?= esc($cricketer['image']) ?>" class="card-img-top" alt="<?= esc($cricketer['name']) ?>" style="height: 250px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= esc($cricketer['name']) ?> (<?= esc($cricketer['country']) ?>)</h5>
                            <p><strong>Matches:</strong> <?= esc($cricketer['matches']) ?></p>
                            <p><strong>Runs:</strong> <?= esc($cricketer['runs']) ?></p>
                            <p><strong>Avg:</strong> <?= esc($cricketer['average']) ?></p>
                            <p><strong>Achievements:</strong> <?= esc($cricketer['achievements']) ?></p>
                            
                            <a href="<?= base_url('news/' . esc($cricketer['slug'], 'url')) ?>" class="btn btn-view">View Profile</a>
                            <button class="btn btn-info" onclick="getData('<?= esc($cricketer['slug'], 'url') ?>')">View via Ajax</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h3 class="text-center">No Cricketers Found</h3>
        <?php endif; ?>
    </div>
</div>

<!-- Ajax Article Display -->
<div class="container mt-4">
    <h3 class="text-center">Cricketer Details</h3>
    <p id="ajaxArticle" class="text-center">Click "View via Ajax" to load details.</p>
</div>

<!-- Footer -->
<footer class="bg-dark text-center text-white py-3 mt-5">
    <p>&copy; 2025 Cricket Hub. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- AJAX Functionality -->
<script>
    function getData(slug) {
        fetch('https://mi-linux.wlv.ac.uk/~2304466/Arunweb/public/ajax/get/' + slug)
            .then(response => response.json())
            .then(response => {
                document.getElementById("ajaxArticle").innerHTML = 
                    "<div class='container text-center mt-4'>" +
                        "<h3>" + response.name + " (" + response.country + ")</h3>" +
                        "<img src='" + response.image + "' class='img-fluid' width='200' height='200' alt='" + response.name + "'>" +
                        "<p><strong>Matches:</strong> " + response.matches + "</p>" +
                        "<p><strong>Runs:</strong> " + response.runs + "</p>" +
                        "<p><strong>Avg:</strong> " + response.average + "</p>" +
                        "<p><strong>Achievements:</strong> " + response.achievements + "</p>" +
                    "</div>";
            })
            .catch(err => {
                console.log(err);
                document.getElementById("ajaxArticle").innerHTML = "<p class='text-danger'>Error loading data.</p>";
            });
    }
</script>

</body>
</html>
