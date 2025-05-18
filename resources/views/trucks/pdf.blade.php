<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Truck List</title>
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
    <h2>Truck List</h2>

    <table>
        <thead>
            <tr>
                <th>Plate Number</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trucks as $truck)
                <tr>
                    <td>{{ $truck->Plate_number }}</td>
                    <td>{{ $truck->Brand }}</td>
                    <td>{{ $truck->Model }}</td>
                    <td>{{ $truck->color }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
