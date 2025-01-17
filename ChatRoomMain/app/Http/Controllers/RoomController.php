<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $joined_rooms = Auth::user()->rooms;
        $rooms = Room::where('owner_id', '=', Auth::user()->id)->get();
        return view('content.chatRoom', ['rooms'=> $rooms, 'joined_rooms'=> $joined_rooms]);
    }

    public function showRoom(Request $request){
        $input = $request->all();
        $infoRoom = Room::find($input['room_id']);
        $listMembers = $infoRoom->users;
        $ownerRoom = $infoRoom->owner;
        $listMembers = $listMembers->merge([$ownerRoom]);
        return response()->json(['infoRoom'=>$infoRoom , 'listMembers'=>$listMembers], 200);
    }

    public function storeRoom(Request $request) {
        $input = $request->all();
        $room = Room::create([
            'name' => $input['room_name'],
            'icon' => $input['room_icon'],
            'description' => $input['room_description'],
            'owner_id' => Auth::user()->id
        ]);
        return response()->json($room, 200);
    }
    public function searchRoom(Request $request) {
        $search_room_name = $request->input('search_room_name');
        $user = Auth::user();

        $user ? $owner_room_ids = $user->myRooms->pluck('id') : $owner_room_ids = [];
        $joined_room_ids = $user->rooms->pluck('id');
        $joined_room_ids = $joined_room_ids->merge($owner_room_ids);
        if($search_room_name != ""){
            $query = "";
            for ($i=0; $i<strlen($search_room_name); $i++){
                $query = $query.'%'.$search_room_name[$i];
            }
            $rooms = Room::whereNotIn('id', $joined_room_ids)->where('name', 'like', $query.'%')->get();
        } else{
            $rooms = Room::whereNotIn('id', $joined_room_ids)->get();
        }
        return response()->json($rooms, 200);
    }

    public function searchMember(Request $request){
        $input = $request->all();
        $member_search = $input['content'];
        if($member_search != ""){
            $query = "";
            for ($i=0; $i<strlen($member_search); $i++){
                $query = $query.'%'.$member_search[$i];
            }
            $members = Room::find($input['room_id'])->users()->where('name', 'like', $query.'%')->get();
        } else{
            $members = Room::find($input['room_id'])->users()->get();
        }
        echo "<pre>";
        print_r($members);
        echo "</pre>";
        exit();

        return response()->json($members, 200);
    }
    public function join(Request $request): JsonResponse{
        $user = Auth::user();
        $input = $request->all();
        $room = Room::find($input['room_id']);
        if($user && $room){
            $room->users()->attach($user->id);
        }
        $message = "You have joined the room";
        return response()->json(["message" => $message, "room"=>$room], 200);
    }
    public function chatbox(Request $request){
        $input = $request->all();
        $room = Room::find($input['room_id']);
        $listMembers = $room->users;
        $ownerRoom = $room->owner;
        $listMembers = $listMembers->merge([$ownerRoom]);
        $messages = $room->messages;
        $me = Auth::user();
        return response()->json(["room" => $room, 'messages'=>$messages, 'listMembers'=>$listMembers, 'me' => $me], 200);
    }

    // public function sendMess(Request $request){
    //     $input = $request->all();
    //     $message = Message::create([
    //         'content' => $input['content'],
    //         'type' => $input['type'],
    //         'room_id' => $input['room_id'],
    //         'user_id' => Auth::user()->id,
    //     ]);
    //     event(new MessageSent($request->all(), $input['room_id']));
    //     return response()->json($message,200);
    // }
    function sendMess(Request $request){
        $input = $request->all();

        $mess =Message::create([
            'chatRoomId' => $input['chatRoomId'],
            'content' => $input['content'],
            'type' => $input['type'],
            'userId' => Auth::user()->id,
        ]);
        return response()->json($mess, 200);
    }


}
