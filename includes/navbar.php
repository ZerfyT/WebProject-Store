<header class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="#">Home</a>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Company</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                        <!-- <a class="nav-link active" href="#" aria-current="page">Contact Us <span class="visually-hidden">(current)</span></a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Category 1</a>
                            <a class="dropdown-item" href="#">Category 2</a>
                            <a class="dropdown-item" href="#">Category 3</a>
                        </div>
                    </li>
                </ul>

                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" name="input-search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="bt-search">Search</button>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart</a>
                        <!-- <a class="nav-link active" href="#" aria-current="page">Contact Us <span class="visually-hidden">(current)</span></a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>