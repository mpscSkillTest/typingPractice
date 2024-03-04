<?php include "Components/Header/header.php" ?>
<?php include "Components/Nav/nav_primary.php" ?>

<div class="row">
    <div class="col-md-6 text-white d-flex align-items-center justify-content-center"
        style="background-color:#16235D; min-height:100vh">
        <div class="left_content p-5 f-8 ">
            <div class="container-fluid col-md-9 col-12">
                <h5 class="text-center mb-5" style="color: #E36921">Institute Registration Process </h5>
                <ul class="mt-3 list-unstyled" style="font-size: 15px;">
                    <li class="mb-3 "> <i class="fa fa-check" aria-hidden="true"
                            style="color: #EC6C1E;"></i>
                        <span style="color: #EC6C1E;">Registration: </span> Upon confirmation, your institute will be
                        successfully registered on our website.

                    </li>

                    <li class="mb-3"><i class="fa fa-check" aria-hidden="true" style="color: #EC6C1E;"></i>
                        <span style="color: #EC6C1E;">Background Verification: </span> Our team will conduct a thorough
                        background check
                    <li class="mb-3"><i class="fa fa-check" aria-hidden="true" style="color: #EC6C1E;"></i>
                        <span style="color: #EC6C1E;">Confirmation: </span> You will be contacted by our
                        team for confirmation..
                    </li>
                    <li class="mb-3"><i class="fa fa-check" aria-hidden="true " style="color: #EC6C1E; "></i>
                        <span style="color: #EC6C1E;">Registration: </span> Upon confirmation, your institute will be
                        successfully registered on our website
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="col-md-6">
        <div class=" w-100 p-3 col-md-9 col-12 bg-light d-md-flex align-items-center justify-content-center"
            style="min-height:100vh">
            <form class="col form_reg bg-light px-md-5 py-3 rounded-3" id="institute_registration"
                enctype="multipart/form-data">
                <h4 class="text-center mb-4">Institute Registration Form</h4>

                <!-- Name -->
                <!-- <form id="single_user_registration"> -->
                <div class="mb-3">
                    <!-- <label for="name" class="form-label">Name</label> -->
                    <input type="text" class="form-control" id="institute_name" name="name_inp"
                        placeholder="Institute name" required />
                    <span id="nameError" style="color: red;" class="error"></span>
                </div>

                <div class="mb-3">
                    <!-- <label for="name" class="form-label">Name</label> -->
                    <input type="text" class="form-control" id="institute_code" name="code_inp"
                        placeholder="Institute code : " required />
                    <span id="nameError" style="color: red;" class="error"></span>
                </div>


                <!-- Contact No -->
                <div class="mb-3">
                    <!-- <label for="contact" class="form-label">Contact No</label> -->
                    <input type="text" class="form-control" id="institute_contact" name="contact_inp" maxlength="10"
                        pattern="^[0-9]{10}$" placeholder="Contact number : " required />
                    <span id="contactError" style="color: red;" class="error"></span>

                </div>

                <!-- Email Id -->
                <div class="mb-3">
                    <!-- <label for="email" class="form-label">Email Id</label> -->
                    <input type="email" class="form-control" id="institute_email" name="email_inp" placeholder="Email :"
                        required />
                    <span id="emailError" style="color: red;" class="error"></span>

                </div>

                <!-- address -->
                <div class="mb-3">
                    <!-- <label for="city" class="form-label">City</label> -->
                    <input type="text" class="form-control" name="address_inp" id="institute_address"
                        placeholder="Address :" required />
                    <span id="addressError" style="color: red;" class="error"></span>
                </div>

                <!-- Institute_city -->
                <div class="mb-3">
                    <!-- <label for="city" class="form-label">City</label> -->
                    <input type="text" class="form-control" name="city_inp" id="institute_city" placeholder="City : "
                        required />
                    <span id="cityError" style="color: red;" class="error"></span>
                </div>

                <!-- PDF Upload -->
                <div class="mb-3">
                    <label class="mb-2" for="pdfFile">Manyata /e-certificate : </label>
                    <input type="file" class="form-control" id="pdfFile" name="pdfFile" accept=".pdf" required />
                    <span id="pdfError" style="color: red;" class="error"></span>
                </div>


                <!-- Add more and Submit buttons -->
                <div class="col-12 d-flex">
                    <div>
                        <button type="button" class="btn btn-primary mt-3" onclick="institute_register()"
                            id="submitbtn">
                            Register Now
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    function institute_register() {
        // if (!validateForm()) {
        //     Swal.fire({
        //         icon: 'warning',
        //         title: 'Oops...',
        //         text: "Make Sure all fields are filled"
        //     })
        //     return false;
        // }
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'Process/institute_reg_proc.php',
            data: $("#institute_registration").serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Institute Added Successfully'
                })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });


            },
            error: function (data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    }

    // function validateForm() {
    //     event.preventDefault();
    //     const name = document.getElementById('institute_name').value;
    //     const contact = document.getElementById('institute_contact').value;
    //     const email = document.getElementById('institute_email').value;
    //     const city = document.getElementById('institute_city').value;
    //     const address = document.getElementById('institute_address').value;
    //     const code = document.getElementById('institute_code').value;
    //     const pdf_inp = document.getElementById('pdfFile').value;




    //     document.getElementById('nameError').innerHTML = '';
    //     document.getElementById('passError').innerHTML = '';
    //     document.getElementById('contactError').innerHTML = '';
    //     document.getElementById('emailError').innerHTML = '';
    //     document.getElementById('cityError').innerHTML = '';
    //     document.getElementById('addressError').innerHTML = '';
    //     document.getElementById('codeError').innerHTML = '';
    //     document.getElementById('pdfError').innerHTML = '';

    //     // Check for empty fields
    //     if (!name || !contact || !email || !city || !address || !code || !pdf_inp) {
    //         if (!name) {
    //             document.getElementById('nameError').innerHTML = 'Name is required';
    //         }
    //         if (!password) {
    //             document.getElementById('passError').innerHTML = 'Password is required';
    //         }
    //         if (!contact) {
    //             document.getElementById('contactError').innerHTML = 'Contact number is required';
    //         }
    //         if (!email) {
    //             document.getElementById('emailError').innerHTML = 'Email is required';
    //         }
    //         if (!city) {
    //             document.getElementById('cityError').innerHTML = 'City is required';
    //         }
    //         if (!gender) {
    //             document.getElementById('addressError').innerHTML = 'Address is required';
    //         }
    //         if (!code) {
    //             document.getElementById('codeError').innerHTML = 'code is required';
    //         }
    //         if (!pdf_inp) {
    //             document.getElementById('codeError').innerHTML = 'code is required';
    //         }
    //         return false;
    //     }

    //     // Validate phone number
    //     const phoneNumberRegex = /^[0-9]{10}$/;
    //
    //     if (!phoneNumberRegex.test(contact)) {
    //         document.getElementById("contactError").innerHTML = 'Invalid phone number. It should contain 10 digits.';
    //         return false;
    //     }



    //     // Validate email
    //     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //     if (!emailRegex.test(email)) {
    //         document.getElementById("emailError").innerHTML = 'Invalid email address.';
    //         return false;
    //     }

    //     // for password
    //     const passwordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])/;
    //     if (!passwordRegex.test(password) || password.length < 8) {
    //         document.getElementById("passError").innerHTML = 'Password should be at least 8 characters long and contain at least one alphabetic, one numeric, and one special character.';
    //         return false;
    //     }

    //     return true;
    //     // If everything is valid, the form can be submitted
    //     // alert('Form submitted successfully!');
    //     // Prevent form submission for the example
    // }

</script>
<?php include "Components/Footer/footer.php" ?>