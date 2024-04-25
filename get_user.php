<?php

include 'user.php';

header('Content-Type: application/json');

$user = new User();
$data = $user->getAll();
echo json_encode($data);

?>