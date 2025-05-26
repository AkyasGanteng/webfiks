<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>

    <style>
        /* Reset & base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        html, body {
            height: 100%;
            background-color: #f5f7fa;
            color: #333;
        }

        /* Layout wrapper */
        .wrapper {
            display: flex;
            margin-top: 60px; /* navbar height */
            margin-bottom: 50px; /* footer height */
            min-height: calc(100vh - 110px);
        }

        main.main-content {
            flex-grow: 1;
            padding: 25px 30px;
            background-color: #ecf0f1;
            overflow-y: auto;
            border-radius: 0 10px 10px 0;
            margin-left: 220px; /* sidebar width */
            transition: margin-left 0.3s ease;
        }
        main.main-content.sidebar-collapsed {
            margin-left: 60px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                margin-top: 60px;
                margin-bottom: 0;
                min-height: auto;
            }
            main.main-content {
                margin-left: 0 !important;
                border-radius: 0;
                padding: 15px;
            }
            nav.sidebar {
                position: relative;
                height: auto !important;
                width: 100% !important;
            }
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <div class="wrapper">
        @include('layouts.sidebar')

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnToggle = document.getElementById('btn-toggle-sidebar');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('main.main-content');

            btnToggle.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('sidebar-collapsed');
            });
        });
    </script>

</body>
</html>
