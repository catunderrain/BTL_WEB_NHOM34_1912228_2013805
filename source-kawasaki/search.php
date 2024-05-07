<html>
<head>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/main_index.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/productdetail.css" />
    <style>
        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-row {
            display: flex;
            justify-content: center;
            margin-bottom: 20px; 
        }

        .product {
            flex: 0 1 30%;
            box-sizing: border-box;
            margin: 10px; 
            padding: 10px;
            border: 0px solid #ccc;
            text-align: center; 
            max-width: 20vw;
        }
    </style>
</head>
<body>
    <?php
    include 'includes/header.php';
    include 'lib/database_b.php';

    $search_keyword = htmlspecialchars($_GET['search']);  

    $query = "SELECT * FROM tbl_product WHERE productName LIKE ?";  
    $stmt = $conn->prepare($query);
    $search_keyword = "%$search_keyword%";
    $stmt->bind_param("s", $search_keyword);
    $stmt->execute();

    $result = $stmt->get_result();
    echo "<div class='products'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<a href='productdetail.php?productId=" . $row['productId'] . "' style='color: inherit; text-decoration: none;'>";
            echo "<img src='" . htmlspecialchars($row['productImage']) . "' alt='Product Image' style='width: 100%; height: auto;'>";
            echo "<h2 class='p3'>" . htmlspecialchars($row['productName']) . "</h2>";
            echo "<div class='cart-greenSpacer'></div>";
            // echo "<p class='disclaimer'>" . htmlspecialchars($row['productDesc']) . "</p>";
            echo "<p>Price: " . htmlspecialchars($row['productPrice']) . "đ</p>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<h2 style='min-height: 20vw; padding-top: 8vw'>No products found.</h2>";
    }
    echo "</div>";
    $stmt->close();
    ?>
    <?php include 'includes/footer.php'; ?>
</body>
