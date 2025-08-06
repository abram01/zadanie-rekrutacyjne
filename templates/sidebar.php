<?php $current = basename($_SERVER['SCRIPT_NAME']); ?>

<div class="d-flex flex-column flex-shrink-0 p-3 bg-light form" style="width: 280px; min-height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-6">
            <img src="https://widoczni.com/assets/1_logo/logo-widoczni/widoczni-logo.svg" class="d-block mx-auto" width="240px">
        </span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <h6 style='text-align: center;'>USER</h6>
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= $current === 'index.php' ? 'active' : 'link-dark' ?>">
                <i class="bi bi-house-door-fill fs-5 me-1"></i> Home
            </a>
        </li>
        <li>
            <a href="klient.php" class="nav-link <?= $current === 'klient.php' ? 'active' : 'link-dark' ?>">
                <i class="bi bi-people-fill fs-5 me-1"></i> Klienci
            </a>
        </li>
        <li>
            <a href="opiekun.php" class="nav-link <?= $current === 'opiekun.php' ? 'active' : 'link-dark' ?>">
                <i class="bi bi-person-heart fs-5 me-1"></i> Opiekunowie
            </a>
        </li>
        <hr>
        <h6 style='text-align: center;'>ADMIN</h6>
        <li>
            <a href="historia.php" class="nav-link <?= $current === 'historia.php' ? 'active' : 'link-dark' ?>">
                <i class="bi bi-calendar-date fs-5 me-1"></i> Historia
            </a>
        </li>
        <li>
            <a href="ustawienia.php" class="nav-link <?= $current === 'ustawienia.php' ? 'active' : 'link-dark' ?>">
                <i class="bi bi-gear-wide-connected fs-5 me-1"></i> Ustawienia
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
            <img src="../assets/img/oko.jpg" width="32" height="32" class="rounded-circle me-2">
            <strong>widoczni</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Nowy projekt</a></li>
            <li><a class="dropdown-item" href="#">Ustawienia</a></li>
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Wyloguj</a></li>
        </ul>
    </div>
</div>
