<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SupportTicketController;




Route::group([
    'prefix'=>'support-ticket'
],function (){

    Route::get('list', [SupportTicketController::class, 'supportTicketList'])->name('Support.Ticket.list');
    Route::get('single/view/{id}', [SupportTicketController::class, 'ticketSingleView'])->name('Support.Ticket.Single.View');
    Route::post('reply/{id}', [SupportTicketController::class, 'supportTicketReply'])->name('Support-ticket.Reply');
    Route::get('ticket/status/change', [SupportTicketController::class, 'ticketStatusChange'])->name('Support.Ticket.ChangeStatus');

});


