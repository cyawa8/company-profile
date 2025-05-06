<?php
require __DIR__ . '/vendor/autoload.php';
require 'crypto.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

if (!isset($_GET['id'])) {
    die("ID tidak valid");
}

$id = intval($_GET['id']);
$token = urlencode(encrypt($id)); // encode agar aman untuk URL

$qrUrl = "https://www.arthamitrainternasional.com/verify?token=$token";

$qrCode = QrCode::create($qrUrl)
    ->setEncoding(new Encoding('UTF-8'))
    ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->setSize(300)
    ->setMargin(10);

$writer = new PngWriter();
$result = $writer->write($qrCode);

header('Content-Type: image/png');
echo $result->getString();
exit;
