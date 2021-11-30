<?php
$Id=(isset($_POST['Id']))?$_POST['Id']:"";
$Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
$Correo=(isset($_POST['Correo']))?$_POST['Correo']:"";
$Fecha_Ingreso=(isset($_POST['Fecha_Ingreso']))?$_POST['Fecha_Ingreso']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar=$accionCancelar="";
$accionModificar=$accionEliminar=$accionLimpiar="disabled";
$mostrarModal=false;

include ("../conexion/conexion.php");
include('../fpdf/fpdf.php');

switch($accion){
    case "btn_agregar":

        $sentencia=$conn->prepare("INSERT INTO empleados (Id,Nombre,Correo,Fecha_Ingreso)
        VALUES (:Id, :Nombre, :Correo, :Fecha_Ingreso)");

        $sentencia->bindParam(':Id',$Id);
        $sentencia->bindParam(':Nombre',$Nombre);
        $sentencia->bindParam(':Correo',$Correo);
        $sentencia->bindParam(':Fecha_Ingreso',$Fecha_Ingreso);
        $sentencia->execute();

       // echo $Id;
        //echo "Agregar";
        
    break;
    case "btn_editar":
    
        $sentencia=$conn->prepare("UPDATE empleados SET 
        Nombre=:Nombre,
        Correo=:Correo,
        Fecha_Ingreso=:Fecha_Ingreso WHERE 
        Id=:Id");

       
        $sentencia->bindParam(':Nombre',$Nombre);
        $sentencia->bindParam(':Correo',$Correo);
        $sentencia->bindParam(':Fecha_Ingreso',$Fecha_Ingreso);
        $sentencia->bindParam(':Id',$Id);
        $sentencia->execute();
        

        echo $Id;
        echo "Editar";
    break;
    case "btn_eliminar":
        $sentencia=$conn->prepare("DELETE FROM empleados WHERE Id=:Id"); 
        
        $sentencia->bindParam(':Id',$Id);
        $sentencia->execute();
        header('Location: index.php');

    break;
    case "btn_cancel":
        header('Location: index.php');
    break;
    case "btn_clean":
        $Id="";
        $Nombre="";
        $Correo="";
        $Fecha_Ingreso="";
    break;
   case "Seleccionar":
        $accionAgregar=$accionEliminar="disabled";
        $accionModificar=$accionCancelar=$accionLimpiar="";
        $mostrarModal=true;

        
    break;
    case "btn_pdf":
        // extend class
       class KodePDF extends FPDF {
           protected $fontName = 'Arial';
       
           function renderTitle($text) {
               $this->SetTextColor(0, 0, 0);
               $this->SetFont($this->fontName, 'B', 24);
               $this->Cell(0, 10, utf8_decode($text), 0, 1);
               $this->Ln();
           }
       
           function renderSubTitle($text) {
               $this->SetTextColor(0, 0, 0);
               $this->SetFont($this->fontName, 'B', 16);
               $this->Cell(0, 10, utf8_decode($text), 0, 1);
               $this->Ln();
           }
       
           function renderText($text) {
               $this->SetTextColor(51, 51, 51);
               $this->SetFont($this->fontName, '', 12);
               $this->MultiCell(0, 7, utf8_decode($text), 0, 1);
               $this->Ln();
           }
       }
       
       // create document
       $pdf = new KodePDF();
       $pdf->AddPage();
       
       // config document
       $pdf->SetTitle( 'Carta De Recomendacion' .  $Nombre);
       $pdf->SetAuthor('KarenSolis,AbrilTun, CarlosGomez');
       $pdf->SetCreator('FPDF Maker');
       
       // add content
       
       $pdf->renderText('Mérida, Yucatán a ' . date("d") .' de ' . date("M") .'. de ' .date("o"));
       $pdf->renderSubTitle('A quien corresponda: ');
       $pdf->renderText('Por medio de la presente y para los fines que pretenda el interesado, hago de su conocimiento que recomiendo ampliamente al
       C.' .  $Nombre . ', ya que es una persona Honesta y Respetable en las actividades que durante el periodo que prestó servicios en nuestra empresa
       le fueron asignadas por tal motivo no tengo ninguna duda en expedir esta recomendacion.');
       $pdf->renderText('Se extiende la presente solicitud del interesado y para los fines que juzgue convenientes.');
       
       $pdf->renderText('Firma');
       $pdf->renderText('____________________');
       $pdf->renderText('Empresa');
       
       // output file
       $pdf->Output('', 'Carta De Recomendacion' .  $Nombre .  '.pdf');
       break;
}

//print_r($empleadoslist);

?>
