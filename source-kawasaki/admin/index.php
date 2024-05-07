<?php include('inc/header.php') ?>

<div class='dashboard'>
    <?php include 'inc/sidebar.php'; ?>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <h1 class="logo" style="font-family: 'Copperplat', fantasy;">KAWASAKI</h1>
        </header>

        <div class='dashboard-content dashboard-content-img'>
            <div class='container-fluid'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Welcome back <?php echo Session::get('adminName') ?>!</h2>
                    </div>
                    <div class='card-body'>
                        <p>Your account type is: Administrator</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
    


