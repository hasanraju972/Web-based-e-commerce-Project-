<?php
session_start();

// Include your database configuration file
include('includes/config.php');

// Check if the user is logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
    exit;
}

// Fetch data from the orders table for the user
$query = "SELECT products.productName as pname, products.id as proid, orders.productId as opid, 
          orders.quantity as qty, products.productPrice as pprice, products.shippingCharge as shippingcharge, 
          orders.paymentMethod as paym, orders.orderDate as odate, orders.id as orderid
          FROM orders
          JOIN products ON orders.productId = products.id
          WHERE orders.userId = '".$_SESSION['id']."' AND orders.paymentMethod IS NOT NULL";

$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Fetch data and calculate total amount
    $totalAmount = 0;
    $payAmount = 0;
    $dueAmount = 0;
    $serialNumber = 1; // Serial number variable
    $invoiceContent = "<h3 style='margin: 0; padding: 0;'>Next Barishal</h3>";
    $invoiceContent .= "<p style='margin: 0; padding: 0;'>Fakhirbari road Barishal</p>";
    $invoiceContent .= "<p style='margin: 0; padding: 0;'>Email: nextbarisal@gmail.com</p>";
    $invoiceContent .= "<p style='margin: 0; padding: 0;'>Website: www.nextbarisal.com</p>";
    $invoiceContent .= "<table style='width: 100%; border-collapse: collapse;'>";
    $invoiceContent .= "<tr><th>Serial Number</th><th>Order Date</th><th>Product Name</th><th>Quantity</th><th>Price Per unit</th><th>Shipping Charge</th><th>Grandtotal</th><th>Payment Method</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $invoiceContent .= "<tr>";
        $invoiceContent .= "<td>" . $serialNumber . "</td>";
        $invoiceContent .= "<td>" . $row['odate'] . "</td>";
        $invoiceContent .= "<td>" . $row['pname'] . "</td>";
        $invoiceContent .= "<td>" . $row['qty'] . "</td>";
        $invoiceContent .= "<td>" . $row['pprice'] . "</td>";
        $invoiceContent .= "<td>" . $row['shippingcharge'] . "</td>";

        $grandtotal = ($row['qty'] * $row['pprice']) + $row['shippingcharge'];
        $totalAmount += $grandtotal;

        $invoiceContent .= "<td>" . $grandtotal . "</td>";
        $invoiceContent .= "<td>" . $row['paym'] . "</td>";
        
        $invoiceContent .= "</tr>";

        // Check payment status
        if ($row['paym'] == 'COD') {
            $dueAmount += $grandtotal;
        } else {
            $payAmount += $grandtotal;
        }

        // Increment serial number for the next row
        $serialNumber++;
    }

    $invoiceContent .= "<tr>";
    $invoiceContent .= "<td colspan='6'>Total Amount</td>"; // Empty cells for the first six columns
    $invoiceContent .= "<td> $totalAmount</td>";
    $invoiceContent .= "<td></td>"; // Empty cell for the "Payment Method" column
    $invoiceContent .= "</tr>";

    $invoiceContent .= "<tr>";
    $invoiceContent .= "<td colspan='6'>Pay Amount</td>"; // Empty cells for the first six columns
    $invoiceContent .= "<td>$payAmount</td>";
    $invoiceContent .= "<td></td>"; // Empty cell for the "Payment Method" column
    $invoiceContent .= "</tr>";

    $invoiceContent .= "<tr>";
    $invoiceContent .= "<td colspan='6'>Due Amount</td>"; // Empty cells for the first six columns
    $invoiceContent .= "<td>$dueAmount</td>";
    $invoiceContent .= "<td></td>"; // Empty cell for the "Payment Method" column
    $invoiceContent .= "</tr>";

    $invoiceContent .= "</table>";

    // ... (any other information you want to display)

} else {
    // Display an error message if the query fails
    $invoiceContent = "Error: " . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 80mm; /* Adjust to the width of your POS paper */
            height: 80mm; /* Adjust to the height of your POS paper */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px dotted black; /* Set border to dotted */
            padding: 5px; /* Add padding for better spacing */
        }

        #printButton {
            display: block;
            margin: 10px 0;
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        @media print {
            table, th, td {
                border: 1px dotted black; /* Set border to dotted for print */
            }
        }
    </style>
</head>
<body>

    <div id="invoiceContent">
        <?php echo $invoiceContent; ?>
    </div>

    <button id="printButton" onclick="printInvoice()">Print Invoice</button>

    <script>
        function printInvoice() {
            var printContents = document.getElementById("invoiceContent").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

</body>
</html>
