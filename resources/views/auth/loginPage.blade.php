<form method="POST" action="{{ route('loginPage') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="doctor">Doctor</option>
        <option value="staff">Staff</option>
    </select>
    <button type="submit">Login</button>
</form>
