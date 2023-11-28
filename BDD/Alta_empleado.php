<!DOCTYPE HTML>
<html>  
<style>
    body {
      text-align: center;
    }
  </style>
<body>
<h2> ALTA EMPLEADOS </h2>

<form name='alta_empleform' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>
DNI <input type='text' name='dni' value='' size=15><br>
<br>
NOMBRE EMPLEADO <input type='text' name='nombre_emple' size=15><br>
<br>
SALARIO <input type='text' name='salario'  size=15><br>
<br>
FECHA NACIMIENTO <input type='DATE' name='fecha_nac' size=15><br>
<br>
CÓDIGO DEPARTAMENTO <input type='text' name='cod_dpto' size=15><br>
<br>
FECHA INICIO <input type='DATE' name='fecha_ini' value='<?php echo date("Y-m-d"); ?>' size=15 readonly><br>
 
<input type="submit" value="Crear empleado">

</form>

<?php
/*Inserción en tabla Prepared Statement- mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt1 = $conn->prepare("INSERT INTO empleado (dni, nombre_emple, salario, fecha_nac) VALUES (:dni,:nombre_emple,:salario,:fecha_nac)");
    $stmt1->bindParam(':dni', $dni);
    $stmt1->bindParam(':nombre_emple', $nombre_emple);
    $stmt1->bindParam(':salario', $salario);
    $stmt1->bindParam(':fecha_nac', $fecha_nac);


    // insert a row
    $dni = $_POST['dni'];
    $nombre_emple = $_POST['nombre_emple'];
    $salario = $_POST['salario'];
    $fecha_nac = $_POST['fecha_nac'];
    $stmt1->execute();
    
    $stmt2 = $conn->prepare("INSERT INTO emple_dpto (dni,cod_dpto,fecha_ini) VALUES (:dni,:cod_dpto,:fecha_ini)");
    $stmt2->bindParam(':dni', $dni);
    $stmt2->bindParam('cod_dpto', $cod_dpto);
    $stmt2->bindParam('fecha_ini',$fecha_ini);
    
    $cod_dpto = $_POST['cod_dpto'];
    $fecha_ini = $_POST['fecha_ini'];
    $stmt2->execute();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>

</body>
</html>
