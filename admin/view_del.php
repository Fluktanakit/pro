<?php 
if(isset($_GET['comment_id'])){
    include 'condb.php';
//ประกาศตัวแปรรับค่าจาก param method get
$comment_id = $_GET['comment_id'];
$stmt = $conn->prepare('DELETE FROM comment WHERE comment_id=:comment_id');
$stmt->bindParam(':comment_id', $comment_id , PDO::PARAM_INT);
$stmt->execute();

  if($stmt->rowCount() > 0){
        echo '<script>       
              window.location = "view_comment.php"; //หน้าที่ต้องการให้กระโดดไป
              </script>';
    }else{
       echo '<script>         
              window.location = "view_comment.php"; //หน้าที่ต้องการให้กระโดดไป
             </script>';
    }
$conn = null;
} //isset
?>