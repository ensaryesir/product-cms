<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <ul class="nav nav-tabs" id="productTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link <?php echo (!isset($_GET['tab']) || $_GET['tab'] == 'general') ? 'active' : ''; ?>" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">General</button>
        </li>
        <li class="nav-item">
            <button class="nav-link <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'details') ? 'active' : ''; ?>" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">Details</button>
        </li>
        <li class="nav-item">
            <button class="nav-link <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'images') ? 'active' : ''; ?>" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab">Images</button>
        </li>
        <li class="nav-item">
            <button class="nav-link <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'discount') ? 'active' : ''; ?>" id="discount-tab" data-bs-toggle="tab" data-bs-target="#discount" type="button" role="tab">Discount</button>
        </li>
    </ul>
    <div class="tab-content border border-top-0 p-4" id="productTabContent">
        <!-- General Tab -->
        <div class="tab-pane fade <?php echo (!isset($_GET['tab']) || $_GET['tab'] == 'general') ? 'show active' : ''; ?>" id="general" role="tabpanel">
            <?php echo form_open('ProductController/create', ['id' => 'generalForm']); ?>
            <input type="hidden" name="next_tab" id="next_tab_general" value="general">
                <div class="form-group mb-3">
                    <label for="product_title" class="form-label">Product Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="product_title" name="product_title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="product_additional_info_title" class="form-label">Additional Info Title</label>
                    <input type="text" class="form-control" id="product_additional_info_title" name="product_additional_info_title">
                </div>
                <div class="form-group mb-3">
                    <label for="product_additional_info_description" class="form-label">Additional Info Description</label>
                    <textarea class="form-control" id="product_additional_info_description" name="product_additional_info_description"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title">
                </div>
                <div class="form-group mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <textarea class="form-control" id="meta_keywords" name="meta_keywords"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="seo_url" class="form-label">SEO URL</label>
                    <input type="text" class="form-control" id="seo_url" name="seo_url">
                    <div class="form-text">If not provided, the SEO URL will be automatically generated based on the title.</div>
                </div>
                <div class="form-group mb-3">
                    <label for="product_description" class="form-label">Product Description</label>
                    <textarea class="form-control" id="product_description" name="product_description"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="video_embed_code" class="form-label">Video Embed Code</label>
                    <textarea class="form-control" id="video_embed_code" name="video_embed_code"></textarea>
                    <div class="form-text">Embed code from video sites like Vimeo, Google Video, YouTube, etc.</div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success" onclick="setNextTab('details')">Save and Continue</button>
                    <a href="#" class="btn btn-danger" onclick="resetFormAndScrollToTop('generalForm')">Cancel</a>
                </div>
            <?php echo form_close(); ?>
        </div>

        <!-- Details Tab -->
        <div class="tab-pane fade <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'details') ? 'show active' : ''; ?>" id="details" role="tabpanel">
            <?php echo form_open('ProductDetailController/create', ['id' => 'detailsForm']); ?>
            <input type="hidden" name="next_tab" id="next_tab_details" value="details">
                <div class="form-group mb-3">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code" required>
                    <div class="form-text">Product code</div>
                </div>
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                        <select class="form-select" id="quantity_unit" name="quantity_unit" required>
                            <option value="pieces">Pieces</option>
                            <option value="kg">Kg</option>
                            <option value="liters">Liters</option>
                            <option value="packs">Packs</option>
                        </select>
                    </div>
                    <div class="form-text">Determines how many pieces will be from the product. 
                        If this amount is entered as 0, the product will be listed on the site with the phrases "out of stock". 
                        If there is a choice in the product, the stock of the products cannot be greater than the stock of the product.</div>
                </div>
                <div class="form-group mb-3">
                    <label for="extra_discount" class="form-label">Extra Discount %</label>
                    <div class="input-group">
                        <input list="discount_values" class="form-control" id="extra_discount" name="extra_discount" step="0.01">
                        <datalist id="discount_values">
                            <option value="0">
                            <option value="5">
                            <option value="10">
                            <option value="15">
                            <option value="20">
                            <option value="25">
                            <option value="30">
                            <option value="35">
                            <option value="40">
                            <option value="45">
                            <option value="50">
                        </datalist>
                    </div>
                    <div class="form-text">If an extra discount is applied to the cart, it will also be applied to the prices of the options if prices are entered for the options.</div>
                </div>
                <div class="form-group mb-3">
                    <label for="tax_rate" class="form-label">Tax Rate</label>
                    <div class="input-group">
                        <input list="tax_values" class="form-control" id="tax_rate" name="tax_rate" step="0.01">
                        <datalist id="tax_values">
                            <option value="0">
                            <option value="1">
                            <option value="5">
                            <option value="10">
                            <option value="15">
                            <option value="20">
                            <option value="25">
                            <option value="30">
                            <option value="35">
                            <option value="40">
                            <option value="45">
                            <option value="50">
                        </datalist>
                    </div>
                    <div class="form-text">The tax rate of the product</div>
                </div>
                <div class="form-group mb-3">
                    <label for="sale_price" class="form-label">Sale Price</label>
                    <div class="input-group mb-2">
                        <input type="number" step="0.01" class="form-control" id="sale_price_tl" name="sale_price_tl" placeholder="TL" oninput="convertCurrencyDetails('tl')">
                        <span class="input-group-text">TL</span>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" step="0.01" class="form-control" id="sale_price_usd" name="sale_price_usd" placeholder="USD" oninput="convertCurrencyDetails('usd')">
                        <span class="input-group-text">USD</span>
                    </div>
                    <div class="input-group mb-2">
                        <input type="number" step="0.01" class="form-control" id="sale_price_eur" name="sale_price_eur" placeholder="EUR" oninput="convertCurrencyDetails('eur')">
                        <span class="input-group-text">EUR</span>
                    </div>
                    <div class="form-text">The selling price of the product</div>
                </div>
                <div class="form-group mb-3">
                    <label for="second_sale_price" class="form-label">Second Sale Price</label>
                    <div class="input-group mb-2">
                        <input type="number" step="0.01" class="form-control" id="second_sale_price" name="second_sale_price" placeholder="TL">
                        <span class="input-group-text">TL</span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="deduct_from_stock" class="form-label">Deduct From Stock</label>
                    <select class="form-select" id="deduct_from_stock" name="deduct_from_stock">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                    <div class="form-text">After the product is sold, the product quantity is reduced</div>
                </div>
                <div class="form-group mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="1" selected>Open</option>
                        <option value="0">Closed</option>
                    </select>
                    <div class="form-text">Make products active or passive</div>
                </div>
                <div class="form-group mb-3">
                    <label for="feature_section" class="form-label">Feature Section</label>
                    <select class="form-select" id="feature_section" name="feature_section">
                        <option value="1" selected>Show</option>
                        <option value="0">Don't Show</option>
                    </select>
                    <div class="form-text">Show the feature tab of the products or don't show it</div>
                </div>
                <div class="form-group mb-3">
                    <label for="new_product_validity" class="form-label">New Product Validity</label>
                    <input type="date" class="form-control" id="new_product_validity" name="new_product_validity">
                </div>
                <div class="form-group mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" class="form-control" id="sort_order" name="sort_order">
                </div>
                <div class="form-group mb-3">
                    <label for="show_on_homepage" class="form-label">Show on Homepage</label>
                    <input type="number" class="form-control" id="show_on_homepage" name="show_on_homepage">
                    <div class="form-text">Enter the number to set the homepage sequence! 
                        If you enter a number greater than 0, it will appear on the homepage and take that order. 
                        If you enter 0, you will not see on the homepage</div>
                </div>
                <div class="form-group mb-3">
                    <label for="is_new" class="form-label">Is New</label>
                    <select class="form-select" id="is_new" name="is_new">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="installment" class="form-label">Installment</label>
                    <select class="form-select" id="installment" name="installment">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="warranty_period" class="form-label">Warranty Period</label>
                    <input type="number" class="form-control" id="warranty_period" name="warranty_period">
                    <div class="form-text">Warranty period in the month given for the product</div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success" onclick="setNextTab('images')">Save and Continue</button>
                    <a href="#" class="btn btn-danger" onclick="resetFormAndScrollToTop('detailsForm')">Cancel</a>
                </div>
            <?php echo form_close(); ?>
        </div>

        <!-- Images Tab -->
        <div class="tab-pane fade <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'images') ? 'show active' : ''; ?>" id="images" role="tabpanel">
            <form id="imageForm" enctype="multipart/form-data">
                <input type="hidden" name="next_tab" id="next_tab_images" value="images">
                <input type="hidden" name="product_id" value="<?php echo isset($product_id) ? $product_id : ''; ?>">
                <div class="form-group mb-3">
                    <label for="image_data" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image_data" name="image_data" onchange="previewImage(event)">
                    <div class="form-text">Click to add the main image to the product. 
                        When adding a picture to the product, you must enter a square picture, the recommended size is 800px width, 800px height. 
                        When adding images to the product, the maximum image size should be 1MB and the width should be 768px, the height should be 1024px.</div>
                </div>
                <div class="form-group mb-3">
                    <img id="image_preview" src="#" alt="Image Preview" style="display: none; width: 100px; height: 100px; object-fit: cover;">
                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-success" onclick="uploadImage()">Save and Continue</button>
                    <button type="button" class="btn btn-warning" onclick="clearImage()">Clear Image</button>
                    <a href="#" class="btn btn-danger" onclick="resetFormAndScrollToTop('imageForm')">Cancel</a>
                </div>
            </form>
        </div>

        <!-- Discount Tab -->
        <div class="tab-pane fade <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'discount') ? 'show active' : ''; ?>" id="discount" role="tabpanel">
            <?php echo form_open('DiscountController/create', ['id' => 'discountForm']); ?>
            <input type="hidden" name="next_tab" id="next_tab_discount" value="discount">
            <input type="hidden" name="product_id" value="<?php echo isset($product_id) ? $product_id : ''; ?>">
            <div class="form-group mb-3">
                <label for="customer_group" class="form-label">Customer Group</label>
                <select class="form-control" id="customer_group" name="customer_group">
                    <option value="regular">Regular</option>
                    <option value="vip">VIP</option>
                    <option value="wholesale">Wholesale</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="priority" class="form-label">Priority</label>
                <input type="number" class="form-control" id="priority" name="priority" min="1">
            </div>
            <div class="form-group mb-3">
                <label for="discount_type" class="form-label">Discount Type</label>
                <select class="form-control" id="discount_type" name="discount_type">
                    <option value="percentage">Percentage</option>
                    <option value="fixed">Fixed</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="discount_value_tl" class="form-label">Discount Value (TL)</label>
                <div class="input-group mb-2">
                    <input type="number" step="0.01" class="form-control" id="discount_value_tl" name="discount_value_tl" placeholder="TL" oninput="convertDiscountCurrency('tl')">
                    <select class="form-select" id="discount_unit_tl" name="discount_unit_tl">
                        <option value="percentage">%</option>
                        <option value="fixed">TL</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="discount_value_usd" class="form-label">Discount Value (USD)</label>
                <div class="input-group mb-2">
                    <input type="number" step="0.01" class="form-control" id="discount_value_usd" name="discount_value_usd" placeholder="USD" oninput="convertDiscountCurrency('usd')">
                    <select class="form-select" id="discount_unit_usd" name="discount_unit_usd">
                        <option value="percentage">%</option>
                        <option value="fixed">USD</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="discount_value_eur" class="form-label">Discount Value (EUR)</label>
                <div class="input-group mb-2">
                    <input type="number" step="0.01" class="form-control" id="discount_value_eur" name="discount_value_eur" placeholder="EUR" oninput="convertDiscountCurrency('eur')">
                    <select class="form-select" id="discount_unit_eur" name="discount_unit_eur">
                        <option value="percentage">%</option>
                        <option value="fixed">EUR</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="form-group mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date">
            </div>
            <!-- <div class="mt-4">
                <button type="button" class="btn btn-success" onclick="addDiscount()">Add Discount</button>
            </div>
            <div class="mt-4">
                <h5>Added Discounts</h5>
                <ul id="discountList" class="list-group">
                </ul>
            </div> -->
            <div class="mt-4">
                <button type="button" class="btn btn-success" onclick="saveDiscounts()">Save and Finish</button>
                <a href="#" class="btn btn-danger" onclick="cancel()">Cancel</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<!-- CKEditor Script -->
<script> 
    // CKEditor
    CKEDITOR.editorConfig = function( config ) {
        config.versionCheck = false;
    };

    CKEDITOR.replace('product_description');

    // Suppress CKEditor version warning
    console.error = (function(error) {
        return function(message) {
            if (message.indexOf('This CKEditor 4.22.1 version is not secure') === -1) {
                error.apply(console, arguments);
            }
        };
    })(console.error);

    function resetFormAndScrollToTop(formId) {
        document.getElementById(formId).reset();
        window.scrollTo(0, 0);
    }

    function cancel() {
        resetFormAndScrollToTop('generalForm');
        resetFormAndScrollToTop('detailsForm');
        resetFormAndScrollToTop('imageForm');
        resetFormAndScrollToTop('discountForm');
    }
</script>

<!-- Details Tab Currency Scripts -->
<script>
    // Currency Conversion for Details Tab
    let exchangeRatesDetails = {
        tl: 1,
        usd: 0.036, // Example rate, will be updated from API
        eur: 0.033 // Example rate, will be updated from API
    };

    async function fetchExchangeRatesDetails() {
        try {
            const response = await fetch('https://api.exchangerate-api.com/v4/latest/TRY');
            const data = await response.json();
            exchangeRatesDetails.usd = data.rates.USD;
            exchangeRatesDetails.eur = data.rates.EUR;
        } catch (error) {
            console.error('Error fetching exchange rates:', error);
        }
    }

    function convertCurrencyDetails(changedCurrency) {
        const tlInput = document.getElementById('sale_price_tl');
        const usdInput = document.getElementById('sale_price_usd');
        const eurInput = document.getElementById('sale_price_eur');

        let tlValue, usdValue, eurValue;

        if (changedCurrency === 'tl') {
            tlValue = parseFloat(tlInput.value) || 0;
            usdValue = tlValue * exchangeRatesDetails.usd;
            eurValue = tlValue * exchangeRatesDetails.eur;
        } else if (changedCurrency === 'usd') {
            usdValue = parseFloat(usdInput.value) || 0;
            tlValue = usdValue / exchangeRatesDetails.usd;
            eurValue = tlValue * exchangeRatesDetails.eur;
        } else if (changedCurrency === 'eur') {
            eurValue = parseFloat(eurInput.value) || 0;
            tlValue = eurValue / exchangeRatesDetails.eur;
            usdValue = tlValue * exchangeRatesDetails.usd;
        }

        tlInput.value = tlValue.toFixed(2);
        usdInput.value = usdValue.toFixed(2);
        eurInput.value = eurValue.toFixed(2);
    }

    // Fetch exchange rates when the page loads
    window.onload = fetchExchangeRatesDetails;
</script>

<!-- Image Tab Scripts -->
<script>
    function uploadImage() {
        const form = document.getElementById('imageForm');
        const formData = new FormData(form);

        fetch('<?php echo base_url('ProductImageController/upload'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Fotoğraf başarıyla yüklendi, bir sonraki sekmeye geç
                alert('Resim başarıyla yüklendi.');
                window.location.replace('<?php echo base_url('ProductController/create?tab=discount'); ?>');
            } else {
                // Hata mesajını göster
                alert('Yükleme hatası: ' + data.error);
            }
        })
    }

    function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        // Dosya boyutunu kontrol et (örneğin, 1MB)
        if (file.size > 1024 * 1024) {
            alert('Dosya boyutu 1MB\'ı geçemez!');
            clearImage();
            return;
        }

        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
    }

    function clearImage() {
    document.getElementById('imageForm').reset();
    document.getElementById('image_preview').src = '#'; 
    document.getElementById('image_preview').style.display = 'none'; 
    }

</script>

<!-- Discount Tab Scripts -->
<script>
    let discounts = [];

    // Currency Conversion for Discount Tab
    let exchangeRatesDiscount = {
        tl: 1,
        usd: 0.036, // Example rate, will be updated from API
        eur: 0.033 // Example rate, will be updated from API
    };

    async function fetchExchangeRatesDiscount() {
        try {
            const response = await fetch('https://api.exchangerate-api.com/v4/latest/TRY');
            const data = await response.json();
            exchangeRatesDiscount.usd = data.rates.USD;
            exchangeRatesDiscount.eur = data.rates.EUR;
        } catch (error) {
            console.error('Error fetching exchange rates:', error);
        }
    }

    function convertDiscountCurrency(changedCurrency) {
        const tlInput = document.getElementById('discount_value_tl');
        const usdInput = document.getElementById('discount_value_usd');
        const eurInput = document.getElementById('discount_value_eur');

        let tlValue, usdValue, eurValue;

        if (changedCurrency === 'tl') {
            tlValue = parseFloat(tlInput.value) || 0;
            usdValue = tlValue * exchangeRatesDiscount.usd;
            eurValue = tlValue * exchangeRatesDiscount.eur;
        } else if (changedCurrency === 'usd') {
            usdValue = parseFloat(usdInput.value) || 0;
            tlValue = usdValue / exchangeRatesDiscount.usd;
            eurValue = tlValue * exchangeRatesDiscount.eur;
        } else if (changedCurrency === 'eur') {
            eurValue = parseFloat(eurInput.value) || 0;
            tlValue = eurValue / exchangeRatesDiscount.eur;
            usdValue = tlValue * exchangeRatesDiscount.usd;
        }

        tlInput.value = tlValue.toFixed(2);
        usdInput.value = usdValue.toFixed(2);
        eurInput.value = eurValue.toFixed(2);
    }

    // Fetch exchange rates when the page loads
    window.onload = fetchExchangeRatesDiscount;

    function addDiscount() {
        const form = document.getElementById('discountForm');
        const formData = new FormData(form);
        let discount = {};
        formData.forEach((value, key) => {
            discount[key] = value;
        });
        discounts.push(discount);
        updateDiscountList();
    }

    function updateDiscountList() {
        const discountList = document.getElementById('discountList');
        discountList.innerHTML = '';
        discounts.forEach((discount, index) => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            listItem.innerHTML = `
                ${discount.discount_type} - ${discount.discount_value_tl || discount.discount_value_usd || discount.discount_value_eur} ${discount.discount_unit_tl || discount.discount_unit_usd || discount.discount_unit_eur}
                <button class="btn btn-danger btn-sm" onclick="removeDiscount(${index})">Remove</button>
            `;
            discountList.appendChild(listItem);
        });
    }

    function removeDiscount(index) {
        discounts.splice(index, 1);
        updateDiscountList();
    }

    function saveDiscounts() {
        const form = document.getElementById('discountForm');
        const formData = new FormData(form);

        // Send form data to the backend using fetch
        fetch('<?php echo base_url('DiscountController/create'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // İndirim başarıyla kaydedildi, ana ekrana yönlendir
                alert('İndirim başarıyla kaydedildi.');
                window.location.href = '<?php echo base_url(); ?>';
            } else {
                // Hata mesajını göster
                alert(data.error || 'Bir hata oluştu.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred: ' + error.message);
        });
    }

    function cancel() {
        resetFormAndScrollToTop('generalForm');
        resetFormAndScrollToTop('detailsForm');
        resetFormAndScrollToTop('imageForm');
        resetFormAndScrollToTop('discountForm');
    }
</script>

<!-- Tab Switching Script -->
<script>
    function setNextTab(nextTab) {
        document.getElementById('next_tab_general').value = nextTab;
        document.getElementById('next_tab_details').value = nextTab;
        document.getElementById('next_tab_images').value = nextTab;
        document.getElementById('next_tab_discount').value = nextTab;
    }
</script>

</body>
</html>
