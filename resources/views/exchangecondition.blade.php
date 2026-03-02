<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>交換確認画面</title>
</head>

<body>

    <div>
        <h2>交換を完了してよろしいですか？</h2>

        <form>
            <div>
                <button type="submit">はい</button>
            </div>

            <br>

            <div>
                <button type="button">いいえ</button>
            </div>
        </form>
    </div>
</body>

</html>