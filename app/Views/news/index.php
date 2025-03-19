<h2><?= esc($title) ?></h2>

<p id="ajaxArticle"></p>

<?php if ($cricketer_list !== []): ?>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($cricketer_list as $cricketer): ?>
            <div class="col">
                <div class="card w-100 mt-3">
                    <div class="card-body">
                        <h3 class="card-title"><?= esc($cricketer['name']) ?> (<?= esc($cricketer['country']) ?>)</h3>
                        <img src="<?= esc($cricketer['image']) ?>" alt="Virat in a jacket" width="100" height="100">
                        <p><strong>Matches:</strong> <?= esc($cricketer['matches']) ?></p>
                        <p><strong>Runs:</strong> <?= esc($cricketer['runs']) ?></p>
                        <p><strong>Avg:</strong> <?= esc($cricketer['average']) ?></p>
                        <p><strong>Achievements:</strong> <?= esc($cricketer['achievements']) ?></p>

                        <a class="btn btn-primary" href="<?= base_url('news/' . esc($cricketer['slug'], 'url')) ?>">View Profile</a>
                        <button class="btn btn-info" onclick="getData('<?= esc($cricketer['slug'], 'url') ?>')">View via Ajax</button>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php else: ?>
    <h3>No Cricketers Found</h3>
    <p>Check back later.</p>
<?php endif ?>

<script>
    function getData(slug) {
        // Fetch cricketer data dynamically
        fetch('https://mi-linux.wlv.ac.uk/~2304466/Arunweb/public/ajax/get/' + slug)
            .then(response => response.json()) // Convert response to JSON
            .then(response => {
                document.getElementById("ajaxArticle").innerHTML = 
                    "<h3>" + response.name + " (" + response.country + ")</h3>" +
                    "<p><strong>Matches:</strong> " + response.matches + "</p>" +
                    "<p><strong>Runs:</strong> " + response.runs + "</p>" +
                    "<p><strong>Avg:</strong> " + response.average + "</p>" +
                    "<p><strong>Achievements:</strong> " + response.achievements + "</p>";
            })
            .catch(err => {
                console.log(err);
            });
    }
</script>
