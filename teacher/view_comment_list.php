<?php
include '../condb.php';
$stmtc = $conn->prepare("SELECT * FROM `comment`");
$stmtc->execute();
$resultc = $stmtc->fetchAll();
?>
<table id="example1" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row" class="info">
    <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อโครงงาน</th>
    <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">คอมเม้น</th>
    <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อบท</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">จัดการส่วนข้อมูล</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultc as $row) {   ?>
    <tr>
    <td>
         <?php echo $row['pro_name']; ?>
        </td>
        <td>
         <?php echo $row['comment']; ?>
        </td>
        <td>
         <?php echo $row['cha_name']; ?>
        </td>
      <td>
      <a class="btn btn-info btn-sm" href="doc_open3.php?id=<?php echo $row['comment_id']; ?>" target="_blank">
          <i class="fas fa-folder">
          </i>
          View file
        </a>        
          <a class="btn btn-danger btn-flat btn-sm" href="view_del.php?comment_id=<?php echo $row['comment_id']; ?>" 
            onclick="return confirm('ยืนยันการลบข้อมูล !');">
           ลบ
          </a>
        </td> 
      <?php } ?>
    </tr>
  </tbody>
</table>