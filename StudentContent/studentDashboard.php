<div class="px-2">
    <div class="alert alert-primary d-none" role="alert" id="alert_user">
        You Have Reached your daily limit of 25 tests. Come back tomorrow!
    </div>
</div>

<div class="row d-flex justify-content-center mx-2 my-5 ">

    <!-- RIGHT SIDE  -->
    <div class="col-12 col-sm-6 d-flex  " style="flex-direction: column; ">
        <div class="bg-gray " style="position: relative; border-radius: 8px;">
            <div style="width: 100%; display: flex; justify-content: center;">
                <div class="text-center  py-2 d-flex justify-content-center align-items-center gap-4"
                    style="background-color: #EC6C1E; width: 70%; position: absolute; top: -30px; border-radius: 8px;">
                    <img src="./asset/practice.svg" style="width:45px" alt="practice" />
                    <h6 class="text-center pt-2 " style="color: #FFFFFF;  font-weight: 700;">Practice</h6>
                </div>
            </div>
            <div class="pt-3 pb-4 d-flex justify-content-center gap-4  " style="margin-top:65px ;"
                id="practice_test_div">
                <!-- <div class="text-center">
                    <button class="btn btn-primary p-4 square-btn test_button"
                        value="english_practice">English</button>
                </div>
                <div class="text-center"><button class="btn btn-primary p-4 square-btn test_button"
                        value="marathi_practice">Marathi</button></div> -->
            </div>
            <!-- <ul id="coursesList"></ul> -->

        </div>
    </div>
    <div class="gap-on-small-screen"></div>
    <div class="col-12 col-sm-6 d-flex  " style="flex-direction: column; ">
        <div class="bg-gray " style="position: relative; border-radius: 8px; ">
            <div style="width: 100%; display: flex; justify-content: center;">
                <div class="text-center  py-2 d-flex justify-content-center align-items-center  gap-4"
                    style="background-color: #EC6C1E; width: 70%; position: absolute; top: -30px; border-radius: 8px;">
                    <img src="./asset/speedTest.svg" style="width:45px" alt="practice" />
                    <h6 class="text-center pt-2" style="color: #FFFFFF;  font-weight: 700;">Speed Test</h6>
                </div>
            </div>
            <div class="pt-3 pb-4 d-flex justify-content-center gap-4  lang_btn" style="margin-top:65px ;"
                id="speed_test_div">
                <!-- <div class="text-center"><button class="btn btn-primary p-4 square-btn test_button"
                        value="english_speed">English</button></div>
                <div class="text-center"><button class="btn btn-primary p-4 square-btn test_button"
                        value="english_practice">Marathi</button></div> -->

            </div>
        </div>
    </div>

    <!-- LEFT SIDE END -->

    <!-- <div class="col-12 col-sm-6 " style="margin-top: 65px;">
        <table class="table bg-gray "
            style="border-radius: 8px !important; position: relative; padding: 40px 0 10px 0;">
            <th class="" style="position: absolute; width: 100%; display: flex; justify-content: center; top: -35px;">
                <div class=" d-flex " style="background-color:#5CDB95  ; padding: 15px 40px; border-radius: 10px;">
                    Previous Result
                </div>
            </th>
            <thead>
                <tr class="">
                    <th scope="col ">Date</th>
                    <th scope="col">Language</th>
                    <th scope="col">Speed</th>
                </tr>
            </thead>
            <tbody>
                <tr class="!py-3">
                    <td>20 Dec 2023</td>
                    <td>Marathi</td>
                    <td>23.3 wpm</td>
                </tr>
                <tr>
                    <td>16 Dec 2023</td>
                    <td>English</td>
                    <td>30.7 wpm</td>
                </tr>
                <tr>
                    <td>11 Dec 2023</td>
                    <td>English</td>
                    <td>28.1 wpm</td>
                </tr>
            </tbody>
        </table>
    </div> -->
    <!-- <div class="col-12 col-sm-6 " style="margin-top: 65px;">

        <table class="table bg-gray "
            style="border-radius: 8px !important; position: relative; padding: 40px 0 10px 0; width: 70%;">
            <th class="" style="position: absolute; width: 100%; display: flex; justify-content: center; top: -30px;">
                <div class=" d-flex " style="background-color:#5CDB95  ; padding: 15px 40px; border-radius: 10px;">
                    Leaderboard
                </div>
            </th>
            <tbody>
                <tr style="display: flex; justify-content: center;">
                    <td>Kalpesh Jain</td>
                </tr>

                <tr style="display: flex; justify-content: center;">
                    <td>Kaustubh Kulkarni</td>
                </tr>

                <tr style="display: flex; justify-content: center;">
                    <td> Parth Deshpande</td>
                </tr>
            </tbody>
        </table>
    </div> -->

    <!-- Previous Score table -->
    <div class="col-12 col-sm-6 d-flex  " style="flex-direction: column;  margin-top:80px">
        <div class="bg-gray " style="position: relative; border-radius: 8px;">
            <div style="width: 100%; display: flex; justify-content: center;">
                <div class="text-center  py-2 d-flex justify-content-center align-items-center gap-4"
                    style="background-color: #EC6C1E; width: 70%; position: absolute; top: -30px; border-radius: 8px;">
                    <!-- <img src="./asset/practice.svg" style="width:45px" alt="practice" /> -->
                    <i class="fa fas-regular fa-medal " style="font-size: 30px;"></i>
                    <h6 class="text-center pt-2 " style="color: #FFFFFF;  font-weight: 700;">Previous Score</h6>
                </div>
            </div>
            <table class="table bg-gray  mt-5">
                <tr>
                    <th class="col-1">Sr.</th>
                    <th class="col-1">Date</th>
                    <th class="col-1">Subject</th>
                    <th class="col-1">Accuracy</th>
                </tr>
                </thead>
                <tbody id="student_leaderboard" style="font-size: 15px">
                    <!-- Your table body content goes here -->
                </tbody>
            </table>
            <!-- <div class="text-center">
                    <button class="btn btn-primary p-4 square-btn test_button"
                        value="english_practice">English</button>
                </div>
                <div class="text-center"><button class="btn btn-primary p-4 square-btn test_button"
                        value="marathi_practice">Marathi</button></div> -->
        </div>
        <!-- <ul id="coursesList"></ul> -->

    </div>


    <!-- Leaderboard table -->
    <div class="col-12 col-sm-6 d-flex  " style="flex-direction: column;  margin-top:80px">
        <div class="bg-gray " style="position: relative; border-radius: 8px;">
            <div style="width: 100%; display: flex; justify-content: center;">
                <div class="text-center  py-2 d-flex justify-content-center align-items-center gap-4"
                    style="background-color: #EC6C1E; width: 70%; position: absolute; top: -30px; border-radius: 8px;">
                    <!-- <img src="./asset/practice.svg" style="width:45px" alt="practice" /> -->
                    <i class="fa fas-regular fa-medal " style="font-size: 30px;"></i>
                    <h6 class="text-center pt-2 " style="color: #FFFFFF;  font-weight: 700;">Leaderboard</h6>
                </div>
            </div>
            <table class="table bg-gray  mt-5">
                <thead>
                    <tr class="text-center">
                        <th scope="col ">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="display: flex; justify-content: center;">
                        <td>Kalpesh Jain</td>
                    </tr>

                    <tr style="display: flex; justify-content: center;">
                        <td>Kaustubh Kulkarni</td>
                    </tr>

                    <tr style="display: flex; justify-content: center;">
                        <td> Parth Deshpande</td>
                    </tr>
                </tbody>
            </table>
            <!-- <div class="text-center">
                    <button class="btn btn-primary p-4 square-btn test_button"
                        value="english_practice">English</button>
                </div>
                <div class="text-center"><button class="btn btn-primary p-4 square-btn test_button"
                        value="marathi_practice">Marathi</button></div> -->
        </div>
        <!-- <ul id="coursesList"></ul> -->

    </div>

</div>




<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function () {
        selected_languages();
        create_student_leaderboard();

        // create_student_dashboard();
    });

    function selected_languages() {
        $.ajax({
            type: 'POST', // or 'GET' if appropriate
            url: 'Process/student_dashboard_proc.php',
            dataType: 'json',
            success: function (data) {
                console.log("dashu")
                console.log(data)
                if (data.message === 'success') {
                    // alert("success")
                    var count = data.count;

                    var course = data.data.user_course;
                    console.log(course,)
                    var subjectsArray = course.split(", ");

                    for (var j = 0; j < subjectsArray.length; j++) {
                        var lwrSubject = subjectsArray[j].split(" ")[0].toLowerCase();

                        // INSERT TO PRACTICE
                        var practice_button = document.createElement("button");
                        practice_button.setAttribute("class", "btn btn-primary  p-4 square-btn test_button");
                        practice_button.setAttribute("value", lwrSubject + "_practice");
                        practice_button.textContent = lwrSubject.charAt(0).toUpperCase() + lwrSubject.slice(1);

                        // Add an event listener to the button for the 'click' event
                        function startTestFunction() {

                            start_test(this.value);
                            // Additional logic here
                        }

                        // Assign startTestFunction to the button's onclick event
                        practice_button.onclick = startTestFunction;

                        // Create the div element
                        var practice_div = document.createElement("div");
                        practice_div.setAttribute("class", "text-center");

                        // Append the button to the div
                        practice_div.appendChild(practice_button);
                        document.getElementById("practice_test_div").appendChild(practice_div);

                        // INSERT TO SPEED
                        var speed_button = document.createElement("button");
                        speed_button.setAttribute("class", "btn btn-primary p-4 square-btn test_button");
                        speed_button.setAttribute("value", lwrSubject + "_speed");
                        // speed_button.textContent = lwrSubject;
                        speed_button.textContent = lwrSubject.charAt(0).toUpperCase() + lwrSubject.slice(1);
                        // Add an event listener to the button for the 'click' event

                        // Assign startTestFunction to the button's onclick event
                        speed_button.onclick = startTestFunction;

                        // Create the div element
                        var speed_div = document.createElement("div");
                        speed_div.setAttribute("class", "text-center");

                        // Append the button to the div
                        speed_div.appendChild(speed_button);
                        document.getElementById("speed_test_div").appendChild(speed_div);

                        // for daily limit
                        if (count >= 2) {
                            document.getElementById("alert_user").classList.remove('d-none');
                            practice_button.disabled = true;
                            speed_button.disabled = true;
                        }
                    }

                } else {
                    alert("NO SELECTED SUBJECTS FOUND");
                }
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    };
    function start_test(value) {

        // var data = event.target.value;
        var language = value.split("_")[0];
        var type = value.split("_")[1];

        const baseUrl = 'test_demo.php';

        const urlWithParams = `${baseUrl}?language=${encodeURIComponent(language)}&type=${encodeURIComponent(type)}`;

        // Open the new window with the URL including parameters
        window.open(urlWithParams, '_blank');
    }



    function create_student_leaderboard() {
        $.ajax({
            type: 'POST',
            url: 'Process/dashboard_leaderboard_proc.php',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                var tableBody = document.getElementById("student_leaderboard");
                tableBody.innerHTML = ""; // Clear existing table data

                var data = response.data;
                for (var i = 0; i < data.length; i++) {
                    console.log(data[i]);
                    var row = document.createElement("tr");

                    // SERIAL NUMBER
                    var srno = document.createElement("td");
                    srno.innerText = (i + 1);
                    row.appendChild(srno);

                    var date = document.createElement("td");
                    date.innerText = data[i]["date"];
                    row.appendChild(date);

                    var subject = document.createElement("td");
                    subject.innerText = data[i]["subject"];
                    row.appendChild(subject);

                    var accuracy = document.createElement("td");
                    accuracy.innerText = data[i]["accuracy"];
                    row.appendChild(accuracy);

                    tableBody.appendChild(row);
                }
            },
            error: function (error) {
                alert('Error: ' + JSON.stringify(error));
            }
        });
    }





</script>