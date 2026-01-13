<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Laravel Tasks</title>

    <!-- Bootstrap 5.3 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        .pagination .page-link {
            font-size: 12px;
            padding: 4px 8px;
        }
    </style>

</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('tasks.index') }}">
            Task Manager (Laravel + PostgreSQL)
        </a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>