<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #4a90e2;
            --dark: #0f172a;
            --bg: #f4f6f9;
        }

        body {
            background: var(--bg);
            font-family: Arial, sans-serif;
        }

        .navbar-custom {
            background: var(--dark);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
        }

        .card-dashboard {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            transition: 0.2s;
        }

        .card-dashboard:hover {
            transform: translateY(-2px);
        }

        .btn-main {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            display: inline-block;
            text-decoration: none;
        }

        .btn-main:hover {
            opacity: 0.9;
            color: white;
        }

        .btn-logout {
            background: #ef4444;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-logout:hover {
            opacity: 0.9;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: var(--dark);
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="navbar-custom">
        <h5 class="m-0">Sistema de Gestión de Productos</h5>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                Cerrar sesión
            </button>
        </form>
    </div>

    <div class="dashboard-container">

        <div class="card-dashboard mb-4">
            <div class="title">Panel principal</div>
            <div class="subtitle">
                Bienvenido al sistema de control de inventario y gestión de productos.
            </div>
        </div>

        <div class="grid">

            <div class="card-dashboard">
                <h5>Productos</h5>
                <p>Gestiona inventario, estados y lotes de productos.</p>
                <a href="{{ route('products.index') }}" class="btn-main">
                    Ver productos
                </a>
            </div>

            <div class="card-dashboard">
                <h5>Crear producto</h5>
                <p>Registra nuevos productos en el sistema.</p>
                <a href="{{ route('products.create') }}" class="btn-main">
                    Crear producto
                </a>
            </div>

        </div>

    </div>

</body>
</html>