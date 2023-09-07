<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if (isset($_POST['comment'])) {
    include '../condb.php';
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
     echo '
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
   $date1 = date("Ymd_His");
   //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
   $numrand = (mt_rand());
   $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
   $upload=$_FILES['doc_file']['name'];
   //มีการอัพโหลดไฟล์
   if($upload !='') {
   //ตัดขื่อเอาเฉพาะนามสกุล
   $typefile = strrchr($_FILES['doc_file']['name'],".");
   //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
   if($typefile =='.pdf'){
   //โฟลเดอร์ที่เก็บไฟล์
   $path="../admin/doc_file";
   //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
   $newname = $numrand.$date1.$typefile;
   $path_copy=$path.$newname;
   //คัดลอกไฟล์ไปยังโฟลเดอร์
   move_uploaded_file($_FILES['doc_file']['tmp_name'],$path_copy);
    //ประกาศตัวแปรรับค่าจากฟอร์ม
      
    //sql insert
    
    $cha_name = $_POST['cha_name'];
    $pro_name = $_POST['pro_name'];
    $m_name = $_POST['m_name'];
    $comment = $_POST['comment'];
    
     //check data$sToken = "LdMbEjdlk1R57UhfnyKFgjqDXle7B6wXPtMyKEaQS0i";
	
     $stmt = $conn->prepare("INSERT INTO comment (cha_name,m_name,pro_name,comment,doc_file)
     VALUES (:cha_name,:m_name,:pro_name,:comment,'$newname')");
     $stmt->bindParam(':cha_name', $cha_name, PDO::PARAM_STR);
     $stmt->bindParam(':m_name', $m_name, PDO::PARAM_STR);
     $stmt->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
     $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
     $result = $stmt->execute();

     $sToken = "LdMbEjdlk1R57UhfnyKFgjqDXle7B6wXPtMyKEaQS0i"; // Replace with your actual LINE Notify token
     $sMessage = "ชื่อโครงงาน " . $pro_name . "\n";
     $sMessage .= "ชื่อบท " . $cha_name . "\n";
     $sMessage .= "แก้ไขที่ " . $comment . "\n";
     $sMessage .= "......แก้ไขด้วยน้า....";
     
     $chOne = curl_init(); 
     curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
     curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
     curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
     curl_setopt( $chOne, CURLOPT_POST, 1); 
     curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
     $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
     curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
     curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
     $result = curl_exec( $chOne ); 
 
     //Result error 
     if(curl_error($chOne)) 
     { 
         echo 'error:' . curl_error($chOne); 
     } 
     else { 
         $result_ = json_decode($result, true); 
         echo "status : ".$result_['status']; echo "message : ". $result_['message'];
     } 
     curl_close( $chOne );   
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
                  window.location = "check_pro.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "check_pro.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    $conn = null; //close connect db
    } 
}//else check
}//isset
    ?>