<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f7fa; */
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 2500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #fff;
            background-color: #28a745; /* Success color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 20px;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 20px;
            font-family: "Times New Roman", Times, serif;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .h1 {
            color: blue;
            font-family: "PT Serif", serif;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="h1">Index Form Registration</h1>

        

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Source</th>
                    <th>Handled</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>University</th>
                    <th>Intake</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Level</th>
                    <th>Course</th>
                    <th>Processing</th>
                    <th>English</th>
                    <th>GPA</th>
                    <th>Passed</th>
                    <th>Document</th>
                    <th>Remarks</th>
                    <th>Initiated</th>
                    <th>Offer</th>
                    <th>Interview</th>
                    <th>Visa</th>
                    <th>Noc</th>
                    <th>Fees</th>
                    <th>Amount</th>
                    <th>Scholarship</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                <tr>
                    <td>{{ $form->id }}</td>
                    <td>{{ $form->source }}</td>
                    <td>{{ $form->handled }}</td>
                    <td>{{ $form->name }}</td>
                    <td>{{ $form->phone }}</td>
                    <td>{{ $form->university }}</td>
                    <td>{{ $form->intake }}</td>
                    <td>{{ $form->email }}</td>
                    <td>{{ $form->country }}</td>
                    <td>{{ $form->level }}</td>
                    <td>{{ $form->course }}</td>
                    <td>{{ $form->processing }}</td>
                    <td>{{ $form->english }}</td>
                    <td>{{ $form->gpa }}</td>
                    <td>{{ $form->passed }}</td>
                    <td>{{ $form->document }}</td>
                    <td>{{ $form->remarks }}</td>
                    <td>{{ $form->initiated }}</td>
                    <td>{{ $form->interview }}</td>
                    <td>{{ $form->visa }}</td>
                    <td>{{ $form->noc }}</td>
                    <td>{{ $form->fees }}</td>
                    <td>{{ $form->amount }}</td>
                    <td>{{ $form->scholarship }}</td>
                    <td>{{ $form->offer }}</td>
                    <td>
                        <a href="{{ route('form.edit', $form->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('form.destroy', $form->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Optional: Bootstrap JS & dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
