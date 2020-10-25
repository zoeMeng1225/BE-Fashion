<?php

include "lib/php/db_connect.php";

$result = $conn->query("DELETE FROM Products WHERE name = 'Dear-Lemon Hoodie Online Only'");
if($conn->errno) die($conn->error);