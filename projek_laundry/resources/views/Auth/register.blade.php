@extends('templating.template_login')

@section('judul_halaman', 'Register | SelSil Laundry')

@section('konten')
    <div class="card shadow-lg border-0 rounded-lg my-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-2">Buat Akun</h3></div>
        <div class="card-body">
            <form action="{{ route('register.submit') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                           name="name" placeholder="masukkan name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email" placeholder="name@gmail.com" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password minimal 8 karakter">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                    placeholder="Masukkan password minimal 8 karakter">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 d-grid mx-auto">
                    <input type="submit" class="btn btn-primary" value="Register">
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    
    
    
    
    