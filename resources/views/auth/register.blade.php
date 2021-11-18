<h1>{{ $title }}</h1>
<form action="/register" method="POST">
    @csrf
    <input type="text" name="username"  id="username" placeholder="username" required value="{{ old('username') }}"> <br> <br>
    <input type="password" name="password" id="password" placeholder="password" required> <br> <br>
    <select name="usertype" id="usertype" required>
        <option selected>Admin</option>
        <option>Super Admin</option>
    </select><br> <br>
    <input type="text" name="fullname" id="fullname" placeholder="fullname" required value="{{ old('fullname') }}"> <br> <br>
    <button type="submit">Register</button>
</form>

<small>Already registered? <a href="/login">Login</a></small>
