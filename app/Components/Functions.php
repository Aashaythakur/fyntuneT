<?php

namespace App\Components;

use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Functions {

    public static function getUserDetails($data) {

        $response = [];
        $user_id = $data['user_id'];
        $user_type = $data['user_type'];

        switch ($user_type) {
            case 1:
                $model = DB::table(Admin::getTableName())->where('admin_id', $user_id)->first();
                if (!empty($model)) {
                    $response['admin_id'] = $model->admin_id;
                    $response['admin_name'] = $model->admin_name;
                }
                break;
            case 3:
                $model = DB::table(self::$table)->where('username', $user_id)->first();
                break;
            case 4:
                $model = DB::table(self::$table)->where('username', $user_id)->first();
                break;
        }

        if (!empty($model)) {
            $response['user_id'] = $user_id;
            $response['user_type'] = $user_type;
        }

        return $response;
    }

    public static function sendSMS($params = []) {
        $user = "u1kumar2002";
        $apikey = "Ryl2b1YVhnsSi7S1khDz";
        $senderid = "MEDIAX";
        $mobile = isset($params['mobile']) ? $params['mobile'] : '';
        $message = isset($params['message']) ? $params['message'] : '';
        $message = urlencode($message);
        $type = "txt";
        $ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=" . $user . "&apikey=" . $apikey . "&mobile=" . $mobile . "&senderid=" . $senderid . "&message=" . $message . "&type=" . $type . "");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $returnmessage = curl_exec($ch);
        curl_close($ch);
        if (empty($returnmessage)) {
            return false;
        } else {
            return true;
        }
    }

    /*
      write a function to show flash messages
     * 
     *  */

    public static function getFlash() {

        $str = '<div class = "flash-message">';
        foreach (['danger', 'warning', 'success', 'info'] as $msg) {
            if (\Session::has($msg)) {
                $str = $str . '<p class = "alert alert-' . $msg . '">' . \Session::get($msg) . '</p>';
            }
        }
        $str = $str . '</div>';
        echo $str;
    }
 
}
