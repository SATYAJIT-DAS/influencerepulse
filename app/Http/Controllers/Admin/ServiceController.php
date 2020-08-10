<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceMail;

use App\Model\Service;

class ServiceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msgs=Service::orderby('updated_at','DESC')->paginate(5);
        return view('backend.admin.service', compact('msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service=new Service($request->all());
        $service->status="unread";
        $service->save();
        $msg='Your message has been sent successfully.';
        return redirect()->back()->with('success','The message sent successfully.');
    }
    
    public function msgRead(Request $request){
        $services=Service::all();
        foreach ($services as $key => $service) {
            $service->status='readed, no response';
            $receive_time=date('yy-m-d h:i:s');
            $service->receive_time=date('F j, Y h:m ', strtotime($receive_time));
            $service->save();
        }
        return json_encode('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $services=Service::FindOrFail($id);

        return view('backend.admin.service_info', compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service_id=$request->service_id;
        $service=Service::FindOrFail($service_id);
        $service->response=$request->response;
        $service->response_time=date('F j, Y h:m ', strtotime(date('yy-m-d h:i:s')));
        $service->status="response";
        $service->save();

        $sendmail=Auth::user()->email;
        $sendmail="monolit2048@gmail.com";

        $name = 'Reply';
        $content=$request->response;
        
        Mail::to($sendmail)->send(new ServiceMail($name, $content));

        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
