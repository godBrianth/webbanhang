<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #f5f5f5;
        font-family: 'Inter', sans-serif;
        color: #111;
    }

    .success-container {
        max-width: 600px;
        margin: 120px auto;
        text-align: center;
        padding: 50px 40px;
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border: 1px solid #e0e0e0;
        transform: translateY(30px);
        opacity: 0;
        transition: all 0.8s ease;
    }

    .success-container.show {
        transform: translateY(0);
        opacity: 1;
    }

    .success-icon {
        font-size: 80px;
        color: #28a745;
        margin-bottom: 20px;
        animation: popIn 0.6s ease forwards;
    }

    @keyframes popIn {
        0% { transform: scale(0.5); opacity:0; }
        70% { transform: scale(1.2); opacity:1; }
        100% { transform: scale(1); }
    }

    .success-title {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #111;
    }

    .success-text {
        color: #555;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .btn-apple {
        border-radius: 30px;
        padding: 12px 28px;
        font-weight: 500;
        font-size: 16px;
        border: none;
        transition: all 0.3s ease;
        display: inline-block;
        min-width: 180px;
    }

    .btn-primary-apple {
        background: #0071e3;
        color: #fff;
    }

    .btn-primary-apple:hover {
        background: #0a84ff;
        color: #fff;
    }

    .btn-outline-apple {
        background: transparent;
        color: #555;
        border: 1px solid #ccc;
    }

    .btn-outline-apple:hover {
        background: #f0f0f0;
        color: #111;
        border-color: #999;
    }

    .d-grid {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    @media (max-width: 576px) {
        .success-container {
            margin: 60px 15px;
            padding: 40px 25px;
        }
        .success-title { font-size: 28px; }
        .success-icon { font-size: 60px; }
        .btn-apple { width: 100%; min-width: auto; }
    }
</style>

<div class="success-container">

    <div class="success-icon">
        ✔
    </div>

    <h3 class="success-title">Đặt hàng thành công!</h3>

    <p class="success-text">
        Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi.<br>
        Đơn hàng của bạn đã được ghi nhận và đang được xử lý.
    </p>

    <div class="d-grid">
        <a href="/webbanhang/Product/" class="btn btn-primary-apple btn-apple">
            🛍 Tiếp tục mua sắm
        </a>
        <a href="/webbanhang/Product/cart" class="btn btn-outline-apple btn-apple">
            Xem lại giỏ hàng
        </a>
    </div>

</div>

<script>
    // Smooth fade-in animation
    window.addEventListener('load', () => {
        const container = document.querySelector('.success-container');
        container.classList.add('show');
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>