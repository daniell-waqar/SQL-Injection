<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=Waqar", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


  if (isset($_GET['search'] )){
  $var = $_GET['search'];
  
  $query_2 = $conn->prepare("select * from THEMEPARK where PARK_CODE = ?"); 
  $query_2->execute([$var]);
  
  
 

?>

<table class="table mt-3">
  <thead>
      <tbody>
    <tr>
      <th >Park Code</th>
      <th > Park Name</th>
      <th > Park City</th>
      <th> Park Country</th>
    </tr>
  </thead>
 
  
<?php

 while($row = $query_2->fetch(PDO::FETCH_OBJ)){
     echo "<tr>
     <td> $row->PARK_CODE </td>
     <td> $row->PARK_NAME </td>
     <td> $row->PARK_CITY </td>
     <td> $row->PARK_COUNTRY</td>
     </tr>";
 }
 
 }
 ?>
 
 </tbody>
 </table>

 <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SEARCH ID</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>SEARCH PARK CODE FROM DATABASE</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                          
                            <tbody>
                            
			
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
