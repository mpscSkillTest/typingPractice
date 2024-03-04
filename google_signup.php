<?php include 'Components/Header/header.php' ?>
<?php include "Components/Nav/nav_primary.php" ?>
<?php include '../Logging/logerror.php'; ?>

<?php print_r($_SESSION); ?>

<div class="row">
    <div class="col-md-6 text-white d-flex align-items-center justify-content-center"
        style="background-color:#16235D; min-height:100vh">
        <div class="left_content p-5 f-8 ">
            <div class="container-fluid col-md-9 col-12">
                <h5 class="" style="color: #E36921">What you'll get </h5>
                <ul class="mt-3 list-unstyled" style="font-size: 15px;">
                    <li class="mb-3 "> <i class="fa fa-check color-danger" aria-hidden="true"
                            style="color: #EC6C1E;"></i>
                        Daily practice sessions of up to 3 hours.
                    </li>

                    <li class="mb-3"><i class="fa fa-check" aria-hidden="true" style="color: #EC6C1E;"></i>
                        Support for mobile, laptop, and tablet devices.
                    </li>
                    <li class="mb-3"><i class="fa fa-check" aria-hidden="true" style="color: #EC6C1E;"></i>
                        Access to 100+ passages for practice.</li>
                    <li class="mb-3"><i class="fa fa-check" aria-hidden="true " style="color: #EC6C1E; "></i>
                        Curriculum designed in accordance with government regulations..</li>

                    <li class="mt-5 text-center ">24/7 support available</li>
                    <li class="mt-2 text-center">SSL secured checkout</li>

                </ul>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="col-md-6">
        <div class="d-flex align-items-center justify-content-center text-center h-100">
            <div>
                <h4>Log In With Google</h4>
                <!-- Sign In With Google button with HTML data attributes API -->
                <div id="g_id_onload"
                    data-client_id="887502454325-7esoul7cmenna7vvvum8qsr7s92e2him.apps.googleusercontent.com"
                    data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse"
                    data-auto_prompt="false">
                </div>

                <div class="g_id_signin btn p-2  fw-bold mt-3" style="color: #212529; border-color: #f8f9fa"
                    data-type="standard" data-shape="rectangular" data-theme="outline" data-text="signin_with"
                    data-size="large" data-logo_alignment="right">
                </div>
                <hr class="w-100 border border-danger">
                <p>For Institute Student Only <a href="login.php">LogIn</a></p>

                <div class="pro-data hidden d-none"></div>
            </div>
        </div>
        
    </div>


    <script>
        function handleCredentialResponse(response) {
            alert("KUCH TOH");
            // Post JWT token to server-side
            fetch("Process/google_signin_proc.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ request_type: 'user_auth', credential: response.credential }),
            })
                .then(response => response.json())
                .then(data => {
                    alert("heuuyu")
                    console.log(data);
                    if (data.status === 'success') {
                        let responsePayload = data.pdata;
                        alert("hmmm")

                        if (data.user_type === 'existing' && data.current_status === "active") {
                            window.location.href = "app.php"; // Adjust the path as necessary
                            alert("in active")
                        } else if (data.user_type === 'existing' && data.current_status === "inactive") {
                            window.location.href = 'all_stu_reg.php'; // Adjust the path as necessary
                        }else if(data.user_type === 'new' && data.current_status === "inactive"){
                            window.location.href = 'all_stu_reg.php'; // Adjust the path as necessary
                        }
                        // ENTER REMAINING CONDITION
                    }


                })
                .catch(console.error);
        }

        // Function to escape HTML to prevent XSS remains unchanged
        function encodeHTML(str) {
            return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
        }

        // Sign out the user function remains unchanged
        function signOut(authID) {
            document.getElementsByClassName("pro-data")[0].innerHTML = '';
            document.querySelector("#btnWrap").classList.remove("hidden");
            document.querySelector(".pro-data").classList.add("hidden");
        }    
    </script>
    <?php include "Components/Footer/footer.php" ?>