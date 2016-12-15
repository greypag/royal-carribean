$(function() {
    $(".btn-submit").off("click");
    $(".btn-submit").on("click", function() {
        if (confirm('We will charge your credit card $'+$('#totalPrice').text()+' . Click OK to confirm.')) {

            var result = true;
            $(".error").removeClass("error");
            $(".errorSummary li").hide(0);
            $(".errorSummary").hide(0);
            $("select").each(function() {
                if ($.trim($(this).val()).length <= 0) {
                    if ($(this).attr("name") == "expire_month") {
                        $(".errorSummary ul li:nth-child(4)").show(0);
                        $('span[aria-labelledby="select2-expire_month-container"]').addClass("error");
                    }
                    if ($(this).attr("name") == "expire_year") {
                        $(".errorSummary ul li:nth-child(5)").show(0);
                        $('span[aria-labelledby="select2-expire_year-container"]').addClass("error");
                    }
                    result = false;
                }

            });

            $("input[type=text]").each(function() {
                if ($.trim($(this).val()).length <= 0) {
                    if ($(this).attr("name") == "card_name") {
                        $(".errorSummary ul li:nth-child(2)").show(0);
                        $(this).addClass("error");
                    }
                    if ($(this).attr("name") == "card_number") {
                        $(".errorSummary ul li:nth-child(3)").show(0);
                        $(this).addClass("error");
                    }
                    result = false;
                } else {
                    if ($(this).attr("name") == "card_number" && isNaN($(this).val())) {
                        $(".errorSummary ul li:nth-child(6)").show(0);
                        $(this).addClass("error");
                        result = false;
                    }
                }

            });

            if ($("input[name=card_type]:checked").length == 0) {
                $(".errorSummary ul li:nth-child(1)").show(0);
                result = false;
            }

            if (!result) {
                $(".errorSummary").show(0);
            } else {
                $("#card-form").submit();
            }
        }
    });

});