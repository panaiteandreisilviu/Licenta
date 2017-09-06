<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailInbox extends Model
{
    protected $fillable = ['user_id', 'host', 'host_username', 'host_password', 'active', 'type', 'label_name', 'label_color'];

    public function getLabelContrastColor() {

        //////////// hexColor RGB
        $R1 = hexdec(substr($this->label_color, 1, 2));
        $G1 = hexdec(substr($this->label_color, 3, 2));
        $B1 = hexdec(substr($this->label_color, 5, 2));

        //////////// Black RGB
        $blackColor = "#000000";
        $R2BlackColor = hexdec(substr($blackColor, 1, 2));
        $G2BlackColor = hexdec(substr($blackColor, 3, 2));
        $B2BlackColor = hexdec(substr($blackColor, 5, 2));

        //////////// Calc contrast ratio
        $L1 = 0.2126 * pow($R1 / 255, 2.2) +
            0.7152 * pow($G1 / 255, 2.2) +
            0.0722 * pow($B1 / 255, 2.2);

        $L2 = 0.2126 * pow($R2BlackColor / 255, 2.2) +
            0.7152 * pow($G2BlackColor / 255, 2.2) +
            0.0722 * pow($B2BlackColor / 255, 2.2);

        if ($L1 > $L2) {
            $contrastRatio = (int)(($L1 + 0.05) / ($L2 + 0.05));
        } else {
            $contrastRatio = (int)(($L2 + 0.05) / ($L1 + 0.05));
        }

        //////////// If contrast is more than 5, return black color
        if ($contrastRatio > 5) {
            return 'black';
        } else { //////////// if not, return white color.
            return 'white';
        }
    }

    /*----------------------------------------------------*/

    public function getAllRemoteInboxes(){
        $hostname = '{' . $this->host . '}';
        $username = $this->host_username;
        $password = $this->host_password;
        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect: ' . imap_last_error());
        return imap_getmailboxes($inbox, $hostname, "*");
    }

}
