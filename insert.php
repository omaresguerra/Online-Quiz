<?php
	include('config.php');

	if (isset($_POST['addquestion'])) {
		$question = $_POST['txtQuestion'];
		$optionA = $_POST['txtOptionA'];
		$optionB = $_POST['txtOptionB'];
		$optionC = $_POST['txtOptionC'];
		$optionD = $_POST['txtOptionD'];
		$answer = $_POST['cboxAnswer'];

		$query = "INSERT INTO question(Questionaire, OptionA, OptionB, OptionC, OptionD, QuestionAnswerID) VALUES ('$question','$optionA','$optionB','$optionC','$optionD','$answer')";
		$result = mysqli_query($dbcon, $query);
	}

	if (isset($_POST['adduser'])) {
		$lanme = $_POST['txtLastName'];
		$fname = $_POST['txtFirstName'];
		$uname = $_POST['txtUserName'];
		$password = $_POST['txtPassword'];
		$section = $_POST['cboxSection'];

		$pass=md5($password);

		$query = "INSERT INTO user(LastName, FirstName, UserName, Password, SectionID) VALUES ('$lanme','$fname','$uname','$pass','$section')";
		$result = mysqli_query($dbcon, $query);
	}

	if (isset($_POST['addsection'])) {
		$section = $_POST['txtSection'];

		$query = "INSERT INTO section(Section) VALUES ('$section')";
		$result = mysqli_query($dbcon, $query);
	}
?>