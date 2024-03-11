<?php include 'Components/Header/header.php';?>





<div style="background-image: url('src/bg_img.jpg'); background-repeat: no-repeat;
  background-size: cover; overflow: hidden; min-height: 100vh">

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
						<textarea class="form-control p-3 " id="UserInput"
							style="height: 200px; overflow-y: scroll;"></textarea>
						<!-- <label for="UserInput" class="">Please Start Typing Here...</label> -->
					</div>
					<div class="btns">
						<button class="btn btn-primary mt-3" onclick="compareEnglishPassages()">Submit</button>
					</div>
				</div>
			</div>


			<!-- NEW  -->

			<div class="col-md-4 d-md-flex justify-content-end mt-2 ">
				<div class="row">
					<div>
						<div class="p-0  d-md-block">
							<h5 class="bg-light  p-2 rounded ">
								<label for="time">Time : <span id="countdown" class="mx-2">10:00</span></label>
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
<!-- <script src="Externaljs/19-02.js"></script> -->
<script src="TypingJs/diff.js"></script>
<script src="TypingJs/main.js"></script>
<script type="text/javascript">

	document.addEventListener('DOMContentLoaded', function () {
		const urlParams = new URLSearchParams(window.location.search);
		const param1 = urlParams.get('param1'); // Get value of param1
		// const param2 = urlParams.get('param2'); // Get value of param2

		document.getElementById('selected_language').innerText = param1;
		// document.getElementById('selected_speed').innerText = param2;
		getc(param1);
	});

</script>
<?php include 'Components/Footer/footer.php'; ?>