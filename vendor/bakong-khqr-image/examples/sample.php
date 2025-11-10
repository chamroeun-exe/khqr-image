<?php

require_once __DIR__.'/../../autoload.php';

use KHQR\BakongKHQR;
use KHQR\Helpers\KHQRData;
use KHQR\Models\IndividualInfo;
use KHQR\Models\MerchantInfo;
use KHQR\Models\SourceInfo;

$bakongKhqr = new BakongKHQR('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7ImlkIjoiZTYzNWM0NTAyZjg1NGM5OCJ9LCJpYXQiOjE3NjEyMjAzNDIsImV4cCI6MTc2ODk5NjM0Mn0.xDmxov1ylKWIXeEIqoFigtZYEr4_AweqtweqnKkgw6Q');

// Generate KHQR for an individual
$individualInfo = new IndividualInfo(
    bakongAccountID: 'chamroeun_tam@wing',
    merchantName: 'Chamroeun Tam',
    merchantCity: 'PHNOM PENH',
    storeLabel: 'Nguy Dek Nas Very',
    currency: KHQRData::CURRENCY_KHR,
    amount: 100.00
);

var_dump(BakongKHQR::generateIndividual($individualInfo));
$response = $bakongKhqr->checkTransactionByMD5('f84276c9c4e77b466f2aa24d8f09acaf');
echo "Transaction Check Response:\n";
var_dump($response);
$imageData = $bakongKhqr->createQrImage($individualInfo);
file_put_contents(__DIR__ . '/individual_khqr.png', $imageData);
echo "Individual KHQR image saved to individual_khqr.png\n";
