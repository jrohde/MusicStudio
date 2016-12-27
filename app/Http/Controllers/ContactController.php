<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Storage;
use Input;
use Mail;
use App\PromoOrder;

class ContactController extends Controller
{
    public function postContact(Request $request){
    	$this->validate($request, [
    		'name' => 'required|min:3',
    		'email' => 'email|required',
    		'message' => 'required|min:10',
    		'demo_link' => 'url|min:8',
    		'demo_link1' => 'url|min:8',
    		'demo_link2' => 'url|min:8'
    		//'demo' => 'mimes:mpga,wav,tiff|max:10000'
    		]);

    	$data = [
    		'nameSender' => $request->name,
    		'email' => $request->email,
    		'bodyMessage' => $request->message,
    		'demo_link' => $request->demo_link,
    		'demo_link1' => $request->demo_link1,
    		'demo_link2' => $request->demo_link2
    		//'demo' => $request->demo
    	];

   //  	if (!empty($request->file('demo'))) {
   //  		$demo = $request->file('demo');
			// $demo_name = $request->file('demo')->getClientOriginalName();
			// $extencion = $request->file('demo')->getClientOriginalExtension();
			// $storing = Storage::disk('demos')->put($demo_name, \File::get($demo));
			// $path_image = "../storage/demos/" . $demo_name;
   //  	}

    	Mail::send('emails.email_footer', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('info@eltridente.xyz');
            $message->subject('Nueva mail desde El Tridente');
            // if ($request->file('demo')) {
            // 	$message->attach($data['demo']);
            // }
        });
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function postContactPromo(Request $request){
        $this->validate($request, [
            'plan' => 'required',
            'name' => 'required|min:3',
            'email' => 'email|required|min:5',
            'tel' => '',
            'date' => '',
            'message' => ''
        ]);

        $dataMail = [
            'plan' => $request->get('plan'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'date' => $request->input('date'),
            'bodymessage' => $request->input('message')
        ];

        $promoOrder = new PromoOrder();
        $promoOrder->plan = $request->plan;
        $promoOrder->name = $request->name;
        $promoOrder->email = $request->email;
        $promoOrder->tel = $request->tel;
        $promoOrder->date = $request->date;
        $promoOrder->message = $request->message;

        $promoOrder->save();

        Mail::send('emails.email_promo', $dataMail, function($message) use($dataMail){
            $message->from($dataMail['email']);
            $message->to('info@eltridente.xyz');
            $message->subject('El Tridente: Pedido Promo');
        });

        return response()->json(['success' => true, 'dataMail' => $dataMail]);
    }
}
