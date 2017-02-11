<script src="js/jquery-1.10.4.min.js" charset="utf-8"></script>

<script id="hpfScript" src="https://secure.na.tnspayments.com/form/v3/hpf.js"></script>
<script src="system/tokenclient.js" charset="utf-8"></script>

<html>
    <div class="">
        <pre>
            <h4>hasSession</h4>
            <code id="callback-hasSession">
            </code>
            <h4>sessionHandler</h4>
            <code id="callback-sessionHandler">
            </code>
            <h4>errorHandler</h4>
            <code id="callback-errorHandler">
            </code>
        </pre>
    </div>
</html>

<script type="text/javascript">

    var cardTypeList = ["VI", "MC", "AX"]; // Note
    var testObj = {
        'cardNumber': '4005550000000001',
        'cardSecurityCode': '123',
        'cardExpiryMonth': '05',
        'cardExpiryYear': '17'
    };
    var merchant = {
        'id': 'RCIC-HKB2C',
        'userName': 'merchant.RCIC-HKB2C',
        'password': 'ebdbcb7eb8667341d694fbbe8cca2a25'
    };
    var base64Encoded = function(str) {
        return btoa(str);
    };

    // Collect the card details based on the 'id' of the form elements
    // var getSessionDetailsFromForm = function() {
    //   return {
    //        cardNumber: document.getElementById('cardNumber').value,
    //        cardSecurityCode: document.getElementById('cardSecurityCode').value,
    //        cardExpiryMonth: document.getElementById('expiryMonth').value,
    //        cardExpiryYear: document.getElementById('expiryYear').value
    //    }
    // }

    var displayOnView = function(idName, data) {
        if ( typeof idName !== 'undefined' && idName !== null ) {
            var htmlElem = document.getElementById(idName);
            htmlElem.innerHTML = data;
        } else {
            console.log('Please enter the idName');
        }
    }

    var resolveToken = function(dataObj) {
        $.ajax({
            type: "POST",
            // Gateway to get token >> https://secure.uat.tnspayments.com/api/rest/version/20/merchant/RCIC-HKB2C/token
            url: "https://" + base64Encoded(merchant.userName + ":" + merchant.password) + "@secure.uat.tnspayments.com/api/rest/version/20/merchant/" + merchant.id + "/token",
            data: dataObj,
            dataType: "json",
            async : true,
            success: function(result, status, xhr) {
                console.log('AJAX to retrieve Token success');
                console.log( TokenClient.session );
                console.log( 'TokenClient.handleSession(data) >>> ' + TokenClient.handleSession(result) );
            },
            error: function(result, status, xhr) {
                console.log('AJAX to retrieve Token failure');
                console.log( 'TokenClient.handleSession(data) >>> ' + TokenClient.handleSession(result) );
            },
            timeout: 3000
        });
    }

    var HostedForm = {
        'setMerchant': function() {},
        'createSession': function(buildPayment, handleSession) {

            displayOnView(
                'callback-hasSession',
                'TokenClient.hasSession() = ' + TokenClient.hasSession()
            );
            console.log( 'TokenClient.hasSession() >>> ' + TokenClient.hasSession() );

            var postReqToGateway = {
                "sourceOfFunds":    { "type": cardTypeList[0] },
                "session":          { "id": "<SESSIONID>" }
            };
            resolveToken(postReqToGateway);
        }
    };

    // Gary : Define 2 handlers before running the TokenClient.tokenize()
    var merchantId = merchant.id;
    var sessionHandler = function(sessionLog) {
        console.log(sessionLog);
        displayOnView( 'callback-sessionHandler', sessionLog );
    };
    var errorHandler = function(errLog) {
        console.log(errLog)
        displayOnView( 'callback-errorHandler', errLog );
    };

    // Gary : Initialize here
    TokenClient.tokenize(
            testObj.cardNumber
            , testObj.cardSecurityCode
            , testObj.cardExpiryMonth
            , testObj.cardExpiryYear
            , sessionHandler
            , errorHandler
        );

</script>
