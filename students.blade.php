<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{session('success')}}
    <h1>Students</h1>
    

    @foreach($students2 as $student)
    <div>

    {{$student->name}}
    {{$student->add}}
    <a href="/delete/{{$student->id}}">Delete</a>
    <a href="/update/{{$student->id}}">Update</a>

    </div>
    @endforeach
</body>
</html>