<!doctype html>
<html lang="ru">

<head>
    <meta charSet="utf-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, shrink-to-fit=no, viewport-fit=cover'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <style>
        html,
        body {
            background: #eee;
        }
    </style>
    <script src="https://yastatic.net/s3/passport-sdk/autofill/v1/sdk-suggest-with-polyfills-latest.js"></script>
</head>

<body>
<script>
    window.onload = function() {
        window.YaAuthSuggest.init({
                client_id: '8471a57681f1495eaf809713ac8d26e4',
                response_type: 'token',
                redirect_uri: 'https://oauth.yandex.ru/verification_code'
            },
            'https://examplesite.com', {
                view: 'button',
                parentId: 'container',
                buttonView: 'main',
                buttonTheme: 'light',
                buttonSize: 'm',
                buttonBorderRadius: 0
            }
        )
            .then(({handler}) => handler())
            .then(data => console.log('Сообщение с токеном', data))
            .catch(error => console.log('Обработка ошибки', error));
    };
</script>
</body>

</html>
