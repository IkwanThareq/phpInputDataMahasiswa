
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "container";
  $row_edit = array();

    // Create connection        
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $code_barang = isset($_POST['code_barang']) ? $_POST['code_barang'] : "";
  $nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : "";
  $produsen = isset($_POST['produsen']) ? $_POST['produsen'] : "";
//   print_r($codeBarang); die();

  if(isset($_POST['id']) && empty(($_POST['id']))) {
    $sql = "insert into produk (code_barang, nama_barang, produsen) values ('$code_barang','$nama_barang','$produsen')";
    $result = $conn->query($sql);
  }

  if (isset($_GET['aksi']) && $_GET['aksi'] == "hapus") {
  $sql = "delete from produk where id=".$_GET['id'];
  $result = $conn->query($sql);
  }

  if (isset($_GET['aksi']) && $_GET['aksi'] == "edit") {

    $sql = "select * from produk where id=".$_GET['id'];
    $result = $conn->query($sql);
    $row_edit = mysqli_fetch_assoc($result);

    }
  if (isset($_POST['id']) && !empty(($_POST['id']))){
        $sql = "update produk set 
        code_barang='" . $_POST["code_barang"] .
         "', nama_barang='" . $_POST["nama_barang"] .
          "', produsen='" . $_POST["produsen"] . 
          "' where id=" . $_POST["id"];
        $result = $conn->query($sql);
    }
    



  ?>

<html lang="en">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br>
    <h1 style="text-align: center;">
        Welcome please insert product</h1>

     

    <table style="width: 100%;">
    <thead>
        <tr>
            <th>Code Barang</th>
            <th>Nama Barang</th>
            <th>Produsen</th>
            <th>opsi</th>
        </tr>
    </thead>
        <tbody>
            
        <?php
        $sql = "SELECT id, code_barang, nama_barang, produsen FROM produk";
        $result = $conn->query($sql);
        //   print_r($result); die();


        if ($result->num_rows > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            // echo "nik: " . $row["nik"]. " - dosen: " . $row["dosen"]. " - matakuliah " . $row["matakuliah"]. "<br>";

            // <a didalam situ ada proses memberi param aksi dan id untuk delete data di DB
                echo"<tr>
                    <td>". $row["code_barang"]. "</td>
                    <td>". $row["nama_barang"]. "</td>
                    <td>". $row["produsen"]. "</td>
                    <td style=\"text-align: center;\"><a href = 'InputBarangToko.php?aksi=hapus&id=". $row["id"] ."'>delete</a> | <a href='InputBarangToko.php?aksi=edit&id=". $row['id'] ."'>edit</a></td>
                </tr>";  
            }

        } 
        $conn->close();
        ?> 

        </tbody>
        
        
    </table>
    <br>  
        <form action="InputBarangToko.php" method="POST">
            <div display: table-row;>
                <label style="margin-right: 10px;">Code Barang</label>
                <input type="text" name="code_barang" value= "<?php echo isset($row_edit['code_barang']) ? $row_edit['code_barang'] : "";?>">
            </div>
            <div display: table-row;>
                <label style="margin-right: 6px;">Nama Barang</label>
                <input type="text" name="nama_barang" value= "<?php echo isset($row_edit['nama_barang']) ? $row_edit['nama_barang'] : "";?>">
            </div>
            <div>
                <label style="margin-right: 33px;">Produsen</label>
                <input type="text" name="produsen" value= "<?php echo isset($row_edit['produsen']) ? $row_edit['produsen'] : "";?>">
                <input type="hidden" name="id" value= "<?php echo isset($row_edit['id']) ? $row_edit['id'] : "";?>" >

            </div>

            <br>
            <div>
                <input type="submit">
            </div>
        </form>
    </br>
        
</body>
</html>