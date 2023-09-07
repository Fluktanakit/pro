<?php 
	 if(isset($_GET['id'])){
	 	$id = $_GET['id'];
	 	  include '../condb.php';
	 	  $stmtDoc = $conn->prepare("
			SELECT * #ตารางเอามาทุกคอลัมภ์
			FROM comment AS f
			WHERE f.comment_id = '$id'
			ORDER BY f.comment_id ASC #เรียงลำดับข้อมูลจากน้อยไปมาก
			");
	 	 	$stmtDoc->execute();
         	$result = $stmtDoc->fetchAll();

			foreach ($result as $row) {
				if ($result) {
					echo "<script type='text/javascript'>";
			        echo "window.location = '../admin/doc_file/".$row['doc_file']."';"; //หน้าที่ต้องการให้กระโดดไป      
			        echo "</script>";
			}else{}
		}

			}
		




?>