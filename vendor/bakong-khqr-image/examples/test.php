
<?php

require_once __DIR__.'/../../autoload.php';

use KHQR\BakongKHQR;
use KHQR\Models\IndividualInfo;
use KHQR\Helpers\KHQRData;
use KHQR\Models\MerchantInfo;
use KHQR\Models\SourceInfo;

//Generate KHQR for an individual
$individualInfo = new IndividualInfo(
    bakongAccountID: 'chamroeun_tam@wing',
    merchantName: 'Chamroeun Tam',
    merchantCity: 'PHNOM PENH',
    storeLabel: 'PCM Coffee',
    currency: KHQRData::CURRENCY_KHR,
    amount: 168999
);

// $response = BakongKHQR::generateIndividual($individualInfo);
// echo $response . "\n";

$qrImage = BakongKHQR::createQrImage($individualInfo); 
file_put_contents(__DIR__ . '/khqr_khr.png', $qrImage);
echo "QR image saved to khqr_code.png\n";

// $merchantInfo = new MerchantInfo(
//     bakongAccountID: 'chamroeun_tam@wing',
//     merchantName: 'Chamroeun Tam',
//     merchantCity: 'Siem Reap',
//     merchantID: '123456',
//     acquiringBank: 'Mom Bank',
//     mobileNumber: '85512345678',
// );

// var_dump(BakongKHQR::generateMerchant($merchantInfo));

// $result = BakongKHQR::decode('00020101021130440018chamroeun_tam@wing01061234560208Mom Bank5204599953031165802KH5913Chamroeun Tam6009Siem Reap621502118551234567899170013176276461313963045117');

// var_dump($result);

// $result = BakongKHQR::verify('00020101021130440018chamroeun_tam@wing01061234560208MomBank5204599953031165802KH5913Chamroeun Tam6009Siem Reap621502118551234567899170013176276461313963045117');

// var_dump($result);
// $sourceInfo = new SourceInfo(
//     appIconUrl: 'https://bakong.nbc.gov.kh/images/logo.svg',
//     appName: 'Bakong',
//     appDeepLinkCallback: 'https://bakong.nbc.gov.kh'
// );

// // Build a valid KHQR payload first, then generate a deep link from it.
// $individualInfo = new IndividualInfo(
//     bakongAccountID: 'chamroeun_tam@wing',
//     merchantName: 'Chamroeun Tam',
//     merchantCity: 'PHNOM PENH',
//     storeLabel: 'ចំណត់តេស្ត',
//     currency: KHQRData::CURRENCY_KHR,
//     amount: 1000000
// );

// $response = BakongKHQR::generateIndividual($individualInfo);

// // The generated KHQR payload is in $response->data['qr']
// if (is_array($response->data) && isset($response->data['qr'])) {
//     $qrString = $response->data['qr'];
//     try {
//         // try to generate deep link (may fail if network or API unavailable)
//         $result = BakongKHQR::generateDeepLink($qrString, $sourceInfo, true); // use test URL
//         var_dump($result);
//     } catch (Exception $e) {
//         echo "Deep link generation failed: " . $e->getMessage() . "\n";
//     }
// } else {
//     echo "Failed to generate KHQR payload\n";
// }

// $result = BakongKHQR::checkBakongAccount('camroeun@devb');

// var_dump($result);



