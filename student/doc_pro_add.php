<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">ส่งเล่มโครงงาน</h3>
  </div>
  <div class="card-body">
    <form action="doc_pro_add_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ชื่อโครงงาน</label>
            <input type="text" name="pro_name" class="form-control " placeholder="กรอกข้อมูลเอกสาร">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>บทที่</label>
            <select name="cha_name" class="custom-select rounded-0" required>
              <option value="">-เลือกบท-</option>
              <option value="บทคัดย่อ">บทคัดย่อ</option>
              <option value="บทคัดย่อภาษาอังกฤษ">บทคัดย่อภาษาอังกฤษ</option>
              <option value="บรรณานุกรม">บรรณานุกรม</option>
              <option value="ภาคผนวก">ภาคผนวก</option>
              <option value="ใบรับรองโครงงาน">ใบรับรองโครงงาน</option>
              <option value="กิตติกรรมประกาศ">กิตติกรรมประกาศ</option>
              <option value="สารบัญ">สารบัญ</option>
              <option value="สารบัญตาราง">สารบัญตาราง</option>
              <option value="ปกใน">ปกใน</option>
              <option value="ปกหนัง">ปกหนัง</option>
              <option value="บทที่ 1">บทที่ 1</option>
              <option value="บทที่ 2">บทที่ 2</option>
              <option value="บทที่ 3">บทที่ 3</option>
              <option value="บทที่ 4">บทที่ 4</option>
              <option value="บทที่ 5">บทที่ 5</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>*ไฟล์เอกสาร .pdf *</label>
            <input type="file" name="pro_file" class="form-control" accept="application/pdf">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ปีการศึกษา</label>
            <select name="d_name" class="custom-select rounded-0" required>
              <?php
              $d_name =  $_SESSION['d_name'];
              include '../condb.php';
              $stmt = $conn->prepare("SELECT* FROM tbl_department as d where d.d_name = '$d_name' ");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <option value="<?= $row['d_name'];?>"><?= $row['d_name'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ผู้ส่งเอกสาร</label>
            <select name="m_name" class="custom-select rounded-0" required>
              <?php
              $m_name =  $_SESSION['m_name'];
              include '../condb.php';
              $stmt = $conn->prepare("SELECT* FROM tbl_member as m
              where m.m_name = '$m_name'
              ");
              $stmt->execute();
              $result = $stmt->fetchAll();
              foreach($result as $row) {
              ?>
              <option value="<?= $row['m_name'];?>"><?= $row['m_name'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="doc_pro.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>
    </form>
  </div>
</div>