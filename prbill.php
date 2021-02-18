<?php
  require 'dbconfig/config.php';
?>
<?php
 
function fetch_data()
{
    $output='';  
    $sum ='';
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'userlogin';

    // 2. Create a database connection
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass);
    if (!$connection) {
        die("Database connection failed: " . mysql_error());
    }

    // 3. Select a database to use 
    $db_select = mysqli_select_db($connection,$dbname);
    if (!$db_select) {
        die("Database selection failed:".mysqli_error());
    }
  $query=" ";
    $query=mysqli_query($connection,"SELECT * FROM product");
     
    while ($row = mysqli_fetch_array($query))
	{
      $sql = mysqli_query($connection,"SELECT SUM(prod_price) as total FROM product");
      $rows = mysqli_fetch_array($sql);
	  
      $sum = $rows['total'];
	  
     // $total_price += $row['prod_price'];

      $output.='<tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["prod_name"].'</td>
            <td>'.$row["prod_price"].'</td>
            <td>'.$row["prod_company"].'</td>
            <td>'.$row["prod_model"].'</td>
            <td>'.$row["prod_date"].'</td>
            <td>'.$sum.'</td>
              
            </tr> ';
       
     }
  return $output;     
}

if(isset($_POST["generate_pdf"]))
{  
  require_once('TCPDF-master/tcpdf.php'); 
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Product Bill Total </h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">Id</th>  
                <th width="15%">Prod_Name</th> 
                <th width="15%">Prod_Price</th>       
                <th width="15%">Prod_Company</th>  
                <th width="20%">Prod_Model</th>
                <th width="20%">Prod_Date</th>
                <th width="15%">Total Price</th>
           </tr> 
            
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  

    }?>
   <!--require("pdf/fpdf.php");  kode tak be tho adhicha ata bagu de??
                                                  
  $pdf->AddPage();
  $pdf->SetFont("Arial","B",16);
  $pdf->Cell(0,10,"E-Waste Data{$f_name}",1,1,C);
  $pdf->Cell(10,5,"id",1,0);
  $pdf->Cell(50,10,$id,1,1);

  $pdf->Cell(50,10,"prod_name",1,0);
  $pdf->Cell(50,10,$prod_name,1,1);  
  
  $pdf->Cell(50,10,"prod_price",1,0);
  $pdf->Cell(50,10,$prod_price,1,1);
  
  $pdf->Cell(50,10,"prod_company",1,0);
  $pdf->Cell(50,10,$prod_company,1,1);
  
  $pdf->Cell(50,10,"prod_model",1,0);
  $pdf->Cell(50,10,$prod_model,1,1);
  $pdf->output();     
 
  }  
 ?>
