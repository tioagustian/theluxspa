<?php
/**
 * @author: Tio Agustian <tio.agustian94@gmail.com>
 * Website: https://tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * Released under the MIT license
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('order');
    }

    public function index()
    {
        $data = array();
        $rooms = $this->db->get('rooms')->result_array();
        $data['rooms'] = $rooms;
        return $this->load->view('booking', $data);
    }

    public function invoice($id = false)
    {
        if (!$id) {
            return redirect(base_url('booking'));
        }

        $id = addslashes($id);
        $result = $this->order->getServiceOrder($id);

        if (count($result) == 0) {
            return redirect(base_url('booking'));
        }

        foreach ($result['orders'] as $row) {
            
        }

        $invoice_detail['invoice_id'] = $id;
        $invoice_detail['name'] = $result['invoice_detail']->name;
        $invoice_detail['phone'] = $result['invoice_detail']->phone;
        $invoice_detail['email'] = $result['invoice_detail']->email;
        $invoice_detail['status'] = $result['invoice_detail']->status;
        $invoice_detail['date_created'] = date('d M Y, H:i', strtotime($result['invoice_detail']->created_at));
        $invoice_detail['expired_in'] = date('d M Y, H:i', strtotime($result['invoice_detail']->expiry));

        $order_detail['service'] = $result['orders']->service;
        $order_detail['therapis'] = $result['orders']->therapis;
        $order_detail['room'] = $result['orders']->room;
        $order_detail['price'] = number_format($result['orders']->price);
        $order_detail['total'] = number_format($result['orders']->total);
        $order_detail['duration'] = $result['orders']->duration . ' menit';
        $order_detail['date'] = date('d M Y', strtotime($result['orders']->date));
        $order_detail['time'] = date('H:i', strtotime($result['orders']->time));

        $invoice_detail['script'] = '';
        switch ($result['invoice_detail']->status) {
            case 'unpaid':
                // $invoice_detail['script'] = 'var countdown=setInterval(function(){var n=new Date("'.$invoice_detail['expired_in'].'").getTime()-(new Date).getTime(),a=(Math.floor(n/864e5),Math.floor(n%864e5/36e5));a<10&&(a="0"+a);var t=Math.floor(n%36e5/6e4);t<10&&(t="0"+t);var o=Math.floor(n%6e4/1e3);o<10&&(o="0"+o);var s=Math.floor(n%6e4/10).toString(),r=document.getElementById("countdown");r.innerHTML="("+a+":"+t+":"+o+":"+s.slice(-2)+")",n<0&&(e.style="color: red;",r.innerHTML="(EXPIRED)")},10);$(document).ready(function(){0!=window.pageYOffset&&$(".cs-navbar").addClass("cs-navbar-shadow"),$(window).scroll(function(){0==$(window).scrollTop()?$(".cs-navbar").removeClass("cs-navbar-shadow"):$(".cs-navbar").addClass("cs-navbar-shadow")}),$("#pay").click(function(e){e.preventDefault(),$(this).attr("disabled","disabled"),$.ajax({url:"'.base_url("payment/token/".$id).'",cache:!1,success:function(e){document.getElementById("result-type"),document.getElementById("result-data");function n(e,n){$("#result-type").val(e),$("#result-data").val(JSON.stringify(n))}snap.pay(e,{onSuccess:function(e){n("success",e)},onPending:function(e){n("pending",e),console.log(e.status_message)},onError:function(e){n("error",e),console.log(e.status_message)}})},error:function(e){snap.hide()}})})});';

                // $invoice_detail['script'] = "var tnv__0x2dfd=['floor','getElementById','innerHTML','slice','style','color:\x20red;','ready','pageYOffset','.cs-navbar','addClass','cs-navbar-shadow','scroll','scrollTop','click','disabled','".base_url("payment/token/".$id)."','result-type','result-data','#result-type','val','#result-data','stringify','success','pending','log','status_message','error','hide','".$invoice_detail['expired_in']."','getTime'];(function(_0x298ecc,_0x4c1930){var _0x5b1736=function(_0x341f2a){while(--_0x341f2a){_0x298ecc['push'](_0x298ecc['shift']());}};_0x5b1736(++_0x4c1930);}(tnv__0x2dfd,0xee));var tnv__0x4f16=function(_0x253409,_0x3a68ac){_0x253409=_0x253409-0x0;var _0x9f96de=tnv__0x2dfd[_0x253409];return _0x9f96de;};var countdown=setInterval(function(){var _0x21345f=new Date(tnv__0x4f16('0x0'))[tnv__0x4f16('0x1')]();var _0x2a3998=new Date()['getTime']();var _0x2ebfef=_0x21345f-_0x2a3998;var _0x491f28=Math['floor'](_0x2ebfef/(0x3e8*0x3c*0x3c*0x18));var _0x7a5685=Math[tnv__0x4f16('0x2')](_0x2ebfef%(0x3e8*0x3c*0x3c*0x18)/(0x3e8*0x3c*0x3c));if(_0x7a5685<0xa){_0x7a5685='0'+_0x7a5685;}var _0x75f345=Math[tnv__0x4f16('0x2')](_0x2ebfef%(0x3e8*0x3c*0x3c)/(0x3e8*0x3c));if(_0x75f345<0xa){_0x75f345='0'+_0x75f345;}var _0x53734e=Math[tnv__0x4f16('0x2')](_0x2ebfef%(0x3e8*0x3c)/0x3e8);if(_0x53734e<0xa){_0x53734e='0'+_0x53734e;}var _0x46d922=Math[tnv__0x4f16('0x2')](_0x2ebfef%(0x3e8*0x3c)/0xa)['toString']();var _0x586683=document[tnv__0x4f16('0x3')]('countdown');_0x586683[tnv__0x4f16('0x4')]='('+_0x7a5685+':'+_0x75f345+':'+_0x53734e+':'+_0x46d922[tnv__0x4f16('0x5')](-0x2)+')';if(_0x2ebfef<0x0){e[tnv__0x4f16('0x6')]=tnv__0x4f16('0x7');_0x586683[tnv__0x4f16('0x4')]='(EXPIRED)';}},0xa);$(document)[tnv__0x4f16('0x8')](function(){if(window[tnv__0x4f16('0x9')]!=0x0){$(tnv__0x4f16('0xa'))[tnv__0x4f16('0xb')](tnv__0x4f16('0xc'));}$(window)[tnv__0x4f16('0xd')](function(){if($(window)[tnv__0x4f16('0xe')]()==0x0){$(tnv__0x4f16('0xa'))['removeClass']('cs-navbar-shadow');}else{$('.cs-navbar')[tnv__0x4f16('0xb')](tnv__0x4f16('0xc'));}});$('#pay')[tnv__0x4f16('0xf')](function(_0x2c8bbb){_0x2c8bbb['preventDefault']();$(this)['attr'](tnv__0x4f16('0x10'),tnv__0x4f16('0x10'));$['ajax']({'url':tnv__0x4f16('0x11'),'cache':![],'success':function(_0xf90f8f){var _0xb588f9=document[tnv__0x4f16('0x3')](tnv__0x4f16('0x12'));var _0x3fd54f=document['getElementById'](tnv__0x4f16('0x13'));function _0x3ef82a(_0x18e1bb,_0xf90f8f){$(tnv__0x4f16('0x14'))[tnv__0x4f16('0x15')](_0x18e1bb);$(tnv__0x4f16('0x16'))[tnv__0x4f16('0x15')](JSON[tnv__0x4f16('0x17')](_0xf90f8f));}snap['pay'](_0xf90f8f,{'onSuccess':function(_0x28658f){_0x3ef82a(tnv__0x4f16('0x18'),_0x28658f);},'onPending':function(_0x576f66){_0x3ef82a(tnv__0x4f16('0x19'),_0x576f66);console[tnv__0x4f16('0x1a')](_0x576f66[tnv__0x4f16('0x1b')]);},'onError':function(_0x170f1a){_0x3ef82a(tnv__0x4f16('0x1c'),_0x170f1a);console[tnv__0x4f16('0x1a')](_0x170f1a[tnv__0x4f16('0x1b')]);}});},'error':function(_0x866361){snap[tnv__0x4f16('0x1d')]();}});});});";
                break;
            
            default:
                $invoice_detail['script'] = 'var countdown=setInterval(function(){var a=new Date("<?= $expired_in ?>").getTime()-(new Date).getTime(),o=(Math.floor(a/864e5),Math.floor(a%864e5/36e5));o<10&&(o="0"+o);var n=Math.floor(a%36e5/6e4);n<10&&(n="0"+n);var r=Math.floor(a%6e4/1e3);r<10&&(r="0"+r);var t=Math.floor(a%6e4/10).toString(),s=document.getElementById("countdown");s.innerHTML="("+o+":"+n+":"+r+":"+t.slice(-2)+")",a<0&&(e.style="color: red;",s.innerHTML="(EXPIRED)")},10);$(document).ready(function(){0!=window.pageYOffset&&$(".cs-navbar").addClass("cs-navbar-shadow"),$(window).scroll(function(){0==$(window).scrollTop()?$(".cs-navbar").removeClass("cs-navbar-shadow"):$(".cs-navbar").addClass("cs-navbar-shadow")})});';
                break;
        }

        return $this->load->view('invoice', array_merge($invoice_detail, $order_detail));

    }
}
