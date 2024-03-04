<div class="p-3">
    <div class="text-center">
        <h3> Leaderboard</h3>
    </div>

    <div>
    <table class="table table-bordered" id="leaderboard_table">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="leaderboard_table_body">
            
        </tbody>
    </table>
    </div>

</div>

<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
    // Your function code goes here
    create_leaderboard();
});

function create_leaderboard(){
    $.ajax({
      type: 'POST',
      url: 'Process/get_leaderboard_proc.php',
      dataType: 'json',
      success: function (data) {
       console.log(data);
       var tableBody = document.getElementById("leaderboard_table_body");
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

            tableBody.appendChild(row);
       }

      },
      error: function (data) {

        alert(data);
      }
    });
}

</script>