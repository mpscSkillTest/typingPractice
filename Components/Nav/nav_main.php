<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-4">
    <div class="container-fluid">
        <button class="btn" id="sidebarToggle">
            <i class="fas fa-align-left primary-text fs-4 me-3"></i>
        </button>
        <a class="navbar-brand" href="#">Welcome,
            <?= $_SESSION["username"] ?>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input" placeholder="Search Here.......">
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>