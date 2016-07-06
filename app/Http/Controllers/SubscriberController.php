<?php
/**
 * Created by PhpStorm.
 * User: Sccofield
 * Date: 02-May-16
 * Time: 4:53 PM
 */

namespace App\Http\Controllers;


use App\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psy\Util\Json;


class SubscriberController extends Controller
{
    public function addSubscriber(Request $request)
    {
        $subscriber = new Subscriber();
        $subscriber->username = $request->request->get('username');
        $subscriber->password = $request->request->get('password');
        $subscriber->domain = $request->request->get('domain');
        $subscriber->email_address = $request->request->get('email_address');
        $subscriber->ha1 = (md5($subscriber->username . ':' . $subscriber->domain . ':' . $subscriber->password));
        $subscriber->ha1b = (md5($subscriber->username . '@' . $subscriber->domain . ':' . $subscriber->domain . ':' . $subscriber->password));
        $subscriber->save();
    }


    public function listSubscriber()
    {
        $subscribers = Subscriber::all(array('id', 'username', 'domain', 'email_address'));
        return new JsonResponse($subscribers);


    }

    public function getSubscriber($id){

        $subscriber = Subscriber::find($id, array('id', 'username', 'domain', 'email_address'));
        return new JsonResponse($subscriber);


    }

    public function updateSubscriber(Request $request, $id){
        $subscriber = Subscriber::find($id);
        $subscriber->username = $request->request->get('username');
        $subscriber->password = $request->request->get('password');
        $subscriber->domain = $request->request->get('domain');
        $subscriber->email_address = $request->request->get('email_address');
        $subscriber->ha1 = (md5($subscriber->username . ':' . $subscriber->domain . ':' . $subscriber->password));
        $subscriber->ha1b = (md5($subscriber->username . '@' . $subscriber->domain . ':' . $subscriber->domain . ':' . $subscriber->password));
        $subscriber->save();
        return new JsonResponse($subscriber);


    }

    public function deleteSubscriber($id){
        $subscriber = Subscriber::find($id, array('id',));
        $subscriber->delete();

        return (array(
            'error' => false,
            'message' => 'url deleted',
            'status_code' => 200
        ));


    }
}