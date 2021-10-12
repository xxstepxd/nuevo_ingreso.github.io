<?php
// require ('../logica/database.php');
?>

<?php
require ('pdf/fpdf.php');
require ('logica/database.php');
$id_alumno = $_GET["id"];
$consulta = "SELECT * FROM alumnos_has_especialidad ae JOIN alumnos a ON ae.alumnos_id = a.id JOIN especialidad e ON ae.especialidad_id = e.id_especialidad WHERE id = '$id_alumno'";
$resultado = $mysqli->query($consulta);
while($row = mysqli_fetch_object($resultado)){

$pdf=new FPDF();
$pdf->Addpage('portrait', 'letter');
$pdf->SetFont('arial','B','12');
$pdf->cell(0, 10, "____________________________________________________________________________________", 0, 0, "C", 0);
$pdf->Ln();
$pdf->cell(0, 6, utf8_decode('Registro de alumno'), 0, 0, 'L', 0);
$pdf->cell(0, 6, utf8_decode('Nuevo ingreso'), 0, 0, 'R', 0);
$pdf->Ln();
$pdf->cell(0, 10, "____________________________________________________________________________________", 0, 0, "C", 0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(45, 6, utf8_decode('Boleta del estudiante:'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(84, 12, utf8_decode('Número de identificación del estudiante:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(45, 12, utf8_decode($row->id), 0, 0, 'L', 0);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(22, 12, utf8_decode('Apellidos:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->apellidos), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(22, 12, utf8_decode('Nombres:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->nombres), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(22, 12, utf8_decode('Edad:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->edad), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(40, 12, utf8_decode('Correo electronico:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(80, 12, utf8_decode($row->correo_electronico), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(42, 12, utf8_decode('Número de teléfono:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->telefono), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(28, 12, utf8_decode('Procedencia:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(105, 12, utf8_decode($row->institucion_cursado), 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(40, 12, utf8_decode('Cuota que pagaba:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->cuota_mensual), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(52, 4, utf8_decode('Dirección del estudiante:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '10');
$pdf->Multicell(145, 4, utf8_decode($row->direccion), 0, 0, "");

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(32, 12, utf8_decode('Número de dui:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(60, 12, utf8_decode($row->dui), 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(45, 12, utf8_decode('Especialidad elegida:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->nombre), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->cell(0, 10, "____________________________________________________________________________________", 0, 0, "C", 0);

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(45, 6, utf8_decode('Información del encargado:'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(22, 12, utf8_decode('Apellidos:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->apellidos_encargado), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(22, 12, utf8_decode('Nombres:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->nombres_encargado), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(22, 12, utf8_decode('Edad:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->edad_encargado), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(40, 12, utf8_decode('Correo electronico:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(80, 12, utf8_decode($row->correo_electronico_encargado), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(42, 12, utf8_decode('Número de teléfono:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->telefono_encargado), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(32, 12, utf8_decode('Número de dui:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->dui_encargado), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(32, 12, utf8_decode('Número de nit:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->nit_encargado), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(52, 4, utf8_decode('Dirección del encargado:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '10');
$pdf->Multicell(145, 4, utf8_decode($row->direccion_encargado), 0, 0, "");

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(27, 12, utf8_decode('Estado civil:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(30, 12, utf8_decode($row->estado_civil_encargado), 0, 0, 'L', 0);

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(54, 12, utf8_decode('Ocupación del encargado:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(48, 12, utf8_decode($row->ocupacion), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(46, 12, utf8_decode('Nombre de su trabajo:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(50, 12, utf8_decode($row->nombre_trabajo), 0, 0, 'L', 0);
$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(64, 12, utf8_decode('Número de teléfono del trabajo:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(30, 12, utf8_decode($row->telefono_trabajo), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(68, 12, utf8_decode('Correo electronico de su trabajo:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '12');
$pdf->cell(30, 12, utf8_decode($row->correo_electronico_trabajo), 0, 0, 'L', 0);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->cell(52, 4, utf8_decode('Dirección de su trabajo:'), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', '10');
$pdf->Multicell(145, 4, utf8_decode($row->direccion_trabajo), 0, 0, "");

$pdf->Ln();


// Datos del estudiante:



// Lina final

// Insertar Dirección de su trabajo
}

// Fin
$pdf->Output('Boleta_estudiante.pdf', 'i');

?>