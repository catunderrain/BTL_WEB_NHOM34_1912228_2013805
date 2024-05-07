<!-- include header.php -->
<?php include 'includes/header.php'; ?>

<?php 
    $login_check = Session::get('customer_login');
    if ($login_check==false) {
        header('Location:login.php');
    }

    if (isset($_GET['orderid'])) {
        $orderid = $_GET['orderid'];
        $delorder = $cart->delete_cart_order($orderid);
    }
?>

<div class="homeVehicles">
    <div class="container">
        <div class="container-header">
            <h3>YOUR DETAILS ORDER</h3>
        </div>
        <?php
            if (isset($delorder)) {
                echo $delorder;
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
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Day ordered</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $customer_id = Session::get('customer_id');
                        $get_cart_ordered = $cart->get_cart_ordered($customer_id);
                        if ($get_cart_ordered) {
                            $quantity = 0;
                            $i = 0;
                            while ($result = $get_cart_ordered->fetch_assoc()) {
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
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <td><?php echo $fm->formatDate($result['date_order']) ?></td>
                                    <td>
                                        <?php
                                        if ($result['status']=='0'){
                                            echo 'Pending';
                                        } else{
                                            echo 'Processed';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($result['status']=='0'){?>
                                            <button type="button" class="btn btn-danger" onclick="window.location.href='?orderid=<?php echo $result['id'] ?>'">
                                                Cancel
                                            </button>

                                            <?php
                                        } else{
                                            echo '<button type="button" class="btn btn-secondary">
                                                Can not Cancel
                                            </button>';
                                        }
                                            
                                        ?>
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

<!-- include footer.php -->
<?php include 'includes/footer.php'; ?>