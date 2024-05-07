<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>

<?php
$product = new product();

if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
    echo "<script>window.location='productlist.php'</script>";
    exit();
} else {
    $id = $_GET["productId"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $updateProduct = $product->update_product($_POST, $_FILES, $id);
}
?>

<div class="dashboard">
    <?php include 'inc/sidebar.php'; ?>

    <div class="dashboard-app">
        <header class="dashboard-toolbar">
            <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <h1 class="logo" style="font-family: 'Copperplat', fantasy;">KAWASAKI</h1>
        </header>

        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="card-title">Edit Product</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($updateProduct)) {
                                    echo $updateProduct;
                                }
                                ?>
                                <?php
                                $get_product_name = $product->getproductbyId($id);
                                if ($get_product_name) {
                                    while ($result_product = $get_product_name->fetch_assoc()) {
                                ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4 px-md-4">
                                                    <div class="mb-3"> <!-- Chia cột thành 2 nửa -->
                                                        <label for="productName" class="form-label"><b>Name</b></label>
                                                        <input type="text" name="productName" id="productName" class="form-control" value="<?php echo $result_product['productName'] ?>" placeholder="Enter Product Name..." data-original-value="<?php echo $result_product['productName'] ?>">
                                                    </div>
                                                    <div class="mb-3"> <!-- Chia cột thành 2 nửa -->
                                                        <label for="productPrice" class="form-label"><b>Price</b></label>
                                                        <input type="text" name="productPrice" id="productPrice" class="form-control" value="<?php echo $result_product['productPrice'] ?>" placeholder="Enter Price..." data-original-value="<?php echo $result_product['productPrice'] ?>">
                                                    </div>
                                                    <div class="mb-3"> <!-- Chia cột thành 2 nửa -->
                                                        <label for="category" class="form-label"><b>Category</b></label>
                                                        <select id="category" name="category" class="form-select" data-original-value="<?php echo $result_product['catId'] ?>">
                                                            <option>Select Category</option>
                                                            <?php
                                                            $cat = new category();
                                                            $categories = $cat->show_category();

                                                            if ($categories) {
                                                                while ($result = mysqli_fetch_assoc($categories)) {
                                                            ?>
                                                                    <option <?php if ($result['catId'] == $result_product['catId']) {
                                                                                echo 'selected';
                                                                            } ?> value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                                                            <?php
                                                                }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3"> <!-- Chia cột thành 2 nửa -->
                                                        <label for="productType" class="form-label"><b>Product Type</b></label>
                                                        <select id="productType" name="productType" class="form-select" data-original-value="<?php echo $result_product['productType'] ?>">
                                                            <option>Select Type</option>
                                                            <?php
                                                            if ($result_product['productType'] == 0) {
                                                            ?>
                                                                <option value="1">Featured</option>
                                                                <option selected value="0">Non-Featured</option>
                                                            <?php
                                                            } else { ?>
                                                                <option selected value="1">Featured</option>
                                                                <option value="0">Non-Featured</option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 px-md-4">
                                                    <div class="mb-3">
                                                        <label for="productDesc" class="form-label"><b>Description</b></label>
                                                        <textarea name="productDesc" id="productDesc" class="form-control tinymce" rows="12" data-original-value="<?php echo $result_product['productDesc'] ?>"><?php echo $result_product['productDesc'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3 px-md-4"> 
                                                    <img src="<?php echo $result_product['productImage']; ?>" alt="Product Image" style="max-width: 100%; max-height: 410px;" class="mb-3">
                                                    <label for="productImage" class="form-label d-block"><b>Upload Main Image</b></label>
                                                    <input type="file" name="productImage" id="productImage" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-6 px-md-4">
                                                    <img src="<?php echo $result_product['productImage_1']; ?>" alt="Product Image" style="max-width: 100%; max-height: 410px;" class="mb-3">
                                                    <label for="productImage_1" class="form-label d-block"><b>Upload Image 1</b></label>
                                                    <input type="file" name="productImage_1" id="productImage_1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 px-md-4 mb-3">
                                                    <img src="<?php echo $result_product['productImage_2']; ?>" alt="Product Image" style="max-width: 100%; max-height: 410px;" class="mb-3">
                                                    <label for="productImage_2" class="form-label d-block"><b>Upload Image 2</b></label>
                                                    <input type="file" name="productImage_2" id="productImage_2" class="form-control">
                                                </div>
                                                <div class="col-md-6 px-md-4 mb-3">
                                                    <img src="<?php echo $result_product['productImage_3']; ?>" alt="Product Image" style="max-width: 100%; max-height: 410px;" class="mb-3">
                                                    <label for="productImage_3" class="form-label d-block"><b>Upload Image 3</b></label>
                                                    <input type="file" name="productImage_3" id="productImage_3" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 px-md-4 mb-3">
                                                    <img src="<?php echo $result_product['productImage_4']; ?>" alt="Product Image" style="max-width: 100%; max-height: 410px;" class="mb-3">
                                                    <label for="productImage_4" class="form-label d-block"><b>Upload Image 4</b></label>
                                                    <input type="file" name="productImage_4" id="productImage_4" class="form-control">
                                                </div>
                                                <div class="col-md-6 px-md-4 mb-3">
                                                    <img src="<?php echo $result_product['productImage_5']; ?>" alt="Product Image" style="max-width: 100%; max-height: 410px;" class="mb-3">
                                                    <label for="productImage_5" class="form-label d-block"><b>Upload Image 5</b></label>
                                                    <input type="file" name="productImage_5" id="productImage_5" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 px-md-4 mb-3">
                                                    <img src="<?php echo $result_product['productImage_6']; ?>" alt="Product Image" style="max-width: 100%; max-height: 410px;" class="mb-3">
                                                    <label for="productImage_6" class="form-label d-block"><b>Upload Image 6</b></label>
                                                    <input type="file" name="productImage_6" id="productImage_6" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3 px-md-4">
                                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                                                <button type="button" class="btn btn-secondary" id="closeButton">Close</button>
                                            </div>
                                        </form>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tham chiếu đến nút "Cancel"
        var cancelButton = document.getElementById("cancelButton");

        // Thiết lập sự kiện click cho nút "Cancel"
        cancelButton.addEventListener("click", function() {
            // Lấy danh sách các input cần reset
            var productNameInput = document.getElementById("productName");
            var categorySelect = document.getElementById("category");
            var productPriceInput = document.getElementById("productPrice");
            var productTypeSelect = document.getElementById("productType");
            var productDescTextarea = document.getElementById("productDesc");

            // Lấy giá trị ban đầu của các input từ các thuộc tính data-original-value
            var originalProductName = productNameInput.getAttribute("data-original-value");
            var originalCategory = categorySelect.getAttribute("data-original-value");
            var originalProductPrice = productPriceInput.getAttribute("data-original-value");
            var originalProductType = productTypeSelect.getAttribute("data-original-value");
            var originalProductDesc = productDescTextarea.getAttribute("data-original-value");

            // Thiết lập giá trị ban đầu cho các input
            productNameInput.value = originalProductName;
            categorySelect.value = originalCategory;
            productPriceInput.value = originalProductPrice;
            productTypeSelect.value = originalProductType;
            productDescTextarea.value = originalProductDesc;
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tham chiếu đến nút "Close"
        var closeButton = document.getElementById("closeButton");

        // Thiết lập sự kiện click cho nút "Close"
        closeButton.addEventListener("click", function() {
            // Chuyển hướng về trang catlist.php
            window.location.href = 'productlist.php';
        });
    });
</script>

<?php include 'inc/footer.php'; ?>