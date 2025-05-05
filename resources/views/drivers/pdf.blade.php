<!DOCTYPE html>
<html>
<head>
    <title>Drivers Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Drivers Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>License Number</th>
                <th>Duty Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>{{ $driver->Name }}</td>
                    <td>{{ $driver->Age }}</td>
                    <td>{{ $driver->Address }}</td>
                    <td>{{ $driver->Contact_Number }}</td>
                    <td>{{ $driver->Gender }}</td>
                    <td>{{ $driver->License_number }}</td>
                    <td>{{ $driver->Duty_hours }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
