<?php
if(isset( $_POST['name']))
  $name = $_POST['name'];
if(isset( $_POST['email']))
  $email = $_POST['email'];
if(isset( $_POST['message']))
  $message = $_POST['message'];
if(isset( $_POST['subject']))
  $subject = $_POST['subject'];

header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
  exit();
  }
}
if ($subject === ''){
  print json_encode(array('message' => 'Subject cannot be empty', 'code' => 0));
  exit();
}
if ($message === ''){
  print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
  exit();
}

function sanitize_my_email($field) {     
$field = filter_var($field, FILTER_SANITIZE_EMAIL);
if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
return true;
}
else {
return false;
}
} 

$content="From: $name \n Email: $email \n Message: $message";
$mailTo = "manishwarsegu@gmail.com";
$mailheader = "From: $email \r\n";


//check if the email address is invalid $secure_check
sanitize_my_email($mailTo);
if ($secure_check == false) {     
echo "Invalid input"; 
} 
else {//send email     
mail($mailTo, $subject, $content, $mailheader);
echo "Email sent!";
}
?>
?>