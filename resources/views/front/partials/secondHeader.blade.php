<div id="pageDesc">

    <div class="wrapper">
        <h1> @yield('page') </h1>
        <div class="line {{ request()->is('zaboravljenaLozinka') ? 'lineLeft' : '' }} {{ request()->is('obnavljanjeLozinke') ? 'lineLeft' : '' }} " id="lineHeader"></div>
    </div>
</div>
