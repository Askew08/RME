{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-dropdown title="Admin" icon="la la-user" data-pan="menu-item-user">
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Dokter" icon="la la-question" :link="backpack_url('dokter')" />
    <x-backpack::menu-dropdown-item title="Reservasi " icon="la la-question" :link="backpack_url('reservasi')" />
    <x-backpack::menu-dropdown-item title="Kode Tindakan" icon="la la-question" :link="backpack_url('kode-tindakan')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Pasien" icon="la la-user" data-pan="menu-item-user">
    <x-backpack::menu-dropdown-item title="Pendaftaran Pasien" icon="la la-user-md" :link="backpack_url('pasien')" />
    <x-backpack::menu-dropdown-item title="Rawat jalan" icon="la la-question" :link="backpack_url('rawat-jalan')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Pemeriksaan" icon="la la-user" data-pan="menu-item-user">
    <x-backpack::menu-dropdown-item title="Pemeriksaan Perawat" icon="la la-question" :link="backpack_url('pemeriksaan-perawat')" />
    <x-backpack::menu-dropdown-item title="Pemeriksaan Dokter" icon="la la-question" :link="backpack_url('pemeriksaan-dokter')" />
    <x-backpack::menu-dropdown-item title="Pemeriksaan Labs" icon="la la-question" :link="backpack_url('pemeriksaan-lab')" />
    <x-backpack::menu-dropdown-item title="Peresepan" icon="la la-question" :link="backpack_url('resep')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Obat" icon="la la-user" data-pan="menu-item-user">
    <x-backpack::menu-dropdown-item title="Obat" icon="la la-question" :link="backpack_url('obat')" />
    <x-backpack::menu-dropdown-item title="Detail resep" icon="la la-question" :link="backpack_url('detail-resep')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Rekam Medis" icon="la la-question" :link="backpack_url('rekam-medis')" />
