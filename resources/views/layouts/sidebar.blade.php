<nav id="sidebar" class="sidebar">
    <style>
        .sidebar {
            width: 220px;
            background-color: #34495e;
            color: white;
            padding-top: 20px;
            height: calc(100vh - 60px - 50px); /* total height minus navbar & footer */
            position: fixed;
            top: 60px;
            left: 0;
            overflow-y: auto;
            transition: width 0.3s ease;
            z-index: 999;
            flex-shrink: 0;
        }
        .sidebar.collapsed {
            width: 60px;
        }
        .sidebar ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
        .sidebar ul li {
            margin: 12px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: background-color 0.2s ease;
            font-weight: 500;
            font-size: 15px;
        }
        .sidebar ul li a.active,
        .sidebar ul li a:hover {
            background-color: #1abc9c;
            color: white;
        }
    </style>

    <ul>
        <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Halaman Utama</a></li>
        <li><a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.*') ? 'active' : '' }}">Data Barang</a></li>
        <li><a href="{{ route('pemasukan.index') }}" class="{{ request()->routeIs('pemasukan') ? 'active' : '' }}">Pemasukan</a></li>
        <li>
    <a href="{{ route('pengeluaran.index') }}" class="{{ request()->routeIs('pengeluaran.*') ? 'active' : '' }}">
        Pengeluaran
    </a>
</li>  
    </ul>
</nav>
