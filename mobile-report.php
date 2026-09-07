<?php
// 1. Xiriirka tooska ah ee Database-ka (mobile rep)
$conn = new mysqli("localhost", "root", "", "mobile_rep");

// Hubinta xiriirka haddii uu jiro khald
if ($conn->connect_error) {
    die("Xiriirka database-ka waa uu guuldareystay: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="so">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Report - Repair System</title>
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

            <div class="report-box">
                <h2><i class="fa-solid fa-mobile-screen"></i> Warbixinta Dayactirka Mobiles-ka</h2>

                <table class="report-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Macmiilka</th>
                            <th>Taleefanka</th>
                            <th>Nooca Mobile-ka</th>
                            <th>IMEI</th>
                            <th>Cilladda</th>
                            <th>Qiimaha ($)</th>
                            <th>Taariikhda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Soo bixinta xogta iyadoo tii ugu dambaysay la soo hor marinayo
                        $sql = "SELECT * FROM mobile_repairs ORDER BY id DESC";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['customer_phone']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['mobile_brand']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['mobile_imei']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['mobile_issue']) . "</td>";
                                echo "<td>$" . number_format($row['repair_cost'], 2) . "</td>";
                                echo "<td>" . $row['created_at'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>Wax xog ah kama jiraan miiska dayactirka mobiles-ka.</td></tr>";
                        }

                        // Xir xiriirka database-ka
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <script>
        $(document).ready(function() {
            // JQuery Dropdown Menu
            $('.toggle-menu').on('click', function(e) {
                $(this).next('.sub-menu').slideToggle(300);
                $(this).find('.chevron-right').toggleClass('fa-rotate-180');
            });
        });
    </script>
</body>

</html>