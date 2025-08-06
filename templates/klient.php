<?php
// === LOGOWANIE BŁĘDÓW ===
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error.log');
error_reporting(E_ALL);

// === POŁĄCZENIE Z BAZĄ ===
$host = 'localhost';
$db = 'widoczni_zadanie';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    error_log("Błąd połączenia: " . $e->getMessage());
    die("Błąd połączenia z bazą danych.");
}

// === ZAPYTANIE ===
$sql = "
    SELECT 
        k.id AS klient_id,
        k.nazwa AS klient_nazwa,
        o.id AS opiekun_id,
        o.nazwa AS opiekun_nazwa,
        o.status AS opiekun_status
    FROM klienci k
    LEFT JOIN relacje_opiekun_klient rok ON k.id = rok.id_klient
    LEFT JOIN opiekunowie o ON rok.id_opiekun = o.id
    ORDER BY k.nazwa
";

$stmt = $pdo->query($sql);
$results = $stmt->fetchAll();

// === GRUPOWANIE PO KLIENCIE ===
$klienci = [];
foreach ($results as $row) {
    $id = $row['klient_id'];
    if (!isset($klienci[$id])) {
        $klienci[$id] = [
            'nazwa' => $row['klient_nazwa'],
            'opiekunowie' => [],
        ];
    }
    if (!empty($row['opiekun_id'])) {
        $klienci[$id]['opiekunowie'][] = [
            'id' => $row['opiekun_id'],
            'nazwa' => $row['opiekun_nazwa'],
            'status' => $row['opiekun_status']
        ];
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Widoczni - zadanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="sidebars.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style-table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <main class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light form" style="width: 280px; min-height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <span class="fs-6">
                    <img src="https://widoczni.com/assets/1_logo/logo-widoczni/widoczni-logo.svg" class="d-block mx-auto" width="240px">
                </span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.html" class="nav-link link-dark">
                        <i class="bi bi-house-door-fill fs-5 me-1"></i> Home
                    </a>
                </li>
                <li>
                    <a href="klient.html" class="nav-link active">
                        <i class="bi bi-people-fill fs-5 me-1"></i> Klienci
                    </a>
                </li>
                <li>
                    <a href="opiekun.html" class="nav-link link-dark">
                        <i class="bi bi-person-heart fs-5 me-1"></i> Opiekunowie
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="oko.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>widoczni</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div class="flex-grow-1 p-4 mb-5 ms-5 me-5">
            <div class="content">
                <h2 class="active form"><i class="bi bi-people-fill fs-1 me-2"></i> Klienci</h2>
                <div class="table-responsive form">
                    <table id="tabela-klienci" class="table custom-table">
                        <thead>
                            <tr>
                                <th>ID klienta</th>
                                <th>Nazwa klienta</th>
                                <th>Opiekunowie</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($klienci as $klient_id => $klient): ?>
                                <tr>
                                    <td><?= htmlspecialchars($klient_id) ?></td>
                                    <td><?= htmlspecialchars($klient['nazwa']) ?></td>
                                    <td>
                                        <?php if (!empty($klient['opiekunowie'])): ?>
                                            <?php foreach ($klient['opiekunowie'] as $opiekun): ?>
                                                <?php
                                                    $btnClass = $opiekun['status'] === 'aktywny' ? 'btn-outline-success' : 'btn-outline-danger';
                                                ?>
                                                <a href="#" class="btn <?= $btnClass ?> btn-sm mb-1 me-1">
                                                    <?= htmlspecialchars($opiekun['nazwa']) ?>
                                                </a>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                        <?php endif; ?>
                                        <a href="#" class="btn btn-outline-success btn-sm mb-1 me-1">
                                            <i class="bi bi-plus-lg"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">Zobacz</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <a href="form_add_klient.php" class="btn btn-primary">Dodaj nowego klienta</a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sidebars.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="tabela.js"></script>
</body>
</html>
