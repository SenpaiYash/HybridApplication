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
$view=null;




/*extract the values submitted by the web client (HTML page) using $_GET for get method or $_POST in case post method
format is as follows: localhost:<portname>/foldername/index.php?operation=<value>&title=<value>&author=<value>
check if the parameter has been submitted in the query, then extract the corresponding values.
The empty checks can be delayed until the variable is required, but has been done for simplicity here.
*/
if(!empty($_GET['view'])){
	$view=$_GET['view'];
}


//
//check value of submitted parameter

if($view == 1){
	
	viewNews();

}elseif($view== 2){

  viewEvents();

}
else{

}








function viewNews(){
    //the connection string object
    $con = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );
    $table = '<table  class="table table-stripe">
         <thead>
           <tr>
             <th>News name</th>
             <th>News Details</th>
             <th>News date</th>
             
           </tr>
        </thead>';
    $query = "SELECT * FROM news";
    $display = mysqli_query($con, $query);

    if(mysqli_num_rows($display) > 0){
        while($row = mysqli_fetch_array($display)){
            $table.= '<tbody>
                   <tr>
                    
                    <td>'.$row['news'].'</td>
                    <td>'.$row['details'].'</td>
                    <td>'.$row['date'].'</td>
                    
                   </tr>
                 </tbody>';
        }
    }
    $table .= '</table>';
    echo $table;


if (mysqli_query($con, $query)) {
    // echo "table Viewed successfully";
 } else {
    echo "Error: " . $query . "" . mysqli_error($con);
 }
 $con->close();
}



function viewEvents(){
  //the connection string object
  $con = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: '.mysqli_connect_error() );
  $table2 = '<table  class="table table-stripe">
       <thead>
         <tr>
           <th>Event name</th>
           <th>Event Details</th>
           <th>Event date</th>
           
         </tr>
      </thead>';
  $query = "SELECT * FROM event";
  $display = mysqli_query($con, $query);

  if(mysqli_num_rows($display) > 0){
      while($row = mysqli_fetch_array($display)){
          $table2.= '<tbody>
                 <tr>
                  
                  <td>'.$row['event'].'</td>
                  <td>'.$row['detailE'].'</td>
                  <td>'.$row['dates'].'</td>
                  
                 </tr>
               </tbody>';
      }
  }
  $table2 .= '</table>';
  echo $table2;


if (mysqli_query($con, $query)) {
  // echo "table Viewed successfully";
} else {
  echo "Error: " . $query . "" . mysqli_error($con);
}
$con->close();
}








?>
