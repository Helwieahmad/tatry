@props(['activePage'])

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark bg-white" id="sidenav-main">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <hr class="horizontal light mt-0">
        <li class="nav-item">
            <a href="#" class="nav-link text-white"role="button" aria-expanded="false">
                <i class="material-icons-round">dashboard</i>
                <span class="nav-link-text ms-2 ps-1">Dashboards</span>
            </a>
        </li>
    <li class="nav-item mt-3">
        <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">Menu Profile</h6>
    </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#profile-saya" class="nav-link text-white" aria-controls="profile-saya" role="button" aria-expanded="false">
                <i class="fa fa-id-badge" aria-hidden="true"></i>
                <span class="nav-link-text ms-2 ps-1">Profile Saya</span>
            </a>
            <div class="collapse" id="profile-saya">
                <ul class="nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <span class="sidenav-mini-icon"> EP </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Edit Profile <b class="caret"></b></span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    <li class="nav-item mt-3">
        <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">Menu Kordinator</h6>
    </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#Kordinator" class="nav-link text-white collapsed" aria-controls="Kordinator" role="button" aria-expanded="false">
                <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">group</i>
                <span class="nav-link-text ms-2 ps-1">Data Kordinator</span>
            </a>
            <div class="collapse" id="Kordinator" style="">
                <ul class="nav ">

                    <li class="nav-item  ">
                        <a class="nav-link text-white" href="/cordinator">
                                <span class="sidenav-mini-icon"> DK </span>
                                <span class="sidenav-normal  ms-2  ps-1">Data Koordinator </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    <li class="nav-item mt-3">
        <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">Menu Pemilih</h6>
    </li>
        <li class="nav-item">
            <a data-bs-toggle="collapse" href="#pemilih" class="nav-link text-white " aria-controls="pemilih" role="button" aria-expanded="false">
                <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">border_color</i>
                <span class="nav-link-text ms-2 ps-1">Data Pemilih</span>
            </a>
            <div class="collapse  " id="pemilih">
                <ul class="nav ">
                    <li class="nav-item ">
                        <a class="nav-link text-white " href="/pemilih">
                            <span class="sidenav-mini-icon"> DP </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Data Pemilih </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">Menu Alamat dan TPS</h6>
        </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#alamat" class="nav-link text-white " aria-controls="alamat" role="button" aria-expanded="false">
                    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">home</i>
                    <span class="nav-link-text ms-2 ps-1">Alamat dan TPS</span>
                </a>
                <div class="collapse  " id="alamat">
                    <ul class="nav ">
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="/tps">
                                <span class="sidenav-mini-icon"> TPS </span>
                                <span class="sidenav-normal  ms-2  ps-1">TPS </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="/kabupaten">
                                <span class="sidenav-mini-icon"> DK </span>
                                <span class="sidenav-normal  ms-2  ps-1">Data Kabupaten </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="/kecamatan">
                                <span class="sidenav-mini-icon"> DK </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Data Kecamatan </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="/desa">
                                <span class="sidenav-mini-icon"> DD </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Data Desa </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="/rt">
                                <span class="sidenav-mini-icon"> RT </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Data RT </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-white " href="/rw">
                                <span class="sidenav-mini-icon"> RW </span>
                                <span class="sidenav-normal  ms-2  ps-1"> Data RW </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

    </ul>
    </div>
    </li>
    </ul>
    </div>
</aside>
