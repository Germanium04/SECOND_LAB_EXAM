<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: sans-serif;
            background: #f0f7f0;
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 860px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 22px;
            font-weight: 500;
            color: #1a5c1a;
        }

        .btn-create {
            padding: 8px 16px;
            background: #2e7d2e;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s;
        }

        .btn-create:hover { background: #1f5e1f; }

        .table-wrap {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #c3dfc3;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead { background: #e8f5e8; }

        th {
            text-align: left;
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 500;
            color: #3b6e3b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #c3dfc3;
        }

        td {
            padding: 12px 16px;
            color: #1a3d1a;
            border-bottom: 1px solid #eaf4ea;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #f7fbf7; }

        .actions { display: flex; gap: 8px; align-items: center; }

        .btn-edit {
            padding: 5px 12px;
            background: #e8f5e8;
            color: #2e7d2e;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid #b8d8b8;
            transition: background 0.2s;
        }

        .btn-edit:hover { background: #d0ecd0; }

        .btn-delete {
            padding: 5px 12px;
            background: #fff0f0;
            color: #c0392b;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid #f5c6c6;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-delete:hover { background: #fcdcdc; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Student List</h1>
            <a href="{{ route('student.create') }}" class="btn-create">+ Add Student</a>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Grade</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $stud)
                    <tr>
                        <td>{{ $stud->id }}</td>
                        <td>{{ $stud->name }}</td>
                        <td>{{ $stud->email }}</td>
                        <td>{{ $stud->grade }}</td>
                        <td>{{ $stud->gender }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('student.edit', $stud->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('student.destroy', $stud->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>