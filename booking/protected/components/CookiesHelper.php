<?php

//Sai
//http://www.yiiframework.com/wiki/591/yii-use-arrays-in-cookies-a-helper-class-for-using-arrays-in-cookies/
class CookiesHelper extends CApplicationComponent {

    public function putCMsg($name, $value, $expire = null) {
        if (is_array($value))
            $cookie = new CHttpCookie($name, json_encode($value));
        if (is_string($value))
            $cookie = new CHttpCookie($name, $value);

        if (!is_null($expire)) {
            $cookie->expire = $expire;
        }
        //$cookie->httpOnly = false;

        //CVarDumper::dump($cookie->httpOnly, 10, true);
        //$cookie->secure = true;
        Yii::app()->request->cookies[$name] = $cookie;
        return true;
    }

    public function getCMsg($name) {
        if (!empty(Yii::app()->request->cookies[$name])) {
            $return = json_decode(Yii::app()->request->cookies[$name]);
            if (json_last_error() == JSON_ERROR_NONE && !is_string($return))
                return $return;
            else
                return Yii::app()->request->cookies[$name]->value;
        } else {

            //return 'Cookie not found';
            return null;
        }
    }

    public function updateCMsg($name, $value) {
        if (!empty(Yii::app()->request->cookies[$name])) {
            $return = json_decode(Yii::app()->request->cookies[$name]);
            if (json_last_error() == JSON_ERROR_NONE && !is_string($return)) {
                array_push($return, $value);
                Yii::app()->request->cookies[$name] = new CHttpCookie($name, json_encode($return));
                return true;
            } else {
                Yii::app()->request->cookies[$name] = new CHttpCookie($name, $value);
                return true;
            }
        } else {

            //return 'Cookie not found';
            return null;
        }
    }

    public function delCMsg($name = NULL) {
        unset(Yii::app()->request->cookies[$name]);
        return true;
    }

}
