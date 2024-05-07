<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>

<?php
$product = new product();
if ($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_POST['submit'])) {

    $insertProduct = $product->insert_product($_POST, $_FILES);
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
                                <h4 class="card-title">Add New Product</h4>
                            </div>
                            <div class="card-body">
                                <form action="productadd.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <?php
                                        if (isset($insertProduct)) {
                                            echo $insertProduct;
                                        }
                                        ?>
                                        <div class="col-md-4 px-md-4">
                                            <div class="mb-3">
                                                <label for="productImage" class="form-label"><b>Upload Main Image</b></label>
                                                <input type="file" name="productImage" id="productImage" class="form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImage_1" class="form-label"><b>Upload Image 1</b></label>
                                                <input type="file" name="productImage_1" id="productImage_1" class="form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImage_2" class="form-label"><b>Upload Image 2</b></label>
                                                <input type="file" name="productImage_2" id="productImage_2" class="form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImage_3" class="form-label"><b>Upload Image 3</b></label>
                                                <input type="file" name="productImage_3" id="productImage_3" class="form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImage_4" class="form-label"><b>Upload Image 4</b></label>
                                                <input type="file" name="productImage_4" id="productImage_4" class="form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImage_5" class="form-label"><b>Upload Image 5</b></label>
                                                <input type="file" name="productImage_5" id="productImage_5" class="form-control ">
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImage_6" class="form-label"><b>Upload Image 6</b></label>
                                                <input type="file" name="productImage_6" id="productImage_6" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-md-8 px-md-4">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="productName" class="form-label"><b>Name</b></label>
                                                    <input type="text" name="productName" id="productName" class="form-control " placeholder="Enter Product Name...">
                                                </div>
                                                <div class="col-md-6 px-md-3 mb-3">
                                                    <label for="category" class="form-label"><b>Category</b></label>
                                                    <select id="category" name="category" class="form-select ">
                                                        <option>Select Category</option>
                                                        <?php
                                                        $cat = new category();
                                                        $categories = $cat->show_category();

                                                        if ($categories) {
                                                            while ($result = mysqli_fetch_assoc($categories)) {
                                                        ?>
                                                                <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                                                        <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="productPrice" class="form-label"><b>Price</b></label>
                                                    <input type="text" name="productPrice" id="productPrice" class="form-control " placeholder="Enter Price...">
                                                </div>
                                                <div class="col-md-6 px-md-3 mb-3">
                                                    <label for="productType" class="form-label"><b>Product Type</b></label>
                                                    <select id="productType" name="productType" class="form-select ">
                                                        <option>Select Type</option>
                                                        <option value="1">Featured</option>
                                                        <option value="0">Non-Featured</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productDesc" class="form-label"><b>Description</b></label>
                                                <textarea name="productDesc" id="productDesc" class="form-control  tinymce" rows="15"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 px-md-4">
                                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>