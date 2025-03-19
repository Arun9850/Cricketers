<h2 class="text-center">Add a New Cricketer</h2>

<div class="container">
    <div class="card p-4 shadow-sm">
        <form action="<?= site_url('news/create') ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Cricketer Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>

            <div class="mb-3">
                <label for="matches" class="form-label">Matches</label>
                <input type="number" class="form-control" id="matches" name="matches" required>
            </div>

            <div class="mb-3">
                <label for="runs" class="form-label">Runs</label>
                <input type="number" class="form-control" id="runs" name="runs" required>
            </div>

            <div class="mb-3">
                <label for="average" class="form-label">Batting Average</label>
                <input type="text" class="form-control" id="average" name="average" required>
            </div>

            <div class="mb-3">
                <label for="achievements" class="form-label">Achievements</label>
                <textarea class="form-control" id="achievements" name="achievements" required></textarea>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug (Unique URL)</label>
                <input type="text" class="form-control" id="slug" name="slug" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Add Cricketer</button>
        </form>
    </div>
</div>
