<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Cricketer Reviews - Legends of Cricket</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        /* Header Styling */
        header {
            background: #222;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
        }

        header nav a:hover {
            color: #d92332;
        }

        /* Hero Section */
        .hero {
            background: url('<?= base_url("assets/images/cricket-banner.jpg"); ?>') no-repeat center center/cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        /* Main Content Section */
        .container {
            width: 80%;
            margin: auto;
            padding: 40px 0;
            text-align: center;
        }

        .section {
            background: white;
            padding: 30px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #d92332;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #b81d2a;
        }

        /* Footer Styling */
        footer {
            background: #222;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .hero h1 {
                font-size: 1.5rem;
            }

            header nav a {
                font-size: 16px;
            }

            footer p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <nav>
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url('news'); ?>">Cricketers</a>
            <a href="<?= base_url('news/new'); ?>">Add Cricketer</a>
            <a href="<?= base_url('pages/contact'); ?>">Contact</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to Cricketer Reviews - Celebrating Legends of Cricket</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="section">
            <h2>Why Cricket?</h2>
            <p>Cricket is not just a game; it's an emotion. From thrilling T20 matches to historic Test cricket, this sport has produced countless legends.</p>
            <a href="<?= base_url('news'); ?>" class="btn">Explore Cricketers</a>
        </div>

        <div class="section">
            <h2>Top Cricketers</h2>
            <p>Explore our top-rated cricketers based on their performance and achievements.</p>
            <ul>
                <li>🏏 <strong>Virat Kohli</strong> (India) - 25000 Runs, Avg: 55.4</li>
                <li>🏏 <strong>Joe Root</strong> (England) - 17000 Runs, Avg: 50.8</li>
                <li>🏏 <strong>Steve Smith</strong> (Australia) - 19000 Runs, Avg: 58.1</li>
                <li>🏏 <strong>Babar Azam</strong> (Pakistan) - 14000 Runs, Avg: 54.2</li>
            </ul>
        </div>

        <div class="section">
            <h2>Join the Discussion</h2>
            <p>Want to add your favorite cricketer or review a match? Get involved now!</p>
            <a href="#" id="addCricketerBtn" class="btn">Add a Cricketer</a>
            <div id="addCricketerSection"></div>

        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Cricketer Reviews. All Rights Reserved.</p>
    </footer>

</body>
</html>
