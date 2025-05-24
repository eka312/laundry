@extends('templating.template_login')

@section('judul_halaman', 'Login | My Portfolio')

@section('konten')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-2">Login</h3></div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="name@example.com" >
                        @error('email')
                        <div class="invalid-feedback">
                            tidak valid
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                        @error('password')
                        <div class="invalid-feedback">
                            tidak valid
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
                            <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                        </div>
                    </div>
                    <div class="mb-3 d-grid mx-auto ">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
           
@endsection
    
    
    
    
    