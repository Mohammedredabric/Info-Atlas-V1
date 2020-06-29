<?php

namespace App\Http\Controllers;

use App\Mail\MailBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailBoxController extends Controller
{
    public function index(){
        return view('mailbox.index');
    }

    public function store(Request $request){


        $detail=$request->input('msg');

        $dom = new \DomDocument();

        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){

            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);

            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);

            $image_name= "/upload/" . time().$k.'.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);

        }

        $detail = $dom->saveHTML();
        $to=$request->input('to');
        $subject=$request->input('subject');
        $Message=$request->input($detail);
        Mail::to($to)->send(new MailBox($Message));

    }
}
