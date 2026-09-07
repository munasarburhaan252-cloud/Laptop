<!DOCTYPE html>
<html lang="so">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiles Form - Repair System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <header>
        <h1><i class="fa-solid fa-screwdriver-wrench"></i> Repair System</h1>
        <a href="login.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out </a>
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

            <div class="form-box">
                <h3><i class="fa-solid fa-mobile-screen-button"></i> Qabashada & Cilad-bixinta Mobiles-ka</h3>

                <form action="insert-mobile.php" method="POST">

                    <h4>Xogta Macmiilka Mobile-ka</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="customer_name">Magaca Macmiilka</label>
                            <input type="text" id="customer_name" name="customer_name" required placeholder="Tusaale: Cali Axmed Maxamed">
                        </div>
                        <div class="form-group">
                            <label for="customer_phone">Taleefanka</label>
                            <input type="text" id="customer_phone" name="customer_phone" required placeholder="Tusaale: 61xxxxxxx">
                        </div>
                    </div>

                    <h4>Xogta Mobile-ka & Cilladda</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mobile_brand">Nooca Mobile-ka (Brand)</label>
                            <input type="text" id="mobile_brand" name="mobile_brand" required placeholder="Tusaale: iPhone 13 Pro, Samsung S22">
                        </div>
                        <div class="form-group">
                            <label for="mobile_imei">Lambarka IMEI (Haddii uu jiro)</label>
                            <input type="text" id="mobile_imei" name="mobile_imei" placeholder="Geli IMEI-ga taleefanka">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="mobile_issue">Cilladda Jirta</label>
                            <input type="text" id="mobile_issue" name="mobile_issue" required placeholder="Tusaale: Shaashad dilaac / Battery beddel">
                        </div>
                        <div class="form-group">
                            <label for="repair_cost">Qiimaha Dayactirka ($)</label>
                            <input type="number" id="repair_cost" name="repair_cost" step="0.01" required placeholder="Tusaale: 20.00">
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fa-solid fa-floppy-disk"></i> Keydi Xogta Mobile-ka
                    </button>

                </form>
            </div>

        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('.toggle-menu').on('click', function(e) {
                $(this).next('.sub-menu').slideToggle(300);
                $(this).find('.chevron-right').toggleClass('fa-rotate-180');
            });
        });
    </script>
</body>

</html>