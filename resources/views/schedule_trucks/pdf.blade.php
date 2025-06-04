<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Schedule Truck Report</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h2>Schedule Truck Report</h2>

    <table>
        <thead>
            <tr>
                <th>Driver</th>
                <th>Truck</th>
                <th>Cargo</th>
                <th>Destination</th> <!-- Added Destination column -->
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->driver->Name ?? '-' }}</td>
                    <td>{{ $schedule->truck->Plate_number ?? '-' }}</td>
                    <td>{{ $schedule->cargo }}</td>
                    <td>{{ $schedule->destination ?? '-' }}</td> <!-- Displaying Destination -->
                    <td>{{ $schedule->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
