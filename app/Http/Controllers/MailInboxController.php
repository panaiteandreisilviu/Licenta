<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MailInbox;
class MailInboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailInboxes = MailInbox::all();
        return view('admin.mail_inboxes.index', compact('mailInboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mail_inboxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'host' => 'required',
            'host_username' => 'required',
            'host_password' => 'required',
            'active' => 'required',
            'type' => 'required',
            'label_name' => 'required',
            'label_color' => 'required',
        ]);

        MailInbox::create([
            'user_id' => auth()->id(),
            'host' => request('host'),
            'host_username' => request('host_username'),
            'host_password' => request('host_password'),
            'active' => request('active'),
            'type' => request('type'),
            'label_name' => request('label_name'),
            'label_color' => request('label_color'),
        ]);

        $request->session()->flash('success_message', 'Mail inbox successfully saved!');

        return redirect('/admin/mail_inboxes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  MailInbox  $mailInbox
     * @return \Illuminate\Http\Response
     */
    public function edit(MailInbox $mailInbox)
    {
        return view('admin.mail_inboxes.edit', compact('mailInbox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  MailInbox $mailInbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailInbox $mailInbox)
    {

        $this->validate(request(), [
            'host' => 'required',
            'host_username' => 'required',
            'host_password' => 'required',
            'active' => 'required',
            'type' => 'required',
            'label_name' => 'required',
            'label_color' => 'required',
        ]);

        $mailInbox->host = request('host');
        $mailInbox->host_username = request('host_username');
        $mailInbox->host_password = request('host_password');
        $mailInbox->active = request('active');
        $mailInbox->type = request('type');
        $mailInbox->label_name = request('label_name');
        $mailInbox->label_color = request('label_color');

        $mailInbox->save();

        $request->session()->flash('success_message', 'Mail inbox successfully saved!');

        return redirect('/admin/mail_inboxes');
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
