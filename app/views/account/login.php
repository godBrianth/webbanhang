<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
            Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        background: #f9f9f9; /* giữ nền sáng */
        color: #111;
        padding-top: 80px;
    }

    .apple-card {
        background: #fff; /* trắng sang trọng */
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        padding: 50px 40px;
        max-width: 420px;
        margin: auto;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.4s ease;
    }

    .apple-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 16px 48px rgba(0, 0, 0, 0.25);
    }

    .apple-title {
        font-weight: 700;
        font-size: 2rem;
        color: #111; /* chữ tiêu đề màu đen */
        text-align: center;
        margin-bottom: 2.5rem;
        letter-spacing: 2px;
    }

    .apple-input {
        width: 100%;
        padding: 14px 18px;
        font-size: 1rem;
        border: 1.5px solid #ccc;
        border-radius: 14px;
        margin-bottom: 1.8rem;
        background: #fff;
        color: #111; /* chữ input màu đen */
        font-weight: 500;
        transition: border-color 0.35s ease, box-shadow 0.35s ease;
    }

    .apple-input::placeholder {
        color: #888;
        font-style: italic;
    }

    .apple-input:focus {
        outline: none;
        border-color: #111; /* viền focus màu đen */
        box-shadow: 0 0 8px rgba(0,0,0,0.15);
        color: #111;
        font-weight: 600;
    }

    .apple-btn {
        width: 100%;
        padding: 16px 0;
        font-size: 1.125rem;
        font-weight: 700;
        color: #fff;
        background-color: #111; /* button màu đen */
        border: none;
        border-radius: 28px;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
    }

    .apple-btn:hover {
        background-color: #333; /* đen nhạt khi hover */
        box-shadow: 0 6px 22px rgba(0,0,0,0.35);
    }

    .apple-link-container {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        color: #555;
        margin-bottom: 2.5rem;
        font-weight: 500;
    }

    .apple-link-container label {
        cursor: pointer;
        user-select: none;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .apple-link-container input[type="checkbox"] {
        cursor: pointer;
        width: 16px;
        height: 16px;
        accent-color: #111; /* checkbox đen */
    }

    .apple-link {
        color: #111; /* link màu đen */
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .apple-link:hover {
        text-decoration: underline;
        color: #333;
    }

    .apple-register {
        text-align: center;
        font-size: 0.9rem;
        color: #555;
        font-weight: 500;
    }

    .apple-register a {
        color: #111; /* link đăng ký màu đen */
        text-decoration: none;
        font-weight: 700;
    }

    .apple-register a:hover {
        color: #333;
        text-decoration: underline;
    }

</style>

<section class="vh-100 d-flex align-items-center justify-content-center">
    <div class="apple-card">

        <form action="/webbanhang/account/checklogin" method="post">

            <h3 class="apple-title">Sign In</h3>

            <!-- Username -->
            <input type="text" name="username" class="apple-input" placeholder="Username" required>

            <!-- Password -->
            <input type="password" name="password" class="apple-input" placeholder="Password" required>

            <div class="apple-link-container">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="#" class="apple-link">Forgot?</a>
            </div>

            <!-- Button -->
            <button class="apple-btn" type="submit">Login</button>

            <p class="apple-register mt-4">
                Don’t have an account? 
                <a href="/webbanhang/account/register">Register</a>
            </p>

        </form>

    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>