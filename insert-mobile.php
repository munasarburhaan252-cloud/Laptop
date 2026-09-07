<?php
// 1. Xiriirka tooska ah ee Database-ka (mobile rep)
$conn = new mysqli("localhost", "root", "", "mobile_rep");

// Hubinta xiriirka haddii uu jiro khald
if ($conn->connect_error) {
    die("Xiriirka database-ka waa uu guuldareystay: " . $conn->connect_error);
}

// 2. Hubi in xogta laga soo diray foomka (Method POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Qabashada xogta iyo nadiifinteeda si badbaado leh
    $customer_name   = $conn->real_escape_string($_POST['customer_name']);
    $customer_phone  = $conn->real_escape_string($_POST['customer_phone']);
    $mobile_brand    = $conn->real_escape_string($_POST['mobile_brand']);
    $mobile_imei     = $conn->real_escape_string($_POST['mobile_imei']);
    $mobile_issue    = $conn->real_escape_string($_POST['mobile_issue']);
    $repair_cost     = $conn->real_escape_string($_POST['repair_cost']);
    
    // 3. Koodhka MySQL Insert ee rasmiga ah
    $sql = "INSERT INTO mobile_repairs (customer_name, customer_phone, mobile_brand, mobile_imei, mobile_issue, repair_cost) 
            VALUES ('$customer_name', '$customer_phone', '$mobile_brand', '$mobile_imei', '$mobile_issue', '$repair_cost')";
    
    // 4. Fulinta koodhka iyo soo bandhigista fariinta guusha
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Xogta Mobile-ka waa la keydiyey si guul leh!');
                window.location.href = 'mobile-form.php';
              </script>";
    } else {
        echo "Cilad baa ka dhacday keydinta xogta: " . $conn->error;
    }
}

// Xir xiriirka database-ka
$conn->close();
?>