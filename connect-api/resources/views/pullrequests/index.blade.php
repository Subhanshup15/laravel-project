<!DOCTYPE html>
<html>
<head>
    <title>24 Pull Requests Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">24 Pull Requests Users</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Profile URL</th>
                <th>Avatar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user['nickname'] ?? '-' }}</td>
                
                <td>
                    @if(!empty($user['github_profile']))
                        <a href="{{ $user['github_profile'] }}" target="_blank">{{ $user['github_profile'] }}</a>
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if(!empty($user['contributions_count']))
                        <img src="{{ $user['contributions_count'] }}" alt="contributions_count" width="50">
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No users found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
