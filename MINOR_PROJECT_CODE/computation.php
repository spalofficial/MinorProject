<?php
require 'udb.php';
require 'mdb.php';
require 'sdb.php';
require 'tdb.php';
require 'adb.php';
require 'ddb.php';

$userlevel=$_SESSION['levels'];
if(isset($_GET['marks'])){
	$s="select * from marks where acess<='$userlevel'";
	$q=$con1->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>MARKS_ID</th>	
				<th>STUDENT_ID</th>	
				<th>TENTH</th>
				<th>TWELFTH</th>
				<th>UG</th>
				<th>COMMENTS</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
			$a=$row["marks_id"];
		echo "<tr><td>".$row["marks_id"]."</td><td>".$row["student_id"]."</td><td>".$row["tenth"].
		"</td><td>".$row["twelfth"]."</td><td>".$row["ug"]."</td><td>".$row["comments"].'</td>
		<td><a href="marksedit.php?marks_id='.$a.'">EDIT</a></td>
		<td><a href="marksdelete.php?marks_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
	echo'<a href="marksinsert.php">INSERT</a>';
}
else if(isset($_GET['student'])){ 
	$s="select * from student where acess<='$userlevel'";
	$q=$con2->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>REGN_ID</th>	
				<th>NAME</th>	
				<th>ADDRESS</th>
				<th>YEAR_OF_PASSING</th>
				<th>PH_NUMBER</th>
				<th>STATUS</th>
				<th>CGPA</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
		$a=$row["regn_id"];
		echo "<tr><td>".$row["regn_id"]."</td><td>".$row["name"]."</td><td>".$row["address"].
		"</td><td>".$row["year_of_passing"]."</td><td>".$row["ph_number"]."</td><td>".$row["status"]."</td><td>".$row["cgpa"].'</td>
		<td><a href="studentedit.php?regn_id='.$a.'">EDIT</a></td>
		<td><a href="studentdelete.php?regn_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
		echo'<br><center><a href="studentinsert.php">INSERT</a>';
}
elseif(isset($_GET['teacher'])){ 
	$s="select * from teacher where acess<='$userlevel'";
	$q=$con3->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>TEACHER_ID</th>	
				<th>NAME</th>	
				<th>ADDRESS</th>
				<th>PHONE_NUMBER</th>
				<th>EMAIL_ID</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
		$a=$row["teacher_id"];
		echo "<tr><td>".$row["teacher_id"]."</td><td>".$row["name"]."</td><td>".$row["address"].
		"</td><td>".$row["ph_number"]."</td><td>".$row["email_id"].'</td>
		<td><a href="teacheredit.php?teacher_id='.$a.'">EDIT</a></td>
		<td><a href="teacherdelete.php?teacher_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
		echo'<br><center><a href="teacherinsert.php">INSERT</a>';
}
else if(isset($_GET['users'])){ 
	$val=$_SESSION['oldlevel'];
	$s="select * from users where levels<'$val'";
	$q=$con->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>NAME</th>	
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
		$a=$row["name"];
		echo "<tr><td>".$row["name"].'</td>
		<td><a href="dla.php?name='.$a.'">DYNAMIC_LEVEL_ALLOCATION</a></td>
		</tr>';
		}
		echo "</table>";
	}
}


else if(isset($_GET['administraion'])){
	$s="select * from admins where acess<='$userlevel'";
	$q=$con5->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>ADMIN_ID</th>	
				<th>ADMIN_NAME</th>	
				<th>CONTACT_NO</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
			$a=$row["a_id"];
		echo "<tr><td>".$row["a_id"]."</td><td>".$row["a_name"]."</td><td>".$row["contact_no"].'</td>
		<td><a href="adminedit.php?a_id='.$a.'">EDIT</a></td>
		<td><a href="admindelete.php?a_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
	echo'<a href="admininsert.php">INSERT</a>';
}
else if(isset($_GET['examination'])){
	$s="select * from exam where acess<='$userlevel'";
	$q=$con4->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>E_ID</th>	
				<th>C_ID</th>	
				<th>PASS_MARKS</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
			$a=$row["e_id"];
		echo "<tr><td>".$row["e_id"]."</td><td>".$row["c_id"]."</td><td>".$row["pass_marks"].'</td>
		<td><a href="examedit.php?e_id='.$a.'">EDIT</a></td>
		<td><a href="examdelete.php?e_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
	echo'<a href="examinsert.php">INSERT</a>';
}
else if(isset($_GET['sections'])){
	$s="select * from sections where acess<='$userlevel'";
	$q=$con4->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>SECTION_ID</th>	
				<th>CLASSROOM</th>	
				<th>TIMING</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
			$a=$row["s_id"];
		echo "<tr><td>".$row["s_id"]."</td><td>".$row["classroom"]."</td><td>".$row["timing"].'</td>
		<td><a href="sectionsedit.php?se_id='.$a.'">EDIT</a></td>
		<td><a href="sectionsdelete.php?se_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
	echo'<a href="sectionsinsert.php">INSERT</a>';
}
else if(isset($_GET['course'])){
	$s="select * from course where acess<='$userlevel'";
	$q=$con4->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>COURSE_ID</th>	
				<th>COURSE_NAME</th>	
				<th>QUALIFICATION</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
			$a=$row["c_id"];
		echo "<tr><td>".$row["c_id"]."</td><td>".$row["c_name"]."</td><td>".$row["qualification"].'</td>
		<td><a href="courseedit.php?c_id='.$a.'">EDIT</a></td>
		<td><a href="coursedelete.php?c_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
	echo'<a href="courseinsert.php">INSERT</a>';
}
else if(isset($_GET['department'])){
	$s="select * from department where acess<='$userlevel'";
	$q=$con4->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>DEPARTMENT_ID</th>	
				<th>DEPARTMENT_NAME</th>	
				<th>PHONE_NUMBER</th>
				<th>HEAD_OF_DEPARTMENT</th>
				<th>LINK</th>
				<th>LINK</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
			$a=$row["d_id"];
		echo "<tr><td>".$row["d_id"]."</td><td>".$row["d_name"]."</td><td>".$row["ph_number"]."</td><td>".$row["hod"].'</td>
		<td><a href="departmentedit.php?d_id='.$a.'">EDIT</a></td>
		<td><a href="departmentdelete.php?d_id='.$a.'">DELETE</a></td>
		</tr>';
		}
		echo "</table>";
	}
	echo'<a href="departmentinsert.php">INSERT</a>';
}
else if(isset($_GET['profile'])){
	$p=$_SESSION['user_id'];
	$s="select * from users where user_id='$p'";
	$q=$con->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		$row= $q->fetch_assoc();
		$u=$row["user_id"];
		$l=$row["levels"];
		$r=$row["rating"];
		$n=$row["name"];
		$p=$row["phone"];
		$e=$row["email"];
		$a=$row["address"];
		$ln=$_SESSION['levels'];
		
		echo "<h2>WELCOME, $n</h2><br>";
		echo "<h3>ID                : $u</h3>";
		echo "<h3>ORIGINAL LEVEL    : $l</h3>";
		echo "<h3>CURRENT LEVEL     : $ln</h3>";
		echo "<h3>RATING            : $r</h3>";
		echo "<h3>PHONE             : $p</h3>";
		echo "<h3>EMAIL             : $e</h3>";
		echo "<h3>ADDRESS           : $a</h3>";
		
	}
}
else{ 
	$val=$_SESSION['user_id'];
	$s="select * from levels where source_id='$val'";
	$q=$con->query($s);
	if($q->num_rows==0){
		$_SESSION['message']="Error:No records to display";
		header("location: error.php");
	}
	else
	{
		echo "
		<br><center><table border='1'>
			<tr>
				<th>USER_ID</th>	
				<th>LEVEL_ADDED</th>	
				<th>DATES</th>
				<th>STARTTIME</th>
				<th>ENDTIME</th>
				<th>SOURCE_ID</th>
				<th>USER_ENTRY</th>
				<th>DEL</th>
				<th>EDITS</th>
				<th>LINKS</th>
			</tr>
		";
		while($row= $q->fetch_assoc()){
		$a=$row["user_id"];
		$b=$row["source_id"];
		$c=$row["dates"];
		$d=$row["starttime"];
		$e=$row["endtime"];
		echo "<tr><td>".$row["user_id"]."</td><td>".$row["level_added"].
		"</td><td>".$row["dates"]."</td><td>".$row["starttime"]."</td><td>".$row["endtime"]."</td><td>".$row["source_id"].
		"</td><td>".$row["user_entry"]."</td><td>".$row["del"]."</td><td>".$row["edits"].
		'</td><td><a href="checkdetails.php?user_id='.$a.'&source_id='.$b.'&dates='.$c.'&starttime='.$d.'&endtime='.$e.'">CHECK_DETAILS</a></td>
		</tr>';
		}
		echo "</table>";
	}
}