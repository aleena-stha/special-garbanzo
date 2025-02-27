<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update form</h1>
    <form action="/update" method="post" enctype="multipart/form-data">
    <!-- <form action="{{ route('registration') }}" method="post"> use this way if we give name to our route -->
        @csrf 
        
        <input type="hidden" name="id" value="{{ $student->id }}">

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $student->name }}">

        </div>
        <div>
            <label>Address:</label>
            <input type="text" name="add" value="{{ $student->add }}">
            
        </div>
        <div>
            <label>Gender:</label>
            <select name='gender' >
                <option value="2" @if($student->gender ==2) selected @endif>Male</option>
                <option value="1" @if($student->gender ==1) selected @endif>Female</option>
                <option value="0" @if($student->gender ==0) selected @endif>N/A</option>
            </select>
        </div>
        <div>
            <label>DOB:</label>
            <input type="date" name="date" value="{{ $student->dob }}">
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $student->email }}">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>

        <div>
        <label>Current Photo:</label>
        <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="100">
        </div>

        <div>
            <label>Photo:</label>
            <input type="file" name="photo">
        </div>
        <div>
            <input type="submit" name="update" value='Update'>
        </div>
    </form>
</body>
</html>