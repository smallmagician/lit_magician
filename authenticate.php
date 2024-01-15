<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータを受け取る
    $password = $_POST['password'];

    // 初期の管理者パスワード
    $initialPassword = 'admin-github';

    // パスワードの認証
    if ($password === $initialPassword) {
        // 認証成功の場合はセッションに認証情報を保存
        $_SESSION['authenticated'] = true;
        echo 'Authentication successful.';
    } else {
        http_response_code(401); // Unauthorized
        echo 'Authentication failed.';
    }
} else {
    http_response_code(400);
    echo 'Invalid request method.';
}
?>
