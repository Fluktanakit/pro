<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">เพิ่มข้อมูลสมาชิก</h3>
  </div>
  <div class="card-body">
    <form action="member_add_db.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>username</label>
            <input type="text" name="m_username" class="form-control" placeholder="กรอกข้อมูลusername">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>password</label>
            <input type="text" name="m_password" class="form-control" placeholder="กรอกข้อมูลpassword">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ชื่อ-นามสกุล</label>
            <input type="text" name="m_name" class="form-control" placeholder="กรอกข้อมูลชื่อ-นามสกุล">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>สถานะ</label>
            <select name="m_level" class="form-control" required>
              <option value="เลือกสถานะ">-เลือกสถานะ-</option>
              <option value="admin">แอดมิน</option>
              <option value="student">นักศึกษา</option>
              <option value="teacher">อาจารย์</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>ปีการศึกษา</label>
            <select name="d_name" class="form-control" required>
              <option value="">-ปีการศึกษา-</option>
              <?php
              include 'condb.php';
              $stmt = $conn->prepare("SELECT* FROM tbl_department");
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
            <label>เทอม</label>
            <select name="term_name" class="form-control" required>
              <option value="">-เทอม-</option>
              <?php
              include 'condb.php';
              $stmt = $conn->prepare("SELECT* FROM term");
              $stmt->execute();
              $result = $stmt->fetchAll();  
              foreach($result as $row) {
              ?>
              <option value="<?= $row['term_name'];?>"><?= $row['term_name'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label>*รูปภาพ .jpg .png*</label>
            <input type="file" name="m_img" class="form-control">
          </div>
        </div>
      </div>
      <div class="row" align="left">
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <a href="member.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
        </div>
      </div>
    </form>
  </div>
</div>