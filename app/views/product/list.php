<?php include 'app/views/shares/header.php'; ?>

<!-- Font Minimal -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #f8f9fa;
        font-family: 'Inter', sans-serif;
        color: #333;
    }

    /* Page Title */
    .page-title {
        color: #222;
        letter-spacing: 1px;
        font-size: 26px;
        font-weight: 600;
        margin-bottom: 40px;
    }

    /* Product Card */
    .product-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    /* Image */
    .product-img {
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f5f5;
        border-bottom: 1px solid #e0e0e0;
    }

    .product-img img {
        max-height: 90%;
        transition: transform 0.3s ease;
    }

    .product-card:hover img {
        transform: scale(1.05);
    }

    /* Text */
    .product-title {
        color: #111;
        font-weight: 500;
        font-size: 16px;
        text-decoration: none;
        transition: color 0.3s;
    }

    .product-title:hover {
        color: #0071e3; /* Minimal hover accent */
    }

    .price {
        color: #0071e3;
        font-size: 16px;
        font-weight: 500;
        margin: 5px 0 10px 0;
    }

    .category-badge {
        font-size: 11px;
        border: 1px solid #ccc;
        padding: 3px 8px;
        border-radius: 12px;
        color: #555;
        display: inline-block;
        margin-bottom: 10px;
    }

    .desc {
        color: #666;
        font-size: 13px;
        line-height: 1.5;
        flex-grow: 1;
        margin-bottom: 15px;
    }

    /* Buttons */
    .btn-minimal {
        border-radius: 20px;
        padding: 8px 16px;
        border: 1px solid #ccc;
        background: transparent;
        color: #333;
        font-weight: 500;
        transition: all 0.3s;
        text-align: center;
    }

    .btn-minimal:hover {
        background: #0071e3;
        color: #fff;
        border-color: #0071e3;
    }

    .btn-danger-minimal {
        border-color: #ff4d4f;
        color: #ff4d4f;
    }

    .btn-danger-minimal:hover {
        background: #ff4d4f;
        color: #fff;
    }

    .btn-warning-minimal {
        border-color: #ffc107;
        color: #ffc107;
    }

    .btn-warning-minimal:hover {
        background: #ffc107;
        color: #333;
    }

    /* Layout grid */
    .row.g-4 > div {
        display: flex;
    }
</style>

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3 class="page-title">PRODUCT COLLECTION</h3>
        <a href="/webbanhang/Product/add" class="btn-minimal px-4">
            + Add Product
        </a>
    </div>

    <!-- Products Grid -->
    <div class="row g-4">

        <?php foreach ($products as $product): ?>
            <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
                <div class="product-card">

                    <!-- Image -->
                    <div class="product-img">
                        <?php if ($product->image): ?>
                            <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300">
                        <?php endif; ?>
                    </div>

                    <!-- Body -->
                    <div class="p-4 d-flex flex-column" style="height: 100%;">

                        <!-- Title -->
                        <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="product-title mb-2">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>

                        <!-- Price -->
                        <div class="price"><?php echo number_format($product->price); ?> VND</div>

                        <!-- Category -->
                        <span class="category-badge">
                            <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                        </span>

                        <!-- Description -->
                        <p class="desc">
                            <?php echo substr(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'), 0, 80); ?>...
                        </p>

                        <!-- Buttons -->
                        <div class="mt-auto">
                            <?php if (SessionHelper::isAdmin()): ?>
                                <div class="d-flex gap-2 mb-2">
                                    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn-warning-minimal btn-sm w-50">
                                        Edit
                                    </a>
                                    <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn-danger-minimal btn-sm w-50 delete-btn">
                                        Delete
                                    </a>
                                </div>
                            <?php endif; ?>
                            <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn-minimal w-100">
                                Add to Cart
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>

<?php include 'app/views/shares/footer.php'; ?>