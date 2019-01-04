<?php

namespace App\Modules\print_terminal\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Storage;


class printTerminalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request) {
      $m_username = $request->m_username;
      $m_username = $m_username != null ? $m_username : '';

      if($m_username != '') { 
        // Decode
        $raw_print_queue = Storage::get('print_queue.txt') ;
        // die($raw_print_queue);
        $print_queue = json_decode($raw_print_queue);
        $will_print = $print_queue->{$m_username}[0];
        unset($print_queue->{$m_username}[0]);
        // Encode
        $rest_print_queue = [];
        foreach ($print_queue as $key => $unit) {
          $rest_print_queue[$key] = [];
          foreach ($unit as $x => $subunit) {
            array_push($rest_print_queue[$key], $subunit);
          }
        }

        $rewrite_print_queue = json_encode($rest_print_queue);
        Storage::put('print_queue.txt', $rewrite_print_queue);

        $filename = public_path($will_print);
        $headers = [
            'Content-Type' => 'application/text',
            "filename" => $will_print
        ];
        return response()->download($filename, $will_print, $headers);
      }
      else {
        return response(null, 500);
      }
    }

}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/
