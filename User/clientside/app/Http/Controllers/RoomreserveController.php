<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Roomreserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomreserveController extends Controller
{
    public function reserveRoom(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'check_in' => 'required',
            'check_out' => 'required'
,
           ]);

           $url = 'https://fcm.googleapis.com/fcm/send';
           $FcmToken = Roomreserve::whereNotNull('device_token')->pluck('device_token')->all();
           $serverKey = 'AAAAG19Nq2g:APA91bEefKZP2yKmAAMTjTPhJuDyFLpUiVDE9Lv2siC8xuciFMXp13Fi9Q_YryCEsLpu0AlVdlr3_5ecFZHE3YoodQm1lpBUvySL9QSENUe5uBR5wnC8BXQfbHTQ_cswreuhvSdtzXUT'; // ADD SERVER KEY HERE PROVIDED BY FCM
    
           $da = [
               "device_token" => $FcmToken,
               "notification" => [
                   "name" => $request->name,
                    
               ]
           ];
           $encodedData = json_encode($da);
       
           $headers = [
               'Authorization:key=' . $serverKey,
               'Content-Type: application/json',
           ];

           $ch = curl_init();
        
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
           curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
           // Disabling SSL Certificate support temporarly
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
           // Execute post
           $result = curl_exec($ch);
           if ($result === FALSE) {
               die('Curl failed: ' . curl_error($ch));
           }        
           // Close connection
           curl_close($ch);
           // FCM response
           dd($result);


           $data= array();
           $data['name']= $request->name;
           $data['phone']= $request->phone;
           $data['room_id']= $request->id;
           $data['check_in']= $request->check_in;
           $data['check_out']= $request->check_out;
           $data['device_token']= $encodedData;

           DB::table('room_reserve')->insert($data);

           return response()->json('Done');

    }

    public function reserveList($phone){

        $result= Roomreserve::with('room')->where('phone', $phone)->get();
        return $result;
    }


    // public function updateDeviceToken(Request $request)
    // {
    //     $data= array();
    //     $data['device_token']= $request->token;
    //     $data['name']= $request->name;
    //     $data['phone']= $request->phone;
    //     $data['room_id']= $request->room_id;
    //     $data['check_in']= $request->check_in;
    //     $data['check_out']= $request->check_out;

    //     DB::table('room_reserve')->insert($data);

    //     return response()->json(['Token successfully stored.']);
    // }

    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = Roomreserve::whereNotNull('device_token')->pluck('device_token')->all();
            
        $serverKey = ''; // ADD SERVER KEY HERE PROVIDED BY FCM
    
        $data = [
            "registration_ids" => $FcmToken,
            // "notification" => [
            //     "name" => $request->name,
            //     "body" => $request->body,  
            // ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }




}
