<?php 
//คิวรี่ข้อมูลมาแสดงในตาราง โดยเทียบข้อมูลระหว่างตารางตำแหน่งงานกับตารางพนักงานที่มีคอลัมภ์สัมพันธ์กัน ก็คือ p_id กับ ref_p_id
    include 'condb.php';
    $stmtMem = $conn->prepare("
    SELECT *
    FROM tbl_member AS m  #AS e คือการแทนชื่อตารางให้ชื่อสั้นลงในตอนที่เอาไป inner join โค้ดจะดูไม่รก
    ORDER BY m.m_id ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
    ");
      $stmtMem->execute();
      $resultMem = $stmtMem->fetchAll();                                         
?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
 
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">รูป</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">username</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">password</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">frist name & last name</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">year</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">term</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">level</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">edit</th> 
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">del</th> 
      </tr>
    </thead>
    <tbody>
       <?php foreach ($resultMem as $row_member) { ?>  
      <tr>
    
        <td>
        <img src="m_img/<?= $row_member['m_img'];?>" width="100px">
        </td>
         <td>
         <?php echo $row_member['m_username']; ?>
        </td>
         <td>
         <?php echo $row_member['m_password']; ?>
        </td>
         <td>
         <?php echo $row_member['m_name']; ?>
        </td>
         <td>
         <?php echo $row_member['d_name']; ?>
        </td>
        <td>
         <?php echo $row_member['term_name']; ?>
        </td>
        <td>
         <?php 
         $st =  $row_member['m_level'];
         if ($st=='admin') {
          echo "ผู้ดูแลระบบ";
         }elseif ($st=='student') {
          echo "นักศึกษา";
         }else{
          echo "อาจารย์";
         }
          ?>
        </td>
        <td>         
          <a class="btn btn-warning btn-flat btn-sm" href="member.php?act=edit&m_id=<?php echo $row_member['m_id']; ?>">
           แก้ไข
          </a>
        </td>    
        <td>         
          <a class="btn btn-danger btn-flat btn-sm" href="member_del.php?m_id=<?= $row_member['m_id'];?>" 
            onclick="return confirm('ยืนยันการลบข้อมูล !!');">
           ลบ
          </a>
        </td>  
         <?php } ?>  
      </tr>
    </tbody>
  </table>

