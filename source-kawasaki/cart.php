<!-- include header.php -->
<?php include 'includes/header.php'; ?>

<?php
// include 'includes/slider.php'; 
error_reporting(0);
if (isset($_GET['cartid'])) {
    $cartid = $_GET['cartid'];
    $delpro = $cart->delete_cart($cartid);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $update_quantity_cart = $cart->update_quantity_cart($quantity, $cartId);
}
?>

<div class="homeVehicles">
    <div class="container">
        <div class="container-header">
            <h3>YOUR CART</h3>
        </div>
        <?php
        if (isset($update_quantity_cart)) {
            echo $update_quantity_cart;
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_product_cart = $cart->get_product_cart();
                        if ($get_product_cart) {
                            $sub_total = 0;
                            $i = 0;
                            while ($result = $get_product_cart->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $result['productName'] ?></td>
                                    <td>
                                        <a href="productdetail.php?productId=<?php echo $result['productId'] ?>" style="color: inherit; text-decoration: none;">
                                            <img src="<?php echo $result['image'] ?>" alt="Product Image" style="max-width: 200px; max-height: 100px;">
                                        </a>
                                    </td>
                                    <td><?php echo number_format($result['price'], 0, '.', ','); ?>đ</td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>">
                                            <div class="input-group mb-3" style="max-width: 200px;">
                                                <input type="number" name="quantity" value="<?php echo $result['quantity'] ?>" min="1" class="form-control">
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>

                                    </td>
                                    <td><?php $total = $result['price'] * $result['quantity'] ?>
                                    <?php echo number_format($total, 0, '.', ','); ?>đ</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="window.location.href='?cartid=<?php echo $result['cartId'] ?>'">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                        <?php
                                $sub_total += $total;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-end" style="padding-right: 80px;">
            <div class="col-md-4">
                <table class="table">
                    <tr>
                        <th>Sub total: </th>
                        <td><?php echo number_format($sub_total, 0, '.', ','); ?>đ</td>
                    </tr>
                    <tr>
                        <th>VAT (5%): </th>
                        <td><?php $VAT = $sub_total * 5 / 100; ?>
                        <?php echo number_format($VAT, 0, '.', ','); ?>đ</td>
                    </tr>
                    <tr>
                        <th>Total: </th>
                        <td><?php $totalfinal = $sub_total + $VAT; ?>
                        <?php echo number_format($totalfinal, 0, '.', ','); ?>đ</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12 text-center"> <!-- Sử dụng text-center để căn giữa nội dung -->
                <?php 
                $login_check = Session::get('customer_login');
                if($login_check == true){
                    echo '<a href="payment.php" class="btn btn-primary btn-lg">Payment</a>';
                }else{
                    echo '<a href="login.php" class="btn btn-primary btn-lg">Payment</a>';
                }
            ?>
            </div>
        </div>

    </div>
</div>

<!-- include footer.php -->
<?php include 'includes/footer.php'; ?>