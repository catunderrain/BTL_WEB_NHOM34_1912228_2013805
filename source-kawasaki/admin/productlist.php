<?php include 'inc/header.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php include_once '../helpers/format.php'; ?>

<?php
$product = new product();
$fm = new Format();

if (isset($_GET['delid'])) {
    $delproduct = $product->del_product($_GET['delid']);
}
?>

<div class='dashboard'>
    <?php include 'inc/sidebar.php'; ?>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <button class="btn menu-toggle"><i class="fas fa-bars"></i></button>
            <h1 class="logo" style="font-family: 'Copperplat', fantasy;">KAWASAKI</h1>
        </header>

        <div class='dashboard-content'>
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center" style="width: 100%;">
                    <div class="col-md-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="card-title">Product List</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($delproduct)) {
                                    echo $delproduct;
                                }
                                ?>
                                <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
											<th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $products = $product->show_product();
                                        if ($products) {
                                            $i = 0;
                                            while ($result = mysqli_fetch_array($products)) {
                                                $i++;
                                        ?>
                                                <tr>
                                                    <th scope="row" class="product_id" style="width: 50px; max-width: 100px;"><?php echo $i ?></th>
                                                    <td><?php echo $result['productName'] ?></td>
													<td><?php echo $result['catName'] ?></td>
                                                    <td>
														<?php 
															echo $fm->textShorten($result['productDesc'], 50);
															// echo $result['productDesc']
														?>
													</td>
                                                    <td>
														<?php 
															if($result['productType'] == 0)
																echo "Non-Featured";
															else
																echo "Featured"
														?>
													</td>
                                                    <td><?php echo $result['productPrice'] ?></td>
                                                    <td>
														<img src="<?php echo $result['productImage']; ?>" alt="Product Image" style="max-width: 200px; max-height: 100px;">
													</td>

                                                    <td style="width: 150px; max-width: 200px;" >
                                                        <a href="productedit.php?productId=<?php echo $result['productId']?>" class="btn btn-info text-decoration-none edit_data">Edit</a>
                                                        <!-- Nút Delete kích hoạt modal xác nhận xóa -->
                                                        <button type="button" class="btn btn-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?php echo $result['productId'] ?>">
                                                            Delete
                                                        </button>

                                                        <!-- CONFIRM DELETE PRODUCT -->
                                                        <div class="modal fade" id="confirmDeleteModal<?php echo $result['productId'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete this product?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        <!-- Nút Delete xóa product -->
                                                                        <a href="?delid=<?php echo $result['productId'] ?>" class="btn btn-danger">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- CONFIRM DELETE PRODUCT -->
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>