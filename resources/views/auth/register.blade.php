<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Name</label>
                                <input type="text" class="form-control" id="floatingInput" name="name"
                                    placeholder="John Doe">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Username</label>
                                <input type="text" class="form-control" id="floatingInput" name="username"
                                    placeholder="Mark290">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingInput">Email</label>
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="YourEmail@example.com">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingPassword">Password</label>
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-floating mb-3">
                                <label for="floatingPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="floatingPassword"
                                    name="password_confirmation" placeholder="Type your password again">
                            </div>

                            {{-- <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div> --}}
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                    type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
