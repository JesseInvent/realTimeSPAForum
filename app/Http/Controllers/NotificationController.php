<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function index ()
    {
        return [
            'read' => NotificationResource::collection(auth()->user()->readNotifications),
            'unread' => NotificationResource::collection(auth()->user()->unreadNotifications)
        ];

        // return DB::table('notifications')->where('notifiable_id', auth()->user()->id)->get();
    }

    public function markAsRead (Request $request) {
        auth()->user()->notifications->where('id', $request->id)->markAsRead();
    }
}
