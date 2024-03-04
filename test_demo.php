<?php session_start() ?>
<?php include 'Components/Header/header.php'; ?>
<?php include 'Logging/logerror.php'; ?>


<div style="background-image: url('src/bg_img.jpg'); background-repeat: no-repeat;
  background-size: cover; overflow: hidden; min-height: 100vh">
    <?php print_r($_SESSION['user_id']) ?>

    <div class="container mt-5">
        <!-- WILL DISPLAY THE TEXT AND CHANGE COLOR ACC -->
        <div class="row">
            <div class="col-md-8">
                <div id="result" class="p-3 rounded"
                    style="overflow-y: scroll; max-height: 200px; background-color: #F0F0F3; text-align: justify;">

                </div>

                <!-- TEXTAREA FOR USERINPUT -->
                <div class="mt-4">
                    <div class="form-floating ">
                        <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control p-3 " id="UserInput"
                            style="height: 200px; overflow-y: scroll;"></textarea>
                        <!-- <label for="UserInput" class="">Please Start Typing Here...</label> -->
                    </div>

                    <!-- onclick="compareWordsNew(); save_test_data();" -->
                    <button class="btn btn-primary mt-3" id="sub-btn"
                    onclick="compareEnglishPassages();">Submit</button>
                </div>
            </div>


            <!-- NEW  -->

            <div class="col-md-4 d-md-flex justify-content-end mt-2 ">
                <div class="row">
                    <div>
                        <div class="p-0  d-md-block">
                            <h5 class="bg-light  p-2 rounded ">
                                <label for="time">Time : <span id="countdown" class="mx-2">00:00</span></label>
                            </h5>
                        </div>
                        <div class=" p-3 bg-light rounded mt-2 ">
                            <p>Language: <span id="selected_language" class="fw-bold"></span> </p>
                            <p>Keystrokes Count: <span id="keystroke">0</span></p>
                            <p>Error Count: <span id="mistakes">0</span></p>
                            <p>Backspace Count: <span id="backspace">0</span></p>
                            <p>Total Word Count: <span id="contLength">0</span></p>
                            <p>Typed Word Count: <span id="typedWordCount">0</span></p>
                            <p>Pending Word Count: <span id="pendingWordCount">0</span></p>
                            <p>Accuracy : <span id="accuracyCount">0</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="Typingjs/diff.js"></script>
<script src="Typingjs/main.js"></script>
<script type="text/javascript">

    function getQueryParams() {
        const queryParams = {};
        const queryString = window.location.search.substring(1); // Remove '?' at the start
        const params = queryString.split('&');

        params.forEach(param => {
            const [key, value] = param.split('=');
            queryParams[key] = decodeURIComponent(value);
        });

        return queryParams;
    }

    // Example usage
    const queryParams = getQueryParams();
    var test_language = queryParams.language;
    var test_type = queryParams.type;
    console.log('User ID:', queryParams.language);
    console.log('Session Token:', queryParams.type);


    document.addEventListener('DOMContentLoaded', function () {
        // const urlParams = new URLSearchParams(window.location.search);
        // const param1 = urlParams.get('param1'); // Get value of param1
        // // const param2 = urlParams.get('param2'); // Get value of param2

        document.getElementById('selected_language').innerText = "english";
        // document.getElementById('selected_speed').innerText = param2;
        getc("english");
    });

    function save_test_data() {
          alert("insto asda");
        var keystroke = document.getElementById("keystroke").innerText;
        alert(keystroke)
        var accuracy = document.getElementById("accuracyCount").innerText;
        alert(accuracy)
        var subject = document.getElementById("selected_language").innerText;
        // Make the AJAX request
        $.ajax({
            type: 'POST',
            url: 'Process/test_score_proc.php',
            data: {
                keystroke: keystroke,
                accuracy: accuracy,
                subject: subject
            },
            dataType: 'json',
            success: function (data) {
                // data = JSON.parse(data);
                alert(data)
                if (data === 'success') {
                    // alert(data);
                    console.log(data)
                }
            },
            error: function (data) {
                alert(data);
            }
        });
    }
</script>
<?php include 'Components/Footer/footer.php'; ?>