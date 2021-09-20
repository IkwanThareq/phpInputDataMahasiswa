<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "kampus";

    // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";


  $nik = isset($_POST['nik']) ? $_POST['nik'] : "";
  $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
  $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : "";

  // echo $nik.$nama.$jurusan;

  $sql = "insert into mahasiswa(nik, nama, jurusan) values('$nik', '$nama', '$jurusan')";
  $result = $conn->query($sql);
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data mahasiswa</title>
  </head>
  <body>
    <div style="width: 100%; text-align: center;">
      Data mahasiswa
    </div>
    <br />
    <table border="1" width="100%">

    <?php
    // query ke data base

    $sql = "SELECT nik, nama, jurusan FROM mahasiswa";
    $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        // echo "nik: " . $row["nik"]. " - nama: " . $row["nama"]. " - jurusan" . $row["jurusan"]. "<br>";

        echo "<tr>
          <td>". $row["nik"]."</td>
          <td>". $row["nama"]."</td>
          <td>". $row["jurusan"]."</td>
        </tr>";
      }
    }
    $conn->close();
    ?>

    </table>
    <br />
    <!-- di bawah ini itu mendeklarasikan formnya -->
    <form method="POST" action="index.php" style="width: 50%;">
      <div style="width:100%;">
        <span style="width: 20%; display: inline-block;">NIK:</span>
        <span style="width: 79%; display: inline-block;"><input type="text" name="nik" /></span>
      </div>
      <div style="width:100%;">
        <span style="width: 20%; display: inline-block;">Nama:</span>
        <span style="width: 20%; display: inline-block;"><input type="text" name="nama" /></span>
      </div>
      <div style="width:100%;">
        <span style="width: 20%; display: inline-block;">Jurusan:</span>
        <span style="width: 20%; display: inline-block;"><input type="text" name="jurusan" /></span>
      </div>

      <div>
        <span>
          <button type="submit" >
            kirim
          </button>
        </span>
      </div>

    </form>
  </body>
</html>
