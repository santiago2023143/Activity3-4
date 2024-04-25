<?php
include 'user.php';

$search = new User();
$data = $search->Search($_GET);
echo json_encode($data);





?>