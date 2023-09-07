
      
      <?php
      if(isset($_GET['pro_id'])){
      include 'condb.php';
      $stmt = $conn->prepare("SELECT* FROM tbl_doc_pro WHERE pro_id=?");
      $stmt->execute([$_GET['pro_id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      }//isset
      ?>
      <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">comment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="comment_db.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <label>ชื่อเอกสาร</label>
                        <input type="text" name="pro_name" class="form-control" value="<?= $row['pro_name'];?>" placeholder="กรอกลำดับการดำเนินงาน">
                      </div>
                      <div class="form-group">
                        <label>ชื่อบท</label>
                        <input type="text" name="cha_name" class="form-control" value="<?= $row['cha_name'];?>" placeholder="กรอกลำดับการดำเนินงาน">
                      </div>
                      <div class="form-group">
                        <label>ชื่อนักศึกษา</label>
                        <input type="text" name="m_name" class="form-control" value="<?= $row['m_name'];?>" placeholder="กรอกลำดับการดำเนินงาน">
                      </div>
                      <div class="form-group">
                        <label>comment</label>
                        <textarea type="text" name="comment"  class="form-control" placeholder="กรอกข้อมูลข้อควรปรับปรุง"></textarea>
                      </div>
                      <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>*ไฟล์เอกสาร .pdf *</label>
                          <input type="file" name="doc_file" class="form-control" accept="application/pdf">
                        </div>
                      </div>
                    </div>
                  <div class="row" align="left">
                    <div class="col-sm-6">
                         
                         <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                         <a href="check_pro.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>              
                    </div>         
                  </div>              
                </form>
              </div>
              <!-- /.card-body -->
            </div>
             