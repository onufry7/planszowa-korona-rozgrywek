<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Email with access token for registration') }}</title>
</head>

<body>
    <h2>{{ config('app.name') }}</h2>
    <p>{{ __('Click the link to access registration on the website:') }}</p>
    <a href="{{ $accessToken->url . '?token=' . $accessToken->token }}">{{ $accessToken->url . '?token=' . $accessToken->token }}</a>
    <p>{{ __('Link active until: :time or registration on the website.', ['time' => $accessToken->expires_at]) }}</p>
</body>

</html>
