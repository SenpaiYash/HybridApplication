<?php


//access control headears
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");


//creating constants which are parametric access to the database
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'utmapp');

/*our approach is based on the following:
operation takes values 1,2,...

...
*/

//define variables for the submitted parameters
$operation=null;
$names=null;
$cohort=null;
$email=null;
$password=null;
$username=null;
$news=null;
$details=null;
$date=null;
$event=null;
$detailE=null;
$dates=null;
$uname=null;
$upass=null;

/*extract the values submitted by the web client (HTML page) using $_GET for get method or $_POST in case post method
format is as follows: localhost:<portname>/foldername/index.php?operation=<value>&title=<value>&author=<value>
check if the parameter has been submitted in the query, then extract the corresponding values.
The empty checks can be delayed until the variable is required, but has been done for simplicity here.
*/
if(!empty($_GET['operation'])){
	$operation=$_GET['operation'];
}

if(!empty($_GET['names'])){
	$names=$_GET['names'];
}

if(!empty($_GET['cohort'])){
	$cohort=$_GET['cohort'];
}

if(!empty($_GET['email'])){
	$email=$_GET['email'];
}

if(!empty($_GET['username'])){
	$username=$_GET['username'];
}


if(!empty($_GET['password'])){
	$password=$_GET['password'];
}


if(!empty($_GET['news'])){
	$news=$_GET['news'];
}

if(!empty($_GET['details'])){
	$details=$_GET['details'];
}


if(!empty($_GET['date'])){
	$date=$_GET['date'];
}


if(!empty($_GET['dates'])){
	$dates=$_GET['dates'];
}

if(!empty($_GET['detailE'])){
	$detailE=$_GET['detailE'];
}

if(!empty($_GET['event'])){
	$event=$_GET['event'];
}


if(!empty($_POST['unames'])){
	$uname=$_POST['unames'];
}

if(!empty($_POST['upasswords'])){
	$upass=$_POST['upasswords'];
}

//
//check value of submitted parameter

if($operation == 1){
	if($news !=null && $details!=null && $date != null){
		insertNews($news, $details,$date);
	}
	

}elseif($operation == 2){
	if($names !=null && $cohort!=null && $email != null && $username != null && $password != null){
		insertStudent($names, $cohort,$email,$username,$password);
	}
}elseif($operation == 3){
	if($event !=null && $detailE!=null && $dates != null){
		insertEvent($event, $detailE,$dates);
	}
}else{
	echo("Error");
}
	



// function getAuthor($title_){

// 	//the connection string object
// 	$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );

// 	//variables which take null values
//   	$book_details = null;
// 	$author_ = null;
  
// 	//SQL Query - the dot (.) is used for concatenation
//   	$query = "SELECT * from books where title='".$title_."'";
	
// 	//Executing the query on the connection object, which returns a 		resultset
//   	$result = mysqli_query($conn, $query);


//   	//echo "<br>len $result->num_rows";
//   	if($result){
//     	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
//    		$author_ = $row['author'];
//     	}

// 	}else{
// 		$author_ = "not found";
// 	}
// 	return $author_;
// 	$conn->close();
// }

function insertStudent($names_, $cohort_,$email_,$username_,$password_){
	//the connection string object
	$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );

	//define insert query
	$query = "INSERT INTO student (names, cohort, email, username, password)VALUES ('".$names_."', '".$cohort_."', '".$email_."', '".$username_."', '".$password_."')";

	//execute query on connection object (conn) and echo result
	if (mysqli_query($conn, $query)) {
		echo "New Student created successfully";
	 } else {
		echo "Error: " . $query . "" . mysqli_error($conn);
	 }
	 $conn->close();
}


function insertNews($news_, $details_,$date_){
	//the connection string object
	$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );

	//define insert query
	$query = "INSERT INTO news (news, details, date)VALUES ('".$news_."', '".$details_."', '".$date_."')";

	//execute query on connection object (conn) and echo result
	if (mysqli_query($conn, $query)) {
		echo "New News Item created successfully";
	 } else {
		echo "Error: " . $query . "" . mysqli_error($conn);
	 }
	 $conn->close();
}


function insertEvent($event_, $detailE_,$dates_){
	//the connection string object
	$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );

	//define insert query
	$query = "INSERT INTO event (event, detailE, dates)VALUES ('".$event_."', '".$detailE_."', '".$dates_."')";

	//execute query on connection object (conn) and echo result
	if (mysqli_query($conn, $query)) {
		echo "New Event Item created successfully";
	 } else {
		echo "Error: " . $query . "" . mysqli_error($conn);
	 }
	 $conn->close();
}



// function login($uname_,$upass_){
// 	$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );
// 	$query = "SELECT * FROM student WHERE username='$uname_' AND password='$upass_'";

// 	if (mysqli_query($conn, $query)) {
// 		echo("Success");
// 		header("Location: ./AllFiles/hybridClientApp/index.html")
// 	 } else {
// 		echo "Error: " . $query . "" . mysqli_error($conn);
// 	 }
// 	 $conn->close();


// }


?>
