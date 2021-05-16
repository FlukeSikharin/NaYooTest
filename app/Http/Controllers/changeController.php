<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class changeController extends Controller
{
    public function Change(Request $request){
            $cash = $request->input('cash');
            $price = $request->input('price');
            $money = $cash -  $price;
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $sum5 = 0;
            $sum51 = 0;
            $sum6 = 0;
            $sum7 = 0;
            $sum8 = 0;

            if($money<0){
                return redirect('/change')->with('message','จำนวนเงินไม่พอในการซื้อสินค้า');
            }
            if($money>=500){
                $sum2=$money/500;
                $sum2s=floor($sum2)*500;
                $money=$money-$sum2s;
             //   echo "มีจำนวนธนบัตร 500 = ".floor($sum2)." ใบ"."<br>";
            }if($money>=100){
                $sum3=$money/100;
                $sum3s=floor($sum3)*100;
                $money=$money-$sum3s;
               // echo "มีจำนวนธนบัตร 100 = ".floor($sum3)." ใบ"."<br>";
            }if($money>=50){
                $sum4=$money/50;
                $sum4s=floor($sum4)*50;
                $money=$money-$sum4s;
                //echo "มีจำนวนธนบัตร 50 = ".floor($sum4)." ใบ"."<br>";
            }if($money>=10){
                $sum51=$money/10;
                $sum51s=floor($sum51)*10;
                $money=$money-$sum51s;
              //  echo "มีจำนวนเหรียญ 10 = ".floor($sum51)." เหรียญ"."<br>";
            }if($money>=5){
                $sum6=$money/5;
                $sum6s=floor($sum6)*5;
                $money=$money-$sum6s;
              //  echo "มีจำนวนเหรียญ 5 = ".floor($sum6)." เหรียญ"."<br>";
            }if($money>=1){
                $sum8=$money/1;
                $sum8s=floor($sum8)*1;
                $money=$money-$sum8s;
               // echo "มีจำนวนเหรียญ 1 = ".floor($sum8)." เหรียญ"."<br>";
            }

            return redirect('/change')->with('message','Cash 500฿  '.floor($sum2).' unit |'
            .' Cash 100฿  '.floor($sum3).' unit |'
            .' Cash 50฿  '.floor($sum4).' unit |'
            .' Coin 10฿  '.floor($sum51).' unit |'
            .' Coin 5฿  '.floor($sum6).' unit |'
            .' Coin 1฿  '.floor($sum8).' unit |');
        }
}
