<?php
// Xiriirka tooska ah ee Database-ka (mobile rep)
$conn = new mysqli("localhost", "root", "", "mobile_rep");

if ($conn->connect_error) {
    die("Xiriirka database-ka waa uu guuldareystay: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Qabashada xogta iyo nadiifinteeda
    $customer_name   = $conn->real_escape_string($_POST['customer_name']);
    $customer_phone  = $conn->real_escape_string($_POST['customer_phone']);
    $laptop_brand    = $conn->real_escape_string($_POST['laptop_brand']);
    $laptop_model    = $conn->real_escape_string($_POST['laptop_model']);
    $laptop_issue    = $conn->real_escape_string($_POST['laptop_issue']);
    $repair_cost     = $conn->real_escape_string($_POST['repair_cost']);
    
    // Koodhka MySQL Insert ee miiska laptop_repairs
    $sql = "INSERT INTO laptop_repairs (customer_name, customer_phone, laptop_brand, laptop_model, laptop_issue, repair_cost) 
            VALUES ('$customer_name', '$customer_phone', '$laptop_brand', '$laptop_model', '$laptop_issue', '$repair_cost')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Xogta Laptop-ka waa la keydiyey si guul leh!');
                window.location.href = 'laptop-form.php';
              </script>";
    } else {
        echo "Cilad baa ka dhacday keydinta xogta: " . $conn->error;
    }
}

$conn->close();
?>