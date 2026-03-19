<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #f5f5f5;
        font-family: 'Inter', sans-serif;
        color: #111;
    }

    .edit-container {
        max-width: 900px;
        margin: 60px auto;
        padding: 40px 30px;
        background: #fff;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        border: 1px solid #e0e0e0;
    }

    .edit-header {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 30px;
        color: #111;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .edit-header span {
        font-size: 28px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control, .form-select {
        border-radius: 12px;
        border: 1px solid #ccc;
        padding: 10px 15px;
        transition: 0.3s;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: #0071e3;
        box-shadow: 0 0 8px rgba(0,113,227,0.2);
    }

    .image-preview-container {
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 20px;
        background: #fafafa;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: 0.3s;
    }

    .image-preview-container img {
        max-width: 100%;
        max-height: 200px;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .btn-apple {
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 500;
        font-size: 16px;
        transition: 0.3s;
        min-width: 150px;
        border: none;
    }

    .btn-save {
        background: #0071e3;
        color: #fff;
    }

    .btn-save:hover {
        background: #0a84ff;
    }

    .btn-cancel {
        background: transparent;
        color: #555;
        border: 1px solid #ccc;
    }

    .btn-cancel:hover {
        background: #f0f0f0;
        color: #111;
        border-color: #999;
    }

    .alert {
        border-radius: 12px;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .row > .col-md-7, .row > .col-md-5 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .image-preview-container {
            margin-top: 20px;
        }
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="edit-container">

    <div class="edit-header">
        <span>✏️</span> Chỉnh sửa sản phẩm
    </div>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $product->id; ?>">

        <div class="row">

            <!-- FORM INPUT -->
            <div class="col-md-7">

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control"
                        value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="4" required><?php
                    echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8');
                    ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Giá</label>
                        <input type="number" name="price" class="form-control"
                            value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" class="form-select" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hình ảnh mới</label>
                    <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                    <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                </div>

            </div>

            <!-- IMAGE PREVIEW -->
            <div class="col-md-5 text-center">
                <div class="image-preview-container">

                    <p class="text-muted mb-3">Ảnh hiện tại</p>
                    <?php if ($product->image): ?>
                        <img src="/webbanhang/<?php echo $product->image; ?>" alt="Current Image">
                    <?php endif; ?>

                    <p class="text-muted">Ảnh mới (xem trước)</p>
                    <img id="preview" style="display:none;">
                </div>
            </div>

        </div>

        <hr class="mt-4">

        <div class="d-flex justify-content-between">
            <a href="/webbanhang/Product/" class="btn btn-cancel btn-apple">
                ← Quay lại danh sách
            </a>

            <button type="submit" class="btn btn-save btn-apple">
                💾 Lưu thay đổi
            </button>
        </div>

    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const img = document.getElementById('preview');
            img.src = reader.result;
            img.style.display = "block";
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>