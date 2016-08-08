
/*********************Gobal Method**************************/

Number.prototype.formatMoney = function (c, d, t) {
    var n = this,
            c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};
var royalcaribbean = function (options) {


    var adults_dropDownObj = $('#adults_dropDown');
    var child_dropDownObj = $('#child_dropDown');
    var stateroom_dropDownObj = $('#stateroom_dropDown');
    var promotion_codeObj = $('#Others_promotion_code');
    var _this = this;

    var previousPrice = parseInt($('#Others_price').val());
    if (previousPrice) {
        $('#totalPrice').html(previousPrice.formatMoney(2, '.', ','));
    }
    $('#dynamic_adults').html(adults_dropDownObj.val());
    $('#dynamic_child').html(child_dropDownObj.val());
    /*********************Main Page**************************/
    $('.mainMenu li').mouseover(function () {
        $('.mainMenu li').removeClass('hover');
        $(this).addClass('hover');
    });
    $('.mainMenu li').mouseout(function () {
        $(this).removeClass('hover');
    });
    if (navigator.userAgent.indexOf('iPhone') != -1 || navigator.userAgent.indexOf('iPad') != -1) {
        $('.mainMenu a').mouseover(function () {
            if ($(this).attr('href'))
                window.location = $(this).attr('href');
        });
    }
    $('#tandc>.content').slimScroll({
        height: '250px'
    });
    //var cookieValue = $.cookie('booking');


    /*********************Step One**************************/
    $(".inner").find('select').select2({
        minimumResultsForSearch: Infinity
    }).on('change', function (e) {

        //if (_this.getNoOfPeople() > roomTableOjb.attr('data-capacity')) {        }
        //capacity = roomTableOjb.attr('data-capacity');
        if ($(e.currentTarget).attr('id') == 'adults_dropDown') {

			_this.calculateChild();
        }
        else if ($(e.currentTarget).attr('id') == 'child_dropDown') {
	
			_this.calculateAdults();
        }


    });

    /*
     $('#adults_dropDown').on("select2:close", function (e) {
     console.log("select2:close", e);
     });
     $('#child_dropDown').on("select2:close", function (e) { 
     console.log("select2:close", e); 
     });
     */

    $(".inner").find('form').on('submit', function () {
        $(this).find('select').attr('disabled', false);
    });

    stateroom_dropDownObj.on("select2:selecting", function (e) {
        //e.data('old-value',  $(this).val());
        $(this).attr('data-old', $(this).val());
    });
    stateroom_dropDownObj.on('change', function () {

        var tempThis = $(this);
        var roomTableOjb = _this.getSelectedRoom();
		var noOfPeople = _this.getNoOfPeople();
		
		//console.log(_this.getNoOfPeople());
        if (noOfPeople > roomTableOjb.attr('data-capacity')) {
            alert('This room capacity is ' + roomTableOjb.attr('data-capacity') + ' only!');
            tempThis.select2("val", tempThis.attr('data-old'));
            return false;
        }
		_this.calculateChild();
		_this.calculateAdults();
        $('.roomDesc').hide();
        $('#' + tempThis.attr('data-response')).html(tempThis.find("option:selected").text());

        //_this.removePromotion();

        _this.calutionPrice(roomTableOjb);
        _this.showStepOneSubmitButton('#' + _this.getSelectedRoom().attr('id'));
        roomTableOjb.addClass('active').slideToggle();
        //console.log(noOfPeople);
    });
    $('.dynamic_dropDown').on("select2:selecting", function (e) {
        //e.data('old-value',  $(this).val());
        $(this).attr('data-old', $(this).val());
    });
    $('.dynamic_dropDown').on("select2:select", function (e) {

        var tempThis = $(this);
        var roomTableOjb = _this.getSelectedRoom();
        if (_this.getNoOfPeople() > roomTableOjb.attr('data-capacity')) {
            alert('This room capacity is ' + roomTableOjb.attr('data-capacity') + ' only!');
            tempThis.select2("val", tempThis.attr('data-old'));
            return false;
        }
        $('#' + tempThis.attr('data-response')).html(tempThis.val());

        //_this.removePromotion();
        _this.calutionPrice(roomTableOjb);
        //console.log('#'+ tempThis.attr('data-response'));
        //console.log(tempThis.val());
        //$(this).val();
        //console.log($(this).attr('data-response'));
    });
    $('body').delegate('.btn_prev', 'click', function (event) {
        event.preventDefault();
        $('input[name="Others[ajax]"]').val(false);
        window.history.back();
    });
    $('body').delegate('.ajaxBtn', 'click', function (event) {
        event.preventDefault();

        var tempThis = $(this);
        _this.ajaxFormSend(tempThis.closest('form'), tempThis.attr('data-url'), tempThis.attr('data-nexturl'));

    });

    /*
     $('body').delegate('.showSiblings', 'click', function (event) {
     //event.preventDefault();
     thisTmp_obj = $(this);
     //console.log(thisTmp_obj.is(':checked'));
     //if (thisTmp_obj.is(':checked')) {
     thisTmp_obj.siblings('.hidden').slideToggle('fast');
     //}
     
     });
     */


    _this.getNoOfPeople = function () {
		//console.log(child_dropDownObj.val());
		//console.log(adults_dropDownObj.val());
        return parseInt(adults_dropDownObj.val()) + parseInt(child_dropDownObj.val());
    }

    _this.getSelectedRoom = function () {
        return $('#room_' + stateroom_dropDownObj.find("option:selected").val());
    }

    _this.definePromotionCode = function (promotion_type) {
        promotion_array = promotion_type.split("-", 2);
        return promotion_array;
    }
    _this.operators = {
        'currency': function (a, b) {
            return b * -1
        },
        'percentage': function (a, b) {
            return (a * (b / 100)) * -1;
        },
        'cruisefare': function (a, b) {
            return a * -1;
        },
        'cruisefare_50percent': function (a, b) {
            return (a * (0.5)) * -1;
        }
    };
    _this.removePromotion = function () {

        if (promotion_codeObj.val() != '') {

            promotion_codeObj.val('');
            promotion_codeObj.siblings(".prmo_name").html("");
            alert('Please input the promotion code again to apply that on your latest changes.');
        }
    };
    _this.calutionPrice = function (roomTableOjb, promotionObj) {
        var sum = 0;
        var noOfPeople = _this.getNoOfPeople();
        var ncff = parseInt(roomTableOjb.attr('data-ncff'));
        var f1 = parseInt(roomTableOjb.attr('data-fare1')) + ncff;
        var f2 = parseInt(roomTableOjb.attr('data-fare2')) + ncff;
        var f1_withoutNcff = parseInt(roomTableOjb.attr('data-fare1'));
        var f2_withoutNcff = parseInt(roomTableOjb.attr('data-fare2'))
        //var plusArray = new Array(parseInt(roomTableOjb.attr('data-taxes')), parseInt(roomTableOjb.attr('data-port')), ncff);
        var plusArray = new Array(parseInt(roomTableOjb.attr('data-taxes')), parseInt(roomTableOjb.attr('data-port')));
        var promotionCode = typeof promotionObj != 'undefined' ? _this.definePromotionCode(promotionObj.type) : null;
        //alert(promotionCode)
        //console.log(plusArray);
        //console.log(promotionCode);
        if (noOfPeople == 1) {//extra-charge
            sum = f1;
            //sum += f1_withoutNcff;
			//console.log(f1_withoutNcff);
        }

        for (var i = 1; i <= noOfPeople; i++) {
            if (promotionCode != null && promotionObj.type == "flexible-discount") {
                //console.log("1123213");
                console.log(eval("promotionObj.ccf_discount_" + i + "_type"));
                console.log(f1_withoutNcff);
                console.log(f2_withoutNcff);
                console.log(ncff);
                console.log(eval("parseInt(promotionObj.flexible_discount_ccf_" + i + ")"));
                console.log(eval("parseInt(promotionObj.flexible_discount_nccf_" + i + ")"));
                if (eval("promotionObj.ccf_discount_" + i + "_type == '$'")) {
                    //console.log('a');
                    if (i <= 2) {

                        sum +=  f1_withoutNcff - eval("parseInt(promotionObj.flexible_discount_ccf_" + i + ")")
                    }
                    else {
                        sum +=  f2_withoutNcff - eval("parseInt(promotionObj.flexible_discount_ccf_" + i + ")")
                    }
                }
                else  {
                    //console.log('b');
                    if (i <= 2) {
                        sum +=  f1_withoutNcff * (1 - (eval("parseInt(promotionObj.flexible_discount_ccf_" + i + ")")/100));
                    }
                    else {
                        sum +=  f2_withoutNcff * (1 - (eval("parseInt(promotionObj.flexible_discount_ccf_" + i + ")")/100));
                    }
                }
                if (eval("promotionObj.nccf_discount_" + i + "_type == '$'")) {
                    //console.log('c');
                    sum +=  ncff - eval("parseInt(promotionObj.flexible_discount_nccf_" + i + ")")
                }
                else {
                    //console.log('d');
                    sum +=  ncff * (1 - (eval("parseInt(promotionObj.flexible_discount_nccf_" + i + ")"))/100)
                }
            }
            else {
                if (i <= 2) {

                    sum += f1;
                    if (promotionCode !== null) {
                        if (promotionCode[1] === 'all' || promotionCode[1] === 'onetwo' && i <= 2 || promotionCode[1] === 'two' && i == 2) {

                            sum += _this.operators[promotionCode[0]](f1, promotionObj.figure_per_guest);
                                //console.log(_this.operators[promotionCode[0]](f1, promotionObj.figure_per_guest));
                        }
                    }
                } else {

                    sum += f2;
                    if (promotionCode !== null) {                         
                        if (promotionCode[1] === 'all' || promotionCode[1] === 'threefour') {
                                //if ($.inArray(promotionCode[0], ['cruisefare'])) {

                            sum += _this.operators[promotionCode[0]](f2, promotionObj.figure_per_guest);
                                //}
                        }
                    }
                }
	        }
            $.each(plusArray, function (index, value) {

                sum += value;
                //console.log(sum);
            });
            //console.log('=================================');
        }

        $('#totalPrice').html(sum.formatMoney(2, '.', ','));
        $('#Others_price').val(sum);
        //return sum   
    }




    _this.ajaxFormSend = function (form, path, nextPath)
    {

        var data = form.serialize();

        $.ajax({
            type: 'POST',
            url: path,
            data: data,
            success: function (data) {
                //$('.inner > .main-container').replaceWith ('<div class="main-container">' + data + '</div>');
                if (data == "scuessful") {
                    window.location.href = nextPath;
                } else {
                    $('.inner > .main-container').html(data);
                    //$('.col_right').append('hahaah');
                    $(".inner").find('select').select2({
                        minimumResultsForSearch: Infinity
                    });

                    $('.datePicker').datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'dd/mm/yy'
                    });
                }
                //console.log(data);
            },
            error: function (data) { // if error occured
                console.log("Error occured.please try again");
                console.log(data);
            },
            dataType: 'html'
        });
    }


    _this.counter = function (limitTime, currentTime, redirectUrl, releaseRoomLock) {

        timeLeft = limitTime - currentTime;
        alertTime = Math.round(timeLeft / 2);
        //console.log(alertTime);
        refreshTimer = setInterval(
                function () {
                    timeLeft--;
                    //console.log(timeLeft);
                    //console.log(timeLeft);
                    //console.log(alertTime);

                    if (timeLeft == alertTime) {

                        remaing_min = Math.round(alertTime / 60);
                        if (alertTime >= 60) {
                            alert('You only have ' + remaing_min + ' mins left!');
                        } else {
                            alert('You only have ' + alertTime + ' sec left!');
                        }
                    } else if (timeLeft == 0) {

                        setTimeout(function () {

                            $.ajax({
                                type: 'GET',
                                url: releaseRoomLock,
                                success: function (data) {
                                    //$('.inner > .main-container').replaceWith ('<div class="main-container">' + data + '</div>');

                                    alert('This booking have expired, your reserved room have been released.');
                                    window.location.replace(redirectUrl);
                                },
                            });
                        }, (alertTime * 1000) + 1000);
                        clearInterval(refreshTimer);
                    }
                },
                1000
                );
    }

    _this.showStepOneSubmitButton = function (roomID) {

        //console.log(roomID);
        if ($(roomID).attr('data-disable') == 'false') {
            $('#stepOneSubmitButton').show();
        } else {
            $('#stepOneSubmitButton').hide();
        }
    }

	
	_this.calculateAdults = function () {
		
			var selector = '';
			var capacity = 4;
			var roomTableOjb = _this.getSelectedRoom();
            remaining = roomTableOjb.attr('data-capacity') - parseInt(child_dropDownObj.val());
			no_adult_options = adults_dropDownObj.find('option').length;
			loop = no_adult_options - remaining ;
            for (i = 0; i < loop; i++) {
                selector += 'option[value="' + (capacity - i  ) + '"]';
                if (i != loop - 1) {
                    selector += ',';
                }
            }
            //console.log(selector);
            adults_dropDownObj.find('option').removeAttr('disabled');
            adults_dropDownObj.find(selector).attr('disabled', 'disabled');
            adults_dropDownObj.select2({
                minimumResultsForSearch: Infinity
            });

            /*
             adults_dropDownObj.select2('destroy'); 
             adults_dropDownObj.select2({
             data: [
             { id: 0, text: 'enhancement' },
             { id: 1, text: 'bug' }
             ],
             });
             */
            //adults_dropDownObj.find('option[value="1"]').attr('disabled', 'disabled');
            //child_dropDownObj = .find('option[value="2013Q4"]').attr('disabled', 'disabled');
	}
	
	_this.calculateChild = function () {
		
			var selector = '';
			var capacity = 4;
			var roomTableOjb = _this.getSelectedRoom();
            remaining = roomTableOjb.attr('data-capacity') - parseInt(adults_dropDownObj.val());
			no_child_options = child_dropDownObj.find('option').length;
			loop = no_child_options - remaining;
            for (i = 1; i < loop; i++) {
                selector += 'option[value="' + (capacity - i) + '"]';
                if (i != loop - 1) {
                    selector += ',';
                }
            }
            //Sai
            //http://prodev01.fevaworks.net/sai/royalcaribbean/booking/testdrive/index.php/booking/stepone/id/VY0718
            //http://www.royalcaribbean.com/booking/getDepartureInfo/checkAvailability.do?StickToDomain=USA&cruiseType=CO&sailDate=1151106&selectedCurrencyCode=USD&shipCode=AL&packageCode=AL02S021&accessCabin=false

            //console.log(selector);
            //adults_dropDownObj =  $("#qtr").find('option[value="2013Q4"]').attr('disabled', 'disabled');
            //console.log(selector);
            child_dropDownObj.find('option').removeAttr('disabled');
            child_dropDownObj.find(selector).attr('disabled', 'disabled');
            child_dropDownObj.select2({
                minimumResultsForSearch: Infinity
            });
	}
	
    _this.init = function () {
        //init!
        $('#room_' + stateroom_dropDownObj.val()).show();
        _this.showStepOneSubmitButton('#room_' + stateroom_dropDownObj.val());
    }

    _this.init();
}

$(document).ready(function () {

    royalObject = new royalcaribbean();

    console.log(royalObject);
});
/*
 jQuery(function ($) {
 });
 */