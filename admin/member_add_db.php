<?php 
// print_r($_POST);
// exit();
if (isset($_POST['m_name'])) {
     include 'condb.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
     $m_username = $_POST['m_username'];
     //check data
      $stmt = $conn->prepare("SELECT m_id FROM tbl_member WHERE m_username = :m_username");
      //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
      $stmt->execute(array(':m_username' => $m_username));
      echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
      if($stmt->rowCount() > 0){
        echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "ข้อมูลซ้ำ !! ",  
                          text: "ข้อมูลซ้ำ!! กรุณากรอกข้อมูลใหม่",
                          type: "warning"
                      }, function() {
                          window.location = "member.php?act=add"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
              </script>';
    }else{ //ถ้าข้อมูลไม่ซ้ำ เก็บข้อมูลลง
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
    $upload=$_FILES['m_img']['name'];
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['m_img']['name'],".");
    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.jpg' || $typefile  =='.jpg' || $typefile  =='.png'){
    //โฟลเดอร์ที่เก็บไฟล์
    $path="m_img/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['m_img']['tmp_name'],$path_copy);
     //ประกาศตัวแปรรับค่าจากฟอร์ม
    $m_username = $_POST['m_username'];
    $m_password = $_POST['m_password'];
    $m_name = $_POST['m_name'];
    $d_name = $_POST['d_name'];
    $m_level = $_POST['m_level'];
    $term_name = $_POST['term_name'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_member (m_username, m_password, m_name, d_name, m_level, m_img,term_name)
    VALUES (:m_username, :m_password, :m_name, :d_name, :m_level, '$newname',:term_name)");
    $stmt->bindParam(':m_username', $m_username, PDO::PARAM_STR);
    $stmt->bindParam(':m_password', $m_password, PDO::PARAM_STR);
    $stmt->bindParam(':m_name', $m_name, PDO::PARAM_STR);
    $stmt->bindParam(':d_name', $d_name, PDO::PARAM_STR);
    $stmt->bindParam(':m_level', $m_level, PDO::PARAM_STR);
    $stmt->bindParam(':term_name', $term_name, PDO::PARAM_STR);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
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
                          window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result      
        }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                              type: "error"
                          }, function() {
                              window.location = "member.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์  
    } 
}// if($upload !='') {
    $conn = null; //close connect db
    } //isset
?>