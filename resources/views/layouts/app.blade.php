<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <style>
        body {
            display: flex;
            height: 100vh;
            flex-direction: column;
        }
        .content-wrapper {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 0px;
            text-align: center;
            margin-top: 2px; 
            margin-bottom: 2px;
        }
    </style>
</head>
<body>

    {{-- <header class="navbar navbar-dark bg-dark">
        <a class="navbar-brand ms-3" href="#">My Application</a>
        <div class="navbar-nav">
            <a class="nav-link" href="#">Profile</a>
            <a class="nav-link" href="#">Logout</a>
        </div>
    </header> --}}

    <div class="content-wrapper">
        <aside class="sidebar p-3">
            <h4 class="text-center">Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('locations.content') }}" id="locations-link">Locations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('items.content') }}" id="items-link">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transactions.content') }}" id="transactions-link">Transactions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reports.content')}}" id="reports-link">Reports</a>
                </li>
            </ul>
        </aside>

        <main id="main-content" class="main-content">
            @yield('content')
        </main>
    </div>

    <footer>
        <h6 class="mt-2">&copy; 2024 My Application. All rights reserved.</h6>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('.sidebar a[href="{{ route('locations.content') }}"]').addEventListener('click', function (e) {
            e.preventDefault();
            fetch("{{ route('locations.content') }}")
                .then(response => response.text())
                .then(html => {
                    document.getElementById('main-content').innerHTML = html;
                })
                .catch(error => console.warn('Error loading content:', error));
            });

            document.querySelector('.sidebar a[href="{{ route('items.content') }}"]').addEventListener('click', function (e) {
            e.preventDefault();
            fetch("{{ route('items.content') }}")
                .then(response => response.text())
                .then(html => {
                    document.getElementById('main-content').innerHTML = html;
                })
                .catch(error => console.warn('Error loading content:', error));
            });

            document.querySelector('.sidebar a[href="{{ route('transactions.content') }}"]').addEventListener('click', function (e) {
            e.preventDefault();
            fetch("{{ route('transactions.content') }}")
                .then(response => response.text())
                .then(html => {
                    document.getElementById('main-content').innerHTML = html;
                })
                .catch(error => console.warn('Error loading content:', error));
            });

            document.querySelector('.sidebar a[href="{{ route('reports.content') }}"]').addEventListener('click', function (e) {
            e.preventDefault();
            fetch("{{ route('reports.content') }}")
                .then(response => response.text())
                .then(html => {
                    document.getElementById('main-content').innerHTML = html;
                })
                .catch(error => console.warn('Error loading content:', error));
            });
        });
        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
