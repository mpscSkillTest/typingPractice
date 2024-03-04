<?php session_start(); ?>
<?php include "Components/Header/header.php" ?>

<div>
  <div class="container py-3 my-3 bg-light rounded-3">
    <form id="admin_create_user_form">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Name</label>
        <input type="text" class="form-control" id="admin_name" name="user_name">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Email</label>
        <input type="email" class="form-control" id="admin_name" name="user_email">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter Mobile Number</label>
        <input type="tel" class="form-control" id="mobile_number" name="user_mobile">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Enter city </label>
        <input type="text" class="form-control" id="admin_name" name="user_city">
      </div>

      <label class="form-label">Select Your Courses:</label>
      <div class="mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="englishCheckbox" name="course[]" value="English">
          <label class="form-check-label" for="englishCheckbox">English</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="marathiCheckbox" name="course[]" value="Marathi">
          <label class="form-check-label" for="marathiCheckbox">Marathi</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="hindiCheckbox" name="course[]" value="Hindi">
          <label class="form-check-label" for="hindiCheckbox">Hindi</label>
        </div>
        <!-- Add more checkboxes for additional courses -->
      </div>

      <div class="mb-3">
        <label for="dropdownMenuButton" class="form-label">Select an option:</label>
        <select class="form-select" aria-label="Default select example" name="user_role">
          <option value="Admin">Admin</option>
          <option value="Student" selected>Student</option>
          <option value="Owner">Owner</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="admin_password" name="user_password">
      </div>

      <button class="btn btn-primary" onclick="validate_admin_create()">Submit</button>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

  function validate_admin_create() {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'Process/admin_create_user_proc.php',
      data: $("#admin_create_user_form").serialize(),
      dataType: 'json',
      success: function (data) {
        console.log(data); 
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Roles Added Successfully'
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
</script>
<?php include "Components/Footer/footer.php" ?>