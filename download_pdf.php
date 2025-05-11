<?php
require 'vendor/autoload.php'; // dompdf must be installed via Composer

use Dompdf\Dompdf;

if (isset($_POST['cartData'])) {
    $cartData = htmlspecialchars($_POST['cartData']);

    $html = '<h2>Items in Your Cart</h2><ul>';
    foreach (explode("\n", $cartData) as $item) {
        $html .= '<li>' . htmlspecialchars($item) . '</li>';
    }
    $html .= '</ul>';

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4');
    $dompdf->render();
    
    // Output the PDF
    $dompdf->stream("cart_items.pdf", ["Attachment" => 1]);
    exit;
} else {
    echo "No data received!";
}
?>
