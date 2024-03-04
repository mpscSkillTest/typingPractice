<?php include "Components/Header/header.php" ?>
<?php include "Components/Nav/all_stu_reg_nav.php" ?>
<? include 'Logging/logerror.php'; ?>

<?php session_start(); ?>


<div class="row">
    <div class="col-md-6 text-white d-md-flex align-items-center justify-content-center"
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

                </ul>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="col-md-6">
        <div class=" w-100 p-3 col-md-9 col-12 bg-light d-md-flex align-items-center justify-content-center"
            style="min-height:100vh">
            <form class="col  form_reg bg-light px-md-5 py-3 rounded-3" id="user_pay_registration">
                <h4 class="text-center mb-4">Student Registration Form</h4>

                <!-- Name -->
                <!-- <form id="single_user_registration"> -->
                <div class="mb-3">
                    <!-- <label for="name" class="form-label">Name</label> -->
                    <input type="text" class="form-control" id="name" name="name_inp" placeholder="Enter your name"
                        required />
                    <span id="nameError" style="color: red;" class="error"></span>

                </div>

                <!-- Contact No -->
                <div class="mb-3">
                    <!-- <label for="contact" class="form-label">Contact No</label> -->
                    <input type="text" class="form-control" id="contact" name="contact_inp" maxlength="10"
                        pattern="^[0-9]{10}$" placeholder="Enter your contact number" required />
                    <span id="contactError" style="color: red;" class="error"></span>

                </div>

                <!-- Email Id -->
                <!-- <div class="mb-3">
                    <label for="email" class="form-label">Email Id</label>
                    <input type="email" class="form-control" id="email" name="email_inp"
                        placeholder="Enter your email address" required />
                    <span id="emailError" style="color: red;" class="error"></span>

                </div> -->

                <!-- City -->
                <div class="mb-3">
                    <!-- <label for="city" class="form-label">City</label> -->
                    <input type="text" class="form-control" name="city_inp" id="city" placeholder="Enter your city"
                        required />
                    <span id="cityError" style="color: red;" class="error"></span>

                </div>

                <!-- GENDER -->
                <div class="mb-3">
                    <!-- <label for="city" class="form-label">City</label> -->
                    <select id="gender" name="gen_inp" class="form-select" required>
                        <option selected disabled value="">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <span id="genderError" style="color: red;" class="error"></span>

                </div>

                <!-- Subject -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="subject" class="form-label">Select Subject</label>
                    </div>

                    <!-- Select Subject -->
                    <div class="col-md-8">
                        <!-- <label class="form-label">Select Subjects</label> -->
                        <!-- <div class="row"> -->

                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" value="Marathi 30" id="subject1"
                                name="selectedSubjects[]" />
                            <label class="form-check-label" for="subject1">Marathi 30</label>

                            <select id="marathi_duration">
                                <option class="border-none " value="0">Select Duration</option>
                                <option value="99">For 1 Month : ₹ 99</option>
                                <option value="199">For 3 Month - ₹ 199</option>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <input class="form-check-input" type="checkbox" value="English 40" id="subject2"
                                name="selectedSubjects[]" />
                            <label class="form-check-label mr-3" for="subject1">English 40</label>
                            <select id="english_duration">
                                <option class="border-none " value="0">Select Duration</option>
                                <option value="99">For 1 Month : ₹ 99</option>
                                <option value="199">For 3 Month - ₹ 199</option>
                            </select>
                        </div>
                        <span id="subError" style="color: red;" class="error"></span>

                        <!-- </div> -->

                        <!-- Add more checkboxes as needed -->


                    </div>


                    <!-- Password -->
                    <!-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="pass_inp"
                            placeholder="Enter your password" required />
                        <span id="passError" style="color: red;" class="error"></span>

                    </div> -->
                </div>

                <!-- Add more and Submit buttons -->

                <div>
                    <button type="button" style="background-color: #EC6C1E; color:white;" class="btn col-md-12"
                        id="submitbtn">
                        Pay now ₹<span id="totalPrice">0</span>
                    </button>
                </div>
            </form>
            <!-- <form>
                <script src="https://checkout.razorpay.com/v1/payment-button.js"
                    data-payment_button_id="pl_NbAf8JBdq6URau" async> </script>
            </form> -->
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    // javascript for check button two use dropdown only if button is checked
    // Function to toggle the disabled state of a dropdown based on its corresponding checkbox
    var pay_price = 0;
    function toggleDropdown(checkboxId, dropdownId) {
        var checkbox = document.getElementById(checkboxId);
        var dropdown = document.getElementById(dropdownId);

        checkbox.addEventListener('change', function () {
            dropdown.disabled = !this.checked;
            if (!this.checked) {
                dropdown.value = '0';
            }
            updateTotalPrice(); // Update total price whenever a checkbox is changed
        });

        // Initialize with correct disabled state on page load
        dropdown.disabled = !checkbox.checked;
        if (!checkbox.checked) {
            dropdown.value = '0';
        }
    }

    // Call the function for each subject
    toggleDropdown('subject1', 'marathi_duration');
    toggleDropdown('subject2', 'english_duration');

    // Function for calculating total price
    function updateTotalPrice() {
        var marathiPrice = 0;
        var englishPrice = 0;

        if (document.getElementById('subject1').checked) {
            marathiPrice = parseFloat(document.getElementById('marathi_duration').value);
        }
        if (document.getElementById('subject2').checked) {
            englishPrice = parseFloat(document.getElementById('english_duration').value);
        }

        var totalPrice = marathiPrice + englishPrice;
        document.getElementById('totalPrice').textContent = totalPrice;
        pay_price = totalPrice;
        console.log("pay", pay_price)
    }

    // function updateTotalPrice() {
    //     var marathiPrice = 0;
    //     var englishPrice = 0;

    //     // Check if Marathi is selected and extract the price
    //     if (document.getElementById('subject1').checked) {
    //         var marathiSelection = document.getElementById('marathi_duration').value;
    //         if (marathiSelection !== '0') { // Ensure a valid option is selected
    //             marathiPrice = parseFloat(marathiSelection.split('_')[0]); // Assuming value is in 'price_duration' format
    //         }
    //     }

    //     // Check if English is selected and extract the price
    //     if (document.getElementById('subject2').checked) {
    //         var englishSelection = document.getElementById('english_duration').value;
    //         if (englishSelection !== '0') { // Ensure a valid option is selected
    //             englishPrice = parseFloat(englishSelection.split('_')[0]); // Assuming value is in 'price_duration' format
    //         }
    //     }

    //     // Calculate the total price and update the UI
    //     var totalPrice = marathiPrice + englishPrice;
    //     document.getElementById('totalPrice').textContent = 'Total Price: ₹' + totalPrice;
    //     pay_price = totalPrice; // Update the global variable
    //     console.log("pay", pay_price);
    // }


    console.log("pay", pay_price)
    // Attach change event listeners to both dropdowns
    document.getElementById('marathi_duration').addEventListener('change', updateTotalPrice);
    document.getElementById('english_duration').addEventListener('change', updateTotalPrice);

    // Initial calculation in case the dropdowns are pre-selected with non-default values
    updateTotalPrice();

    // for paymentgateway

    document.getElementById('submitbtn').onclick = function (e) {
        event.preventDefault();
        if (!validateForm()) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: "Make Sure all fields are filled"
            })
            return false;
        }

        var options = {
            "key": "rzp_test_FTcWVtO6GaHFlO", // Replace with your actual Razorpay key ID
            "amount": pay_price * 100, // Razorpay expects the amount in the smallest currency unit (paisa for INR)
            "currency": "INR",
            capture: true,
            "name": "Web Touter",
            "description": "Transaction Description",
            "handler": function (response) {
                // Handle the payment success, send Razorpay payment ID to the server
                handlePaymentSuccess(response.razorpay_payment_id);
            },
            "theme": {
                "color": "#F37254"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        e.preventDefault();
    };

    function handlePaymentSuccess(paymentId) {
        // Example data you might want to send to your server for verification
        var data = {
            payment_id: paymentId,
            amount: pay_price * 100
        };

        // Serialize form data
        var serializedFormData = $("#user_pay_registration").serialize();
        serializedFormData += '&' + $.param({
            payment_id: paymentId,
            amount: pay_price * 100,
        });

        // Convert extraData object to URL-encoded string and append it to serialized form data
        // $.each(data, function (key, value) {
        //     serializedFormData += '&' + encodeURIComponent(key) + '=' + encodeURIComponent(value);
        // });

        console.log(serializedFormData, "heyuyuyu")


        // Convert the data object to JSON
        var jsonData = JSON.stringify(data);
        $.ajax({
            type: 'POST', // Use 'POST' or 'PUT' as needed
            url: 'payment_success.php',
            // contentType: 'application/json', // Specify the content type
            data: serializedFormData,
            // dataType: 'json', // Expect a JSON response
            success: function (data) {
                console.log('Success:', data);
                if (data.success) {
                    // Payment verification successful
                    // Redirect or update UI accordingly
                    // window.location.href = 'payment_success.html'; // Example redirection
                    alert("Success");
                } else {
                    // Payment verification failed
                    // Handle the failure
                    alert("Payment verification failed. Please try again.");
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });

        // Use Fetch API to send the payment ID to your server
        //     fetch('payment_success.php', {
        //         method: 'POST', // or 'PUT'
        //         headers: {
        //             'Content-Type': 'application/json',
        //         },
        //         body: jsonData, // JSON string of the data
        //     })
        //         .then(response => response.json()) // Convert response to JSON
        //         .then(data => {
        //             console.log('Success:', data);
        //             if (data.success) {
        //                 // Payment verification successful
        //                 // You can redirect the user to a success page or update the UI accordingly
        //                 // window.location.href = 'payment_success.html'; // Example redirection
        //                 alert("siccess");
        //             } else {
        //                 // Payment verification failed
        //                 // Handle failure, perhaps retry the transaction or inform the user
        //                 alert("Payment verification failed. Please try again.");
        //             }
        //         })
        //         .catch((error) => {
        //             console.error('Error:', error);
        //         });
    }


    // for form validation 
    function validateForm(event) {
        // event.preventDefault(); // Prevent the form from submitting

        // Retrieve input values
        const name = document.getElementById('name').value;
        const contact = document.getElementById('contact').value;
        const city = document.getElementById('city').value;
        const gender = document.getElementById('gender').value;

        // Initialize validation flag
        let isValid = true;

        // Clear previous error messages
        document.getElementById('nameError').innerHTML = '';
        document.getElementById('contactError').innerHTML = '';
        document.getElementById('cityError').innerHTML = '';
        document.getElementById('genderError').innerHTML = '';
        document.getElementById('subError').innerHTML = '';

        // Check for empty fields
        if (!name) {
            document.getElementById('nameError').innerHTML = 'Name is required';
            // isValid = false;
            return false;
        }
        if (!contact) {
            document.getElementById('contactError').innerHTML = 'Contact number is required';
            return false;
        }
        if (!city) {
            document.getElementById('cityError').innerHTML = 'City is required';
            return false;
        }
        if (!gender) {
            document.getElementById('genderError').innerHTML = 'Gender is required';
            return false;
        }

        // Subject validation
        var chk1 = document.getElementById("subject1").checked;
        var chk2 = document.getElementById("subject2").checked;
        if (!chk1 && !chk2) {
            document.getElementById('subError').innerHTML = 'At least one subject must be selected';
            return false;
        }

        // Validate contact number
        const phoneNumberRegex = /^[0-9]{10}$/;
        if (!phoneNumberRegex.test(contact)) {
            document.getElementById('contactError').innerHTML = 'Invalid phone number. It should contain 10 digits.';
            return false;
        }

        // Only proceed if the form is valid
        // if (isValid) {
        //     // Form is valid, submit the form or further processing
        //     console.log('Form is valid');
        //     // You can submit the form using JavaScript here if needed
        // }

        return true;
    }


</script>


<?php include "Components/Footer/footer.php" ?>