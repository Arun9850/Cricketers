<!-- Hero Section -->
<div class="hero">
    <h1>Welcome to Cricketer Reviews</h1>
    <p id="location-info" class="fs-5 mt-2" style="background-color: rgb(0, 255, 255); color: #00fff; padding: 10px 20px; border-radius: 10px; font-weight: bold; max-width: 90%; text-align: center;"></p>
</div>

<!-- Live Matches Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">📻 Today's Matches</h2>
    <div class="row">
        <?php if (!empty($today_matches)): ?>
            <?php foreach ($today_matches as $match): ?>
                <?= view('news/_match_card', ['match' => $match]) ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-muted">No matches today.</p>
        <?php endif; ?>
    </div>

<!-- 🔍 Cricketer Search Autocomplete -->
<div class="container mt-5">
    <h3 class="text-center">🔎 Search Cricketer</h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Start typing a cricketer's name...">
            <ul id="suggestions" class="list-group mt-2"></ul>
        </div>
    </div>
</div>

<!-- Cricketer Cards (AJAX Loaded) -->
<div class="container mt-4">
    <h2 class="text-center">🌟 Top Cricketers</h2>
    <div class="row" id="cricketerList">
        <!-- AJAX content will be injected here -->
    </div>
</div>

<!-- Ajax Article Display -->
<div class="container mt-4">
    <h3 class="text-center">Cricketer Details</h3>
    <p id="ajaxArticle" class="text-center">Click "View via Ajax" to load details.</p>
</div>

<?= $this->include('templates/footer') ?>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AJAX Load Cricketers -->
<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= base_url("ajax/cricketers") ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let output = '';
                response.forEach(function(cricketer) {
                    output += `
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src="${cricketer.image}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="${cricketer.name}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">${cricketer.name} (${cricketer.country})</h5>
                                    <p><strong>Matches:</strong> ${cricketer.matches}</p>
                                    <p><strong>Runs:</strong> ${cricketer.runs}</p>
                                    <p><strong>Avg:</strong> ${cricketer.average}</p>
                                    <p><strong>Achievements:</strong> ${cricketer.achievements}</p>
                                    <a href="<?= base_url('news') ?>/${cricketer.slug}" class="btn btn-view">View Profile</a>
                                    <button class="btn btn-info" onclick="getData('${cricketer.slug}')">View via Ajax</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#cricketerList').html(output);
            },
            error: function() {
                $('#cricketerList').html("<p class='text-center text-danger'>Failed to load cricketers.</p>");
            }
        });
    });

    function getData(slug) {
        fetch('<?= base_url("ajax/get/") ?>' + slug)
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

<!-- 🌍 Geolocation Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        document.getElementById("location-info").innerText = "Geolocation is not supported by this browser.";
    }

    function showPosition(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        fetch(`https://geocode.maps.co/reverse?lat=${lat}&lon=${lon}`)
            .then(response => response.json())
            .then(data => {
                const city = data.address.city || data.address.town || data.address.village || "your area";
                document.getElementById("location-info").innerText = `📍 You are in ${city}`;
            })
            .catch(() => {
                document.getElementById("location-info").innerText = `Coordinates: ${lat}, ${lon}`;
            });
    }

    function showError(error) {
        document.getElementById("location-info").innerText = "Unable to retrieve your location.";
    }
});
</script>

<!-- 🔍 Autocomplete AJAX -->
<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            let query = $(this).val();
            if (query.length >= 2) {
                $.ajax({
                    url: "<?= base_url('ajax/search') ?>",
                    method: "GET",
                    data: { q: query },
                    success: function (response) {
                        let suggestions = '';
                        response.forEach(function (cricketer) {
                            if (cricketer.external) {
                                suggestions += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>${cricketer.name} (${cricketer.country})</span>
                                    <button class="btn btn-sm btn-success" onclick="addCricketer('${cricketer.name}', '${cricketer.slug}', '${cricketer.country}')">Add to DB</button>
                                </li>`;
                            } else {
                                suggestions += `<li class="list-group-item">
                                    <a href="/news/${cricketer.slug}">${cricketer.name} (${cricketer.country})</a>
                                </li>`;
                            }
                        });
                        $('#suggestions').html(suggestions);
                    },
                    error: function () {
                        $('#suggestions').html('<li class="list-group-item text-danger">No results found</li>');
                    }
                });
            } else {
                $('#suggestions').empty();
            }
        });
    });

    function addCricketer(name, slug, country) {
        $.ajax({
            url: "<?= base_url('ajax/add') ?>",
            method: "POST",
            data: {
                name: name,
                slug: slug,
                country: country
            },
            success: function (response) {
                alert("✅ Cricketer added successfully!");
                $('#searchInput').val('');
                $('#suggestions').empty();
            },
            error: function () {
                alert("❌ Failed to add cricketer.");
            }
        });
    }
</script>