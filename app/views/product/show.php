<?php include 'app/views/shares/header.php'; ?>

<!-- Font Minimal / Modern -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #fafafa;
        font-family: 'Inter', sans-serif;
        color: #111;
    }

    /* LAYOUT */
    .apple-container {
        max-width: 1200px;
        margin: auto;
        padding: 60px 20px;
    }

    .apple-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    /* IMAGE */
    .apple-image {
        text-align: center;
        border-radius: 16px;
        overflow: hidden;
        background: #f5f5f5;
        padding: 20px;
    }

    .apple-image img {
        max-width: 100%;
        max-height: 500px;
        transition: transform 0.5s ease;
    }

    .apple-image:hover img {
        transform: scale(1.05);
    }

    /* TEXT */
    .apple-title {
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #111;
    }

    .apple-price {
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 20px;
        color: #0071e3;
    }

    .apple-desc {
        color: #555;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .apple-category {
        font-size: 12px;
        color: #888;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* BUTTON */
    .apple-btn {
        background: #0071e3;
        border: none;
        padding: 12px 28px;
        border-radius: 30px;
        color: #fff;
        font-weight: 500;
        font-size: 14px;
        transition: background 0.3s ease;
        display: inline-block;
        margin-right: 15px;
        margin-top: 10px;
        text-decoration: none;
    }

    .apple-btn:hover {
        background: #0a84ff;
        text-decoration: none;
    }

    .apple-link {
        color: #0071e3;
        font-size: 14px;
        margin-left: 10px;
        text-decoration: none;
    }

    .apple-link:hover {
        text-decoration: underline;
    }

    /* STICKY BUY BAR */
    .buy-bar {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #fff;
        border-top: 1px solid #e0e0e0;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        z-index: 1000;
    }

    .buy-bar .buy-title {
        font-size: 16px;
        font-weight: 500;
        color: #111;
    }

    .buy-bar .buy-price {
        font-size: 16px;
        font-weight: 500;
        color: #0071e3;
        margin-right: 15px;
    }

    /* ANIMATION */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.6s ease forwards;
    }

    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .apple-grid {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .buy-bar {
            flex-direction: column;
            gap: 10px;
            padding: 20px;
        }

        .buy-bar .buy-title, .buy-bar .buy-price {
            text-align: center;
        }

        .apple-btn {
            width: 100%;
            margin: 10px 0 0 0;
        }
    }
</style>

<div class="apple-container">

    <?php if ($product): ?>

        <div class="apple-grid">

            <!-- IMAGE -->
            <div class="apple-image fade-in">
                <?php if ($product->image): ?>
                    <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                <?php else: ?>
                    <img src="/webbanhang/images/no-image.png" alt="No Image">
                <?php endif; ?>
            </div>

            <!-- INFO -->
            <div class="fade-in" style="animation-delay:0.3s">

                <div class="apple-category">
                    <?php echo !empty($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Product'; ?>
                </div>

                <h1 class="apple-title">
                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                </h1>

                <div class="apple-price">
                    <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                </div>

                <p class="apple-desc">
                    <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                </p>

                <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="apple-btn">
                    Add to Cart
                </a>

                <a href="/webbanhang/Product/" class="apple-link">
                    ← Back
                </a>

            </div>

        </div>

    <?php else: ?>

        <div class="text-center">
            <h2>Product not found</h2>
        </div>

    <?php endif; ?>

</div>

<!-- STICKY BUY BAR -->
<?php if ($product): ?>
<div class="buy-bar">
    <div class="buy-title"><?php echo htmlspecialchars($product->name); ?></div>
    <div>
        <span class="buy-price"><?php echo number_format($product->price, 0, ',', '.'); ?> VND</span>
        <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="apple-btn">
            Buy
        </a>
    </div>
</div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>