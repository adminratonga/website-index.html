<?php
// 邮件接收者
$to = "admin@ratonga.co.nz";

// 从表单获取数据并做基本过滤
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$details = trim($_POST['details'] ?? '');

// 必填项检查
if (empty($name) || empty($email) || empty($details)) {
    echo "<p style='color:red;'>Please fill in all required fields.</p>";
    exit;
}

// 邮件主题和正文
$subject = "Website Contact Form: $name";
$message = "Name: $name\n";
$message .= "Email: $email\n";
$message .= "Phone: $phone\n\n";
$message .= "Details:\n$details\n";

// 邮件头
$headers  = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// 发送邮件
if (mail($to, $subject, $message, $headers)) {
    echo "<p style='color:green;'>Thank you, your message has been sent successfully!</p>";
} else {
    echo "<p style='color:red;'>Sorry, something went wrong. Please try again later.</p>";
}
?>