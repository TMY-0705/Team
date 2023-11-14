<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/data_insert.css">
    <script src="../js/postcode.js"></script>
    <title>Document</title>
</head>
<body>
  <form name="contact" action="">
        
        <img src="../img/note-only.png" class="home" width="70" height="70">
        <div>
        <h1>アカウント情報を編集</h1>
        <p class="char">名前</p>
        <input type="text" name="name" class="text">
        <p class="char">メールアドレス</p>
        <input type="text" name="mail" class="text">
        <p class="char">パスワード</p>
        <input type="password" name="pass1" class="text">
        <p class="char">もう一度パスワードを入力してください</p>
        <input type="password" name="pass2" class="text">
        <p class="char">郵便番号</p>
        <input type="text" name="postcode" class="postcode">
        <p id="error"></p>
        <p class="char">都道府県・市区町村</p>
        <input type="text" name="prefecture" class="text">
        <p class="char">丁目・番地・号</p>
        <input type="text" name="town" class="text">
        <p class="char">建物名・部屋番号</p>
        <input type="text" name="house" class="text"><br>
        <input type="button" class="insert_button" onclick="location.href='!#'" value="編集する">
        </form>
      </div>
</body>
</html>