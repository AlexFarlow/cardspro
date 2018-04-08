<?php

require 'vendor/autoload.php';

use cardspro\Cardspro;
use cardspro\common\models\CardIdentifier;
use cardspro\common\models\PartnerInfo;

try{


    $cardspro = new Cardspro();

    $CardService = $cardspro
        ->setSslCert('path://to.srt')
        ->setSslCertPass('12344')
        ->getCardService();

    //BaseResponse
    $baseResponse = $CardService->info(
            new PartnerInfo([
                'partnerCode' => '123'
            ]),
            new CardIdentifier([
                'barcode' => '456'
            ])
        );

    // PSR 7 Request
    $request = $CardService->getRequest();
    // PSR 7 Response
    $response = $CardService->getResponse();

} catch (\Exception $e){
    var_dump($e);
}