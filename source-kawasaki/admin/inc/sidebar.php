<div class="dashboard-nav">
    <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#" class="brand-logo"></a></header>

    <nav class="dashboard-nav-list">
        <a href="index.php" class="dashboard-nav-item active"><i class="bi bi-house-door-fill"></i>Home</a>
        <a href="inbox.php" class="dashboard-nav-item"><i class="bi bi-chat-fill"></i>Inbox</a>
        <a href="../index.php" class="dashboard-nav-item"><i class="bi bi-arrow-up-square-fill"></i>Visit Website </a>
        <div class='dashboard-nav-dropdown'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="bi bi-person-lines-fill"></i> Site option </a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="titleslogan.php" class="dashboard-nav-dropdown-item">Title & Slogan</a>
                <a href="social.php" class="dashboard-nav-dropdown-item">Social Media</a>
                <a href="copyright.php" class="dashboard-nav-dropdown-item">Copyright</a>
            </div>
        </div>
        <div class='dashboard-nav-dropdown'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="bi bi-collection-fill"></i>Update Pages</a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="#" class="dashboard-nav-dropdown-item">About Us</a>
                <a href="#" class="dashboard-nav-dropdown-item">Contact Us</a>
                <a href="#" class="dashboard-nav-dropdown-item"> Projections</a>
            </div>
        </div>
        <!-- <div class='dashboard-nav-dropdown'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="bi bi-plus-square-fill"></i>Slider Option</a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="addslider.php" class="dashboard-nav-dropdown-item">Add Slider</a>
                <a href="sliderlist.php" class="dashboard-nav-dropdown-item">Slider List</a>
            </div>
        </div> -->
        <div class='dashboard-nav-dropdown'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="bi bi-tag-fill"></i>Category Option</a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="catadd.php" class="dashboard-nav-dropdown-item">Add Category</a>
                <a href="catlist.php" class="dashboard-nav-dropdown-item">Category List</a>
            </div>
        </div>
        <div class='dashboard-nav-dropdown'>
            <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="bi bi-cart-fill"></i>Product Option</a>
            <div class='dashboard-nav-dropdown-menu'>
                <a href="productadd.php" class="dashboard-nav-dropdown-item">Add Product</a>
                <a href="productlist.php" class="dashboard-nav-dropdown-item">Product List</a>
            </div>
        </div>

        <a href="#" class="dashboard-nav-item"><i class="bi bi-person-fill"></i> Profile </a>
        <div class="nav-item-divider"></div>
        <?php
            if(isset($_GET[ 'action' ]) && $_GET[ 'action' ] == 'logout'){
                Session::destroy();
            }
        ?>
        <a href="?action=logout" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </nav>
</div>