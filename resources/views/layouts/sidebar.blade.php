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

<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('items.index') }}">Data Barang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pemasukan.index') }}">Pemasukan Stok</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengeluaran.index') }}">Pengeluaran Stok</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('laporan.index') }}">Laporan Stok</a>
</li>
</ul>
</nav>
