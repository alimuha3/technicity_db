<?php
/************PHP & HTML stub file by Muhammad Ali for technicity_DB************/

//Connect to database
$servername = "xxxxxx";
$username = "xxxxxx";
$password = "xxxxxx";

//Create connection
$conn = new mysqli($servername, $username, $password);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

//Include any other PHP files/libraries/references
include 'references.php';

//Define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

//Get data form input (applies to both, from interviewee to manager and vice versa)
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
	
    //Check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

//Sanitize data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Insert data into the SQL database
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//View data inserted into the database with filters by the manager
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

//Write queries for data visualization
$query = mysql_query("SELECT IF(x IS NULL, CONCAT(y, '\n(S0,R0)'), xrange) AS final_range FROM (SELECT CONC.....");

//Get variables from GET response
$site=$_GET["x"];
$time=$_GET["y"];

//Collect data in arrays
array('label' => 'Rangecol', 'type' => 'string');

//Send data back to the main function for data visualization
$table['rows'] = $rows;
$jsonTable_1 = json_encode($table);
echo $jsonTable_1;



/************End PHP************/
?>

<script>
//Use AJAX with SVG/API for data visualization (Could be Morris charts, Google Charts, ChartsJS etc.)
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>




<!--HTML Form Stubs-->
<!DOCTYPE HTML>
<html>  
<body>

	<!--Start the form-->
	<form action="process_form.php" method="post">
	
		<!--Make the panel heading using bootstrap references-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Technicity Job Questions </h3>
            </div>
            <div class="panel-body two-col">
			
				<!--For each row, ask the question and provide textbox-->
				<div class="row">
				<label style="padding-left:20px;">
				Please fill out the following interview questions...
				</label>
				</div>
                
				
				<div class="row">
					<div class="col-md-4">
                        <div class="well well-sm">
						<label>Question 1: Sample question 1...</label>
                           <textarea class="form-control" rows="2"></textarea> 
                        </div>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-md-4">
                        <div class="well well-sm">
						<label>Question 2: Sample question 2...</label>
                           <textarea class="form-control" rows="2"></textarea> 
                        </div>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-md-4">
                        <div class="well well-sm">
						<label>Question 3: Sample question 3...</label>
                           <textarea class="form-control" rows="2"></textarea> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<!--Provide the submit button to submit the form-->
		<input type="submit" value="Submit">
	</form>
	
</body>
</html>
<!--End of HTML Form Stubs-->
