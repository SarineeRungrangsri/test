<?php
include ("connect.php");
$sql=sprintf("SELECT * FROM `schedule_list` 
                INNER JOIN personnel ON personnel.person_id = schedule_list.person_id
                INNER JOIN position ON position.posi_id = personnel.posi_id
                -- INNER JOIN department ON personnel.depart_id = department.depart_id
                INNER JOIN car ON car.car_id = schedule_list.car_id
                INNER JOIN car_type ON car_type.cartype_id = car.cartype_id
                WHERE id=\"%s\" LIMIT 1", 
$_GET["id"]);
$result=$conn->query($sql) or die("เกิดข้อผิดพลาด เนื่องจาก ". $conn->error);
$row=$result->fetch_assoc();
// echo $row["id"];
// echo $row["person_name"];
// echo $row["posi_name"];
// echo $row["description"];
// echo $row["title"];
// echo $row["car_typename"];
// echo $row["car_name"];
// echo $row["id"];
?>

<?php
function changeDate($date){
//ใช้ Function explode ในการแยกไฟล์ ออกเป็น  Array
$get_date = explode("-",$date);
//กำหนดชื่อเดือนใส่ตัวแปร $month
	$month = array("01"=>"ม.ค.","02"=>"ก.พ","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
//month
$get_month = $get_date["1"];

//year	
$year = $get_date["0"]+543;

return $get_date["2"]." ".$month[$get_month]." ".$year;

}
//การเรียกใช้งาน Function
// echo changeDate("2015-05-05");

$start=$row["start_datetime"];
$end=$row["end_datetime"];
$date_start=substr($start,0,10);
$time_start=substr($start,11,8);
$date_end=substr($end,0,10);
$time_end=substr($end,11,8);
// print changeDate($date_start);
// print $time_start;
// print changeDate($date_end);
// print $time_end;
?>

<?php
 // data_default_timezone_set('asia/bangkok');
$var_date =date('Y-m-d h:i:s');
// $var_date = "2012-01-01 00:00:00"; // Query ออกมาได้เลยครับ

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
 "0"=>"",
 "1"=>"มกราคม",
 "2"=>"กุมภาพันธ์",
 "3"=>"มีนาคม",
 "4"=>"เมษายน",
 "5"=>"พฤษภาคม",
 "6"=>"มิถุนายน", 
 "7"=>"กรกฎาคม",
 "8"=>"สิงหาคม",
 "9"=>"กันยายน",
 "10"=>"ตุลาคม",
 "11"=>"พฤศจิกายน",
 "12"=>"ธันวาคม"     
);
function thai_date($time){
 global $thai_day_arr,$thai_month_arr;
 $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
 $thai_date_return.= "ที่ ".date("j",$time);
 $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
 $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
 //$thai_date_return.= "  ".date("H:i",$time)." น.";
 return $thai_date_return;
}

$var_date=strtotime("$var_date"); 
$var_date= thai_date($var_date);

require('fpdf184/fpdf.php'); 

$pdf = new FPDF('P','mm',array(210,297)); 
$pdf->SetLeftMargin( 20.54 );
$pdf->SetRightMargin( 20.54 );
$pdf->SetTopMargin( 20.54 );
$pdf->SetXY(10,202);
// Add Thai font 
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
$pdf->AddPage();

$pdf->SetFont('THSarabunNew','B',18);
$pdf->Cell( 0  , 10 , iconv( 'UTF-8','cp874' , 'ใบอนุญาตใช้รถส่วนกลาง' ) , 0 , 1 , 'C' );
$pdf->SetFont('THSarabunNew','',16);
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , 'วิทยาลัยพยาบาลบรมราชชนนี สุราษฎร์ธานี' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , ' วันที่ ........ เดือน ................... พ.ศ. .............' ),0,1,'R');
$pdf->Cell( 0  , -9 , iconv( 'UTF-8','cp874' , ''. date('d').'           '. $thai_month_arr[date('n')].'            '.(  date('Y')+543 ).'  ' ),0,1,'R');
$pdf->Cell( 0  , 24 , iconv( 'UTF-8','cp874' , 'เรื่อง ขออนญาตใช้รถส่วนกลาง' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -9 , iconv( 'UTF-8','cp874' , 'เรียน ผู้อำนวยการวิทยาลัยพยาบาลบรมราชชนนี สุราษฎร์ธานี' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 24 , iconv( 'UTF-8','cp874' , '        ข้าพเจ้า ...................................................................... ตำแหน่ง .......................................................................') , 0 , 1 , 'L' );
$pdf->Cell( 0  , -26 , iconv('UTF-8','cp874' , '                     '.$row["person_name"]. '                                                     ' .$row["posi_name"] ) , 0 , 1 , 'L' );
// $pdf->Cell( 0  , 26 , iconv('UTF-8','cp874' , '                     '.$schedule_list->name_person . '                                       ' .$schedule_list->name_posi ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 41 , iconv( 'UTF-8','cp874' , 'มีความประสงค์ขออนุญาตใช้รถ ...................................................................................................................................' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -43 , iconv('UTF-8','cp874' , '                                          '.$row["description"]) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 58 , iconv( 'UTF-8','cp874' , '.......................................................................................................................................................................................') , 0 , 1 , 'L' );
$pdf->Cell( 0  , -43 , iconv( 'UTF-8','cp874' , 'ในงาน ...........................................................................................................................................................................') , 0 , 1 , 'L' );
$pdf->Cell( 0  , 41 , iconv( 'UTF-8','cp874' , '           '.$row["title"]) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -26 , iconv( 'UTF-8','cp874' , 'มีคนนั่ง .................... คน ในวันที่ ..................................... เวลารถออกจากวิทยาลัย ............................................. น.' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 24 , iconv( 'UTF-8','cp874', '            '.$row["count"].'                             '.changeDate($date_start).'                                              '.$time_start) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -9 , iconv( 'UTF-8','cp874' , 'ถึงวันที่ ................................................................ เวลารถกลับถึงวิทยาลัย ............................................................. น.' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874', '                   '.changeDate($date_end).'                                                        '.$time_end) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , 'โดยมีผู้ร่วมโดยสารคือ และรายการนำสิ่งของออกนอกบริเวร พร้อมรถราชการ ดังนี้ (ระบุ)' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '๑ ........................................................' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '๒ ........................................................' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '๓ ........................................................' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '       จึงเรียนมาเพื่อทราบ' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '............................................ ผู้ขอใช้รถรถยนต์' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , -9 , iconv('UTF-8','cp874' , '                     '.$row["person_name"] . '                       ') , 0 , 1 , 'R' );
$pdf->Cell( 0  , 24 , iconv( 'UTF-8','cp874' , '(...........................................)                    ' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , -26 , iconv('UTF-8','cp874' , '                     '.$row["person_name"] . '                       ') , 0 , 1 , 'R' );
$pdf->Cell( 0  , 41 , iconv( 'UTF-8','cp874' , 'เรียน ผู้อำนวยการวิทยาลัยพยาบาลบรมราชชนนี สุราษฎร์ธานี' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -26 , iconv( 'UTF-8','cp874' , '       กลุ่มงานบริหารทั่วไป ฝ่ายบริหาร ......................................................................................................................' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 24 , iconv( 'UTF-8','cp874' , '                                                   '.$row["car_typename"].'   '.$row["car_name"] ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -9 , iconv( 'UTF-8','cp874' , 'พนักงานขับรถ คือ .......................................................................................................................................................' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 24 , iconv( 'UTF-8','cp874' , '............................................ ผู้จัดรถรถยนต์' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , -9 , iconv( 'UTF-8','cp874' , '(...........................................)                  ' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , 9 , iconv( 'UTF-8','cp874' , 'เรียนผู้อำนวยการ' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '  โปรดพิจารณา' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '............................................ ผู้ตรวจสอบ' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , 7 , iconv( 'UTF-8','cp874' , '(...........................................)               ' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , -7 , iconv( 'UTF-8','cp874' , '(นางฐิตาพร วรภัณฑ์วิศิษฎ์)' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 22 , iconv( 'UTF-8','cp874' , 'รองผู้อำนวยการฝ่ายบริหาร' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -7 , iconv( 'UTF-8','cp874' , '............................................ ผู้อนุมัติ' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , 22 , iconv( 'UTF-8','cp874' , '(...........................................)          ' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , -7 , iconv( 'UTF-8','cp874' , ' หมายเหตุ     เวลารถออกจากวิทยาลัยฯ .............................................................................................. น. (ระบุเวลา)' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , 22 , iconv( 'UTF-8','cp874' , '                  เวลารถกลับเข้าวิทยลัยฯ ................................................................................................. น. (ระบุเวลา)' ) , 0 , 1 , 'L' );
$pdf->Cell( 0  , -7 , iconv( 'UTF-8','cp874' , '............................................ รปภ.รักษาการณ์' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , 22 , iconv( 'UTF-8','cp874' , '(...........................................)                    ' ) , 0 , 1 , 'R' );
$pdf->Cell( 0  , -7 , iconv( 'UTF-8','cp874' , ' ***ให้รปภ.รวบรามหนังสืออนุญาตแจ้งการขออนุญาตให้รถผ่านออกเสนอต่อฝ่ายบริหารทุกวันปฏิบัติราชการ' ) , 0 , 1 , 'L' );

// $pdf->Cell( 0  , -100 , iconv('UTF-8','cp874',''.$schedule_list->id) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->title) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->description) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 22 , iconv('UTF-8','cp874',''.$schedule_list->start_datetime) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , -7 , iconv('UTF-8','cp874',''.$schedule_list->end_datetime) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->count) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->addper) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->addper) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->status) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->name_person) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->id_car) , 0 , 1 , 'R' );
// $pdf->Cell( 0  , 10 , iconv('UTF-8','cp874',''.$schedule_list->id_cartype) , 0 , 1 , 'R' );

$pdf->Output();

?>
