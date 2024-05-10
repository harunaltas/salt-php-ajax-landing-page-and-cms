<?php
session_start();
ob_start();
include('../messages/message-settings.php');
if($_SESSION) {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="admin-css/admin.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <title>Messages</title>
  </head>
  <body>

    <div class="table-containerr">
    
	    <div class="links">
	   <a href="?process=messages">MESSAGES</a>
	   <a href="?process=change">CHANGE PASSWORD</a>
	   <a href="?process=view">VIEV SITE</a>
	   <a href="?process=logout">LOGOUT</a>
	   </div>
	   <?php
	   	$islem = @$_GET["process"];
		switch($islem) {
			case 'messages': 
			
			?>
			  <h1 class="headingg">Messages</h1>
				<p class="heading2" style="color:#fff">Total Message : <?php 
	   $messages = $db->prepare("select * from message order by m_id desc");
	   $messages->execute(array());
	   $totalmessage = $messages->rowCount();
	   echo $totalmessage; ?></p>

      <table class="tablee">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>E-Mail Address</th>
            <th>Phone Number</th>
			<th>Date</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
		<?php
		
				$messages = $db->prepare("select * from message order by m_id desc");
				$messages->execute(array());
				$message = $messages->fetchALL(PDO::FETCH_ASSOC);
				$totalmessage = $messages->rowCount();
				foreach($message as $m)
			{ ?>
          <tr>
            <td data-label="Full Name"><?php echo $m['m_fullname']; ?></td>
            <td data-label="E-Mail Address"><?php echo $m['m_email']; ?></td>
            <td data-label="Phone Number"><?php echo $m['m_phone']; ?></td>
			<td data-label="Date"><?php echo $m['m_date']; ?></td>
            <td data-label="Message">
              <button
                type="button"
                class=""
                data-bs-toggle="modal"
                data-bs-target="#exampleModal<?php echo $m['m_id'];?>"
              >
                Read
              </button>
				<a onclick="return confirm('Are you sure to delete?');" href="?process=delete&id=<?php echo $m['m_id']; ?>" class="delete">Delete</a>
            </td>
			<div
                class="modal fade"
                id="exampleModal<?php echo $m['m_id'];?>"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
                <div
                  class="
                    modal-dialog modal-dialog-centered modal-dialog-scrollable
                  "
                >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <?php echo $m['m_email']; ?>
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body"><?php echo $m['m_message']; ?></div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          </tr>
		  <?php } ?>
        </tbody>
      </table>
    </div>
	<?php


			break;
			case 'delete': 
			
			$m_id = @$_GET["id"];
			$delete = $db->prepare("delete from message where m_id=?");
			$sil = $delete->execute(array($m_id));
				$x = $delete->rowCount();
				if ($x) {
				if($sil) {
			header("refresh:0; url=admin.php");
				} else {
			echo "<h2>An error occurred while deleting</h2>";
				}
			}else {
			echo "<h2>There is no such message</h2>";
				}
			break;
			case 'change': 
			?>
		<form action="" method="post">
		<div class="passwordchange">		
		<input style="padding:10px;" type="password" name="oldpassword" placeholder="Old Password"/>
		<input style="padding:10px;" type="password" name="newpassword" placeholder="New Password"/>
		<input style="padding:10px;" type="password" name="newpasswordagain" placeholder="New Password Again"/>
		<button type="submit" class="btn btn-success" name="change">CHANGE</button>
		</div>
		</form>
				<?php
				
				
				 if(isset($_POST["change"])) { 
					$oldpassword = $_POST["oldpassword"];
					$goldpassword = md5($oldpassword);
					$newpassword = $_POST["newpassword"];
					$newpasswordagain = $_POST["newpasswordagain"];
					$gnewpassword = md5($newpassword);
				           if($newpassword == $newpasswordagain) {
				$select = $db->prepare("select * from users where password=?");
				$select->execute(array($goldpassword));
				$c = $select->fetch(PDO::FETCH_ASSOC);
				$x = $select->rowCount();
				if($x) {
				$degistir = $db->prepare("update users set
				password=?
				");
				$yenile = $degistir->execute(array($gnewpassword));
            
				if($yenile) {
				?>
						   <div class="alert alert-success" role="alert">
					Your Password Has Been Changed !
				</div>
					<?php
						} else {
										?>
						   <div class="alert alert-success" role="alert">
			  Old Password Incorrect !
			</div>
			<?php
						}

					  } else {
										?>
						   <div class="alert alert-success" role="alert">
			  Old Password Incorrect !
			</div>
			<?php
					  }
					}
				else {
												?>
								   <div class="alert alert-success" role="alert">
					  The old password and the new password do not match !
					</div>
					<?php
							  }	 
							 }
				
				
				
				
				
				
				
				
				
				

			break;
			case 'view' : 
			header('location:../index.php');
			break;
			case 'logout': echo session_destroy(); header("location:index.php"); break;
			default : 
								
			?>
			  <h1 class="headingg">Messages</h1>
				<p class="heading2" style="color:#fff">Total Message : <?php 
	   $messages = $db->prepare("select * from message order by m_id desc");
	   $messages->execute(array());
	   $totalmessage = $messages->rowCount();
	   echo $totalmessage; ?></p>

      <table class="tablee">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>E-Mail Address</th>
            <th>Phone Number</th>
			<th>Date</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
		<?php
				$messages = $db->prepare("select * from message order by m_id desc");
				$messages->execute(array());
				$message = $messages->fetchALL(PDO::FETCH_ASSOC);
				$totalmessage = $messages->rowCount();
				foreach($message as $m)
			{ ?>
          <tr>
            <td data-label="Full Name"><?php echo $m['m_fullname']; ?></td>
            <td data-label="E-Mail Address"><?php echo $m['m_email']; ?></td>
            <td data-label="Phone Number"><?php echo $m['m_phone']; ?></td>
			<td data-label="Date"><?php echo $m['m_date']; ?></td>
            <td data-label="Message">
              <button
                type="button"
                class=""
                data-bs-toggle="modal"
                data-bs-target="#exampleModal<?php echo $m['m_id'];?>"
              >
                Read
              </button>
				<a onclick="return confirm('Are you sure to delete?');" href="?process=delete&id=<?php echo $m['m_id']; ?>" class="delete">Delete</a>
            </td>
			<div
                class="modal fade"
                id="exampleModal<?php echo $m['m_id'];?>"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
                <div
                  class="
                    modal-dialog modal-dialog-centered modal-dialog-scrollable
                  "
                >
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <?php echo $m['m_email']; ?>
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body"><?php echo $m['m_message']; ?></div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                    </div>
                  </div>
                </div>
              </div>
          </tr>
		  <?php } ?>
        </tbody>
      </table>
    </div>
	<?php
			
			break;
		}
			
			?>
	   
  </body>
</html>
<?php } 
else {
	header("location:index.php");
}
?> 