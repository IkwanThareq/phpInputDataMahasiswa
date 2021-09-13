<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "dosen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $nik = isset($_POST['nik']) ? $_POST['nik'] : "";
  $dosen = isset($_POST['dosen']) ? $_POST['dosen'] : "";
  $matakuliah = isset($_POST['matakuliah']) ? $_POST['matakuliah'] : "";

  $sql = "insert into datadosen(nik, dosen, matakuliah) values('$nik', '$dosen', '$matakuliah')";
  $result = $conn->query($sql);

?> 


<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Dosen input pelajaran</title>
</head>
<body>
    <div style="text-align: center;">
        <h2>
            Welcome Silahkan isi data dosen
        </h2>
    </div>
   
    <table border="1" align="center" width="70%">

         <thead >
            <th scope="col">Nik</th>
            <th scope="col">Dosen</th>
            <th scope="col">Matakuliah</th>
        </thead>

        <tbody>
        
        <?php
        $sql = "SELECT nik, dosen, matakuliah  FROM datadosen";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            // echo "nik: " . $row["nik"]. " - dosen: " . $row["dosen"]. " - matakuliah " . $row["matakuliah"]. "<br>";
                echo"<tr>
                    <td>". $row["nik"]."</td>
                    <td>". $row["dosen"]."</td>
                    <td>". $row["matakuliah"]."</td>
                </tr>";  
            }

        } 
        $conn->close();
        ?> 
       
        
        </tbody>
    </table>

    <br>

    <form action="dosen.php" method="POST">
        <div display: table-row;>
            <label style="margin-right: 45px;">NIK</label>
            <input type="text" name="nik">
        </div>
        
        <div display: table-row;>
            <label style="margin-right: 32px;">Dosen</label>
            <input type="text" name="dosen">
        </div>
        
        <div display: table-row;>
            <label>Matakuliah</label>
            <input type="text" name="matakuliah">
        </div>
       
        <br>

        <div display: table-row;>
            <span>
                <input type="submit">
            </span>
        </div>


        <!-- <p>Select a maintenance drone:</p>

        <div>
        <input type="radio" id="huey" name="drone" value="huey"
                checked>
        <label for="huey">Huey</label>
        </div>

        <div>
        <input type="radio" id="dewey" name="drone" value="dewey">
        <label for="dewey">Dewey</label>
        </div>

        <div>
        <input type="radio" id="louie" name="drone" value="louie">
        <label for="louie">Louie</label>
        </div> -->

    </form>
</body>
</html>