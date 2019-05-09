<?php
function connect_to_db () {
	$db = new mysqli("dats20-dbproxy", "dats20", "finish shoe took", "student_grades");
	if ($db->connect_errno) {
		http_response_code(500);
	}
	return $db;
}
?>