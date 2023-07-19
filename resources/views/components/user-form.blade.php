<form action="{{ $action }}" method="post" >
    @if($user)
        @method('patch')
    @endif
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Enter your name:</label>
        <input id="name" type="text" name="name" class="form-control"
               value="{{ old('name') ?? $user?->name }}" required />
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Enter your email:</label>
        <input id="email" class="form-control" type="text" name="email"
               value="{{ old('email') ?? $user?->email }}" required/>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Enter your password:</label>
        <input id="password" class="form-control" type="password" name="password"
               value="{{ old('password') }}" required/>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Enter your password again:</label>
        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
               value="{{ old('password_confirmation') }}" required/>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-secondary">Submit</button>
    </div>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
