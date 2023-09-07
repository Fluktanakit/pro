<?php 
	 if(isset($_GET['id'])){
	 	$id = $_GET['id'];
	 	  include 'condb.php';
	 	  $stmtDoc = $conn->prepare("
			SELECT * #ตารางเอามาทุกคอลัมภ์
			FROM tbl_doc_pro AS f
			WHERE f.pro_id = '$id'
			ORDER BY f.pro_id ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
			");
	 	 	$stmtDoc->execute();
         	$result = $stmtDoc->fetchAll();

			foreach ($result as $row_doc) {
				if ($result) {
					echo "<script type='text/javascript'>";
			        echo "window.location = '../student/doc_file/".$row_doc['doc_file']."';"; //หน้าที่ต้องการให้กระโดดไป      
			        echo "</script>";
			}else{}
		}

			}
		




?>