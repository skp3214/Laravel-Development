<h1>Form Validation Demo</h1>
<form action="/validate" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter your name" value={{ old('name') }} />
    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}">
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <input type="text" name="password" placeholder="Enter your password" value="{{ old('password') }}">
    @error('password')
        <div>{{ $message }}</div>
    @enderror
    <input type="submit" value="Submit">

</form>

