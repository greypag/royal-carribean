<?php

	/*try {
		// Access the service
		$client = new SoapClient("https://stage.services.rccl.com", array(
			"login"=>"CONBMGSB",
			"password"=>"guCe2utrubrewud",
			"connection_timeout" => 25,
			//"location" => $url,
			'trace' => 1,
			'exceptions' => 1,
			'cache_wsdl' => 1
			));
		
	} catch (SoapFault $e){
			print_r($e);

	}*/

   $xml = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
   <soap:Body>
      <retrieveBooking xmlns="http://services.rccl.com/Interfaces/RetrieveBooking">
         <OTA_ReadRQ TimeStamp="2014-08-28T13:36:43.8780022Z" Version="2" TransactionIdentifier="e6e7e93ddbe4449292f93d77bf81caf4" SequenceNmbr="2" RetransmissionIndicator="false" TransactionActionCode="RetrievePrice" xmlns="http://www.opentravel.org/OTA/2003/05/alpha">
            <POS>
               <Source ISOCurrency="HKD" TerminalID="12345">
                  <RequestorID ID="323433" Type="5" ID_Context="AGENCY1"/>
                  <BookingChannel Type="7">
                     <CompanyName CompanyShortName="BMG"/>
                  </BookingChannel>
               </Source>
              <Source ISOCurrency="HKD" TerminalID="12345">
                  <RequestorID ID="323433" Type="5" ID_Context="AGENCY1"/>
                  <BookingChannel Type="7">
                     <CompanyName CompanyShortName="BMG"/>
                  </BookingChannel>
               </Source>
              <Source ISOCurrency="HKD" TerminalID="12345">
                  <RequestorID ID="323433" Type="5" ID_Context="AGENCY1"/>
                  <BookingChannel Type="7">
                     <CompanyName CompanyShortName="BMG"/>
                  </BookingChannel>
               </Source>
            </POS>
            <UniqueID Type="14" ID="2016187"/>
         </OTA_ReadRQ>
      </retrieveBooking>
   </soap:Body>
</soap:Envelope>';

   /*$xml = '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:m0="http://www.opentravel.org/OTA/2003/05/alpha">
    <SOAP-ENV:Body>
        <m:login xmlns:m="http://services.rccl.com/Interfaces/Login">
            <m0:RCL_CruiseLoginRQ xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" Version="2.0" SequenceNmbr="1" TransactionStatusCode="Start" RetransmissionIndicator="false" Target="Test" PrimaryLangID="en-us" TimeStamp="2016-01-21T10:36:08">
                <m0:POS>
                    <m0:Source ISOCurrency="HKD" TerminalID="session based">
                        <m0:RequestorID Type="5" ID="323433">
                        </m0:RequestorID>
                        <m0:BookingChannel Type="7">
                            <m0:CompanyName CompanyShortName="BMG">
                            </m0:CompanyName>
                        </m0:BookingChannel>
                    </m0:Source>
                   <m0:Source ISOCurrency="HKD" TerminalID="session based">
                        <m0:RequestorID Type="5" ID="323433">
                        </m0:RequestorID>
                        <m0:BookingChannel Type="7">
                            <m0:CompanyName CompanyShortName="BMG">
                            </m0:CompanyName>
                        </m0:BookingChannel>
                    </m0:Source>
                    <m0:Source ISOCurrency="HKD" TerminalID="session based">
                        <m0:RequestorID Type="5" ID="323433">
                        </m0:RequestorID>
                        <m0:BookingChannel Type="7">
                            <m0:CompanyName CompanyShortName="BMG">
                            </m0:CompanyName>
                        </m0:BookingChannel>
                    </m0:Source>
                </m0:POS>
            </m0:RCL_CruiseLoginRQ>
        </m:login>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>';*/

	/*$process = curl_init("https://stage.services.rccl.com/Reservation_FITWeb/sca/RetrieveBooking");
	curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	curl_setopt($process, CURLOPT_HEADER, 1);
	curl_setopt($process, CURLOPT_VERBOSE, true);
	curl_setopt($process, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($process, CURLOPT_USERPWD, "CONBMGSB:guCe2utrubrewud");
	curl_setopt($process, CURLOPT_TIMEOUT, 30);
	curl_setopt($process, CURLOPT_POST, 1);
	curl_setopt($process, CURLOPT_POSTFIELDS, $xml);
	curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
	$return = curl_exec($process);
	$error = curl_errno($process);
	var_dump($return);
	curl_close($process);*/

	$header = array(
	    "Content-type: text/xml;charset=\"utf-8\"",
	    "Accept: text/xml",
	    "Cache-Control: no-cache",
	    "Pragma: no-cache",
	    "SOAPAction: \"run\"",
	    "Content-length: ".strlen($xml),
	  );
 
  $soap_do = curl_init();
  curl_setopt($soap_do, CURLOPT_URL, "https://services.rccl.com/Reservation_FITWeb/sca/RetrieveBooking" );
  //curl_setopt($soap_do, CURLOPT_URL, "https://services.rccl.com/Reservation_FITWeb/sca/Login" );
  curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($soap_do, CURLOPT_TIMEOUT,        10);
  curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
  curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($soap_do, CURLOPT_POST,           true );
  curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($soap_do, CURLOPT_USERPWD, "CONBMGSB:guCe2utrubrewud");
  curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $xml);
  curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $header);
 $result = curl_exec($soap_do);

  if($result === false) {
    $err = 'Curl error: ' . curl_error($soap_do);
    curl_close($soap_do);
    print $err;
  } else {
  	echo $result;
    curl_close($soap_do);
    //print 'Operation completed without any errors';
  }
?>