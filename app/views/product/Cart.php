<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #f5f5f5;
        font-family: 'Inter', sans-serif;
        color: #111;
    }

    .cart-container {
        max-width: 1000px;
        margin: 60px auto;
        padding: 20px;
    }

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
        border-radius: 20px 20px 0 0;
    }

    .card-header.bg-dark {
        background: #111;
        color: #fff !important;
    }

    table {
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        border-collapse: separate;
        border-spacing: 0;
    }

    th, td {
        vertical-align: middle !important;
        padding: 12px 15px;
    }

    th {
        font-weight: 500;
        background: #f7f7f7;
        color: #333;
    }

    td.fw-semibold {
        font-weight: 500;
    }

    td.text-danger, .text-danger {
        color: #d32f2f !important;
    }

    .badge {
        border-radius: 12px;
        padding: 6px 12px;
    }

    .btn-apple {
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: 500;
        font-size: 15px;
        transition: 0.3s;
        min-width: 150px;
        border: none;
    }

    .btn-continue {
        background: transparent;
        color: #555;
        border: 1px solid #ccc;
    }

    .btn-continue:hover {
        background: #f0f0f0;
        color: #111;
        border-color: #999;
    }

    .btn-checkout {
        background: #0071e3;
        color: #fff;
    }

    .btn-checkout:hover {
        background: #0a84ff;
    }

    .text-muted {
        color: #888 !important;
    }

    @media (max-width: 768px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 10px;
        }

        table th, table td {
            padding: 10px 8px;
        }

        .btn-apple {
            width: 100%;
        }
    }
</style>

<div class="cart-container">

    <div class="card card-minimal">

        <div class="card-header bg-dark">
            🛒 Giỏ hàng của bạn
        </div>

        <div class="card-body">

            <?php if (!empty($cart)): ?>

                <table class="table align-middle mb-4">

                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($cart as $id => $item):
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td style="width:120px;">
                                <?php if ($item['image']): ?>
                                    <img src="/webbanhang/<?php echo $item['image']; ?>" style="max-width:80px;border-radius:8px;">
                                <?php endif; ?>
                            </td>

                            <td class="fw-semibold">
                                <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>

                            <td class="text-danger fw-bold">
                                <?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?> VND
                            </td>

                            <td>
                                <span class="badge bg-secondary fs-6">
                                    <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>
                                </span>
                            </td>

                            <td class="fw-bold">
                                <?php echo $subtotal; ?> VND
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

                <div class="d-flex justify-content-between align-items-center">

                    <h4 class="text-danger">
                        Tổng tiền: <?php echo $total; ?> VND
                    </h4>

                    <div class="d-flex gap-2 flex-wrap">
                        <a href="/webbanhang/Product" class="btn btn-continue btn-apple">
                            ← Tiếp tục mua sắm
                        </a>

                        <a href="/webbanhang/Product/checkout" class="btn btn-checkout btn-apple">
                            💳 Thanh toán
                        </a>
                    </div>

                </div>

            <?php else: ?>

                <div class="text-center py-5">
                    <h4 class="text-muted">🛒 Giỏ hàng của bạn đang trống</h4>
                    <a href="/webbanhang/Product" class="btn btn-checkout btn-apple mt-3">
                        Bắt đầu mua sắm
                    </a>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>

<?php include 'app/views/shares/footer.php'; ?>