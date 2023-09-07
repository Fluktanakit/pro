<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['cal_name'])) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
    include 'condb.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $cal_name = $_POST['cal_name'];

      //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าเพิ่มข้อมูลแผนก
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

      
    //sql insert
    $cal_id = $_POST['cal_id'];
    $cal_name = $_POST['cal_name'];
    $cal_work = $_POST['cal_work'];
    $d_name = $_POST['d_name'];
    $term_name = $_POST['term_name'];
    $time_frist = $_POST['time_frist'];
    $time_last = $_POST['time_last'];
     //check data
     $stmt = $conn->prepare("INSERT INTO tbl_calendar (cal_id,cal_name, cal_work, d_name,term_name,time_frist,time_last)
     VALUES (:cal_id, :cal_name, :cal_work, :d_name, :term_name, :time_frist, :time_last)");
     $stmt->bindParam(':cal_id', $cal_id, PDO::PARAM_STR);
     $stmt->bindParam(':cal_name', $cal_name, PDO::PARAM_STR);
     $stmt->bindParam(':cal_work', $cal_work, PDO::PARAM_STR);
     $stmt->bindParam(':d_name', $d_name, PDO::PARAM_STR);
     $stmt->bindParam(':term_name', $term_name, PDO::PARAM_STR);
     $stmt->bindParam(':time_frist', $time_frist, PDO::PARAM_STR);
     $stmt->bindParam(':time_last', $time_last, PDO::PARAM_STR);
     $result = $stmt->execute();
    
    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  text: "Redirecting in 1 seconds.",
                  type: "success",
                  timer: 1000,
                  showConfirmButton: false
              }, function() {
                  window.location = "calendar.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "calendar.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } //else check
   //isset
    ?>