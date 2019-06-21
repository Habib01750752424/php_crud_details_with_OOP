<?php 
 include 'lib/user.php';
include_once 'inc/header.php';
Session::checkSession();
?>

<?php 
if(isset($_GET['id'])){
  $userid = (int)$_GET['id'];
}
$user = new User();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])){
        $updatepass = $user->updatePassword($userid, $_POST); 
     }
?>
	 	  	    

	 	  	<div class="panel panel-default">
			   <div class="panel-heading">
             <h2>Change Password<span class="pull-right"><a class="btn btn-info" href="profile.php">Back</a></span></h2>
         </div>

      
				<div class="panel-body">
                <div style="max-width:600px; margin:0 auto;">


                  <?php 
                    if(isset($updatepass)){
                      echo $updatepass;
                    }
                  ?>

                     <form action="" method="POST">
                          <div class="form-group">
                               <label for="old_pass">Old Password</label>
                               <input type="password" name="old_pass" id="old_pass" class="form-control"/>
                          </div>



                          <div class="form-group">
                               <label for="password">New Password</label>
                               <input type="password" name="password" id="password" class="form-control"/>
                          </div>


                          <button type="submit" name="updatepass" class="btn btn-success">Update</button>

                     </form>
                </div>
			    </div>
			</div>

			<?php include 'inc/footer.php'?>



