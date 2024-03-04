<div class="container p-3 mt-3">
  <div class="row">
    <div class="col-md-6 left_div">
      <form class="col form_reg bg-light px-md-5 py-3 rounded-3" id="single_user_registration">
        <h4 class="text-center">Registration Form</h4>

        <!-- Name -->
        <!-- <form id="single_user_registration"> -->
        <div class="mb-3">
          <!-- <label for="name" class="form-label">Name</label> -->
          <input type="text" class="form-control" id="name" name="name_inp" placeholder="Enter your name" required />
          <span id="nameError" style="color: red;" class="error"></span>

        </div>

        <!-- Contact No -->
        <div class="mb-3">
          <!-- <label for="contact" class="form-label">Contact No</label> -->
          <input type="text" class="form-control" id="contact" name="contact_inp" maxlength="10" pattern="^[0-9]{10}$"
            placeholder="Enter your contact number" required />
          <span id="contactError" style="color: red;" class="error"></span>

        </div>

        <!-- Email Id -->
        <div class="mb-3">
          <!-- <label for="email" class="form-label">Email Id</label> -->
          <input type="email" class="form-control" id="email" name="email_inp" placeholder="Enter your email address"
            required />
          <span id="emailError" style="color: red;" class="error"></span>

        </div>

        <!-- City -->
        <div class="mb-3">
          <!-- <label for="city" class="form-label">City</label> -->
          <input type="text" class="form-control" name="city_inp" id="city" placeholder="Enter your city" required />
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
          <div class="mb-3">
            <!-- <label for="password" class="form-label">Password</label> -->
            <input type="password" class="form-control" id="password" name="pass_inp" placeholder="Enter your password"
              required />
            <span id="passError" style="color: red;" class="error"></span>

          </div>
        </div>

        <!-- Add more and Submit buttons -->
        <div class="col-12 d-flex">
          <div>
            <button type="button" class="btn btn-primary" onclick="single_user_submit()" id="submitbtn">
              <!-- Pay now ₹<span id="totalPrice">0</span> -->submit
          </div>


          <div class="ms-1">
            <button type="button" class="btn btn-secondary" onclick=" addTableRow()" id="addMoreBtn"> Add More</button>
          </div>

        </div>
      </form>
    </div>

    <!-- RIGHT SECRION -->
    <div class="col-md-6 right_div p-3 border border-danger">
      <h2 class="">Entered Data</h2>
      <form id="multiple_user_registration">
        <table class="table" id="displayTable">
          <thead>
            <tr>
              <th>Name</th>
              <th class="d-none">Email</th>
              <th>Subject</th>
              <th class="d-none">Contact</th>
              <th class="d-none">City</th>
              <th class="d-none">Gender</th>
              <th class="d-none">Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="displayTableBody"></tbody>
        </table>
        <div>
          <!-- <input class="" type="number" id="field_count" name="field_count" value="0"> -->
        </div>
        <div class="col-12 d-flex">
          <button type="submit" class="btn btn-primary" id="multi_submit_btn" onclick="multiple_user_submit();">
            Pay now ₹<span id="totalPrice">0</span>
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
  var count = 0;
   

  function addTableRow() {
   
    if (!validateForm()) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: "Make Sure all fields are filled"
      })
      return false;
    }

    var tableBody = document.getElementById("displayTableBody");
    var fieldCountInput = document.getElementById("field_count");

    // var count = parseInt(fieldCountInput.value);

    var name = document.querySelector("#name").value;
    var email = document.querySelector("#email").value;
    var contact = document.querySelector("#contact").value;
    var city = document.querySelector("#city").value;
    var gender = document.querySelector("#gender").value;
    var password = document.querySelector("#password").value;
    var selectedSubjects = Array.from(
      document.querySelectorAll('input[name="selectedSubjects[]"]:checked')
    ).map((checkbox) => checkbox.value);

    var subjectsString = selectedSubjects.join(", ");

    var newRow = tableBody.insertRow(tableBody.rows.length);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    var cell6 = newRow.insertCell(5);
    var cell7 = newRow.insertCell(6);
    var cell8 = newRow.insertCell(7); // New cell for delete button

    // for name 
    var name_inp = document.createElement('input');
    name_inp.type = "text";
    name_inp.id = "name_inp" + count;
    name_inp.name = "name_inp" + count;
    name_inp.value = name;
    cell1.appendChild(name_inp);


    // for email 
    var email_inp = document.createElement('input');
    email_inp.type = "text";
    email_inp.id = "email_inp" + count;
    email_inp.name = "email_inp" + count;
    email_inp.value = email;
    cell2.appendChild(email_inp);

    cell2.style.display = "none";


    // for subject 
    var sub_inp = document.createElement('input');
    sub_inp.type = "text";
    sub_inp.id = "sub_inp" + count;
    sub_inp.name = "sub_inp" + count;
    sub_inp.value = subjectsString;
    cell3.appendChild(sub_inp);

    // for contact
    var contact_inp = document.createElement('input');
    contact_inp.type = "text";
    contact_inp.id = "contact_inp" + count;
    contact_inp.name = "contact_inp" + count;
    contact_inp.value = contact;
    cell4.appendChild(contact_inp);
    cell4.style.display = "none";


    // for gender 
    var gen_inp = document.createElement('input');
    gen_inp.type = "text";
    gen_inp.id = "gen_inp" + count;
    gen_inp.name = "gen_inp" + count;
    gen_inp.value = gender;
    cell5.appendChild(gen_inp);
    cell5.style.display = "none";

    // for city 
    var city_inp = document.createElement('input');
    city_inp.type = "text";
    city_inp.id = "city_inp" + count;
    city_inp.name = "city_inp" + count;
    city_inp.value = city;
    cell6.appendChild(city_inp);
    cell6.style.display = "none";


    // for pass 
    var pass_inp = document.createElement('input');
    pass_inp.type = "text";
    pass_inp.id = "pass_inp" + count;
    pass_inp.name = "pass_inp" + count;
    pass_inp.value = password;
    cell7.appendChild(pass_inp);
    cell7.style.display = "none";


    // Clear the input fields in the form
    document.querySelector("#name").value = "";
    document.querySelector("#email").value = "";
    document.querySelector("#contact").value = "";
    document.querySelector("#gender").value = "";
    document.querySelector("#city").value = "";
    document.querySelector("#password").value = "";



    // added a delete button 
    var deleteBtn = document.createElement('button');
    deleteBtn.type = "button";
    deleteBtn.textContent = "delete";
    deleteBtn.addEventListener("click", function () {
      deleteTableRow(newRow);
    });
    cell8.appendChild(deleteBtn);

    document.querySelectorAll('input[name="selectedSubjects[]"]:checked')
      .forEach((checkbox) => (checkbox.checked = false));

      
  }


  // To delete a row 
  function deleteTableRow(row) {
    var tableBody = document.getElementById("displayTableBody");
    var fieldCountInput = document.getElementById("field_count");

    // to remove the specified row
    tableBody.removeChild(row);

    // Decrement the field count
    fieldCountInput.value = Math.max(0, parseInt(fieldCountInput.value) - 1);
  }

  // for multiple user submission  

  function multiple_user_submit() {
    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: 'Process/register_multiple_user_proc.php',
      data: $("#multiple_user_registration").serialize(),
      dataType: 'json',
      success: function (data) {
        console.log(data);
        var myString = "";
        if ((data.duplicate_number).length > 0) {
          myString = (data.duplicate_number).join(', ');
        }

        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: data.success_entry + 'Users Created And ' + data.duplicate + ' Duplicate Entry (' + myString + ') Found'
        }).then((result) => {
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
    });
  }

  // ------------for single user submission --- - ---------- ----------------- --------------- -//
  function single_user_submit() {
    if (!validateForm()) {
      Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: "Make Sure all fields are filled"
      })
      return false;
    }
    event.preventDefault();

    $.ajax({
      type: 'POST',
      url: 'Process/single_user_proc.php',
      data: $("#single_user_registration").serialize(),
      dataType: 'json',
      success: function (data) {
        console.log(data);
        if (data === 'dupli') {
          Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: 'User already registered!'
          })
        } else {
          Swal.fire({
            icon: 'success',
            title: 'success',
            text: 'User Registered Successfully!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        }
      },
      error: function (data) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong!'
        })
      }
    });
  }

  // for form validation 
  function validateForm() {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const contact = document.getElementById('contact').value;
    const email = document.getElementById('email').value;
    const city = document.getElementById('city').value;
    const gender = document.getElementById('gender').value;
    const password = document.getElementById('password').value;

    var chk1 = document.getElementById("subject1");
    var chk2 = document.getElementById("subject2");


    document.getElementById('nameError').innerHTML = '';
    document.getElementById('passError').innerHTML = '';
    document.getElementById('contactError').innerHTML = '';
    document.getElementById('emailError').innerHTML = '';
    document.getElementById('cityError').innerHTML = '';
    document.getElementById('genderError').innerHTML = '';
    document.getElementById('subError').innerHTML = '';


    // Check for empty fields
    if (!name || !contact || !email || !city || !gender || !password) {
      if (!name) {
        document.getElementById('nameError').innerHTML = 'Name is required';
      }
      if (!password) {
        document.getElementById('passError').innerHTML = 'Password is required';
      }
      if (!contact) {
        document.getElementById('contactError').innerHTML = 'Contact number is required';
      }
      if (!email) {
        document.getElementById('emailError').innerHTML = 'Email is required';
      }
      if (!city) {
        document.getElementById('cityError').innerHTML = 'City is required';
      }
      if (!gender) {
        document.getElementById('genderError').innerHTML = 'Gender is required';
      }
      return false;
    }

    if (chk1.checked || chk2.checked) {
      "";
    } else {
      document.getElementById('subError').innerHTML = 'At least one subject must be selected';
      return false;
    }
    // Validate phone number
    const phoneNumberRegex = /^[0-9]{10}$/;
    if (!phoneNumberRegex.test(contact)) {
      document.getElementById("contactError").innerHTML = 'Invalid phone number. It should contain 10 digits.';
      return false;
    }



    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      document.getElementById("emailError").innerHTML = 'Invalid email address.';
      return false;
    }

    // for password
    const passwordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])/;
    if (!passwordRegex.test(password) || password.length < 8) {
      document.getElementById("passError").innerHTML = 'Password should be at least 8 characters long and contain at least one alphabetic, one numeric, and one special character.';
      return false;
    }

    return true;
    // If everything is valid, the form can be submitted
    // alert('Form submitted successfully!');
    // Prevent form submission for the example  
  }


  // for pricing
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
  console.log("pay", pay_price)
  // Attach change event listeners to both dropdowns
  document.getElementById('marathi_duration').addEventListener('change', updateTotalPrice);
  document.getElementById('english_duration').addEventListener('change', updateTotalPrice);

  // Initial calculation in case the dropdowns are pre-selected with non-default values
  updateTotalPrice();



</script>