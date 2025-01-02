<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        :root {
            --bima-green: #118B50;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
        }

        .top-header {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .logo {
            color: var(--bima-green);
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .logo:hover {
            color: var(--bima-green);
            text-decoration: none;
        }

        .search-container {
            width: 100%;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            margin: 30px 0;
            padding: 0 15px;
        }

        .restaurant-grid {
            padding: 15px 10px;
        }

        .restaurant-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.2s;
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .restaurant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-decoration: none;
            color: inherit;
        }

        .restaurant-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .restaurant-info {
            padding: 15px;
        }

        .restaurant-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .restaurant-tags {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .restaurant-meta {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 14px;
        }

        .rating {
            color: #ffd700;
            margin-right: 15px;
        }

        .promo-badge, .featured-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            z-index: 1;
        }

        .promo-badge {
            background: #00a5cf;
            color: white;
        }

        .featured-badge {
            background: #28a745;
            color: white;
        }

        @media (max-width: 767px) {
            .restaurant-grid {
                padding: 10px 5px;
            }

            .restaurant-grid .row {
                margin-left: -8px;
                margin-right: -8px;
            }

            .restaurant-grid .col-6 {
                padding-left: 8px;
                padding-right: 8px;
                margin-bottom: 16px;
            }

            .restaurant-image {
                height: 140px;
            }

            .restaurant-info {
                padding: 10px;
            }

            .restaurant-name {
                font-size: 14px;
                margin-bottom: 4px;
            }

            .page-title {
                font-size: 22px;
                margin: 20px 0;
            }

            .restaurant-tags {
                font-size: 12px;
            }
        }

        @media (max-width: 575px) {
            .restaurant-grid .row {
                margin-left: -5px;
                margin-right: -5px;
            }

            .restaurant-grid .col-6 {
                padding-left: 5px;
                padding-right: 5px;
                margin-bottom: 10px;
            }

            .restaurant-image {
                height: 120px;
            }

            .restaurant-info {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <header class="top-header">
        <div class="container">
            <div class="header-wrapper">
                <a href="#" class="logo">BiMa</a>
                <div class="auth-controls">
                    <img src="images/user.png" alt="Google" style="width: 30px; margin-right: 8px;">
                    <select class="btn btn-outline-secondary">
                        <option>ID</option>
                        <option>EN</option>
                    </select>
                </div>
            </div>
            <div class="search-container">
                <div class="input-group">
                    <select class="custom-select">
                        <option selected>Makanan</option>
                        <option value="1">Dekorasi</option>
                        <option value="2">Aksesoris</option>
                        <option value="3">Barang unik</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <hr>
        <h1 class="page-title">Promo Makanan di <span style="color: var(--bima-green);">BiU Market</span></h1>

        <div class="restaurant-grid">
            <div class="row">
                <?php
                include "koneksi.php";
                $sql = "SELECT r.*, 
                               GROUP_CONCAT(c.category_name) as categories,
                               COUNT(p.id) as promo_count
                        FROM restaurants r 
                        LEFT JOIN restaurant_categories rc ON r.id = rc.restaurant_id
                        LEFT JOIN categories c ON rc.category_id = c.id
                        LEFT JOIN promotions p ON r.id = p.restaurant_id
                        WHERE r.is_active = 1
                        GROUP BY r.id
                        ORDER BY r.featured DESC, r.rating DESC";
                
                $result = mysqli_query($koneksi, $sql);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-3 col-6">
                        <a href="#" class="restaurant-card">
                            <?php if ($row['promo_count'] > 0) { ?>
                                <div class="promo-badge">Promo</div>
                            <?php } elseif ($row['featured']) { ?>
                                <div class="featured-badge">Restoran Pilihan</div>
                            <?php } ?>
                            <img src="<?php echo htmlspecialchars($row['image_url']); ?>" 
                                 alt="<?php echo htmlspecialchars($row['name']); ?>"
                                 class="restaurant-image">
                            <div class="restaurant-info">
                                <h3 class="restaurant-name"><?php echo htmlspecialchars($row['name']); ?></h3>
                                <div class="restaurant-tags"><?php echo htmlspecialchars($row['categories']); ?></div>
                                <div class="restaurant-meta">
                                    <span class="rating">⭐ <?php echo number_format($row['rating'], 1); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>