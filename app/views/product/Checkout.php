<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #f5f5f5;
        font-family: 'Inter', sans-serif;
        color: #111;
    }

    .checkout-container {
        max-width: 1100px;
        margin: 60px auto;
        padding: 20px;
    }

    /* CARD */
    .card-minimal {
        border-radius: 20px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 15px 40px rgba(0,0,0,0.05);
    }

    .card-header {
        font-weight: 600;
        font-size: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header.bg-success {
        background: #0071e3;
        color: #fff !important;
        border-radius: 20px 20px 0 0;
    }

    .card-header.bg-dark {
        background: #111;
        color: #fff !important;
        border-radius: 20px 20px 0 0;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control, textarea {
        border-radius: 12px;
        border: 1px solid #ccc;
        padding: 10px 15px;
        transition: 0.3s;
    }

    .form-control:focus, textarea:focus {
        outline: none;
        border-color: #0071e3;
        box-shadow: 0 0 8px rgba(0,113,227,0.2);
    }

    /* BUTTONS */
    .btn-apple {
        border-radius: 30px;
        padding: 12px 25px;
        font-weight: 500;
        font-size: 16px;
        transition: 0.3s;
        min-width: 160px;
        border: none;
    }

    .btn-confirm {
        background: #0071e3;
        color: #fff;
    }

    .btn-confirm:hover {
        background: #0a84ff;
    }

    .btn-back {
        background: transparent;
        color: #555;
        border: 1px solid #ccc;
    }

    .btn-back:hover {
        background: #f0f0f0;
        color: #111;
        border-color: #999;
    }

    /* ORDER SUMMARY */
    .order-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 15px;
    }

    .order-total {
        font-size: 18px;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }

    .text-danger {
        color: #d32f2f !important;
    }

    @media (max-width: 768px) {
        .checkout-container .row {
            flex-direction: column;
            gap: 20px;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="checkout-container">

    <div class="row">

        <!-- PAYMENT FORM -->
        <div class="col-md-7">
            <div class="card card-minimal">

                <div class="card-header bg-success">
                    💳 Thông tin thanh toán
                </div>

                <div class="card-body">

                    <form method="POST" action="/webbanhang/Product/processCheckout">

                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ giao hàng</label>
                            <textarea name="address" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="/webbanhang/Product/cart" class="btn btn-back btn-apple">
                                ← Quay lại giỏ hàng
                            </a>
                            <button type="submit" class="btn btn-confirm btn-apple">
                                ✔ Xác nhận thanh toán
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- ORDER SUMMARY -->
        <div class="col-md-5">
            <div class="card card-minimal">

                <div class="card-header bg-dark">
                    🧾 Tóm tắt đơn hàng
                </div>

                <div class="card-body">

                    <?php
                    $total = 0;
                    if (!empty($_SESSION['cart'])):
                        foreach ($_SESSION['cart'] as $item):
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                    ?>
                            <div class="order-item">
                                <span>
                                    <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?> x<?php echo $item['quantity']; ?>
                                </span>
                                <span class="text-danger"><?php echo $subtotal; ?> VND</span>
                            </div>
                    <?php endforeach; ?>

                        <hr>

                        <div class="order-total">
                            <span>Tổng tiền</span>
                            <span class="text-danger"><?php echo $total; ?> VND</span>
                        </div>

                    <?php else: ?>
                        <p class="text-muted">Giỏ hàng trống</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>