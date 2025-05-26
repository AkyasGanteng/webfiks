<header class="navbar">
    <style>
        .navbar {
            background-color: #2c3e50;
            color: white;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar-left {
            display: flex;
            align-items: center;
        }
        #btn-toggle-sidebar {
            font-size: 26px;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            margin-right: 20px;
            user-select: none;
        }
        .brand {
            font-weight: 700;
            font-size: 1.3rem;
            text-decoration: none;
            color: white;
        }
        .user-menu {
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            user-select: none;
        }
        .user-name {
            font-weight: 600;
        }
        .dropdown-btn {
            background: none;
            border: none;
            color: white;
            font-size: 12px;
            cursor: pointer;
            user-select: none;
        }
        .dropdown {
            position: relative;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #34495e;
            min-width: 140px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            z-index: 1001;
        }
        .dropdown-content a,
        .dropdown-content form button {
            display: block;
            padding: 12px 15px;
            color: white;
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
        }
        .dropdown-content a:hover,
        .dropdown-content form button:hover {
            background-color: #1abc9c;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

    <div class="navbar-left">
        <button id="btn-toggle-sidebar" aria-label="Toggle sidebar">&#9776;</button>
        <a href="{{ route('dashboard') }}" class="brand">MyApp</a>
    </div>

    <div class="user-menu dropdown">
        <span class="user-name">{{ auth()->user()->name ?? 'User' }}</span>
        <button class="dropdown-btn" aria-haspopup="true">&#x25BC;</button>
        <div class="dropdown-content" aria-label="User menu">
            <a href="#">Profile</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</header>
