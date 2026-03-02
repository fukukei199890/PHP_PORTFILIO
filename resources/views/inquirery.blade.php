<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    <div>
        <h1>お問い合わせ</h1>

        <p>
            サービスに関するお問い合わせは、以下のフォームよりご連絡ください。
        </p>


        <p>当社サービスに関するご質問・ご相談は、下記フォームよりお問い合わせください。 内容確認後、担当よりご連絡いたします。
            ※通常2〜3営業日以内にご返信いたします。 ※内容によっては回答いたしかねる場合がございます。
        </p>


        <form method="" action="#">

            <div>
                <label for="message">お問い合わせ内容</label><br>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <div>
                <button type="submit">送信する</button>
            </div>
        </form>
    </div>

</body>

</html>