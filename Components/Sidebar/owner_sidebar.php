<!--   ========= sidebar ========= -->

<div id="sidebar-wrapper" style="background-color: #16235D; ">
    <div class="list-group list-group-flush p-3 flex-row my-2"
        style="display: flex; justify-content: center; align-items: center">
        <!-- <img class="img-profile rounded-circle" src="asset/undraw_profile.svg"> -->
        <img class="img-profile rounded-circle w-50" src="asset/undraw_profile.svg" alt="Profile Image">

        <span class="mx-2 text-white" style="color: #636464">
            <?= $_SESSION["username"] ?>
        </span>
    </div>

    <div class="list-group  list-group-flush px-3 mt-2">
        <ul class="nav nav-tabs flex-column">
            <li class="nav-item mt-2">
                <a class="nav-link active list-group-item-action list-group-item-light p-2 bg-gray text-decoration-none text-white"
                    id="tab-dashboard" data-bs-toggle="tab" href="#tab-dashboard-content">
                    <i class="fas fa-fw fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link list-group-item-action list-group-item-light p-2 bg-gray text-decoration-none  text-white"
                    id="tab-studentList" data-bs-toggle="tab" href="#tab-studentlist-content">
                    <i class="fas fa-user-graduate mr-2"></i>
                    Student List
                </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link list-group-item-action list-group-item-light p-2 bg-gray text-decoration-none  text-white"
                    id="tab-newstudent" data-bs-toggle="tab" href="#tab-newstudent-content">
                    <i class="fas fa-pen"></i>
                   Student Registration
                </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link list-group-item-action list-group-item-light p-2 bg-gray text-decoration-none  text-white"
                    id="tab-leaderboard" data-bs-toggle="tab" href="#tab-leaderboard-content">
                    <i class="fas fa-trophy"></i>
                    Leaderboard
                </a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link list-group-item-action list-group-item-light p-2 bg-gray text-decoration-none  text-white"
                    id="tab-ticket" data-bs-toggle="tab" href="#tab-ticket-content">
                    <i class="fas fa-comments"></i>
                    Ticket
                </a>
            </li>


        </ul>
    </div>

    <div class="list-group list-group-flush at-bottom md-at-bottom md-mt-5 text-center " style="background-color: #16235D;">
        <a class="list-group-item-action list-group-item-light p-3 text-decoration-none  text-white" href="#!"
            style="background-color: #16235D;">
            Log out
        </a>
    </div>
</div>