<?php include 'Components/Header/header.php' ?>


<nav class="navbar navbar-expand-lg  " style = "color: #F8F8F8 ">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="./asset/Typing.png" alt="Logo" class="img-fluid" style="width:75px;" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="dropdown">
                    <button class="btn dropdown-toggle " type="button" id="dropdownMenuButton" style="background-color: #EC6C1E;" data-bs-toggle="dropdown" aria-expanded="false">
                        New Registration
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" style="color: #EC6C1E;" href="all_Stu_Reg.php">Student Registration</a></li>
                        <li><a class="dropdown-item" style="color: #EC6C1E;" href="institute_reg.php">Instiitute Registration</a></li>
                    </ul>
                </div>
                <button class="btn btn-light ms-3" style="border: 1px solid #EC6C1E; color: #EC6C1E" >Login</button>
            </div>
        </div>
    </div>
</nav>