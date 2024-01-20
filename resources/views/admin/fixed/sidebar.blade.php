<div id="adminPanel">

    <div id="sidebar">
        <ul>
            <li><button  id="kontaktButton" id="defaultOpen" class="tablinks {{ request()->is('/admin') ? active : '' }} "><i class="fa fa-envelope"></i> Poruke <span id="spanContactNumber">{{$contactNumber}}</span></button></li>
            <li class="buttonAdminContact" ><a target="_self" rel="follow" href="{{ url('admin/contact')}}"><i class="fa fa-minus"></i> Prikaz</a></li>
            <li class="buttonAdminContact" ><a target="_self" rel="follow" href="{{ url('admin/contact/send')}}"><i class="fa fa-minus"></i> Slanje</a></li>
            <li><button  id="ProjectButton" class="{{ request()->is('/admin/service') ? active : '' }}  tablinks"><i class="fa fa-folder-open"></i> Usluge</button></li>
            <li class="buttonAdminProject" ><a target="_self" rel="follow" href="{{ url('admin/service')}}"><i class="fa fa-minus"></i> Prikaz</a></li>
            <li class="buttonAdminProject" ><a target="_self" rel="follow" href="{{ url('admin/service/insert')}}"><i class="fa fa-minus"></i> Dodavanje</a></li>
            <li><button  id="PackageButton" class="{{ request()->is('/admin/package') ? active : '' }}  tablinks"><i class="fa fa-folder-open"></i> Paketi</button></li>
            <li class="buttonAdminPackage" ><a target="_self" rel="follow" href="{{ url('admin/package')}}"><i class="fa fa-minus"></i> Prikaz</a></li>
            <li><button  id="GalleryButton" class="{{ request()->is('/admin/gallery') ? active : '' }}  tablinks"><i class="fa fa-picture-o"></i> Galerija</button></li>
            <li class="buttonAdminGallery"><a target="_self" rel="follow" href="{{ url('admin/gallery')}}"><i class="fa fa-minus"></i> Prikaz</a></li>
            <li class="buttonAdminGallery"><a target="_self" rel="follow" href="{{ url('admin/gallery/insert')}}"><i class="fa fa-minus"></i> Dodavanje</a></li>
            <li><button  id="UserButton" class="tablinks"><i class="fa fa-user"></i> Korisnici</button></li>
            <li class="buttonAdminUser"><a target="_self" rel="follow" href="{{ url('admin/user')}}"><i class="fa fa-minus"></i> Prikaz</a></li>
            <li class="buttonAdminUser"><a target="_self" rel="follow" href="{{ url('admin/user/insert')}}"><i class="fa fa-minus"></i> Dodavanje</a></li>
            <li class="buttonAdminUser"><a target="_self" rel="follow" href="{{ url('admin/user/key')}}"><i class="fa fa-minus"></i> Ključ</a></li>
        </ul>

        <div id="sidebarLogo">
            <img src="{{ asset('images/markomilivojevicblack.webp')}}" alt="Marko Milivojevic" />
        </div>
    </div>
