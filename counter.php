<?php
session_start();

// カウンターのセッション変数が存在しない場合は初期化
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// 訪問数をインクリメント
$_SESSION['counter']++;

// 訪問数を取得して出力
echo $_SESSION['counter'];
?>
