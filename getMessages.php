<?php
// 从文本文件中读取消息列表并返回
$messages = file_get_contents('messages.txt');

echo $messages;
?>
