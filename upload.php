<?php
// サーバーサイドでのアップロード処理

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/'; // アップロード先のディレクトリ
    $uploadedFile = $uploadDir . basename($_FILES['image']['name']); // アップロードされたファイルの保存先

    // 画像のアップロード
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
        // アップロード成功時の処理（データベースへの保存など）

        // レスポンスデータを作成
        $responseData = [
            'imageUrl' => $uploadedFile,
            'description' => $_POST['description']
        ];

        // レスポンスデータをJSON形式で返す
        header('Content-Type: application/json');
        echo json_encode($responseData);
    } else {
        // アップロード失敗時の処理
        http_response_code(500); // サーバーエラー
        echo 'Error uploading file.';
    }
} else {
    // POSTリクエストでない場合
    http_response_code(400); // バッドリクエスト
    echo 'Invalid request method.';
}
?>
