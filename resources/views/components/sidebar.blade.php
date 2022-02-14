<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="{{ asset((setting('logo')) ? '/storage/'.setting('logo') : 'dist/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <x-nav-link text="Dashboard" icon="tachometer-alt" url="{{ route('admin.dashboard') }}"
        active="{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}" />
    <x-nav-link text="Warung" icon="fas fa-store" url="{{ route('admin.warung') }}"
        active="{{ request()->routeIs('admin.warung') ? ' active' : '' }}" />

    <hr class="sidebar-divider mb-0">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
            aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Kelola Barang</span>
        </a>
        <div id="collapseForm" class="collapse
        @if (request()->is('admin/barang') || request()->is('admin/kategori'))
        show
        @endif">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item{{ request()->is('admin/barang') ? ' active' : '' }}"
                    href="{{ route('admin.barang') }}">
                    <i class="fas fa-piggy-bank"></i>
                    <span>Barang</span></a>
                <a class="collapse-item{{ request()->is('admin/kategori') ? ' active' : '' }}"
                    href="{{ route('admin.kategori') }}">
                    <i class="fas fa-tags"></i>
                    <span> Kategori</span></a>
            </div>
        </div>
    </li>


    <hr class="sidebar-divider mb-0">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
            aria-controls="collapse1">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapse1" class="collapse
        @if (request()->is('admin/pembelian') || request()->is('admin/pembelian'))
        show
        @endif"aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                <a class="collapse-item{{ request()->is('admin/pembelian') ? ' active' : '' }}"
                    href="{{ route('admin.pembelian') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pembelian</span></a>
                <a class="collapse-item{{ request()->is('admin/pembelian') ? ' active' : '' }}"
                    href="{{ route('admin.pembelian') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Penjualan</span></a>
                <a class="collapse-item{{ request()->is('admin/harga') ? ' active' : '' }}"
                    href="{{ route('admin.harga') }}">
                    <i class="fas fa-money-bill"></i>
                    <span> Harga</span></a>
                <a class="collapse-item{{ request()->is('admin/pembayaran') ? ' active' : '' }}"
                    href="{{ route('admin.pembayaran') }}">
                    <i class="fas fa-cash-register"></i>
                    <span>Pembayaran</span></a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider mb-0">

    @can('member-list')
    <x-nav-link text="Member" icon="users" url="{{ route('admin.member') }}"
        active="{{ request()->routeIs('admin.member') ? ' active' : '' }}" />
    @endcan

    @can('role-list')
    <x-nav-link text="Roles" icon="th-list" url="{{ route('admin.roles') }}"
        active="{{ request()->routeIs('admin.roles') ? ' active' : '' }}" />
    @endcan

    <hr class="sidebar-divider mb-0">

    @can('setting-list')
    <x-nav-link text="Settings" icon="cogs" url="{{ route('admin.settings') }}"
        active="{{ request()->routeIs('admin.settings') ? ' active' : '' }}" />
    @endcan

</ul>
