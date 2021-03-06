<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    //

    public function sendNoti(Request $request)
    {
    	$token = $request->input("token");
        $message = $request->input("message");
    	$apikey = "AAAACTPQTXY:APA91bHuMqb_33kLpp8YG_a1_-ZULFHWGrGERyVvOL18V1czlyUqOJzToMBB8fF2ywuLIQLa0zRSZ2RbbyPl9Ave1QIJAOdnt7dgw5kPP138E0K8rxhxxz0S0Tnbhi8GyukhkmdPiOrh";
		$fcmUrl = 'https://fcm.googleapis.com/fcm/send';

	    $notification = [
            'title' =>'Lu Nge Media',
            'body' => $message
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => '/topics/android', //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . $apikey,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        return 'noti sent';
    }
}
