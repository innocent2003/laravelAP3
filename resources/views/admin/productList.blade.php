<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>avatar</th>

    </tr>
    @foreach($user as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><img src="{{asset('storage/images/'.$user->avatar)}}" alt=""></td>
    </tr>
    @endforeach
</table>
</body>
</html>

