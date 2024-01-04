<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - {{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <main>

        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card my-5">
                        <div class="card-header">
                            <div class="text-center">

                                <h4>Admin</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            
                    <form method="post" action="{{ url('admin/login-process') }}">
                        @csrf

                        @if(session()->has('back_msg'))
                            <div class="alert alert-danger"> {{ session()->get('back_msg') }}</div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="email" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="text-center">

                            <button type="submit" class="btn-dm-sm btn-dm-primary">Submit</button>
                        </div>
                    </form>
                </div>
                
                </div>
                    </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>