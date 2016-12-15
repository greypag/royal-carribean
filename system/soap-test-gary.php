<?php

$reservationCode = '5029308';
$domain = "https://stage.services.rccl.com";
// $domain = 'http://stage.api.services.rccl.com/esl/content/rest/v3/retrieveCodeSets?header.brand=R&code=TNS';
$path = "/Reservation_FITWeb/sca/Login";
// $domain = "https://services.rccl.com";
$xml = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
           <soap:Body>
              <retrieveBooking xmlns="'.$domain.$path.'">
                 <OTA_ReadRQ Version="2" TransactionIdentifier="e6e7e93ddbe4449292f93d77bf81caf4" SequenceNmbr="2" RetransmissionIndicator="false" TransactionActionCode="RetrievePrice" xmlns="http://www.opentravel.org/OTA/2003/05/alpha">
                    <POS>
                       <Source ISOCurrency="HKD" TerminalID="12345">
                          <RequestorID ID="331732" Type="5" ID_Context="AGENCY1"/>
                          <BookingChannel Type="7">
                             <CompanyName CompanyShortName="BMG"/>
                          </BookingChannel>
                       </Source>
                    </POS>
                    <UniqueID Type="14" ID="' . $reservationCode . '"/>
                 </OTA_ReadRQ>
              </retrieveBooking>
           </soap:Body>
        </soap:Envelope>';
//var_dump($xml);
//CVarDumper::dump( $xml, 10, true);
echo $domain;
$result = startSoap($xml, $domain . $path);
//CVarDumper::dump( $result, 10, true);
//exit();

$return = array();
if ($result["status"] === false) {
    $return["status"] = false;
    $return["message"] = "unknown";
} else {
    $dom = simplexml_load_string($result["result"]);
    $success = $dom->children('soapenv', true)->Body->children('bo', true)->retrieveBookingResponse->children('alpha', true)->OTA_ResRetrieveRS->children('alpha', true);

    if (isset($success->Success)) {
        $return["status"] = true;
    } else {
        $return["status"] = false;
        $return["message"] = $success->Errors->children('alpha', true)->Error[0]->__toString();
    }
}
print_r($return);

function startSoap($xml, $url) {
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: \"run\"",
        "Content-length: " . strlen($xml),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $url);
    curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($soap_do, CURLOPT_USERPWD, $this->username . ":" . $this->password);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);

    if ($result === false) {
        $err = 'Curl error: ' . curl_error($soap_do);
        //print $err;
        curl_close($soap_do);
        return array(
            'status' => false,
            "result" => $err
        );
    } else {
        //echo $result;
        curl_close($soap_do);
        return array(
            'status' => true,
            "result" => $result
        );
    }
}
?>
