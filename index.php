<?php
// 1. Xiriirka tooska ah ee Database-ka
$conn = new mysqli("localhost", "root", "", "mobile_rep");

if ($conn->connect_error) {
    die("Xiriirka database-ka waa uu guuldareystay: " . $conn->connect_error);
}

// --- XOGTA TIRADA GUUD ---
$total_mobiles = $conn->query("SELECT COUNT(*) as total FROM mobile_repairs")->fetch_assoc()['total'] ?? 0;
$total_laptops = $conn->query("SELECT COUNT(*) as total FROM laptop_repairs")->fetch_assoc()['total'] ?? 0;

// --- 1. LACAGTA BISHAN (Current Month Revenue) ---
$bisha_hada = date('m');
$sanadka_hada = date('Y');

// Lacagta Mobiles-ka ee bishan
$sql_m_month = "SELECT SUM(repair_cost) as total FROM mobile_repairs WHERE MONTH(created_at) = '$bisha_hada' AND YEAR(created_at) = '$sanadka_hada'";
$rev_m_month = $conn->query($sql_m_month)->fetch_assoc()['total'] ?? 0;

// Lacagta Laptops-ka ee bishan
$sql_l_month = "SELECT SUM(repair_cost) as total FROM laptop_repairs WHERE MONTH(created_at) = '$bisha_hada' AND YEAR(created_at) = '$sanadka_hada'";
$rev_l_month = $conn->query($sql_l_month)->fetch_assoc()['total'] ?? 0;

$tala_bisha = $rev_m_month + $rev_l_month;

// --- 2. LACAGTA SANADKA (Monthly Breakdown for Current Year) ---
// Waxaan u baahanahay inaan soo saarno dakhliga bil kasta laga bilaabo Janaayo ilaa Diseembar
$months_data = array_fill(1, 12, 0); // Waxay abuuraysaa 12 bilood oo eber ah

// Soo saar dakhliga mobiles-ka ee bil kasta ee sanadkan
$sql_m_year = "SELECT MONTH(created_at) as bisha, SUM(repair_cost) as total FROM mobile_repairs WHERE YEAR(created_at) = '$sanadka_hada' GROUP BY MONTH(created_at)";
$res_m_year = $conn->query($sql_m_year);
while ($row = $res_m_year->fetch_assoc()) {
    $months_data[$row['bisha']] += $row['total'];
}

// Soo saar dakhliga laptops-ka ee bil kasta ee sanadkan
$sql_l_year = "SELECT MONTH(created_at) as bisha, SUM(repair_cost) as total FROM laptop_repairs WHERE YEAR(created_at) = '$sanadka_hada' GROUP BY MONTH(created_at)";
$res_l_year = $conn->query($sql_l_year);
while ($row = $res_l_year->fetch_assoc()) {
    $months_data[$row['bisha']] += $row['total'];
}

// Isku gaynta dakhliga guud ee sanadka
$tala_sanadka = array_sum($months_data);

$conn->close();
?>
<!DOCTYPE html>
<html lang="so">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Repair System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    <!-- <?php include 'sidebar.php'; ?> -->

    <main class="main-container">

        <div class="dashboard-cards">
            <div class="card card-mobile" style="border-left: 5px solid #2ec4b6;">
                <h4>Mobiles Registered</h4>
                <h2><?php echo $total_mobiles; ?></h2>
            </div>
            <div class="card card-laptop" style="border-left: 5px solid #2ec4b6;">
                <h4>Laptops Registered</h4>
                <h2><?php echo $total_laptops; ?></h2>
            </div>
            <div class="card" style="border-left: 5px solid #2ec4b6;">
                <h4>Dakhliga Bishaan (<?php echo date('F'); ?>)</h4>
                <h2>$<?php echo number_format($tala_bisha, 2); ?></h2>
            </div>
            <div class="card" style="border-left: 5px solid #2ec4b6;">
                <h4>Dakhliga Sanadkan (<?php echo date('Y'); ?>)</h4>
                <h2>$<?php echo number_format($tala_sanadka, 2); ?></h2>
            </div>
        </div>

        <div style="display: flex; gap: 20px; flex-wrap: wrap;">

            <div class="form-box" style="flex: 1; min-width: 300px;">
                <h3><i class="fa-solid fa-chart-bar"></i> Tirada Aaladaha la Qabtay</h3>
                <div class="chart-container">
                    <canvas id="repairChart"></canvas>
                </div>
            </div>

            <div class="form-box" style="flex: 1; min-width: 300px;">
                <h3><i class="fa-solid fa-chart-pie"></i> Lacagta Bishaan ($)</h3>
                <div class="chart-container">
                    <canvas id="monthRevenueChart"></canvas>
                </div>
            </div>

        </div>

        <!-- <div class="form-box" style="margin-top: 25px; width: 100%;">
            <h3><i class="fa-solid fa-chart-line"></i> Dakhliga Sanadlaha ah ee Bilaha (<?php echo date('Y'); ?>)</h3>
            <div class="chart-container" style="height: 300px;">
                <canvas id="yearRevenueChart"></canvas>
            </div>
        </div> -->

    </main>

    <script>
        $(document).ready(function() {
            // JQuery caadi ah oo menu-yada hoos u soo deynaya
            $('.toggle-menu').on('click', function(e) {
                // Maadaama aan feyl kale u guureyno, halkan kama joojineyno (e.preventDefault waa laga saaray)
                $(this).next('.sub-menu').slideToggle(300);
                $(this).find('.chevron-right').toggleClass('fa-rotate-180');
            });


            // --- 1. Garaafka Tirada Qalabka (Bar Chart) ---
            var ctx1 = document.getElementById('repairChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Mobiles', 'Laptops'],
                    datasets: [{
                        label: 'Tirada Aaladaha',
                        data: [<?php echo $total_mobiles; ?>, <?php echo $total_laptops; ?>],
                        backgroundColor: ['rgba(0, 180, 216, 0.7)', 'rgba(12, 43, 88, 0.7)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // --- 2. Garaafka Lacagta Bishaan (Doughnut Chart) ---
            var ctx2 = document.getElementById('monthRevenueChart').getContext('2d');
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Mobiles ($)', 'Laptops ($)'],
                    datasets: [{
                        data: [<?php echo $rev_m_month; ?>, <?php echo $rev_l_month; ?>],
                        backgroundColor: ['#00b4d8', '#0c2b58'],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // --- 3. Garaafka Dakhliga Sanadka (Line Chart) ---
            var ctx3 = document.getElementById('yearRevenueChart').getContext('2d');
            new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Dakhliga Guud ($)',
                        data: [<?php echo implode(',', $months_data); ?>], // Ku shub 12-ka bilood xogtooda
                        borderColor: '#ff9f1c',
                        backgroundColor: 'rgba(255, 159, 28, 0.1)',
                        fill: true,
                        tension: 0.3, // Garaafka qalooci si uu u qurxoonado
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        });
    </script>

</body>

</html>