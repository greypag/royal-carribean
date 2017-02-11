<?php

Yii::import('application.models._base.BaseRoomInventory');

class RoomInventory extends BaseRoomInventory {

    private $username = "CONBMGSB";
    private $password = "guCe2utrubrewud";
    //private $domain = "https://stage.services.rccl.com";
    private $domain = "https://services.rccl.com";

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /* Error format
      <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
      <soapenv:Body>
      <bo:retrieveBookingResponse xmlns:alpha="http://www.opentravel.org/OTA/2003/05/alpha" xmlns:bo="http://services.rccl.com/Interfaces/RetrieveBooking">
      <alpha:OTA_ResRetrieveRS Version="11">
      <alpha:Errors>
      <alpha:Error ShortText="HOSTERR" Type="11">Generic error occured.</alpha:Error>
      <alpha:Error ShortText="HOSTERR" Type="12">Generic error occured.</alpha:Error>
      </alpha:Errors>
      </alpha:OTA_ResRetrieveRS>
      </bo:retrieveBookingResponse>
      </soapenv:Body>
      </soapenv:Envelope>
     */

    public function retrieveBooking($reservationCode) {
        $xml = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
				   <soap:Body>
				      <retrieveBooking xmlns="http://services.rccl.com/Interfaces/RetrieveBooking">
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
        $result = $this->startSoap($xml, $this->domain . "/Reservation_FITWeb/sca/RetrieveBooking");
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
        return $return;
    }

    public function makePayment($reservationCode, $type, $name, $cardNumber, $expire_year, $expire_month, $price) {
        $xml = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
				   <soap:Body>
				      <makePayment xmlns="http://services.rccl.com/Interfaces/Payment">
				         <OTA_CruisePaymentRQ Version="1.2" TransactionIdentifier="e5d6a915dc3f4d82a9297c112469639d" SequenceNmbr="5" RetransmissionIndicator="false" xmlns="http://www.opentravel.org/OTA/2003/05/alpha">
				            <POS>
				               <Source ISOCurrency="HKD" TerminalID="12345">
				                  <RequestorID ID="331732" Type="5" ID_Context="AGENCY1"/>
				                  <BookingChannel Type="7">
				                     <CompanyName CompanyShortName="BMG"/>
				                  </BookingChannel>
				               </Source>
				            </POS>
				            <ReservationPayment>
				               <ReservationID Type="14" SyncDateTime="' . date("Y-m-d") . 'T' . date("H:i:s") . 'Z" ID="' . $reservationCode . '"/>
				               <PaymentDetail>
				                  <PaymentCard CardCode="' . $type . '" CardNumber="' . $cardNumber . '" ExpireDate="' . $expire_month . $expire_year . '">
				                     <CardHolderName>' . $name . '</CardHolderName>
				                  </PaymentCard>
				                  <PaymentAmount Amount="' . $price . '"/>
				               </PaymentDetail>
				            </ReservationPayment>
				         </OTA_CruisePaymentRQ>
				      </makePayment>
				   </soap:Body>
				</soap:Envelope>';
        //var_dump($xml);
        $result = $this->startSoap($xml, $this->domain . "/Reservation_FITWeb/sca/Payment");
        //var_dump($result);
        //exit();
        $return = array();
        if ($result["status"] === false) {
            $return["status"] = false;
            $return["message"] = "unknown";
        } else {
            $dom = simplexml_load_string($result["result"]);
            $payment = $dom->children('soapenv', true)->Body->children('pa', true)->makePaymentResponse->children('alpha', true)->OTA_CruisePaymentRS->children('alpha', true);
            $reservationID = $payment->ReservationPayment->children('alpha', true)->ReservationID->attributes()->ID;
            if (trim($reservationID) != "") {
                $return["status"] = true;
                $return["code"] = $payment->ReservationPayment->children('alpha', true)->PaymentDetail->children("alpha", true)->PaymentAmount->attributes()->ApprovalCode->__toString();
                $return["reservationID"] = $reservationID;
                $return["org_xml"] = $result["result"];
            } else {
                $return["status"] = false;
                $return["code"] = $payment->Warnings->children('alpha', true)->Warning[0]->attributes()->ShortText->__toString();
                $return["message"] = $payment->Warnings->children('alpha', true)->Warning[0]->__toString();
                $return["org_xml"] = $result["result"];
            }
        }
        return $return;
    }

    private function startSoap($xml, $url) {
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

}
