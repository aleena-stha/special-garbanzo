<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.blade.php" method="post">
        <label>Username</label> <input type="text" name="username">
        <label>password</label> <input type="text" name="password">
        <input type="submit" name="login">

        <?php
            $name = ['ashish', 'sandesh', 'bigyan'];
            $number = 99;
        ?>

        @foreach($name as $name)
            <h1>
                <ul>
                    <li>{{ $name }}</li>
                </ul>
            </h1>
        @endforeach

       

        @if($number>100) it is greater
        @else not greater
        @endif
    </form>
</body>
</html>