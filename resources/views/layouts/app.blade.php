<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #4a90e2;
            --dark: #0f172a;
            --light-bg: #f4f6f9;
            --card-bg: #ffffff;
            --border: #e5e7eb;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--light-bg);
            color: var(--dark);
        }

        /* HEADER */
        .app-header {
            background: var(--dark);
            color: white;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .app-header h1 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        /* LOGOUT BUTTON */
        .btn-logout {
            background: #ef4444;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-logout:hover {
            opacity: 0.9;
        }

        /* CONTAINER */
        .app-container {
            max-width: 1100px;
            margin: 20px auto;
            padding: 20px;
            background: var(--card-bg);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* LINKS */
        a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        /* CARDS */
        .card-product {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            background: #fff;
            transition: 0.2s ease-in-out;
        }

        .card-product:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        /* STATUS BADGES */
        .status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-available {
            background: #e0f2fe;
            color: #0369a1;
        }

        .status-reserved {
            background: #fef3c7;
            color: #92400e;
        }

        /* BUTTON */
        .btn-primary-soft {
            background: var(--primary-blue);
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
        }

        .btn-primary-soft:hover {
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .app-container {
                margin: 10px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="app-header">

        <h1>Sistema de Gestión de Productos</h1>

        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="btn-logout">
                Cerrar sesión
            </button>
        </form>

    </div>

    <div class="app-container">
        @yield('content')
    </div>

</body>
</html>