<?php
namespace app;
/**
 * class MSG24x7 to send SMS on Mobile Numbers.
 * @author Harhukam Singh
 */
class MSG24X7 {

    function __construct() {
    }

    private $API_KEY ='TyDqvfH3JI4';
    private $SENDER_ID ='SUPIMI';
    private $SERVICE_NAME ='PROMOTIONAL_HIGH';
    private $RESPONSE_TYPE ='json';

    public function sendSMS($mobileNumber, $message)
    {
        $isError = 0;
        $errorMessage = true;
        // $message = urlencode($message);

        //Preparing post parameters
        $postData = [
            'APIKEY'            => $this->API_KEY,
            'MobileNo'          => $mobileNumber,
            'Message'           => $message,
            'SenderID'          => $this->SENDER_ID,
            'ServiceName'       => $this->SERVICE_NAME,
            'response'          => $this->RESPONSE_TYPE,
        ];
        $url = "https://smsapi.24x7sms.com/api_2.0/SendSMS.aspx";
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
        ));

        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);

        $output = curl_exec($ch);//get response
        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);
        if($isError){
            return array('error' => 1, 'message' => $errorMessage);
        }else{
            return array('error' => 0 );
        }
    }

}

