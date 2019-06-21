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
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $updateusr = $user->updateuserData($userid,$_POST); 
     }
?>
	 	  	    

	 	  	<div class="panel panel-default">
			   <div class="panel-heading">
             <h2>User Profile <span class="pull-right"><a class="btn btn-info" href="index.php">Back</a></span></h2>
         </div>

      
				<div class="panel-body">
                <div style="max-width:600px; margin:0 auto;">


                  <?php 
                    if(isset($updateusr)){
                      echo $updateusr;
                    }
                  ?>

                  <?php 
                    $userdata = $user->getUserById($userid);
                    if($userdata){
                  ?>

                     <form action="" method="POST">
                          <div class="form-group">
                               <label for="name">Your Name</label>
                               <input type="text" name="name" id="name" class="form-control" value="<?php echo $userdata->name; ?>"/>
                          </div>



                          <div class="form-group">
                               <label for="username">Username</label>
                               <input type="text" name="username" id="username" class="form-control" value="<?php echo $userdata->username; ?>"/>
                          </div>



                          <div class="form-group">
                               <label for="email">Your Email</label>
                               <input type="text" name="email" id="enail" class="form-control"  value="<?php echo $userdata->email; ?>"/>
                          </div>


                          <?php 
                          $sesId = Session::get("id");
                          if($userid == $sesId){

                          ?>
            
                          <button type="submit" name="update" class="btn btn-success">Update</button>
                          <a class="btn btn-info" href = "changepass.php?id = <?php echo $userid; ?>">PassWord Change</a>

                      <?php } ?>

                     </form>
                    <?php } ?>
                </div>
			    </div>
			</div>

			<?php include 'inc/footer.php'?>



