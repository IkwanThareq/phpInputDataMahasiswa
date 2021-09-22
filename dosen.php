<?php
// include 'header.php';
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "dosen";
$row_edit = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // input data from form in UI qweqweq
  $nik = isset($_POST['nik']) ? $_POST['nik'] : "";
  $dosen = isset($_POST['dosen']) ? $_POST['dosen'] : "";
  $matakuliah = isset($_POST['matakuliah']) ? $_POST['matakuliah'] : "";

  // create data 
  if(isset($_POST['id']) && empty(($_POST['id']))) {
    $sql = "insert into datadosen(nik, dosen, matakuliah) values('$nik', '$dosen', '$matakuliah')";
    $result = $conn->query($sql);
  }
    // proses query untuk delete data berdasarkan id di database    
  if(isset($_GET['aksi']) && $_GET['aksi'] == "hapus") {
      // var sql => is query delete item in DB
    $sql = "delete from datadosen where id=".$_GET['id'];
    $result = $conn->query($sql);
  }

  if(isset($_GET['aksi']) && $_GET['aksi'] == "edit"){

    $sql = "select * from datadosen where id=".$_GET['id'];
    $result = $conn->query($sql);
    $row_edit = mysqli_fetch_assoc($result);
    // print_r($row_edit); die();
  }

  if(isset($_POST['id']) && !empty(($_POST['id']))){
    $sql = "update datadosen set nik='" . $_POST["nik"] ."', dosen='" . $_POST["dosen"] ."', matakuliah='" . $_POST["matakuliah"] . "' where id=" . $_POST["id"];    
    // $sql_new = "update datadosen set nik='" . $_POST["nik"] ."'";
    $result = $conn->query($sql);
  }

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
            <th scope="col" style="text-align: center;">Action</th>
        </thead>

        <tbody>
        
        <?php
        $sql = "SELECT id, nik, dosen, matakuliah  FROM datadosen";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            // echo "nik: " . $row["nik"]. " - dosen: " . $row["dosen"]. " - matakuliah " . $row["matakuliah"]. "<br>";

            // <a didalam situ ada proses memberi param aksi dan id untuk delete data di DB
                echo"<tr>
                    <td>". $row["nik"]."</td>
                    <td>". $row["dosen"]."</td>
                    <td>". $row["matakuliah"]."</td>
                    <td style=\"text-align: center;\"><a href = 'dosen.php?aksi=hapus&id=". $row["id"] ."&posisi=dekan'>delete</a> | <a href='dosen.php?aksi=edit&id=". $row['id'] ."'>edit</a></td>
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
            <input type="text" name="nik" value= "<?php echo isset($row_edit['nik']) ? $row_edit['nik'] : "";?>" >
        </div>
        
        <div display: table-row;>
            <label style="margin-right: 32px;">Dosen</label>
            <input type="text" name="dosen" value= "<?php echo isset($row_edit['dosen']) ? $row_edit['dosen'] : "";?>" >
        </div>
        
        <div display: table-row;>
            <label>Matakuliah</label>
            <input type="text" name="matakuliah" value= "<?php echo isset($row_edit['matakuliah']) ? $row_edit['matakuliah'] : "";?>" >
            <input type="hidden" name="id" value= "<?php echo isset($row_edit['id']) ? $row_edit['id'] : "";?>" >
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