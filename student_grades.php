<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="styling/stylesheet.css" />
		<script src="javascript/fetch_grades.js"></script>
		<title>Datanettverk og skytjenester</title>
	</head>
	<body>
		<h1>Students grades</h1>
		<label>
			Student name:
			<br />
			<input type="text" id="student-name" oninput="fetch_grades()" />
		</label>
		<br />
		<br />
		<table id="student_grades">
		<?php
			$db = new mysqli("10.10.12.63", "dats20", "finish shoe took", "student_grades");
			if ($db->connect_errno) {
				die($db->connect_error);
				http_response_code(500);
			}
			
			$sql = "SELECT name, subject, grade FROM grades, students Where grades.studentid = students.studentid";
			$result = $db->query($sql);
			
			echo "<tr><th>Name</th><th>Grade</th><th>Subject</th></tr>";
			while ($row = $result->fetch_object()) {
				echo "<tr><td>" . $row->name . "</td><td>" . $row->grade . "</td><td>" . $row->subject . "</td></tr>";
			}
		?>
		</table>
	</body>
</html>