<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Balanced Brackets</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">&nbsp;</div>
    <div class="row">
        <h3>Balanced Brackets</h3>
        <hr/>
        <br/>
        <h4>We say a sequence of brackets is valid if the following conditions are met:</h4>
        <ol>
            <li>It contains no unmatched brackets.</li>
            <li>The subset of brackets enclosed within the confines of a matched pair of brackets is also a matched pair of brackets.</li>
        </ol>
        <br/>
        <h4>Examples:</h4>
        <ul>
            <li>(){}[] is valid</li>
            <li>[{()}](){} is valid</li>
            <li>[]{() is not valid</li>
            <li>[{)] is not valid</li>
        </ul>
        <br/>

        <form action="validate.php" method="get">
            <div class="form-group">
                <label for="brackets">Please enter a sequence of brackets</label>
                <input type="text" class="form-control" id="brackets" name="brackets" placeholder="Sequence of brackets for validation">
                <small id="emailHelp" class="form-text text-muted">Follow the instructions above to inform a sequence of valid brackets</small>
            </div>
            <button type="submit" class="btn btn-primary">Validate brackets</button>
        </form>
    </div>
    <div class="row">&nbsp;</div>
    <div class="row"><h5>Entries log:</h5></div>
    <div class="row" id="entries"><?php echo nl2br(file_get_contents('entries.log')); ?></div>
</div>

</body>
</html>