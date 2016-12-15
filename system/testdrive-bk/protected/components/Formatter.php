<?php

class Formatter extends CFormatter {

    /**
     * @var array the format used to format a number with PHP number_format() function.
     * Three elements may be specified: "decimals", "decimalSeparator" and 
     * "thousandSeparator". They correspond to the number of digits after 
     * the decimal point, the character displayed as the decimal point,
     * and the thousands separator character.
     * new: override default value: 2 decimals, a comma (,) before the decimals 
     * and no separator between groups of thousands
     */
    public $numberFormat = array('decimals' => 2, 'decimalSeparator' => '.', 'thousandSeparator' => ','); //Sai 12/03/2015

    /**
     * Formats the value as a number using PHP number_format() function.
     * new: if the given $value is null/empty, return null/empty string
     * @param mixed $value the value to be formatted
     * @return string the formatted result
     * @see numberFormat
     */

    public function formatNumber($value) {
        if ($value === null)
            return null;    // new
        if ($value === '')
            return '';        // new
        return number_format($value, $this->numberFormat['decimals'], $this->numberFormat['decimalSeparator'], $this->numberFormat['thousandSeparator']);
    }

    /*
     * new function unformatNumber():
     * turns the given formatted number (string) into a float
     * @param string $formatted_number A formatted number 
     * (usually formatted with the formatNumber() function)
     * @return float the 'unformatted' number
     */

    public function unformatNumber($formatted_number) {
        if ($formatted_number === null)
            return null;
        if ($formatted_number === '')
            return '';
        if (is_float($formatted_number))
            return $formatted_number; // only 'unformat' if parameter is not float already

        $value = str_replace($this->numberFormat['thousandSeparator'], '', $formatted_number);
        $value = str_replace($this->numberFormat['decimalSeparator'], '.', $value);
        return (float) $value;
    }

    /*
      public function calculatePrice($noOfPeople, $roomModel, $itineraryModel) {

      $f1 = $roomModel[0]->fare_guest1_2;
      $f2 = $roomModel[0]->fare_guest3_4;
      $plusArray = array(Yii::app()->format->unformatNumber($itineraryModel[0]->taxes_fee), Yii::app()->format->unformatNumber($itineraryModel[0]->port_expenses));
      $sum = 0;
      for ($i = 1; $i <= $noOfPeople; $i++) {

      if ($i <= 2) {

      $sum = $sum + $f1;
      } else {

      $sum = $sum + $f2;
      }

      foreach ($plusArray as $key => $value) {

      $sum = $sum + $value;
      }
      }

      return $sum;
      //return $this->formatNumber($sum);
      } */

    public function calculatePrice($noOfPeople, $roomModel, $itineraryModel, $promotionCodeObj = null) {
        
        $ncff = Yii::app()->format->unformatNumber($itineraryModel->ncff);
        $f1 = $roomModel->fare_guest1_2 + $ncff;
        $f2 = $roomModel->fare_guest3_4 + $ncff;
        $f1_withoutNCFF = $roomModel->fare_guest1_2 ;
        $f2_withoutNCFF = $roomModel->fare_guest3_4 ;

        $sum = 0;
        $otherPrice = 0;

        $guestArray = array();
        $plusArray = array(
            'taxes_fee' => Yii::app()->format->unformatNumber($itineraryModel->taxes_fee),
            //'port_expenses' => Yii::app()->format->unformatNumber($itineraryModel->port_expenses),
            //'ncff' => Yii::app()->format->unformatNumber($itineraryModel->ncff)
        );
        if (isset($promotionCodeObj)) {
            $promotionCode = $this->definePromotionCode($promotionCodeObj->type);
            //CVarDumper::dump($promotionCodeObj, 10, true);
        } else {
            $promotionCode = null;
        }

        foreach ($plusArray as $value) {

            //$sum = $sum + $value;
            $otherPrice = $otherPrice + $value;
        }




        $z = 0;
        for ($i = 1; $i <= $noOfPeople; $i++) {

            $subtotal = 0;
            $subtotal = $subtotal + $otherPrice;

            //CVarDumper::dump($promotionCode, 10, true);
            if ($i <= 2) {

                $subtotal = $subtotal + $f1;
                $guestArray[$z]['cruise_fare'] = $f1;
                
                
                //extra-charge for 1 person - SingleSupplement!!!!!
                if ($noOfPeople == 1) {
                    $calculateSingleSupplement = $this->calculateSingleSupplement($roomModel, $itineraryModel);
                    $subtotal = $subtotal + $calculateSingleSupplement;
                    $guestArray[$z]['cruise_fare'] =  $guestArray[$z]['cruise_fare'] + $calculateSingleSupplement;
                    $guestArray[$z]['singleSupplement'] =  $calculateSingleSupplement;
                }
                // if (strcmp($promotionCode[1], 'all') || strcmp($promotionCode[1], 'onetwo')) {
                if ($promotionCode[1] == 'all' || $promotionCode[1] == 'onetwo' && $i <= 2 || $promotionCode[1] === 'two' && $i == 2) {
                    $discount = Yii::app()->format->promotionOperator($promotionCode, $f1_withoutNCFF, $promotionCodeObj->figure_per_guest);
                    $subtotal = $subtotal + $discount;
                    $guestArray[$z]['discount'] = $discount;
                }
            } else {

                $subtotal = $subtotal + $f2;
                $guestArray[$z]['cruise_fare'] = $f2;

                // if (strcmp($promotionCode[1], 'all') || strcmp($promotionCode[1], 'threefour')) {
                if ($promotionCode[1] == 'all' || $promotionCode[1] == 'threefour') {

                    $discount = Yii::app()->format->promotionOperator($promotionCode, $f2_withoutNCFF, $promotionCodeObj->figure_per_guest);
                    $subtotal = $subtotal + $discount;
                    $guestArray[$z]['discount'] = $discount;
                }
            }

            //CVarDumper::dump($sum + $subtotal, 10, true);
            $sum = $sum + $subtotal;
            $guestArray[$z]['subtotal'] = $subtotal;
            $z++;
        }


        $reutnr_array = array(
            'sum' => $sum,
            'guestArray' => $guestArray,
            'otherPrice' => $otherPrice
        );
        return $reutnr_array;
//return $this->formatNumber($sum);
    }

    public function calculateSingleSupplement($roomModel, $itineraryModel) {

        $f1 = $roomModel->fare_guest1_2;
        //$ncff = Yii::app()->format->unformatNumber($itineraryModel->ncff);
        //return $f1 + $ncff;
      
        return $f1;
    }

    public function definePromotionCode($promotion_type) {
        $promotion_array = explode("-", $promotion_type, 2);
        return $promotion_array;
    }

    public function promotionOperator($promotion_array, $a, $b) {
        if ($promotion_array[0] == 'currency') {
            return $b * -1;
            // return $a - $b;
        } else if ($promotion_array[0] == 'percentage') {
            return ($a * ($b / 100)) * -1;
        } else if ($promotion_array[0] == 'cruisefare') {
            return $a * -1;
        } else if ($promotion_array[0] == 'cruisefare_50percent') {
            return ($a * (0.5)) * -1;
        }
    }

    public function promotionType($name) {

        $promotionType = array(
            'currency-all' => 'HK$X off per person - all',
            'currency-onetwo' => 'HK$X off per person - 1st and 2nd berth',
            'currency-threefour' => 'HK$X off per person - 3rd and 4th berth',
            'percentage-all' => 'X% off - all',
            'percentage-onetwo' => 'X% off - 1st and 2nd berth',
            'percentage-threefour' => 'X% off - 3rd and 4th berth',
            'cruisefare-threefour' => '3rd and 4th berth waive cruise fare ',
            'cruisefare-two' => '2nd person waive cruise fare',
            'cruisefare_50percent-two' => '2nd person half price',
            'others' => 'Non Pricing'
        );

        return $promotionType[$name];
    }

    /*     * ***********************Helper************************ */

    public function jqueryJson($result, $data) {
        header('Content-Type: application/json');
        $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
        echo ($callback ? $callback . '(' : '') . NJSON::encode(
                array(
                    "result" => $result,
                    //"data" => NJSON::encode( $_POST['Others']['promotion_code'] )
                    //"data" => NJSON::encode($data)
                    "data" => $data
        )) . ($callback ? ')' : '');
    }

}
