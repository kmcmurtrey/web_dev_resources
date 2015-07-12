<form method="POST" class="well">
    <fieldset>
        <div class="form-group col-md-8 col-md-offset-2">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" <?php if (isset($_GET['id'])) {echo 'value="' . $website['title'] . '"';} ?>>
        </div>

        <div class="form-group col-md-8 col-md-offset-2">
            <label for="url">URL</label>
            <input type="text" name="url" class="form-control" <?php if (isset($_GET['id'])) {echo 'value="' . $website['url'] . '"';} ?>>
        </div>

        <div class="form-group col-md-8 col-md-offset-2">
            <label for="category">Category</label>
            <select name="category" class="form-control">
                <?php foreach ($categories as $category) : ?>
                    <option <?php if (isset($_GET['id']) && $website['category'] == $category['category']) {echo 'selected="selected"';}?>><?php echo $category['category']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group col-md-8 col-md-offset-2">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" rows="8"><?php if (isset($_GET['id'])) {echo $website['description'];} ?></textarea>
        </div>

        <div class="form-group col-md-8 col-md-offset-2">
            <input type="hidden" name="id" <?php if (isset($_GET['id'])) {echo 'value="' . $website['id'] . '"';} ?>>
            <input type="submit" name="save_website" class="form-control btn btn-primary"/>
        </div>
    </fieldset>
</form>

<!--value="--><?php //echo $website['title']; ?><!--"-->