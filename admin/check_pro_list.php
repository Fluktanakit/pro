<?php
include '../condb.php';
$stmtDoc = $conn->prepare("SELECT * FROM `tbl_doc_pro`");
$stmtDoc->execute();
$resultDoc = $stmtDoc->fetchAll();

?>
<table id="example1" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row" class="info">
    <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อโครงงาน</th>
    <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อผู้ส่ง</th>
    <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">ชื่อบท</th>
      <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">จัดการส่วนข้อมูล</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultDoc as $row_Doc)  {   ?>
    <tr>
    <td>
         <?php echo $row_Doc['pro_name']; ?>
        </td>
        <td>
         <?php echo $row_Doc['m_name']; ?>
        </td>
        <td>
         <?php echo $row_Doc['cha_name']; ?>
        </td>
      <td>
      <a class="btn btn-info btn-sm" href="doc_open2.php?id=<?php echo $row_Doc['pro_id']; ?>" target="_blank">
          <i class="fas fa-folder">
          </i>
          View
        </a>
          <a class="btn btn-warning btn-flat btn-sm" href="comment.php?pro_id=<?php echo $row_Doc['pro_id']; ?>">
          comment
          </a>

       
        </td>  
      <?php } ?>
    </tr>
  </tbody>
</table>