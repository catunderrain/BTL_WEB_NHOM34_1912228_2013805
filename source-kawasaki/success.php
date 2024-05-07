<!-- include header.php -->
<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="homeVehicles mt-5">
                <div class="flex-container">
                    <?php 
                        $customer_id = Session::get('customer_id');
                        $get_amount = $cart->getAmountPrice($customer_id);
                        if($get_amount){
                            $amount = 0;
                            while($result = $get_amount->fetch_assoc()){
                                $price = $result['price'];
                                $amount += $price;
                            }
                        }
                        $vat = $amount * 0.05;
                        $total = $vat + $amount;
                    ?>
                    <div class="flex-item text-center">
                        <h1 style="color: #339933;">ORDER SUCCESS!</h1>
                        <h3>Total Price: <?php echo number_format($total, 0, '.', ','); ?> VND</h3>
                        <p style="font-size: 18px;">We will contact you as soon as possible. Thank you!</p>
                        <a href="orderdetails.php" class="btn btn-primary">View Order Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- include footer.php -->
<?php include 'includes/footer.php'; ?>
