<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class choosecontroller extends Controller
{
    public function Choose(Request $request){
        $cash = $request->input('cash');

        if($cash<25){
            return redirect('/choose')->with('message','******************************************* 
             จำนวนเงินไม่พอในการซื้อสินค้า        **********************************');
        }
        if($cash>=250){
            $piece1 = $cash/20;
            $piece11 = floor($piece1);
            $change1 = ($piece1-$piece11)*20;
          //  echo $piece1."<br>".$piece11."<br>".$change1."<br>";
        }elseif($cash<250){
            $piece1 = $cash/25;
            $piece11 = floor($piece1);
            $change1 = ($piece1-$piece11)*25;
            //echo $piece1."<br>".$piece11."<br>".$change1."<br>";
        }
        if($cash>=90){
            $piece2 = $cash/30;
            $piece21 = floor($piece2)/3;
            $piece22 = floor($piece2)+floor($piece21);
            $change2 = ($piece2-floor($piece2))*30;
         //   echo $piece2."<br>".$piece22."<br>".$change2;
        }elseif($cash<90){
            $piece2 = $cash/30;
            $piece22 = floor($piece2);
            $change2 = ($piece2-$piece22)*30;
         //   echo $piece2."<br>".$piece22."<br>".$change2."<br>";
        }
        if($piece22>$piece11){
            return redirect('/choose')->with('message','เงินจำนวนนี้สามารถซื้อสินค้าร้านที่ 1 ได้จำนวน : '.$piece11.' ชิ้น และได้เงินทอน : '
            .$change1.' บาท'.' และสามารถซื้อสินค้าร้านที่ 2 ได้จำนวน : '.$piece22.' ชิ้น และได้เงินทอน : '
            .$change2.' บาท'.' จึงขอแนะนำให้ซื้อสินค้าจากร้านที่ 2');
        }elseif($piece22<$piece11){
            return redirect('/choose')->with('message','เงินจำนวนนี้สามารถซื้อสินค้าร้านที่ 1 ได้จำนวน : '.$piece11.' ชิ้น และได้เงินทอน : '
            .$change1.' บาท'.' และสามารถซื้อสินค้าร้านที่ 2 ได้จำนวน : '.$piece22.' ชิ้น และได้เงินทอน : '
            .$change2.' บาท'.' จึงขอแนะนำให้ซื้อสินค้าจากร้านที่ 1');
        }elseif($piece22==$piece11){
            if($change2>$change1){
                return redirect('/choose')->with('message','เงินจำนวนนี้สามารถซื้อสินค้าร้านที่ 1 ได้จำนวน : '.$piece11.' ชิ้น และได้เงินทอน : '
                .$change1.' บาท'.' และสามารถซื้อสินค้าร้านที่ 2 ได้จำนวน : '.$piece22.' ชิ้น และได้เงินทอน : '
                .$change2.' บาท'.' จึงขอแนะนำให้ซื้อสินค้าจากร้านที่ 2');
            }elseif($change2<$change1){
                return redirect('/choose')->with('message','เงินจำนวนนี้สามารถซื้อสินค้าร้านที่ 1 ได้จำนวน : '.$piece11.' ชิ้น และได้เงินทอน : '
                .$change1.' บาท'.' และสามารถซื้อสินค้าร้านที่ 2 ได้จำนวน : '.$piece22.' ชิ้น และได้เงินทอน : '
                .$change2.' บาท'.' จึงขอแนะนำให้ซื้อสินค้าจากร้านที่ 1');
            }
            
        }

    }
}
