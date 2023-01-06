<!DOCTYPE html>
<html lang="en">

<head>
    <title>Global Health</title>
    <link rel="stylesheet" href="/css/roles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<body>
    <section class="hero">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Options
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Patient/patient_table.php">Patient</a>
                            <a class="dropdown-item" href="../Doctor/doctor_table.php">Doctor</a>
                            <a class="dropdown-item" href="../User/user.php">Users</a>
                            <a class="dropdown-item" href="../Region/region.php">Region</a>
                            <a class="dropdown-item" href="../Disease/disease.php">Disease</a>
                            <a class="dropdown-item" href="../Checkup/medical_check_up.php">Medical Check Up</a>
                            <a class="dropdown-item" href="../Treatment/treatment.php">Treatment</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Info_Data.php">20 Queries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="h-50 d-flex align-items-center justify-content-center">
            <h1>
                <span>Welcome</span>
                <div class="message">
                    <div class="word1">Admin</div>
                </div>
            </h1>
        </div>
    </section>
</body>

</html>