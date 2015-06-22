<form method="POST" class="website_form">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo $website['title']; ?>">
    </div>
    
    <div>
        <label for="url">URL</label>
        <input type="text" name="url" value="<?php echo $website['url']; ?>">
    </div>

    <div>
        <label for="category">Category</label>
        <select name="category" value="<?php echo $website['category']; ?>">
            <?php foreach ($categories as $category) : ?>
                <option <?php if ($website['category'] == $category['category']) {echo 'selected="selected"';}?>><?php echo $category['category']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description"><?php echo $website['description']; ?></textarea>
    </div>
    
    <div>
        <input type="submit" name="save_website" />
    </div>
    
</form>