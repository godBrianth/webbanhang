<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background: #f5f5f5;
        font-family: 'Inter', sans-serif;
        color: #111;
    }

    .product-form-container {
        max-width: 1000px;
        margin: 60px auto;
        padding: 20px;
    }

    .card-minimal {
        border-radius: 20px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
    }

    .card-header {
        font-weight: 600;
        font-size: 20px;
        border-radius: 20px 20px 0 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-header.bg-primary {
        background: #0071e3;
        color: #fff !important;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control,
    .form-select,
    textarea {
        border-radius: 12px;
        border: 1px solid #ccc;
        transition: 0.3s;
    }

    .form-control:focus,
    .form-select:focus,
    textarea:focus {
        outline: none;
        border-color: #0071e3;
        box-shadow: 0 0 8px rgba(0, 113, 227, 0.3);
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

    .btn-apple-success {
        background: #0071e3;
        color: #fff;
    }

    .btn-apple-success:hover {
        background: #0a84ff;
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

    .preview-box {
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 20px;
        background: #fff;
        min-height: 260px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: 0.3s;
    }

    .preview-box img {
        max-width: 100%;
        max-height: 220px;
        border-radius: 10px;
        display: none;
        transition: transform 0.3s;
    }

    .preview-box img:hover {
        transform: scale(1.05);
    }

    .text-muted {
        color: #888 !important;
    }

    @media (max-width: 768px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 10px;
        }

        .preview-box {
            margin-top: 20px;
        }
    }
</style>

<div class="product-form-container">

    <div class="card card-minimal">

        <div class="card-header bg-primary">
            📦 Thêm sản phẩm mới
        </div>

        <div class="card-body">

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data">

                <div class="row">

                    <!-- FORM INPUT -->
                    <div class="col-md-7">

                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control form-control-lg"
                                placeholder="Nhập tên sản phẩm" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control" rows="4"
                                placeholder="Nhập mô tả sản phẩm..." required></textarea>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Giá sản phẩm</label>
                                <input type="number" name="price" class="form-control" placeholder="VD: 100000" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Danh mục</label>
                                <select name="category_id" class="form-select" required>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category->id; ?>">
                                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                        </div>

                    </div>

                    <!-- PREVIEW IMAGE -->
                    <div class="col-md-5 text-center">
                        <div class="preview-box">
                            <p class="text-muted mb-3">Xem trước hình ảnh</p>
                            <img id="preview">
                        </div>
                    </div>

                </div>

                <hr class="mt-4">

                <div class="d-flex justify-content-between">
                    <a href="/webbanhang/Product/" class="btn btn-outline-apple btn-apple">
                        ← Quay lại danh sách
                    </a>

                    <button type="submit" class="btn btn-apple-success btn-apple">
                        ✔ Thêm sản phẩm
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const img = document.getElementById('preview');
            img.src = reader.result;
            img.style.display = "block";
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/webbanhang/api/category')
            .then(response => response.json())
            .then(data => {
                const categorySelect = document.getElementById('category_id');
                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            });
        document.getElementById('add-product-form').addEventListener('submit',
            function(event) {
                event.preventDefault();
                const formData = new FormData(this);
                const jsonData = {};
                formData.forEach((value, key) => {
                    jsonData[key] = value;
                });
                fetch('/webbanhang/api/product', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(jsonData)
                    })
                    .then(response => response.json())
                    .then(text => {
                        console.log('Raw response:', text); // Log the raw response text
                        try {
                            const data = text;
                            if (data.message === 'Product created successfully') {
                                location.href = '/webbanhang/Product';
                            } else {
                                alert('Thêm sản phẩm thất bại');
                            }
                        } catch (error) {
                            console.error('Error parsing JSON:', error);
                            alert('Lỗi: Không thể phân tích JSON từ phản hồi của máy chủ.');
                        }
                    });
            });
    });
</script>