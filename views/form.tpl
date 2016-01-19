<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stewie Filter Test</title>
</head>
<body>
    <form action="{_base_url_}/post" method="post">
        {csrf}
        <input name="email" placeholder="EMAIL" type="email">
        <input type="submit">
    </form>
</body>
</html>