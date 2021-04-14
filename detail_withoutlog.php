<?php
require_once("funcs.php");



$pdo = db_conn();
$id = $_GET['id'];

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=' . $id . ';');
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($status);
}else{
   
    $result = $stmt->fetch();

}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>データ登録</title>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

  
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="select_withoutlog.php">閲覧のみ</a></div>
            </div>
        </nav>
    </header>

    
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
            <p>書籍名：<?= $result['bookname'] ?></p>
            <p>書籍URL：<?= $result['bookurl'] ?></p>
            <p>コメント：<?= $result['bookcomment'] ?></p>
            <input type="hidden" name="id" value="<?= $result['id'] ?>">

            <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン画面へ</a></div>
            </fieldset>
        </div>
    </form>
 


</body>

</html>