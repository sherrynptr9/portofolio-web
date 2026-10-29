<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card p-4 shadow-sm" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center fw-bold mb-4">Admin Login</h3>
        
        @if($errors->any())
            <div class="alert alert-danger p-2 text-center small">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100 fw-bold">Masuk</button>
        </form>
        <div class="text-center mt-3">
            <a href="/" class="text-decoration-none text-muted small">&larr; Kembali ke Website</a>
        </div>
    </div>

</body>
</html>