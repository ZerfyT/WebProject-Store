<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="z-index: 2000;">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <?php
                            $conn = $pdo->open();
                            $stmt = $conn->prepare("SELECT * FROM `category`");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                            ?>
                                <li>
                                    <a class="dropdown-item" href="#"><?php echo $row['cat_name']; ?></a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </li>
                </ul>
                <!-- Left links -->

                <!-- Search -->
                <form action="search.php" method="get" class="collapse d-flex input-group w-auto ">
                    <input type="search" name="input-search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search text-light"></i>
                    </span>
                </form>
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->


            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="link-secondary mx-3" href="cart.php">
                    <i class="fas fa-shopping-cart text-light"></i>
                </a>

                <!-- Avatar -->
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user-gear text-light mx-1"></i>
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
                    <button type="button" class="btn btn-link px-3">
                        <a class="text-light" href="signin.php" role="button">Login</a>

                    </button>
                    <button type="button" class="btn btn-primary">
                        <a class="text-light" href="signup.php" role="button">Sign up</a>
                    </button>



                    <!-- <button>
                            <a href="signup.php">Sign up</a>
                        </button> -->
                    <!-- </div> -->
                    <!-- <a class="nav-link" href="signin.php"><i class="fa-solid fa-user-gear mx-1"></i>Sign In</a> -->
                <?php
                }
                ?>


            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>