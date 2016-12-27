<?php include "../include/header.php" ?>
<form  id="submission_answer_form" method="POST">
	<div id="main">
		<form>
<h2>question 1 </h2>
  <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other
</form>
	</div>
	<div id="submission_div">
		<button onclick="submission_answer()" id="submit_button">SUBMIT NOW</button>
	</div>
	<div id="timer_question">
		<p id="current_time">Start</p>
		<script>
			timee();
		</script>
	</div>



</form>
<?php include "../include/footer.php" ?>