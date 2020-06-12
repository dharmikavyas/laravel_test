<?php

use Carbon\Carbon;
use App\Model\ApiLog;

// function sendEmail($email,$email_data, $noti_type)
// {  
//     $name = $email_data['name'];  
//     $reason = $email_data['reason'];
//     $data = array('name'=>$name,'from_date'=>$fd,'todate'=>$td,'leave_days'=>$leave_days,'reason'=>$reason);               
//     $subject = "Leave Request From ".$name." For ".$leave_days." days";
//     Mail::send(['html'=>'Leave.leave_apply'], $data, function($message) use ($toemail,$subject,$fromemail) {
//         $message->to('dharmika.ingeniousmindslab@gmail.com')->subject($subject);
//         $message->from($fromemail,'Time Doctor System'); 
//     });                   
   
// }
function sendEmail($email,$email_data, $noti_type)
{  

    if($noti_type == 'forgot_password')
    {
        $toemail = $email;
    $newpassword = $email_data;
    
    }
    
    $reason = $email_data['reason'];
    $data = array('name'=>$name,'from_date'=>$fd,'todate'=>$td,'leave_days'=>$leave_days,'reason'=>$reason);               
    $subject = "Leave Request From ".$name." For ".$leave_days." days";
    Mail::send(['html'=>'Leave.leave_apply'], $data, function($message) use ($toemail,$subject,$fromemail) {
        $message->to('dharmika.ingeniousmindslab@gmail.com')->subject($subject);
        $message->from($fromemail,'Time Doctor System'); 
    });                   
   
}
function apilogs($api_url='', $api_request= '', $api_response= '', $login_user_id ='')
{
    $api_log = new ApiLog([
        'api_url' => $api_url,
        'api_request' => json_encode($api_request),
        'api_response' => $api_response,
        'login_user_id' => $login_user_id
    ]);
    $api_log->save(); 
}
