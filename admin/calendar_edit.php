<?php
      if(isset($_GET['c_id'])){
      include 'condb.php';
      $stmt = $conn->prepare("SELECT* FROM tbl_calendar WHERE c_id=?");
      $stmt->execute([$_GET['c_id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      }//isset
      ?>
          <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">แก้ไขข้อมูลปฏิทินการศึกษา</h3>
          </div>    
                      <!-- /.card-header -->
                      <div class="card-body">
                <form action="calendar_add_db.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ลำดับการดำเนินงาน</label>
                        <input type="text" name="cal_id" class="form-control" value="<?= $row['cal_id'];?>" placeholder="กรอกลำดับการดำเนินงาน">
                      </div>
                      <div class="form-group">
                        <label>การดำเนินงาน</label>
                        <input type="text" name="cal_name" class="form-control" value="<?= $row['cal_name'];?>" placeholder="กรอกข้อมูลการดำเนินงาน">
                      </div>
                      <div class="form-group">
                        <label>สรุปข้อปฏิบัติ</label>
                        <textarea type="text" name="cal_work" class="form-control" placeholder="กรอกข้อมูลสรุปข้อปฏิบัติ"></textarea>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>ปีการศึกษา</label>
                            <select name="d_name" class="form-control" required>
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
                          
                              <?php
                              include 'condb.php';
                              $stmt = $conn->prepare("SELECT* FROM term ");
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
                      <div class="form-group">
                        <label>กำหนดวันเริ่มส่งเอกสาร</label>
                        <input type="date" name="time_frist" class="form-control" placeholder="กรอกข้อมูลกำหนดส่งเอกสาร">
                    </div>
                      <div class="form-group">
                        <label>วันสุดท้ายในการส่งเอกสาร</label>
                        <input type="date" name="time_last" class="form-control" placeholder="กรอกข้อมูลกำหนดส่งเอกสาร">
                    </div>
                    </div>
                  </div>
                  <div class="row" align="left">
                    <div class="col-sm-6">
                         <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                         <a href="calendar.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>              
                    </div>         
                  </div>              
                </form>
              </div>
                      
             