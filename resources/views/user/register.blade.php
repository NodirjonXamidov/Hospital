<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register page</title>
</head>
<body>
    <form action="{{route('register')}}" method="post">

        <label>Name</label>
        <input type="text" name="name" id="name">
        <label>Email</label>
        <input type="text" name="email" id="email">
        <label>Phone</label>
        <input type="number" name="phone" id="phone">
        <label>Address</label>
        <input type="text" name="address" id="address">
        <label>Password</label>
        <input type="text" name="password" id="password">

        <input type="submit" name="submit">




    </form>

</body>
</html>
