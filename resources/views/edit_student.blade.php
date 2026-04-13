<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: sans-serif;
            background: #f0f7f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #c3dfc3;
            padding: 2rem;
            width: 100%;
            max-width: 460px;
        }

        h1 {
            font-size: 20px;
            font-weight: 500;
            color: #1a5c1a;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #dceadc;
        }

        .field { margin-bottom: 1rem; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #3b6e3b;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #b8d8b8;
            border-radius: 8px;
            font-size: 14px;
            color: #1a3d1a;
            background: #f7fbf7;
            outline: none;
            appearance: none;
            transition: border-color 0.2s, background 0.2s;
        }

        input:focus, select:focus {
            border-color: #2e7d2e;
            background: #fff;
        }

        select { cursor: pointer; }

        .btn {
            width: 100%;
            margin-top: 1.25rem;
            padding: 10px;
            background: #2e7d2e;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn:hover { background: #1f5e1f; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Edit Student Detail</h1>

        <form method="POST" action="{{ route('student.update', $student->id) }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Name</label>
                <input type="text" name="name" value="{{ $student->name }}">
            </div>

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" value="{{ $student->email }}">
            </div>

            <div class="field">
                <label>Grade</label>
                <input type="number" name="grade" value="{{ $student->grade }}">
            </div>

            <div class="field">
                <label>Gender</label>
                <select name="gender">
                    <option value="" disabled>Select gender</option>
                    <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <button type="submit" class="btn">Update Student</button>
        </form>
    </div>
</body>
</html>