<!DOCTYPE html>
<html lang="so">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Form - Repair System</title>
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
                <h3><i class="fa-solid fa-laptop"></i> Qabashada & Cilad-bixinta Laptops-ka</h3>

                <form action="insert-laptop.php" method="POST">

                    <h4>Xogta Macmiilka Laptop-ka</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="customer_name">Magaca Macmiilka</label>
                            <input type="text" id="customer_name" name="customer_name" required placeholder="Tusaale: Axmed Cali Geedi">
                        </div>
                        <div class="form-group">
                            <label for="customer_phone">Taleefanka</label>
                            <input type="text" id="customer_phone" name="customer_phone" required placeholder="Tusaale: 61xxxxxxx">
                        </div>
                    </div>

                    <h4>Xogta Laptop-ka & Cilladda</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="laptop_brand">Shirkadda dhistay (Brand)</label>
                            <input type="text" id="laptop_brand" name="laptop_brand" required placeholder="Tusaale: HP, Dell, Lenovo, Apple">
                        </div>
                        <div class="form-group">
                            <label for="laptop_model">Nooca/Model-ka Laptop-ka</label>
                            <input type="text" id="laptop_model" name="laptop_model" required placeholder="Tusaale: EliteBook 840 G5, ThinkPad X1">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="laptop_issue">Cilladda Jirta</label>
                            <input type="text" id="laptop_issue" name="laptop_issue" required placeholder="Tusaale: Keyboard-ka baa xumaaday / Daaran maba bixiyo">
                        </div>
                        <div class="form-group">
                            <label for="repair_cost">Qiimaha Dayactirka ($)</label>
                            <input type="number" id="repair_cost" name="repair_cost" step="0.01" required placeholder="Tusaale: 45.00">
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fa-solid fa-floppy-disk"></i> Keydi Xogta Laptop-ka
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