<?php 
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();
if (isset($_POST['pro_name'])) {
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
    $upload=$_FILES['pro_file']['name'];
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['pro_file']['name'],".");
    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.pdf'){
    //โฟลเดอร์ที่เก็บไฟล์
    $path="doc_file/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['pro_file']['tmp_name'],$path_copy);
     //ประกาศตัวแปรรับค่าจากฟอร์ม
    $pro_name = $_POST['pro_name'];
    $cha_name = $_POST['cha_name'];
    $m_name = $_POST['m_name'];
    $d_name = $_POST['d_name'];
    //sql insert
    $sToken = "LdMbEjdlk1R57UhfnyKFgjqDXle7B6wXPtMyKEaQS0i";
	$sMessage .= "ชื่อโครงงาน ". $pro_name ."\n";
    $sMessage .= "ชื่อบท ". $cha_name . "\n";
    $sMessage .= "ชื่อนักศึกษา ". $m_name . "\n";
    $sMessage .= "ปีการศึกษา ". $d_name . "\n";    
    $sMessage .= "......ส่งงานแล้วน้า....";
	
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
    $stmt = $conn->prepare("INSERT INTO tbl_doc_pro ( pro_name, cha_name ,m_name, doc_file,d_name)
    VALUES ( :pro_name, :cha_name,:m_name, '$newname',:d_name)");
    $stmt->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
    $stmt->bindParam(':cha_name', $cha_name, PDO::PARAM_STR);
    $stmt->bindParam(':m_name', $m_name, PDO::PARAM_STR);
    $stmt->bindParam(':d_name', $d_name, PDO::PARAM_STR);
    $result = $stmt->execute();
    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล   
    
            if($result){
                    echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "อัพโหลดไฟล์เอกสารสำเร็จ",
                          text: "Redirecting in 1 seconds.",
                          type: "success",
                          timer: 1000,
                          showConfirmButton: false
                      }, function() {
                          window.location = "doc_pro.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "doc_pro.php"; //หน้าที่ต้องการให้กระโดดไป
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
                              window.location = "doc_pro.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์  
    } // if($upload !='') {
    $conn = null; //close connect db
    } //isset
?>