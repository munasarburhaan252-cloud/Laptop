<!DOCTYPE html>
<html lang="so">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms | </title>
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