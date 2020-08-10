<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Coupon;
use App\Model\Order;
use App\Model\Campaign;
use App\Model\Message;
use App\User;
use App\Model\Transaction;
use App\Model\Wallet;

use Illuminate\Support\Facades\Hash;

use CountryState;
use DateTimeZone;

use Twilio\Rest\Client;

use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceMail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $today=strtotime(date('yy-m-d'));
        $camps=Campaign::all();
        // foreach($camps as $key => $camp){
        //     $start_date =strtotime($camp->start_date);
        //     if(($today >= $start_date) && ( $camp->permission == "ready" )){
        //         $camp->permission="pending";
        //         $camp->save();
        //     }
        // }

        $coupons=Coupon::all();
        foreach($coupons as $key => $coupon){
            $start_date =strtotime($coupon->start_date);
            if(($today >= $start_date)  && ( $coupon->permission == "ready" )){
                $coupon->permission="pending";
                $coupon->save();
            }
        }

        $orders=Order::all();
        foreach($orders as $key => $order){
            $late_time_app =(strtotime(date('yy-m-d h:i:s'))-strtotime($order->start_time))/3600;
            if(($late_time_app >= 16)  && ( $order->status == "pre_approved" )){
                $order->status="approved";
                $msg=new Message();
                $msg->order_id=$order->id;
                $msg->date=date('yy-m-d h:i:s');
                $msg->message="Order #".$order->id." has been approved automatically.";
                $msg->msg_status=0;
                $msg->type=3;
                $msg->save();
                $order->save();
            }

            if($order->status == "disputed"){
                $late_time_dis=(strtotime(date('yy-m-d h:i:s'))-strtotime($order->disputed_date))/3600/24;
                if($late_time_dis >= 15){
                    $order->status="paidout";
                    $order->save();
                }
            }

            if($order->status == "approved"){
                $late_time_app=(strtotime(date('yy-m-d h:i:s'))-strtotime($order->approved_date))/3600/24;
                if($late_time_app >= 15){
                    $order->status="paidout";
                    $order->save();
                }
            }
        }

        $camps=Campaign::where('permission','online')->get();


        return view('intro.home',compact('camps'));
    }

    public function dashboard()
    {

        $role=auth()->user()->role->name;

       // echo 'redirect-'; var_dump($role);die;

        if($role){
            switch($role){
                case 'buyer':
                    $page = 'buyer.index';
                    return redirect()->route($page);
                break;
                case 'seller':
                    $page = 'seller.index';
                    return redirect()->route($page);
                break;
                case 'admin':
                    $page = 'admin.index';
                    return redirect()->route($page);
                break;
            }
        }else{
            return redirect('/');
        }


        return view($page,compact('role'));
    }

    public function passUpdate(Request $request){
        $user = User::where('email', $request->email)->first();;
        $pwd = $request->password;
        $user->password = Hash::make($pwd);
        $user->mail_verify = 1;
        $user->save();
        return redirect()->route('dashboard');
    }

    public function getState(Request $request){
        $country_id=$request->country_id;
        $states = CountryState::getStates($country_id);
        return json_encode($states);
    }

    public function test(Request $request) {
        $sendmail="gajanand.chepoori@gmail.com";
        $name = "Gajanand Chepoori";

        $from_name = config('services.mail')['from_name'];
        $from_email = config('services.mail')['from_email'];
        $subject = 'Notification Email Subject';
        $to_name = 'Gajanand Chepoori';
        $header = 'Notification Email Header';

        $content='This is a Test Email sent via Gmail SMTP Server.';

        try { Mail::to($sendmail, $to_name)->send(new ServiceMail($from_name, $from_email, $subject, $to_name, $header, $content));}
        catch(\Exception $e){ var_dump($e->getMessage()); die('done');}

        die('mail sent');

        // $opts = array(
        //       'http'=>array(
        //         'method'=>"GET",
        //          'header'=>"x-rapidapi-host: x-rapidapi-host\r\n"
        //         )
        //     );

        // $url = 'https://api.keepa.com/query?key=d0eh2424umiba165a8j2mavo8130q28st8dcvrbvsb7gobaakvuua0217jlagjep&domain=1&selection=%7B%22avg180_SALES_gte%22%3A1%2C%22avg180_SALES_lte%22%3A20000%2C%22avg180_AMAZON_gte%22%3A-1%2C%22avg180_AMAZON_lte%22%3A-1%2C%22avg180_NEW_gte%22%3A-1%2C%22avg180_NEW_lte%22%3A-1%2C%22current_COUNT_NEW_gte%22%3A0%2C%22current_COUNT_NEW_lte%22%3A0%2C%22productGroup%22%3A%5B%22major%20appliances%22%5D%2C%22sort%22%3A%5B%5B%22packageWeight%22%2C%22asc%22%5D%5D%2C%22productType%22%3A%5B0%2C1%2C5%5D%2C%22page%22%3A0%2C%22perPage%22%3A100%7D';
        //     $context = stream_context_create($opts);

        // $tz = file_get_contents($url,false, $context);
        // return $tz;
        // $tz = json_decode($tz,true);
        // return $tz;
    }


    public function getTimezone(Request $request){

        // $ip = file_get_contents("http://ipecho.net/plain");
        $ip=$request->ip();
        $url = 'http://ip-api.com/json/'.$ip;
        $tz = file_get_contents($url);
        $tz = json_decode($tz,true)['timezone'];

        $time_key=0;

        $timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        foreach ($timezones as $key => $timezone) {
            if($timezone == $tz){
                $time_key=$key;
            }
        }
        $result=array(
            'timezone' => $tz,
            'time_key' => $time_key,
        );
        return json_encode($result);
    }

    public function avatarUpload(Request $request){
        $user_id=auth()->user()->id;

        $request->validate([
            'avatar'  => 'image|max:2000'
        ]);

        $image = $request->file('avatar');


        $user= User::Find($user_id);

        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'),$imageName);
            $user->image=$imageName;
            $msg="Your avatar has been updated.";
            $user->save();
        }else{
            $msg="No file was uploaded";
        }
        return redirect()->back()->with('status', $msg);
    }

    public function removeAvatar($user_id){
        $user=User::Find($user_id);
        $user->image=null;
        $user->save();
        return redirect()->back()->with('status',' Your avatar has been deleted successfully.');
    }

    public function notificateUpdate(Request $request){
        $user_id=auth()->user()->id;
        $user=User::Find($user_id);
        if(count($request->notifications)==3){
            $user->key_update_status=1;
        }else{
            $user->key_update_status=0;
        }
        if(count($request->notifications['claim'])==2){
            $user->claimed_status=1;
            $user->email_claimed=$request->notifications['claim']['email'];
        }else{
            $user->claimed_status=0;
        }
        if(count($request->notifications['approval'])==2){
            $user->approval_status=1;
            $user->email_approval=$request->notifications['approval']['email'];
        }else{
            $user->approval_status=0;
        }
        $user->save();

        return redirect()->back()->with('status','Your notification settings have been successfully updated.');
    }

    public function buyerNotif(Request $request){
        $user_id=auth()->user()->id;
        $user=User::Find($user_id);
        if($request->newsletter_nof){
            $user->key_update_status=1;
        }else{
            $user->key_update_status=0;

        }
        if($request->lastet_status){
            $user->lastet_status=1;
        }else{
            $user->lastet_status=0;

        }
        if($request->claimed_status){
            $user->claimed_status=1;
        }else{
            $user->claimed_status=0;

        }
        if($request->purchase_status){
            $user->purchase_status=1;
        }else{
            $user->purchase_status=0;

        }
        $user->save();

        return redirect()->back()->with('status','Your notification settings have been successfully updated.');
    }

    public function emailChange(Request $request){
        $user_id=auth()->user()->id;
        $user=User::Find($user_id);
        $user->email=$request->new_email_address;
        $user->mail_verify=0;
        $user->save();
        return redirect()->route('dashboard');
    }



    public function codeSend(Request $request){
        $user_id=auth()->user()->id;

        $user=User::Find($user_id);

        $user->phone=$request->number;

        $code = random_int(1000, 9999);

        $user->phone_code=$code;

        $user->save();



        // $nexmo_key=config('services.nexmo.key');
        // $nexmo_secret=config('services.nexmo.secret');

        // $basic  = new \Nexmo\Client\Credentials\Basic($nexmo_key, $nexmo_secret);
        // $client = new \Nexmo\Client($basic);
        $sid    = "ACca8507abad02becaa9450b62396d4211";
        $token  = "584f3b211e1d491ef183c45bb9202b8d";
        $twilio = new Client($sid, $token);


        try{
        $message = $twilio->messages
                          ->create( $user->phone, // to
                                   array(
                                       "body" => $user->phone_code,
                                       "from" => "+18484561185"
                                   )
                          );
        //var_dump($message);die;
        }catch (\Services_Twilio_RestException $e) {
            die($e->getMessage());
        }

        die('asdas');
        if($message->sid) {
              return redirect()->back()->with('phone_check','code_check');
        }

        return redirect()->back()->with('error', $user->phone);

    }

    public function againSend(){

        $user_id=auth()->user()->id;
        $user=User::Find($user_id);

        $code = random_int(1000, 9999);

        $user->phone_code=$code;

        $user->save();

        // $nexmo_key=config('services.nexmo.key');
        // $nexmo_secret=config('services.nexmo.secret');

        // $basic  = new \Nexmo\Client\Credentials\Basic($nexmo_key, $nexmo_secret);
        // $client = new \Nexmo\Client($basic);


        // $sms = $client->message()->send([
        //     'to' => $user->phone,
        //     'from' => 'RebateKey',
        //     'text' => $user->phone_code
        // ]);
        $sms=true;

        if($sms) {
              return redirect()->back()->with('phone_check','code_check');
        }

        return redirect()->back()->with('error', $user->phone);

    }

    public function codeCheck(Request $request){
        $user_id=auth()->user()->id;
        $user=User::Find($user_id);
        $code=$request->code;

        if($code==$user->phone_code){
            $user->password = Hash::make($request->new_password) ?? '';
            $user->phone_verify = 1;
            $user->save();
            return redirect()->back()->with('status','Your verification has been completed!');
        }else{
            return redirect()->back()->with('phone_check','code_faild');
        }

    }

    public function passReset(Request $request){
        $user_id=auth()->user()->id;
        $user=User::Find($user_id);
        if(Hash::check($request->current_password, $user->password) == false){
           return redirect()->back()->with('failed','Your current password is not correct.');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('status','Your password has been reset.');

    }

    public function clear(){
        return "ddd";
        Campaign::query()->delete();
        Order::query()->delete();
        Message::query()->delete();
        Wallet::query()->delete();
        Transaction::query()->delete();
        return redirect()->route('dashboard');
    }

}
