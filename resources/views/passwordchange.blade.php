<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    <h1>パスワードの変更</h1>
    <hr>

    <form>
        <div>
            <label for="email">メールアドレス</label><br>
            <input type="email" id="email" name="email">
        </div>

        <br>

        <div>
            <label for="new-password">新しいパスワード</label><br>
            <input type="password" id="new-password" name="new-password">
        </div>

        <br>

        <div>
            <label for="confirm-password">再入力</label><br>
            <input type="password" id="confirm-password" name="confirm-password">
        </div>

        <br>
        <p>
            <button type="submit">パスワードを変更する</button>
        </p>
    </form>

</body>

</html>