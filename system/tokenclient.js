/* global HostedForm */
if (typeof Object.create !== 'function') {
	Object.create = function(o) {
		var F = function() {
		};
		F.prototype = o;
		return new F();
	};
};


var TokenClient = {

	me:null,
	status:null,
	session:null,
	_cardNumber:null,
	_cardSecurityCode:null,
	_cardExpiryMonth:null,
	_cardExpiryYear:null,
	_sessionHandler:null,
	_errorHandler:null,

	tokenize:function(cardNumber, cardSecurityCode, cardExpiryMonth, cardExpiryYear, sessionHandler, errorHandler){
		me=this;
		me.session=null; //blank out session if we re-init a new card.
		this._cardNumber = cardNumber;
		this._cardSecurityCode=cardSecurityCode;
		this._cardExpiryMonth=cardExpiryMonth;
		this._cardExpiryYear=cardExpiryYear;
		this._sessionHandler=sessionHandler;//function to handle the token data.
		this._errorHandler=errorHandler;//function to handle errors

		if(typeof HostedForm === 'undefined'){
			this._errorHandler("HostedForm must be globally scoped.");
			return;
		}else if(typeof merchantId === 'undefined'){
			this._errorHandler("merchantId must be globally scoped.");
			return;
		}

		//set the merchant
		HostedForm.setMerchant(merchantId);

		//create the session.
		HostedForm.createSession(this.buildPayment(),this.handleSession);
	},

	buildPayment : function() {
		var payment = new Object();
		payment.cardNumber = me._cardNumber;
		payment.cardSecurityCode = me._cardSecurityCode;
		payment.cardExpiryMonth =me._cardExpiryMonth;
		payment.cardExpiryYear = me._cardExpiryYear;
		return payment;
	},

	handleSession : function(data){
		if(data.status==='fields_in_error'){
			var msg = "";
			var name;
			for(name in data.fieldsInError){
				if(msg.length===0){
					me._errorHandler(name);
					return;
				}
			}
			me.status = data.status;
			me.renderMessage(msg);

			return;

		}else if(data.status==='request_timeout'){
			me.status = data.status;
			me._errorHandler(data.status);
			return;

		}else if(data.status==='invalid_session'){
			me.status = data.status;
			me._errorHandler(data.status);
			return;
		}

		//store the session
		me.session = data.session;

		//store the status.
		me.status = data.status;

		//handle the session data.
		me._sessionHandler(data);

	},

	hasSession : function(){
		return (typeof me.session!=='undefined');
	}


};//end TokenClient
