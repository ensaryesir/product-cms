<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Product</h1>
    <?php echo form_open('product_controller/edit/'.$product['id']); ?>
    <div class="form-group">
        <label for="product_title">Title</label>
        <input type="text" class="form-control" id="product_title" name="product_title" value="<?php echo $product['product_title']; ?>" required>
    </div>
    <div class="form-group">
        <label for="product_additional_info_title">Additional Info Title</label>
        <input type="text" class="form-control" id="product_additional_info_title" name="product_additional_info_title" value="<?php echo $product['product_additional_info_title']; ?>">
    </div>
    <div class="form-group">
        <label for="product_additional_info_description">Additional Info Description</label>
        <textarea class="form-control" id="product_additional_info_description" name="product_additional_info_description"><?php echo $product['product_additional_info_description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="meta_title">Meta Title</label>
        <input type="text" class="form-control" id="meta_title" name="meta_title" value="<?php echo $product['meta_title']; ?>">
    </div>
    <div class="form-group">
        <label for="meta_keywords">Meta Keywords</label>
        <textarea class="form-control" id="meta_keywords" name="meta_keywords"><?php echo $product['meta_keywords']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <textarea class="form-control" id="meta_description" name="meta_description"><?php echo $product['meta_description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="seo_url">SEO URL</label>
        <input type="text" class="form-control" id="seo_url" name="seo_url" value="<?php echo $product['seo_url']; ?>">
    </div>
    <div class="form-group">
        <label for="product_description">Description</label>
        <textarea class="form-control" id="product_description" name="product_description"><?php echo $product['product_description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="video_embed_code">Video Embed Code</label>
        <textarea class="form-control" id="video_embed_code" name="video_embed_code"><?php echo $product['video_embed_code']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>