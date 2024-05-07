<!-- include header.php -->
<?php include 'includes/header.php'; ?>

<?php
error_reporting(0);
if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
    echo "<script>window.location='index.php'</script>";
    exit();
} else {
    $id = $_GET["productId"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $updateProduct = $product->update_product($_POST, $_FILES, $id);
    $quantity = $_POST['quantity'];
    $AddtoCart = $cart->add_to_cart($quantity, $id);
}
?>

<?php
$get_product_name = $product->getproductbyId($id);
if ($get_product_name) {
    while ($result_product = $get_product_name->fetch_assoc()) {
?>
        <div class="adver-detail" style="background: #202021;">
            <div class="adver-avatar-detail" id="adverAvatarDetail">
                <img src="<?php echo $result_product['productImage_1'] ?>" alt="Logo">
            </div>
            <div class="adver-caption-detail">
                <div class="adver-container-detail">
                    <div class="adver-infor-cap-detail">
                        <h2><?php echo $result_product['productName'] ?></h2>
                        <div class="greenSpacer-detail"></div>
                        <h3>Price: <?php echo number_format($result_product['productPrice'], 0, '.', ','); ?>vnd</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="productDesc">
            <div class="product-container">
                <div class="container-header">
                    <h3>SPECIFICATIONS</h3>
                </div>
                <div class="product-row">
                    <div class="col-sm-12 col-md-7">
                        <div class="product-main">
                            <img style="max-width: 840px; min-height: 560px;" src="<?php echo $result_product['productImage'] ?>" alt="Product Image" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 product-desc">
                        <div class="product-desc-detail">
                            <div class="flex-container-summary-row1">
                                <p class="p3"><?php echo $result_product['productName'] ?></p>
                                <div class="greenSpacer-productdetail"></div>
                                <h4>Price: <?php echo number_format($result_product['productPrice'], 0, '.', ','); ?>vnd</h4>
                            </div>
                            <div class="flex-container-summary-row2">
                                <div class="add-cart">
                                    <form action="" method="post" class="d-flex align-items-center">
                                        <input type="number" class="buyfield form-control mr-2" name="quantity" value="1" min="1" />
                                        <input type="submit" class="buysubmit btn btn-primary" name="submit" value="Add to cart" />
                                    </form>
                                </div>
                                <?php
                                if (isset($AddtoCart)) {
                                    echo '<span style="color:red;font-size:18px;">Product already in cart</span>';
                                }
                                ?>
                            </div>
                            <div class="flex-container-summary-row3">
                                <p class="disclaimer"></p>
                                <p class="disclaimer">Khối lượng bản thân bao gồm tất cả các vật liệu cần thiết và chất lỏng để vận hành một cách chính xác, bình chứa nhiên liệu (dung tích hơn 90%) và bộ dụng cụ (nếu được cung cấp). </p>
                                <p class="disclaimer">KAWASAKI CARES: luôn đội mũ bảo hiểm, bảo vệ mắt và trang phục bảo hộ. Không bao giờ lái xe khi uống rượu hoặc chất gây nghiện. Đọc thêm sổ hướng dẫn sử dụng và các cảnh báo trên sản phẩm. Người lái xe chuyên nghiệp thể hiện mình trên trường đua. Công ty TNHH Kawasaki Motors Việt Nam. 2019</p>
                                <p class="disclaimer">Thông số kỹ thuật và giá cả có thể thay đổi.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ////////////////////////////////// -->

                <div class="container-header">
                    <h3>Description</h3>
                </div>
                <div style="padding-left: 50px;">
                    <?php echo nl2br($result_product['productDesc']); ?>
                </div>

            </div>
        </div>

        <div class="productDesc" style="background: #202021;">
            <div class="product-container">
                <div class="container-header" style="color: white;">
                    <h3>LIBRARY</h3>
                </div>
                <div class="product-image">
                    <div class="col-sm-6 col-md-4">
                        <img class="lazyload" src="<?php echo $result_product['productImage_1'] ?>" alt="Logo">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <img class="lazyload" src="<?php echo $result_product['productImage_2'] ?>" alt="Logo">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <img class="lazyload" src="<?php echo $result_product['productImage_3'] ?>" alt="Logo">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <img class="lazyload" src="<?php echo $result_product['productImage_4'] ?>" alt="Logo">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <img class="lazyload" src="<?php echo $result_product['productImage_5'] ?>" alt="Logo">
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <img class="lazyload" src="<?php echo $result_product['productImage_6'] ?>" alt="Logo">
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
?>

<!-- //////// FOOTER ///////// -->

<?php include 'includes/footer.php'; ?>