<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Store</title>

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Font Luxury -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
            font-family: 'Playfair Display', serif;
            color: #fff;
            padding-top: 80px;
            /* QUAN TRỌNG */
        }

        /* NAVBAR */
        .navbar {
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            padding: 15px 30px;
            transition: 0.3s;
        }

        .navbar.scrolled {
            background: rgba(0, 0, 0, 0.95);
            padding: 10px 30px;
        }

        .navbar-brand {
            color: #d4af37 !important;
            font-weight: 500;
            letter-spacing: 2px;
            font-size: 18px;
        }

        .nav-link {
            color: #ccc !important;
            margin-right: 15px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #d4af37 !important;
        }

        /* USER BADGE */
        .user-badge {
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 5px 12px;
            border-radius: 20px;
            color: #d4af37;
            font-size: 13px;
        }

        /* BUTTON */
        .luxury-btn {
            border: 1px solid #d4af37;
            color: #d4af37;
            background: transparent;
            border-radius: 20px;
            padding: 5px 14px;
            transition: 0.3s;
        }

        .luxury-btn:hover {
            background: #d4af37;
            color: #000;
        }

        .luxury-btn-light {
            border: 1px solid #fff;
            color: #fff;
        }

        .luxury-btn-light:hover {
            background: #fff;
            color: #000;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">

        <!-- Logo -->
        <a class="navbar-brand" href="/webbanhang/Product/">
            LUXURY STORE
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

            <!-- LEFT -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/">
                        Products
                    </a>
                </li>

                <?php if (SessionHelper::isAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Product/add">
                            Add Product
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- RIGHT -->
            <ul class="navbar-nav align-items-center">

                <?php if (SessionHelper::isLoggedIn()): ?>
                    <li class="nav-item mr-3">
                        <span class="user-badge">
                            <?php echo htmlspecialchars($_SESSION['username']); ?>
                            (<?php echo SessionHelper::getRole(); ?>)
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="btn luxury-btn" href="/webbanhang/account/logout">
                            Logout
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="btn luxury-btn-light" href="/webbanhang/account/login">
                            Login
                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>
    </nav>

    <div class="container mt-5">