<?php 
//คิวรี่ข้อมูลมาแสดงในตาราง โดยเทียบข้อมูลระหว่างตารางตำแหน่งงานกับตารางพนักงานที่มีคอลัมภ์สัมพันธ์กัน ก็คือ p_id กับ ref_p_id
include 'condb.php';
$stmt = $conn->prepare("SELECT * ,DATEDIFF(time_last , CURDATE()) as sumdate FROM tbl_calendar");

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
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th> 
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
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
        <td>         
          <a class="btn btn-warning btn-flat btn-sm" href="calendar.php?act=edit&c_id=<?php echo $row_cal['c_id']; ?>">
           แก้ไข
          </a>
        </td>    
        <td>         
          <a class="btn btn-danger btn-flat btn-sm" href="calendar_del.php?c_id=<?= $row_cal['c_id'];?>" 
            onclick="return confirm('ยืนยันการลบข้อมูล !!');">
           ลบ
          </a>
        </td>  
         <?php } ?>  
      </tr>
    </tbody>
  </table>

