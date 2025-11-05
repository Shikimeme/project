<?php
// === Telegram Bot Setup ===
$botToken = "YOUR_TELEGRAM_BOT_TOKEN";
$chatId   = "YOUR_TELEGRAM_CHAT_ID"; // your personal chat ID or group ID

$name = $_POST['name'];
$email = $_POST['email'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guests = $_POST['guests'];

$message = "🛏 *New Booking Received!*\n\n".
"👤 Name: $name\n".
"📧 Email: $email\n".
"📅 Check-in: $checkin\n".
"📅 Check-out: $checkout\n".
"👥 Guests: $guests";

$url = "https://api.telegram.org/bot$botToken/sendMessage";
$params = [
  'chat_id' => $chatId,
  'text' => $message,
  'parse_mode' => 'Markdown'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

header("Location: ../thankyou.html");
exit;
?>
