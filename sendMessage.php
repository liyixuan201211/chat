<?php
// 获取提交的姓名和消息内容
$name = $_POST['name'] ?? '';
$message = $_POST['message'] ?? '';

// 如果姓名或消息不为空，则处理并写入文本文件
if (!empty($name) && !empty($message)) {
    $name = htmlspecialchars($name); // 防止 XSS 攻击
    $message = htmlspecialchars($message); // 防止 XSS 攻击
    
    // 格式化消息内容
    $timestamp = date('Y-m-d H:i:s');
    $message = "<div class='chat-message'><strong>$name:</strong> $message <span class='timestamp'>[$timestamp]</span></div>\n";
    
    // 写入消息到文件
    file_put_contents('messages.txt', $message, FILE_APPEND | LOCK_EX);
}

// 返回空白响应（如果需要）
echo 'send!';
header("Location: index.html");
exit();
?>
