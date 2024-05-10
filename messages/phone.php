<?php

if($_POST) {
include('message-settings.php');
$aa = strip_tags(htmlspecialchars($_POST['gelenveri']));
$fullname = strip_tags(htmlspecialchars($_POST['fullname']));
$check = $_POST['check'];
$email = strip_tags(htmlspecialchars($_POST['email']));
if ($fullname == "" || $email == "") { $data["message"]="Fill in the blanks"; $data["status"] = "error"; echo json_encode($data); }
else if ($check != "1") {$data["message"]="The checkbox must be ticked."; $data["status"] = "error"; echo json_encode($data); }
else {
$date = date("d.m.Y");
$time = date("H:i:s");
$datetime = $date.' '.$time;
$data = [];

			  $message = $aa;	
              $kayit = $db->prepare("insert into message set
              m_phone=?,
			  m_fullname=?,
			  m_email=?,
			  m_date=?
                ");
             $kayitet = $kayit->execute(array($message,$fullname,$email,$datetime));
             if($kayitet) {
                $data["status"] = "success";
			    $data["message"]= "Message Sent !";
				echo json_encode($data);
             } else {
                $data["status"] = "error";
				$data["message"]="Message could not be sent !";
				echo json_encode($data);
             }	 
}	
}



?>