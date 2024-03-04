<div class="container  p-3 mt-3">
  <div>
    <h4> Student List </h4>
  </div>
  <div class="container p-3 mt-3">
    <table class="table table-bordered table-striped table-hover mt-2" id="all_stu_list">
      <thead style="background-color:#5CDB95;">
        <tr>
          <th class="col-1">Sr.</th>
          <th>Name</th>
          <th>Mobile</th>
          <th>Email</th>
          <th>Course</th>
          <th>Enrolled Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="student_list_table_body" style="font-size: 15px">
        <!-- Your table body content goes here -->
      </tbody>
    </table>
  </div>

</div>



<script type="text/javascript">
  
  document.addEventListener('DOMContentLoaded', function () {
    create_student_list();
  });

  function create_student_list() {
    $.ajax({
      type: 'POST',
      url: 'Process/studentlist_proc.php',
      dataType: 'json',
      success: function (response) {
        console.log(response);
        var tableBody = document.getElementById("student_list_table_body");
        tableBody.innerHTML = ""; // Clear existing table data

        var data = response.data;
        for (var i = 0; i < data.length; i++) {
          console.log(data[i]);
          var row = document.createElement("tr");

          // SERIAL NUMBER
          var srno = document.createElement("td");
          srno.innerText = (i + 1);
          row.appendChild(srno);

          var name = document.createElement("td");
          name.innerText = data[i]["name"];
          row.appendChild(name);

          var mobile = document.createElement("td");
          mobile.innerText = data[i]["mobile"];
          row.appendChild(mobile);

          var email = document.createElement("td");
          email.innerText = data[i]["email"];
          row.appendChild(email);

          var course = document.createElement("td");
          course.innerText = data[i]["course"];
          row.appendChild(course);

          var enrolled_date = document.createElement("td");
          enrolled_date.innerText = data[i]["enrolled_date"];
          row.appendChild(enrolled_date);


          // Action column
          var actionCell = document.createElement("td");

          // Create the first button
          var button1 = document.createElement("button");
          button1.className = "btn btn-primary btn-sm m-1 "; // Add Bootstrap button classes
          button1.addEventListener('click', function () {
            // Add your button click event code here for the first button
          });

          // Create a span element for the icon of the first button
          var iconSpan1 = document.createElement("span");
          iconSpan1.className = "fas fa-check"; // FontAwesome "check" icon
          button1.appendChild(iconSpan1); // Append the icon span to the first button

          actionCell.appendChild(button1);
          // second btn
          var button2 = document.createElement("button");
          button2.className = "btn btn-danger btn-sm m-1"; // Add Bootstrap button classes
          button2.addEventListener('click', function () {
            // Add your button click event code here for the second button
          });

          // Create a span element for the icon of the second button
          var iconSpan2 = document.createElement("span");
          iconSpan2.className = "fas fa-times"; // FontAwesome "times" icon
          button2.appendChild(iconSpan2); // Append the icon span to the second button
          actionCell.appendChild(button2);
          // Append the action cell to the row
          row.appendChild(actionCell);
          // Append the row to the table body
          tableBody.appendChild(row);
          tableBody.appendChild(row);
        }

        let data_table = new DataTable('#all_stu_list', {
          responsive: true
          // retrieve: true,
          // paging:true
        });
      },
      error: function (error) {
        alert('Error: ' + JSON.stringify(error));
      }
    });
  }
</script>