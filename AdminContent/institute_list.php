<div class="container p-3 mt-3">
    <div>
        <h4> All Institute List </h4>
    </div>
    <div class="container p-3 mt-3">
        <table class="table table-bordered table-striped table-hover mt-2" id="all_institute_list">
            <thead style="background-color:#5CDB95;">
                <tr>
                    <th class="col-1">Sr.</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Certificate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="institute_list_table_body" style="font-size: 15px">
                <!-- Your table body content goes here -->
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">


    document.addEventListener('DOMContentLoaded', function () {
        create_institute();
    });

    function create_institute() {
        $.ajax({
            type: 'POST',
            url: 'Process/institute_list_proc.php',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                var tableBody = document.getElementById("institute_list_table_body");
                tableBody.innerHTML = ""; // Clear existing table data

                var data = response.data;
                for (var i = 0; i < data.length; i++) {
                    console.log(data[i]);
                    var row = document.createElement("tr");

                    // SERIAL NUMBER
                    var srno = document.createElement("td");
                    srno.innerText = (i + 1);
                    row.appendChild(srno);

                    var Institute_name = document.createElement("td");
                    Institute_name.innerText = data[i]["Institute_name"]; // Corrected key
                    row.appendChild(Institute_name);

                    var Institute_code = document.createElement("td");
                    Institute_code.innerText = data[i]["Institute_code"]; // Corrected key
                    row.appendChild(Institute_code);

                    var Institute_mobile = document.createElement("td");
                    Institute_mobile.innerText = data[i]["Institute_mobile"]; // Corrected key
                    row.appendChild(Institute_mobile);

                    var Institute_email = document.createElement("td");
                    Institute_email.innerText = data[i]["Institute_email"]; // Corrected key
                    row.appendChild(Institute_email);

                    var Institute_city = document.createElement("td");
                    Institute_city.innerText = data[i]["Institute_city"]; // Corrected key
                    row.appendChild(Institute_city);

                    var Institute_address = document.createElement("td");
                    Institute_address.innerText = data[i]["Institute_address"]; // Corrected key
                    row.appendChild(Institute_address);

                    var Institute_certificate = document.createElement("td");
                    Institute_certificate.innerText = data[i]["Institute_certificate"]; // Corrected key
                    row.appendChild(Institute_certificate);


                    // Action column
                    var actionCell = document.createElement("td");
                    // Create the first button
                    var button1 = document.createElement("button");
                    button1.className = "btn btn-primary btn-sm m-1 "; // Add Bootstrap button classes
                    button1.addEventListener('click', function () {
                        // Add your button click event code here for the first button
                        approve_institute(this.value);
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

                let data_table = new DataTable('#all_institute_list', {
                    responsive: true
                    // retrieve: true,
                    // paging:true
                });

                createPagination(response.totalRecords);
            },
            error: function (error) {
                alert('Error: ' + JSON.stringify(error));
            }
        });
    }
</script>