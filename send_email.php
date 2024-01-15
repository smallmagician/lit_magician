<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータを受け取る
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // 送信先のメールアドレス
    $to = 'lit_magician@outlook.jp';

    // メールの件名
    $subject = 'New Contact Form Submission';

    // メールの本文
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // ヘッダー
    $headers = "From: $email";

    // メールを送信
    $success = mail($to, $subject, $body, $headers);

    // レスポンスを返す
    if ($success) {
        echo json_encode(['status' => 'success', 'message' => 'Email sent successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email.']);
    }
} else {
    http_response_code(400);
    echo 'Invalid request method.';
}
?>
