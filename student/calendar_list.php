<?php 
//คิวรี่ข้อมูลมาแสดงในตาราง โดยเทียบข้อมูลระหว่างตารางตำแหน่งงานกับตารางพนักงานที่มีคอลัมภ์สัมพันธ์กัน ก็คือ p_id กับ ref_p_id
include '../condb.php';
$term_name = $_SESSION['term_name'];
$d_name = $_SESSION['d_name'];
$stmt = $conn->prepare("SELECT *, DATEDIFF(time_last, CURDATE()) as sumdate, 
      term_name FROM tbl_calendar as c
      where (c.term_name = '$term_name') and ( c.d_name = '$d_name') 
 ");


$stmt->execute();
$result = $stmt->fetchAll();                                 
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ขั้นตอนที่</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 35%;">การดำเนินงาน</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 40%;">สรุปข้อปฏิบัติ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ปีการศึกษา</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">เทอม</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">วันที่กำหนดส่ง</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ถึงกำหนดส่งใน</th>
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row_cal) { ?>  
      <tr>
        <td>
         <?php echo $row_cal['cal_id']; ?>
        </td>
         <td>
         <?php echo $row_cal['cal_name']; ?>
        </td>
         <td>
         <?php echo $row_cal['cal_work']; ?>
        </td>
        <td>
         <?php echo  $row_cal['d_name'];?> 
        </td>
        <td>
         <?php echo $row_cal['term_name']; ?>
        </td>
         <td>
         <?php echo date('d/m/Y', strtotime($row_cal['time_last'])); ?> 
        </td>
        <td>
         <?php echo $row_cal['sumdate']; ?>
        </td>
        
         <?php } ?>  
      </tr>
    </tbody>
  </table>

