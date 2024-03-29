<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4 align-items-center">
            <!-- Toggle button -->
            <button class="navbar-toggler bg-transparent" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 text-light fw-bold" href="index.php">LOGO
                    <!-- <img src="images/logo.webp" height="15" alt="MDB Logo" loading="lazy" /> -->
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact us</a>
                    </li>

                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">

                            <?php
                            // $conn = $pdo->open();
                            $stmt = $conn->prepare("SELECT * FROM `category`");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                            ?>
                                <li>
                                    <a class="dropdown-item" href="#"><?php echo $row['cat_name']; ?></a>
                                    <!-- <hr class="dropdown-divider"> -->
                                </li>
                            <?php
                            }
                            // $pdo->close();
                            ?>

                        </ul>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Search -->
                <form action="search.php" method="get" class="collapse d-flex input-group w-auto ">
                    <input type="search" name="input-search" class="form-control rounded text-light" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </form>
            </div>

            
            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <div class="cart">
                    <a class="link-secondary mx-3" href="cart.php">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>

                <!-- Avatar -->
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-gear mx-1"></i>
                            <!-- <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" /> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="profile.php">My profile</a>
                            </li>
                            <!-- <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li> -->
                            <li>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <!-- <a class="nav-link" href="profile.php"><i class="fa-solid fa-user-gear mx-1"></i>Account</a> -->
                <?php
                } else {
                ?>
                    <!-- <div class="d-flex align-items-center"> -->
                    <!-- <button type="button" class="btn btn-link px-3"> -->
                    <div class="sign-btn">
                        <a class="btn btn-outline-light fw-bolder" data-mdb-ripple-color="light" href="signin.php" role="button">Sign In</a>

                    </div>

                    <!-- </button> -->
                    <!-- <button type="button" class="btn btn-primary"> -->
                    <!-- <a class="btn btn-tertiary text-light mx-2 p-2 fw-bold" data-mdb-ripple-color="light" href="signup.php" role="button"> -->
                    <!-- <i class="fa-regular fa-user me-2"></i> -->
                    <!-- SignUp -->
                    <!-- </a> -->
                    <!-- </button> -->



                    <!-- <button>`
                            <a href="signup.php">Sign up</a>
                        </button> -->
                    <!-- </div> -->
                    <!-- <a class="nav-link" href="signin.php"><i class="fa-solid fa-user-gear mx-1"></i>Sign In</a> -->
                <?php
                }
                ?>


            </div>
        </div>
    </nav>
</header>