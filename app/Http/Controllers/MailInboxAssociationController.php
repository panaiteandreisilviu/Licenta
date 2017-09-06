<?php

namespace App\Http\Controllers;

use App\MailInbox;
use App\MailInboxAssociation;
use Illuminate\Http\Request;

class MailInboxAssociationController extends Controller
{
    /**
     *
     * @param MailInbox $mailInbox
     * @return \Illuminate\Http\Response
     */
    public function index(MailInbox $mailInbox)
    {
        $mailInboxRemoteList = $mailInbox->getAllRemoteInboxes();
        return view('admin.mail_inbox_associations.index', compact('mailInbox', 'mailInboxRemoteList'));
    }

    /**
     *
     * @param Request $request
     * @param MailInbox $mailInbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailInbox $mailInbox)
    {
        dd($request->all());
        MailInboxAssociation::where('mail_inboxes_id', $mailInbox->id)->delete();
        foreach ($request['a'] as $host => $association) {
            if(!is_null($association)){
                MailInboxAssociation::create([
                    'host' => $host,
                    'mail_inboxes_id' => $mailInbox->id,
                    'inbox_association' => $association
                ]);
            }
        }

        request()->session()->flash('success_message', 'Associations successfully saved!');

        return redirect("/admin/mail_inboxes");

    }

}
