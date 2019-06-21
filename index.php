<?php 
    include_once 'inc/header.php';
    include 'lib/user.php';
    Session::checkSession();
?>

<?php
    $loginmsg = Session::get("loginmsg");
    if(isset($loginmsg)){
    	echo $loginmsg;
    }
   Session::set("loginmsg", NULL);
?>

	 	  	   <div class="panel panel-default">
			    <div class="panel-heading">
				     <h2>User List <span class="pull-right">Welcome !!   <strong> 
                       
                       <?php
                           $name = Session::get("username"); 
                            if(isset($name)){
    	                         echo $name;
                               } 
                       ?>

				     </span></h2>
				</div>
				<div class="panel-body">
			       <table class="table table-striped table-responsiv">
				
					  <tr>
					     <th width="15%">Serial</td>
					     <th width="15%">Name</th>
					     <th width="15%">User Name</th>
					     <th width="15%">E-mail Address</th>
					     <th width="15%">Action</th>						 
				      </tr>

				      <?php 
                         $user = new User();
                         $userdata = $user->getUserData();

                         if( $userdata){

                         	$i=0;
                         	foreach ($userdata as $sdata) {
                         		$i++;
				      ?>
					  
				      <tr>
					     <td><?php echo $i;?></td>
					     <td><?php echo $sdata['name'];?></td>
					     <td><?php echo $sdata['username'];?></td>
					     <td><?php echo $sdata['email'];?></td>
					     <td>
						     <a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id'];?>">View</a>
						 </td>
				      </tr>

				      <?php } }else{ ?>
                         <tr><td colspan="5"><h2>No User Data Found..... </h2></td></tr>
				      <?php } ?>
					  
			    	</table>
			   </div>
			</div>

			<?php include 'inc/footer.php'?>