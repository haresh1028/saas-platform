<div class="mb-3">
    <strong>Name:</strong> {{ $user->name }}<br>
    <strong>Email:</strong> {{ $user->email }}<br>
    <strong>Role:</strong>
    <span class="badge {{ $user->role === 'Admin' ? 'bg-danger' : 'bg-secondary' }}">
        {{ $user->role ?? 'User' }}
    </span><br>
    <strong>Member Since:</strong> {{ optional($user->created_at)->format('M d, Y') ?? 'N/A' }}

</div>
