<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

     @for ($i = 0; $i < 20; $i++)
        <?php echo DNS1D::getBarcodeHTML(rand(999,9999), 'C93'); ?>
        <br>

        @endfor
</body>
</html>
