<!DOCTYPE HTML>
<html>  
<style>
    body {
      text-align: center;
    }
    table, th, td{
      border-collapse: collapse;
      border: 1px solid;
    
    }
  </style>
<body>
<h2> CONSULTA EMPLEADOS </h2>

<form name='alta_empleform' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST'>
<br>
CÓDIGO DEPARTAMENTO <input type='text' name='cod_dpto' size=15><br>
<br>
 
<input type="submit" value="Consulta">

</form>
<?php
/*SELECTs - mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

try {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT nombre_emple, salario, fecha_nac, fecha_ini FROM empleado INNER JOIN emple_dpto ON empleado.dni = emple_dpto.dni WHERE emple_dpto.cod_dpto = :cod_dpto");
    $stmt->bindParam(':cod_dpto', $cod_dpto);
    $cod_dpto = $_POST['cod_dpto'];
    $stmt->execute();
    // set the resulting array to associative
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
	 $resultado=$stmt->fetchAll();
    echo "<h3>Empleados de este departamento</h3>";
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Salario</th><th>Fecha de Nacimiento</th><th>Fecha de Inicio en el Departamento</th></tr>";
	 foreach($resultado as $row) {
        echo "<tr>";
        echo "<td>" . $row["nombre_emple"] . "</td>";
        echo "<td>" . $row["salario"] . "</td>";
        echo "<td>" . $row["fecha_nac"] . "</td>";
        echo "<td>" . $row["fecha_ini"] . "</td>";
        echo "</tr>";
   }
        echo "</table>";
     }
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>



</body>
</html>
