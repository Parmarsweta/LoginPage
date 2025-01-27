<form method="POST" action="{{ route('registration') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="doctor">Doctor</option>
        <option value="staff">Staff</option>
    </select>
    <button type="submit">Register</button>
</form>
