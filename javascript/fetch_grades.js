function fetch_grades() {
	const name = document.getElementById("student-name").value;
	const xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			const grades = JSON.parse(this.responseText);
			if (grades.length === 0) {
				document.getElementById("student_grades").innerHTML = "No student with name " + name;
				return;
			}
			let tabulated_grades = "<tr><th>Name</th><th>Grade</th><th>Subject</th></tr>";
			for (let i = 0; i < grades.length; i++) {
				 tabulated_grades += "<tr><td>" + grades[i].name + "</td><td>" + grades[i].grade + "</td><td>" + grades[i].subject + "</td></tr>"
			}
			document.getElementById("student_grades").innerHTML = this.responseText;
		}
		else if (this.readyState === 4){
			document.getElementById("student_grades").innerHTML = "Couldn't connect to server";
		}
	};
	xhttp.open("GET", "api/student_grades.php?student_name=" + name, true);
	xhttp.send();
}