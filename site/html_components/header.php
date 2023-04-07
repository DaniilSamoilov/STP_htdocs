<header class="py-3">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <a class="navbar-brand" href="/index.php">Точка общения</a>

        <div class="d-flex align-items-center">
            <form class="w-100 me-3" role="search" method="GET" action="/search.php">
                <input type="search" class="form-control" placeholder="Поиск" aria-label="Search">
            </form>

            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://clck.ru/343gZm" alt="Профиль" width="40" height="40" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <?php if (isset($_SESSION['user']['id'])) {
                    ?><li><a class="dropdown-item" href="/profile/">Профиль</a></li>
                    <?php } else {
                    ?><li><a class="dropdown-item" href="/authorization/">Войти</a></li>
                    <?php } ?>
                    <li><a class="dropdown-item" href="#">Личные сообщения</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/authorization/scripts/logout.php">Выйти</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>