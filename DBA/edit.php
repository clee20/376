<?php

extract($_REQUEST);
if (!isset($submit)) {

?>
<!DOCTYPE html>
<html>
    <head>
        <title>DBA Project</title>
        
        <script>
            document.write('<link rel="stylesheet" type="text/css" href=styles.css?v="' + Math.floor(Math.random() * 1000) + '" />');
            
            function check() {
                if (confirm("Are you sure you want to cancel? (All inputed data will not be saved)")) {
                    location.href = 'index.php';
                }
            }
        </script>

    </head>

    <body>
        <table border="1">
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBA";

// Connect to the database and make sure it was successful
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the query string (we use HEREDOC syntax to avoid messing around with double quotes and string concatentation)
$sql = <<<SQL
SELECT COM_ID,
       COM_NAME,
       COM_ADDRESS_LINE1,
       COM_ADDRESS_LINE2,
       COM_CITY,
       COM_STATE,
       COM_ZIP_CODE,
       COM_PHONE_NUMBER
  FROM COMPANY
  WHERE COM_ID = $id;
SQL;

// Execute the query and display the results
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Iterate over each row in the results
    while ($row = $result->fetch_assoc()) {
        
?>
        <h1>Edit Company</h1>

        <p>Add the details to register a company in the database.</p>

        <form action="edit.php" method="post">
            <div class="label">ID:</div><input type="hidden" name="id" value="<?php echo $id ?>"/>
            <br />
            <div class="label">Name:</div><input type="text" name="name" value="<?php echo $row['COM_NAME']; ?>"/>
            <br />
            <div class="label">Address Line 1:</div><input type="text" name="addressLine1" value="<?php echo $row['COM_ADDRESS_LINE1']; ?>"/>
            <br />
            <div class="label">Address Line 2:</div><input type="text" name="addressLine2" value="<?php echo $row['COM_ADDRESS_LINE2']; ?>"/>
            <br />
            <div class="label">City:</div><input type="text" name="city" value="<?php echo $row['COM_CITY']; ?>"/>
            <br />
            <div class="label">State:</div><input type="text" name="state" value="<?php echo $row['COM_STATE']; ?>"/>
            <br />
            <div class="label">ZIP Code:</div><input type="text" name="zipCode" value="<?php echo $row['COM_ZIP_CODE']; ?>"/>
            <br />
            <div class="label">Phone Number:</div><input type="text" name="phoneNumber" value="<?php echo $row['COM_PHONE_NUMBER']; ?>"/>
            <br />
            <button type="submit" name="submit">Save</button>
        </form>
        <button onclick="check()">Cancel</button>
        
<?php
    }
  }
?>     
     
    </body>
</html>

<?php

}
else
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = <<<SQL
UPDATE COMPANY
    SET COM_NAME = '$name',
        COM_ADDRESS_LINE1 = '$addressLine1',
        COM_ADDRESS_LINE2 = '$addressLine2',
        COM_CITY = '$city',
        COM_STATE = '$state',
        COM_ZIP_CODE = '$zipCode',
        COM_PHONE_NUMBER = '$phoneNumber'
    WHERE COM_ID = $id
SQL;

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}

?>

