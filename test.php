<?php
try {
	$conn = new PDO(
		'mysql:dbname=test;host=localhost:3306',
		'root',
		'system');
} catch (Exception $e) {
	throw new Exception($e->getMessage());
}

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("select name from user_info where user_id = :id");

$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch();

echo(PDO::getAvailableDrivers());
echo(phpinfo());