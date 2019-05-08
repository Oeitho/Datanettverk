<?php
	if (isset($_GET["student_name"])) {
		ini_set('display_errors', 0);
		$db = new mysqli("10.10.12.63", "dats20", "finish shoe took", "student_grades");
		if ($db->connect_errno) {
			die($db->connect_error);
			http_response_code(500);
		}
		
		$sql = "SELECT name, subject, grade FROM grades, students ".
		$sql .= "WHERE name LIKE ? AND grades.studentid = students.studentid";
		
		$param = $_GET["student_name"]."%";
		
		$stmt = $db->prepare($sql);
		$stmt->bind_param("s", $param);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$grades = array();
		while ($row = $result->fetch_object()) {
			$grades[] = $row;
		}
		
		$stmt->close();
		$db->close();
		
		echo json_encode($grades);
	}
?>