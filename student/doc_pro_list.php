<?php
$m_name =  $_SESSION['m_name'];
include '../condb.php';
$stmtDoc = $conn->prepare("
SELECT * #ตารางเอามาทุกคอลัมภ์
FROM tbl_doc_pro AS f
INNER JOIN tbl_member AS m ON f.m_name=m.m_name
WHERE f.m_name = '$m_name'
ORDER BY f.pro_id ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
");
$stmtDoc->execute();
$resultDoc = $stmtDoc->fetchAll();
?>
<table id="example1" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row" class="info">
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อโครงงาน</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่อบท</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ชื่อ-นามสกุล</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ปีการศึกษา/วันที่อัพโหลด</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 17%;">จัดการส่วนข้อมูล</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultDoc as $row_Doc) { ?>
    <tr>
      <td>
        <?php echo $row_Doc['pro_name'];?>
      </td>
      <td>
        <?php echo $row_Doc['cha_name']; ?>
      </td>
      <td>
         <?php echo $row_Doc['m_name'];?><br>
      </td>
      <td>
        อัพเมื่อวัน: <?php echo date('d/m/Y',strtotime($row_Doc['date_up'])); ?><br>
        ปีการศึกษา: <?php echo $row_Doc['d_name'];?>
      </td>
      <td>
        <a class="btn btn-info btn-sm" href="doc_open.php?id=<?php echo $row_Doc['pro_id']; ?>" target="_blank">
          <i class="fas fa-folder">
          </i>
          View
        </a>
        <a class="btn btn-warning btn-sm" href="doc_pro.php?act=edit&pro_id=<?php echo $row_Doc['pro_id']; ?>">
          <i class="fas fa-pencil-alt">
          </i>
          Edit
        </a>
        <a class="btn btn-danger btn-sm" href="doc_pro_del.php?pro_id=<?= $row_Doc['pro_id'];?>"  onclick="return confirm('ยืนยันการลบข้อมูล !!');">
          <i class="fas fa-trash">
          </i>
          Delete
        </a>
      </td>
      <?php } ?>
    </tr>
  </tbody>
</table>