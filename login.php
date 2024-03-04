<?php include 'Components/Header/header.php' ?>

<div class="row">
  <div class="col-md-6 text-white" style="background-color:#16235D">
    <div class="left_content p-5 f-8">
      <div class="container-fluid col-md-9 col-12">
        <h5 class="text-center" style="color: #E36921">Essential Guidelines for Efficient and Accurate
          Practice</h5>
        <ol class="mt-5" style="font-size: 13px;">

          <li class="mb-5 ">Start with proper hand placement on the keyboard, using the home row keys as a
            reference.
          </li>

          <li class="mb-5">Begin with basic typing exercises to build muscle memory and improve finger
            coordination.
          </li>
          <li class="mb-5">Focus on accuracy over speed initially, gradually increasing your typing speed
            as you become
            more comfortable.</li>
          <li class="mb-5">Practice regularly, incorporating varied texts and typing challenges to enhance
            your
            proficiency.</li>
          <li>Take short breaks to prevent fatigue and maintain concentration during typing
            sessions.</li>
        </ol>
      </div>
    </div>
  </div>

  <!-- Right Section -->
  <div class="col-md-6">
    <div class="p-4">
      <div class="container-fluid p-5 mt-5 col-md-9 col-12" style="background-color: #f0f0f3">
        <h3 class="text-center mb-4">Student Login</h3>
        <form id="login_form">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="email" class="form-control" name="username" id="username" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="userpass" id="userpass">
          </div>

          <button type="submit" class="btn btn-primary" onclick="validate_login()">Submit</button>
          <br>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Include jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">

  // validate function start Here

  function validate_login() {
    event.preventDefault();
    var name = document.getElementById("username").value;
    var pass = document.getElementById("userpass").value;

    if (name === '' || name === null || name === undefined) {
      alert("Username Cannot be empty");
      return false;
    }

    if (pass === '' || pass === null || pass === undefined) {
      alert("Password Cannot be empty");
      return false;
    }

    // Make the AJAX request

    // create a admin for same

    $.ajax({
      type: 'POST',
      url: 'Process/login_proc.php',
      data: {
        username: name,
        password: pass
      },
      dataType: 'json',
      success: function (data) {
        alert(data)
        // data = JSON.parse(data);
        if (data === 'success') {
          window.location.href = "app.php";
          // alert(data);
        } else {

          console.log(data)
        }

      },
      error: function (data) {

        alert(data);
      }
    });
  }  
</script>
<?php include 'Components/Footer/footer.php' ?>