<?php session_start();?>
<?php include 'Components/Header/header.php' ?>



<nav class="navbar navbar-expand-lg  " style="color: #F8F8F8 ">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="./asset/Typing.png" alt="Logo" class="img-fluid"
                style="width:75px;" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">

            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" style="color: #EC6C1E;" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #EC6C1E;" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #EC6C1E;" href="#">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #EC6C1E;" href="#">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex">
                <a class="navbar-brand" href="#"> 
                    <?=  $_SESSION["username"] ?>
                </a>
            </div>
        </div>
    </div>
</nav>