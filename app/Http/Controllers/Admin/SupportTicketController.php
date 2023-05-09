<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\SupportTicketConvo;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function supportTicketList(){

        $tickets = SupportTicket::with('user')->get();

        return view('admin.pages.support_ticket.pages.support_ticket_list', ['tickets' => $tickets]);
    }

    public function ticketSingleView($id){
        $supportTicket = SupportTicket::where('id',$id)->get();
        return view('admin.pages.support_ticket.pages.singleView',compact('supportTicket'));
    }

    public  function supportTicketReply(Request $request, $id)
    {

        $reply=[
            'admin_message'=>$request->reply,
            'admin_id'=> session()->get('user')->id,
            'support_ticket_id'=> $id,
            'created_at' => now(),
            'updated_at' => now()
        ];
        SupportTicketConvo::insert($reply);
        return redirect()->back();

    }

    public function ticketStatusChange(Request $request){
        $ticket = SupportTicket::find($request->support_id);
        $ticket->status = $request->status;
        $ticket->update();
        return response()->json(['success' => 'Status Changed Successfully']);
    }


}
