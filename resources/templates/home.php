<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP Dublin Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <p class="text-center" style="margin-top: 20px;">
            The PHP Dublin website is <strong><?=$status?></strong>
        </p>
        <p class="text-center">
            <small>Last updated <em><?=$lastUpdated->format("g:ia jS M Y")?></em></small>
        </p>
    </div>

</body>
</html>
