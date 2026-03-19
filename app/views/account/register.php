<?php include 'app/views/shares/header.php'; ?>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', sans-serif;
        background: #f5f5f5; /* nền sáng */
        padding-top: 80px;
        color: #111; /* chữ đen */
    }

    .apple-card-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 80px);
        padding: 20px;
    }

    .apple-card {
        background: #fff; /* card trắng */
        border-radius: 24px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        padding: 50px 40px;
        max-width: 450px;
        width: 100%;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .apple-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.16);
    }

    .apple-title {
        font-size: 1.9rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
        letter-spacing: 2px;
        color: #111; /* tiêu đề màu đen */
        text-transform: uppercase;
    }

    .apple-input {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid #ccc;
        border-radius: 12px;
        font-size: 1rem;
        margin-bottom: 20px;
        transition: border-color 0.35s ease, box-shadow 0.35s ease;
        background: #fff;
        color: #111; /* chữ input đen */
    }

    .apple-input::placeholder {
        color: #999;
        font-style: italic;
    }

    .apple-input:focus {
        outline: none;
        border-color: #111; /* viền focus đen */
        box-shadow: 0 0 8px rgba(0,0,0,0.2);
        background: #fff;
        color: #111;
    }

    .apple-btn {
        width: 100%;
        padding: 16px 0;
        font-weight: 700;
        font-size: 1.05rem;
        border-radius: 28px;
        border: none;
        background-color: #111; /* button đen */
        color: #fff; /* chữ trắng trên button */
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .apple-btn:hover {
        background-color: #333; /* hover đen nhạt */
        box-shadow: 0 6px 18px rgba(0,0,0,0.3);
    }

    .apple-error {
        color: #e74c3c;
        font-size: 0.9rem;
        text-align: center;
        margin-bottom: 12px;
    }
</style>

<div class="apple-card-wrapper">
    <div class="apple-card">

        <h3 class="apple-title">Create Account</h3>

        <!-- Errors -->
        <?php
        if (!empty($errors)) {
            foreach ($errors as $err) {
                echo "<div class='apple-error'>$err</div>";
            }
        }
        ?>

        <form action="/webbanhang/account/save" method="post">

            <input type="text" name="username" class="apple-input" placeholder="Username" required>
            <input type="text" name="fullname" class="apple-input" placeholder="Full Name" required>
            <input type="password" name="password" class="apple-input" placeholder="Password" required>
            <input type="password" name="confirmpassword" class="apple-input" placeholder="Confirm Password" required>

            <button class="apple-btn mt-3" type="submit">Register</button>

        </form>

    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>