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
    <h1>Historic Log Entries</h1>
    <table class="table">
        <tr>
            <th>Status</th>
            <th>Logged At</th>
        </tr>
        <?php foreach ($logEntries as $entry) : ?>
            <tr>
                <td><?=$entry['status']?></td>
                <td><?=$entry['lastUpdated']->format("H:i Y-m-d")?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
