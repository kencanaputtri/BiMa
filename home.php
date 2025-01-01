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

        .logo {
            color: var(--bima-green);
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .search-box {
            position: relative;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 12px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f5f5f5;
        }

        .location-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .breadcrumb {
            background: transparent;
            padding: 20px 0 10px;
        }

        .breadcrumb-item a {
            color: #00a5cf;
            text-decoration: none;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .restaurant-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
            transition: transform 0.2s;
            text-decoration: none;
            color: inherit;
            display: block;
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

        .promo-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #00a5cf;
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
        }

        .featured-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <header class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <a href="#" class="logo">BiMa</a>
                </div>
                <div class="col-md-7">
                <div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04">
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
                <div class="col-md-3 text-right">       
                    <img src="images/user.png" alt="Google" style="width: 30px; margin-right: 8px;">
        
                    <select class="btn btn-outline-secondary">
                        <option>ID</option>
                        <option>EN</option>
                    </select>
                </div>
            </div>
        </div>
    </header>

    <div class="container"><hr>
        <h1 class="page-title">Promo Makanan di <span style="color: var(--bima-green);">BiU Market</span></h1>

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
                <div class="col-md-3">
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
</body>
</html>