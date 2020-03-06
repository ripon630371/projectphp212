<?php 

	function delete(){

		global $db;

		if(isset($_GET['delete'])){
            $userDelete = $_GET['delete'];

            $query = "DELETE FROM user WHERE user_id='$userDelete'";

            $result = mysqli_query($db,$query);
            
            if($result){
              header('Location:viewAllUsers.php');
            }else{
              die("".mysqli_error());
            }

          }
	}

?>