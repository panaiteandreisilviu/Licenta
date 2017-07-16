<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Client;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // seteaza in services.php !!

        $oClient = new Client([
            'host'          => 'imap.gmail.com', /*getenv('IMAP_HOST'),*/
            'port'          => '993', /*getenv('IMAP_PORT'),*/
            'encryption'    => 'ssl', /*getenv('IMAP_ENCRYPTION'),*/
            'validate_cert' => 'true', /*getenv('IMAP_VALIDATE_CERT'),*/
            'username'      => 'panaiteandreisilviu', /*getenv('IMAP_USERNAME'),*/
            'password'      => '', /*getenv('IMAP_PASSWORD'),*/
        ]);

        //Connect to the IMAP Server
        $oClient->connect();

        //Get all Mailboxes
        $aMailboxes = $oClient->getFolders();

        return $aMailboxes;

        //Loop through every Mailbox
        /** @var \Webklex\IMAP\Folder $oMailbox */
        foreach($aMailboxes as $oMailbox){

            //Get all Messages of the current Mailbox
            /** @var \Webklex\IMAP\Message $oMessage */
            foreach($oMailbox->getMessages() as $oMessage){
                echo $oMessage->subject.'<br />';
                echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
                echo $oMessage->getHTMLBody(true);

//                //Move the current Message to 'INBOX.read'
//                if($oMessage->moveToFolder('INBOX.read') == true){
//                    echo 'Message has ben moved';\
//                }else{
//                    echo 'Message could not be moved';
//                }
            }
        }

        return null;

        return view('admin.mail.index', compact('aMailboxes'));
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
        //
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
        //
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
