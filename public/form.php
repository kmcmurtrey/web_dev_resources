<form method="POST" class="website_form">
    <fieldset>
        <legend>Website Info</legend>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" <?php if (isset($_GET['id'])) {echo 'value="' . $website['title'] . '"';} ?>>
        </div>

        <div>
            <label for="url">URL</label>
            <input type="text" name="url" <?php if (isset($_GET['id'])) {echo 'value="' . $website['url'] . '"';} ?>>
        </div>

        <div>
            <label for="category">Category</label>
            <select name="category">
                <?php foreach ($categories as $category) : ?>
                    <option <?php if (isset($_GET['id']) && $website['category'] == $category['category']) {echo 'selected="selected"';}?>><?php echo $category['category']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea type="text" name="description"><?php if (isset($_GET['id'])) {echo $website['description'];} ?></textarea>
        </div>

        <div>
            <input type="hidden" name="id" <?php if (isset($_GET['id'])) {echo 'value="' . $website['id'] . '"';} ?>>
            <input type="submit" name="save_website" />
        </div>
    </fieldset>
</form>

<!--value="--><?php //echo $website['title']; ?><!--"-->