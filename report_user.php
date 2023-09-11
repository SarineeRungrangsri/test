
<?php 

// require_once('db-connect.php');
// printf("<table>
//             <thead>
//                 <tr>
//                     <th>รหัส</th>
//                     <th>หัวข้อ</th>
//                     <th>วัตถุประสงค์</th>
//                     <th>วัน/เวลา</th>
//                     <th>วัน/เวลา</th>
//                     <th>จำนวน</th>
//                     <th>ผู้โดยสาร</th>
//                     <th>สิ่งของ</th>
//                     <th>สถานะ</th>
//                     <th>ผู้จอง</th>
//                     <th>เลขทะเบียน</th>
//                     <th>ประเภทรถ</th>
//                 </tr>
//             </thead>
//             <tbody>
//         ");
// $sql=sprintf("SELECT * FROM `schedule_list` 
//                         -- INNER JOIN car ON car.id_car = schedule_list.id_car
//                         -- INNER JOIN car_type ON car_type.id_cartype = car.id_cartype
//                         -- INNER JOIN personnel ON personnel.name_person = schedule_list.name_person
//                         INNER JOIN status ON status.status_id = schedule_list.status  ORDER BY id ASC");
// $result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก".$conn->error);
// if($result->num_rows<0){
// //     printf("<tr><td>ไม่มีข้อมูล</td></tr>");
// }else{
// while($row=$result->fetch_assoc()){

// echo "  <tr>
//             <td>$row[id]</td>
//             <td>$row[title]</td>
//             <td>$row[description]</td>
//             <td>$row[start_datetime]</td>
//             <td>$row[end_datetime]</td>
//             <td>$row[count]</td>
//             <td>$row[addper]</td>
//             <td>$row[inventory]</td>
//             <td>$row[status]</td>
//             <td>$row[name_person]</td>
//             <td>$row[id_car]</td>
//             <td>$row[id_cartype]</td>
//         </td>";
//     }
// }
// printf("            
//                 </tr>
//             </tbody>
//         </table>");
?>

<?php

// require_once('connect.php');
// require('fpdf184/fpdf.php'); 

// $pdf = new FPDF('P','mm',array(210,297)); 
// $pdf->SetLeftMargin( 20.54 );
// $pdf->SetRightMargin( 20.54 );
// $pdf->SetTopMargin( 20.54 );
// $pdf->SetXY(10,202);
// // Add Thai font 
// $pdf->AddFont('THSarabunNew','','THSarabunNew.php');
// $pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
// $pdf->AddPage();

// $pdf->SetFont('THSarabunNew','B',18);

// $pdf->Cell( 0  , 10 , iconv( 'UTF-8','cp874' , 'ใบอนุญาตใช้รถส่วนกลาง' ) , 0 , 1 , 'C' );


// $width_cell=array(10,30,30,40,30,30,40);
// $pdf->SetFillColor(193,229,252193,229,252); // Background color of header 
// // Header starts /// 
// $pdf->Cell($width_cell[0],10,iconv( 'UTF-8','cp874' ,'รหัส'),1,0,'C',true); 
// $pdf->Cell($width_cell[1],10,iconv( 'UTF-8','cp874' ,'หัวข้อ'),1,0,'C',true); 
// $pdf->Cell($width_cell[2],10,iconv( 'UTF-8','cp874' ,'หัวข้อ'),1,0,'C',true); 
// $pdf->Cell($width_cell[3],10,iconv( 'UTF-8','cp874' ,'หัวข้อ'),1,1,'C',true); 
// $pdf->Cell($width_cell[4],10,iconv( 'UTF-8','cp874' ,'หัวข้อ'),1,0,'C',true); 
// $pdf->Cell($width_cell[5],10,iconv( 'UTF-8','cp874' ,'หัวข้อ'),1,0,'C',true);
// $pdf->Cell($width_cell[6],10,iconv( 'UTF-8','cp874' ,'หัวข้อ'),1,1,'C',true); 
// //// header is over ///////
// $pdf->SetFont('THSarabunNew','',16);

// $sql=sprintf("SELECT * FROM `schedule_list` 
//                          -- INNER JOIN car ON car.id_car = schedule_list.id_car
//                          -- INNER JOIN car_type ON car_type.id_cartype = car.id_cartype
//                          -- INNER JOIN personnel ON personnel.name_person = schedule_list.name_person
//                         --  INNER JOIN status ON status.status_id = schedule_list.status  ORDER BY id ASC
//                         ");
// $result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก".$conn->error);
// if($result->num_rows<0){
// //     printf("<tr><td>ไม่มีข้อมูล</td></tr>");
// }else{
// while($row=$result->fetch_assoc()){ 

// // First row of data 
// $pdf->Cell($width_cell[0],10,$row['id'],1,0,'C',false); // First column of row 1 
// $pdf->Cell($width_cell[1],10,$row['title'],1,0,'C',false); // Second column of row 1 
// $pdf->Cell($width_cell[2],10,'',1,0,'C',false); // Third column of row 1 
// $pdf->Cell($width_cell[3],10,'',1,1,'C',false); // Fourth column of row 1 
// $pdf->Cell($width_cell[4],10,'',1,1,'C',false);
// $pdf->Cell($width_cell[5],10,'',1,1,'C',false);
// $pdf->Cell($width_cell[6],10,'',1,1,'C',false);//  First row of data is over 

// // //  Second row of data 
// // $pdf->Cell($width_cell[0],10,'2',1,0,'C',false); // First column of row 2 
// // $pdf->Cell($width_cell[1],10,'Max Ruin',1,0,'C',false); // Second column of row 2
// // $pdf->Cell($width_cell[2],10,'Three',1,0,'C',false); // Third column of row 2
// // $pdf->Cell($width_cell[3],10,'85',1,1,'C',false); // Fourth column of row 2 
// // //   Sedond row is over 
// // //  Third row of data
// // $pdf->Cell($width_cell[0],10,'3',1,0,'C',false); // First column of row 3
// // $pdf->Cell($width_cell[1],10,'Arnold',1,0,'C',false); // Second column of row 3
// // $pdf->Cell($width_cell[2],10,'Three',1,0,'C',false); // Third column of row 3
// // $pdf->Cell($width_cell[3],10,'55',1,1,'C',false); // fourth column of row 3

// }}

// $pdf->Output();

?>

<?php
//   require('fpdf184/fpdf.php'); 
//   include('db-connect.php');
//   if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
//   }
 
//   $sql = "SELECT * FROM schedule_list";
//   $result = mysqli_query($conn, $sql);
//   $content = "";
//   $tablebody = "";
//   if (mysqli_num_rows($result) > 0) {
//     $i = 1;
//     while($row = mysqli_fetch_assoc($result)) {
//       $tablebody .= '<tr style="border:1px solid #000;">
//         <td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
//         <td style="border-right:1px solid #000;padding:3px;">'.$row['id'].'</td>
//         <td style="border-right:1px solid #000;padding:3px;">'.$row['title'].'</td>
//         <td style="border-right:1px solid #000;padding:3px;">'.$row['status'].'</td>
//         <td style="border-right:1px solid #000;padding:3px;">'.$row['name_person'].'</td>
//       </tr>';
//       $i++;
//     }
//   }
  
// mysqli_close($conn);
  
// $pdf = new FPDF('P','mm',array(210,297)); 

// $tableh = '
// <style>
//   body{
//     font-family: "Garuda"; 
//   }
// </style>
 
// <h2 style="text-align:center">List Member </h2>
 
// <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
//     <tr style="border:1px solid #000;padding:4px;">
//         <td  style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%">ลำดับ</td>
//         <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">username</td>
//         <td  width="15%" style="border-right:1px solid #000;padding:4px;text-align:center;">&nbsp; ชื่อ </td>
//         <td  style="border-right:1px solid #000;padding:4px;text-align:center;"  width="15%">สกุล </td>
//         <td  style="border-right:1px solid #000;padding:4px;text-align:center;" width="15%">อีเมล์</td>
//     </tr>
 
// </thead>
//   <tbody>';
  
// $tableend = "</tbody>
// </table>";
 
// $pdf->Cell($tableh);
 
// $pdf->Cell($tablebody);
 
// $pdf->Cell($tableend);
 
// $pdf->Output();
 
// //https://monkeywebstudio.com/%E0%B8%AA%E0%B8%A3%E0%B9%89%E0%B8%B2%E0%B8%87%E0%B9%84%E0%B8%9F%E0%B8%A5%E0%B9%8C-pdf-%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2-mpdf/
?>




<?php

require('fpdf184/fpdf.php');//fpdf path
include_once('connect.php');// my db connection

$sel =array (1,3);// can use $sel =$_GET['sel']; where $_GET['sel'], sel is a checkbox array value received from prev page..

$id=implode(",",$sel);//seperating ',' from array

$sql=sprintf("select * from `schedule_list` where id IN($id) ");
$result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก".$conn->error);
//Initialize the 3 columns and the total
$c_code = "";
$c_name = "";
$c_price = "";
$total = 0;

//For each row, add the field to the corresponding column
while($row=$result->fetch_assoc())
{ 
   $code =$row['id'];
   $name = substr($row['id'],0,20);
   $real_price = $row['id'];
   $show =$row['id'];

 $c_code = $c_code.$code."\n";
 $c_name = $c_name.$name."\n";
 $c_price = $c_price.$show."\n";

//Sum all the Prices (TOTAL)
    $total = $total+$real_price;
}
$conn->close();

$total = $total;

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY(26);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$c_code,1);
$pdf->SetY(26);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$c_name,1);
$pdf->SetY(26);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$c_price,1,'R');
$pdf->SetX(135);
$pdf->MultiCell(30,6,'$ '.$total,1,'R');

$filename="invoice.pdf";
$pdf->Output($filename,'F');

// echo'<a href="invoice.pdf">Download your Invoice</a>';

?>