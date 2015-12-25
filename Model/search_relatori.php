<?php
	@defined('INCLUDED') or die("Impossibile accedere al file");
  $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
     if(!$isAjax) {
     $user_error = 'Access denied - not an AJAX request...';
     trigger_error($user_error, E_USER_ERROR);
  }
include '../Class/Database.class.php';
$term = trim($_GET['term']);
$a_json_invalid = array(array("id" => "#", "value" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);

$term = preg_replace('/\s+/', ' ', $term);

//Security Hole
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
  print $json_invalid;
  exit;
}
 $list = explode(" ",$term);

 $db = new Database();
 $db->connect();
 //$result = $db->getRelatori($term);
 if(isset($list[1]) and !empty($list[1])) $result = $db->getRelatori($list[0],$list[1]);
 if(isset($list[2]) and !empty($list[2])) $result = $db->getRelatori($list[0],$list[1],$list[2]);
 else $result = $db->getRelatori($list[0]);

 $json_result = json_encode($result);
 echo $json_result;
?>