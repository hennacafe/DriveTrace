<!DOCTYPE html>
<html>
<head>
    <title>Pending Users</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #ddd; }
        img { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; }
    </style>
</head>
<body>
    <h2>Pending Users List</h2>
    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingUsers as $user)
            <tr>
                <td>
                    <!-- Check if the user has an avatar -->
                    @if($user->avatar && file_exists(public_path('storage/' . $user->avatar)))
                        <!-- Use the absolute path to the avatar for PDF -->
                        <img src="{{ public_path('storage/' . $user->avatar) }}" alt="Avatar" />
                    @else
                        <!-- Default avatar image -->
                        <img src="{{ public_path('images/avatar.png') }}" alt="Default Avatar" />
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
