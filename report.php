<!DOCTYPE html>
<html lang="so">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports | </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <header>
        <h1><i class="fa-solid fa-screwdriver-wrench"></i> Repair System</h1>
        <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Log Out</button>
    </header>

    <aside>
        <ul>
            <li>
                <a href="index.php"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
            </li>
            <li>
                <a href="#" class="toggle-menu"><i class="fa-solid fa-wpforms"></i> Forms <i class="fa-solid fa-chevron-down chevron-right"></i></a>
                <ul class="sub-menu">
                    <li><a href="mobile-form.php"><i class="fa-solid fa-user-plus"></i> mobile Reg Form</a></li>
                    <li><a href="laptop-form.php"><i class="fa-solid fa-money-bill-wave"></i> Laptop Reg Form</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="toggle-menu"><i class="fa-solid fa-file-invoice"></i> Reports <i class="fa-solid fa-chevron-down chevron-right"></i></a>
                <ul class="sub-menu">
                    <li><a href="mobile-report.php"><i class="fa-solid fa-users"></i> Mobile Report</a></li>
                    <li><a href="laptop-report.php"><i class="fa-solid fa-credit-card"></i> Laptop Report</a></li>
                </ul>
            </li>
        </ul>
    </aside>

    <main class="main-container">
        <div class="content-area">

            <div class="dashboard-header">
                <h2><i class="fa-solid fa-gauge"></i> Nidaamka Dashboard-ka</h2>
                <p>Guud ahaan xogta kooban ee nidaamka dayactirka aaladaha.</p>
            </div>

            <div class="dashboard-grid">

                <div class="card">
                    <div class="card-icon" style="background-color: rgba(0, 180, 216, 0.1); color: #00b4d8;">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="card-info">
                        <h3>120</h3>
                        <p>Macamiisha Guud</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon" style="background-color: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div class="card-info">
                        <h3>15</h3>
                        <p>Aaladaha la Sugayo</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon" style="background-color: rgba(16, 185, 129, 0.1); color: #10b981;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="card-info">
                        <h3>98</h3>
                        <p>Waa la Dayactiray</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-icon" style="background-color: rgba(239, 68, 68, 0.1); color: #ef4444;">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div class="card-info">
                        <h3>$1,450</h3>
                        <p>Dakhliga Guud</p>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <script>
        $(document).ready(function() {
            // JQuery caadi ah oo menu-yada hoos u soo deynaya
            $('.toggle-menu').on('click', function(e) {
                // Maadaama aan feyl kale u guureyno, halkan kama joojineyno (e.preventDefault waa laga saaray)
                $(this).next('.sub-menu').slideToggle(300);
                $(this).find('.chevron-right').toggleClass('fa-rotate-180');
            });
        });
    </script>
</body>

</html>