<!DOCTYPE HTML>
<html>  
<style>
    body {
      text-align: center;
    }
  </style>
<body>

<h2>ALTA DEPARTAMENTO</h2>

<form name='alta_deptoform' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>
COD_DPTO: <input type="text" name="cod_dpto" size=15><br>
<br>
NOMBRE: <input type="text" name="nombre_dpto" size=15><br>
<br>
<input type="submit" value="Crear Dpto" >
</form>
<?php
/*Inserción en tabla Prepared Statement- mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

try {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES (:cod_dpto,:nombre_dpto)");
    $stmt->bindParam(':cod_dpto', $cod_dpto);
    $stmt->bindParam(':nombre_dpto', $nombre);
  
    // insert a row
    $cod_dpto = $_POST['cod_dpto'];
	$nombre = $_POST['nombre_dpto'];
    $stmt->execute();
    echo "New records created successfully";
    }
  }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>

</body>
</html>
