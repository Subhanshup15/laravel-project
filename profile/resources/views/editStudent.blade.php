<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


</head>
<div class="form-container">
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Important for update -->
        <input type="text" name="name" value="{{ $student->name }}" placeholder="Name" required>
        <input type="email" name="email" value="{{ $student->email }}" placeholder="Email" required>
        <input type="text" name="phone" value="{{ $student->phone }}" placeholder="Phone" required>
        <input type="submit" value="Update">
    </form>
</div>

<style>
    .form-container {
        width: 350px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    input[type="text"], input[type="email"] {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #2196F3;
        border: none;
        border-radius: 6px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0b7dda;
    }
</style>

</body>

</html>