<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Aplikasi Perdin</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                background-color: #f4f6f9;
            }

            .login-card {
                width: 100%;
                max-width: 420px;
                border: none;
                border-radius: 16px;
            }

            .login-title {
                font-weight: 700;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">

            <div class="col-md-5">
                <div class="card shadow login-card">

                    <div class="card-body p-5">

                        <div class="text-center mb-4">
                            <h2 class="login-title">Login</h2>
                            <p class="text-muted mb-0">
                                Aplikasi Perjalanan Dinas
                            </p>
                        </div>

                        <form action="{{ route('action.login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    Username
                                </label>

                                <input
                                    type="text"
                                    name="username"
                                    class="form-control @error('username') is-invalid @enderror" 
                                    value="{{ old('username') }}"
                                    placeholder="Masukkan username"
                                >
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                Login
                            </button>

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>

    </body>
    @include('validations.notifications')
</html>
