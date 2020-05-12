<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class NotificationController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of notifications
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notifications = Notification::all();     
        return $this->successResponse($notifications);
      
    }

    /**
     * Create one new notification
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'title'=>'required',
            'message'=>'required',
            'status'=>'required',
            'user_id'=>'required|integer',
        ]);
       
        $notification = Notification::create($request->all());          
        return $this->successResponse($notification,Response::HTTP_CREATED);
       
    }

    /**
     * get one notification
     *
     * @return Illuminate\Http\Response
     */
    public function show($notification)
    {
        //

        $notification = Notification::findOrFail($notification);
        return $this->successResponse($notification);
        
    }

    /**
     * update an existing one notification
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$notification)
    {

        $this->validate($request,[

            'user_id'=>'integer',
        ]);
        $notification = Notification::findOrFail($notification);
        $notification->fill($request->all());

        
        if($notification->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $notification->save();
        return $this->successResponse($notification);
    }

     /**
     * remove an existing one notification
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($notification)
    {
        $notification = Notification::findOrFail($notification);
        $notification->delete();
        return $this->successResponse($notification);
      
    }

}
