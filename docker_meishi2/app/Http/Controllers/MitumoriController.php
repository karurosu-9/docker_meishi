<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitumori;
use App\Models\Card;
use App\Models\MyCorp;
use App\Http\Requests\MitumoriRequest;
use Illuminate\Support\Facades\DB;

class MitumoriController extends Controller
{
    public function kingaku_add(Request $request){
        $cards = Card::all();
        return view('mitumori/kingaku_add', ['cards'=>$cards]);
    }

    public function biko_add(Request $request){
        $count = 10;
        return view('mitumori/biko_add', ['count'=>$count]);
    }

    public function hosoku_add(Request $request){
        return view('mitumori/hosoku_add');
    }

    public function mitumori_check(Request $request){
        $year = date('Y');
        $month = date('n');
        $date = date('d');
        $form_hosoku = 7;
        $form_mitumori = 10;
        $total_price = 0;
        $all_total_price = 0;
        for($i=1; $i<=10; $i++){
          $tekiyo[] = $_POST['tekiyo'.$i];
          $suryo[] = $_POST['suryo'.$i];
          $tanka[] = $_POST['tanka'.$i];
          $kingaku[] = $_POST['kingaku'.$i];
          $biko[] = $_POST['biko'.$i];
        }

        $total_price = $kingaku;

        for ($i = 0; $i < 10; $i++) {
            $all_total_price += (int)$total_price[$i];
        }

        for ($i = 1; $i <= 7; $i++) {
            $hosoku[] = $_POST['hosoku'.$i];
        }

        
        $param = [
            'form_mitumori'=>$form_mitumori, 'form_hosoku'=>$form_hosoku,
            'total_price'=>$total_price, 'all_total_price'=>$all_total_price, 'tekiyo'=>$tekiyo,
            'suryo'=>$suryo, 'tanka'=>$tanka, 'kingaku'=>$kingaku, 'biko'=>$biko,
            'year' => $year, 'month' => $month, 'date' => $date, 'hosoku' => $hosoku,
        ];
        return view('mitumori/mitumori_check', $param);
    }

    public function mitumori_check_confirm(Request $request){
        
        session_start();
        #unset($_SESSION['count']);
        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = 1;
            $count = $_SESSION['count'];
        } else {
            $_SESSION['count']++;
            $count = $_SESSION['count'];
        }

        $Y = date('Y');

        $my_corp = MyCorp::all()->first();
        $form_hosoku = 7;
        $form_mitumori = 10;
        $num = $Y.sprintf('%03d', $count);
        $postal = $my_corp['postal'];
        preg_match("/(.{3})(.{4})/", $postal, $match);
        $postal_new = $match[1] . "-" . $match[2];
        $tel = $my_corp['tel'];
        preg_match("/(.{3})(.{3})(.{4})/", $tel, $match);
        $tel_new = "TEL " . $match[1] . "-" . $match[2] . "-" . $match[3];
        $fax = $my_corp['fax'];
        preg_match("/(.{3})(.{3})(.{4})/", $fax, $match);
        $fax_new = "FAX " . $match[1] . "-" . $match[2] . "-" . $match[3];

        $total_price = 0;
        $all_total_price = 0;
        for ($i = 1; $i <= 10; $i++) {
            $tekiyo[] = $_POST['tekiyo' . $i];
            $suryo[] = $_POST['suryo' . $i];
            $tanka[] = $_POST['tanka' . $i];
            $kingaku[] = $_POST['kingaku' . $i];
            $biko[] = $_POST['biko' . $i];
        }

        $total_price = $kingaku;

        for ($i = 0; $i < 10; $i++) {
            $all_total_price += (int)$total_price[$i];
        }

        for ($i=1; $i <=7; $i++){
            $hosoku[] = $_POST['hosoku'.$i];
        }

        $year = $_POST['year'];
        $month = $_POST['month'];
        $date = $_POST['date'];
        $date_new = '0'.$date;
        $date_new = $year."年".$month."月".$date."日";
        $param = [
            'date_new' => $date_new,
            'my_corp' => $my_corp, 'postal_new' => $postal_new, 'tel_new' => $tel_new,
            'fax_new' => $fax_new,'all_total_price' => $all_total_price, 'tekiyo' => $tekiyo,
            'suryo' => $suryo, 'tanka' => $tanka, 'kingaku' => $kingaku,
            'biko' => $biko,    'hosoku' => $hosoku, 'form_hosoku' => $form_hosoku, 'form_mitumori' => $form_mitumori,
            'form_hosku' => $form_hosoku, 'num' => $num,
        ];
        return view('mitumori/mitumori_check_confirm', $param);
    }

    public function mitumori_toroku(Request $request){

            $mitumori = new Mitumori;
            $form = $request->all();
            unset($form['_token']);
            //dd($form);
            $mitumori->fill($form)->save();
            return redirect('/mitumori/mitumori_list');
    }

    public function mitumori_list(Request $request){
        $mitumori = Mitumori::select('*')->orderBy('date', 'desc')->get();
        return view('/mitumori/mitumori_list', ['mitumori' => $mitumori]);
    }

    public function mitumori_show(Request $request){
        $mitumori = Mitumori::find($request->id);
        $my_corp = MyCorp::all()->first();
        $form_hosoku = 7;
        $form_mitumori = 10;
        $postal = $my_corp['postal'];
        preg_match("/(.{3})(.{4})/", $postal, $match);
        $postal_new = $match[1] . "-" . $match[2];
        $tel = $my_corp['tel'];
        preg_match("/(.{3})(.{3})(.{4})/", $tel, $match);
        $tel_new = "TEL " . $match[1] . "-" . $match[2] . "-" . $match[3];
        $fax = $my_corp['fax'];
        preg_match("/(.{3})(.{3})(.{4})/", $fax, $match);
        $fax_new = "FAX " . $match[1] . "-" . $match[2] . "-" . $match[3];
        

        for($i=1; $i<=10; $i++){
            $tekiyo[] = $mitumori['tekiyo'.$i];
            $suryo[] = $mitumori['suryo' . $i];
            $tanka[] = $mitumori['tanka' . $i];
            $kingaku[] = $mitumori['kingaku' . $i];
            $biko[] = $mitumori['biko' . $i];
        }

        for($i=1; $i<=7; $i++){
            $hosoku[] = $mitumori['hosoku'.$i];
        }

        $total_price = $mitumori['total_price'];

        $param = [
            'mitumori' => $mitumori, 'my_corp' => $my_corp, 'form_mitumori' =>$form_mitumori,
            'form_hosoku' => $form_hosoku, 'postal_new' => $postal_new, 'tel_new' => $tel_new,
            'fax_new' => $fax_new, 'tekiyo' => $tekiyo, 'suryo' => $suryo,
            'tanka' => $tanka, 'kingaku' => $kingaku, 'biko' => $biko, 'hosoku' => $hosoku,
            'total_price' => $total_price,
        ];
        return view('/mitumori/mitumori_show', $param);
    }

    public function edit_kingaku(Request $request){
        $mitumori = Mitumori::find($request->id);
        return view('/mitumori/edit_kingaku', ['mitumori' => $mitumori]);
    }

    public function edit_biko(Request $request){
        $mitumori = Mitumori::find($request->id);
        //dd($mitumori);
        $form_mitumori = 10;
        return view('/mitumori/edit_biko', ['mitumori' => $mitumori, 'form_mitumori' => $form_mitumori]);
    }

    public function edit_hosoku(Request $request){
        $mitumori = Mitumori::find($request->id);
        $form_mitumori = 10;
        $form_hosoku = 7;
        $param = [
            'mitumori' => $mitumori, 'form_mitumori' => $form_mitumori, 'form_hosoku' => $form_hosoku,
        ];
        return view('mitumori/edit_hosoku', $param);
    }

    public function edit_check(Request $request){
        $year = date('Y');
        $month = date('n');
        $date = date('d');
        $form_mitumori = 10;
        $form_hosoku =7;
        $mitumori = Mitumori::find($request->id);
        $my_corp = MyCorp::all()->first();
        $total_price = 0;
        $all_total_price = 0;
        for ($i = 1; $i <= 10; $i++) {
            $tekiyo[] = $_POST['tekiyo' . $i];
            $suryo[] = $_POST['suryo' . $i];
            $tanka[] = $_POST['tanka' . $i];
            $kingaku[] = $_POST['kingaku' . $i];
            $biko[] = $_POST['biko' . $i];
        }

        $total_price = $kingaku;

        for ($i = 0; $i < 10; $i++) {
            $all_total_price += (int)$total_price[$i];
        }

        for ($i=1; $i <=7; $i++){
            $hosoku[] = $_POST['hosoku'.$i];
        }

        $param = [
            'mitumori' => $mitumori, 'my_corp' => $my_corp,
            'form_mitumori'=>$form_mitumori, 'form_hosoku'=>$form_hosoku,
            'total_price'=>$total_price, 'all_total_price'=>$all_total_price, 'tekiyo'=>$tekiyo,
            'suryo'=>$suryo, 'tanka'=>$tanka, 'kingaku'=>$kingaku, 'biko'=>$biko,
            'year' => $year, 'month' => $month, 'date' => $date, 'hosoku' => $hosoku,
        ];

        return view('/mitumori/edit_check', $param);
    }

    public function edit_check_confirm(Request $request){
        session_start();
        #unset($_SESSION['count']);
        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = 1;
            $count = $_SESSION['count'];
        } else {
            $_SESSION['count']++;
            $count = $_SESSION['count'];
        }

        $Y = date('Y');
        $mitumori = Mitumori::find($request->id);
        $my_corp = MyCorp::all()->first();
        $form_hosoku = 7;
        $form_mitumori = 10;
        $num = $Y.sprintf('%03d', $count);
        $postal = $my_corp['postal'];
        preg_match("/(.{3})(.{4})/", $postal, $match);
        $postal_new = $match[1] . "-" . $match[2];
        $tel = $my_corp['tel'];
        preg_match("/(.{3})(.{3})(.{4})/", $tel, $match);
        $tel_new = "TEL " . $match[1] . "-" . $match[2] . "-" . $match[3];
        $fax = $my_corp['fax'];
        preg_match("/(.{3})(.{3})(.{4})/", $fax, $match);
        $fax_new = "FAX " . $match[1] . "-" . $match[2] . "-" . $match[3];

        $total_price = 0;
        $all_total_price = 0;
        for ($i = 1; $i <= 10; $i++) {
            $tekiyo[] = $_POST['tekiyo' . $i];
            $suryo[] = $_POST['suryo' . $i];
            $tanka[] = $_POST['tanka' . $i];
            $kingaku[] = $_POST['kingaku' . $i];
            $biko[] = $_POST['biko' . $i];
        }

        $total_price = $kingaku;

        for ($i = 0; $i < 10; $i++) {
            $all_total_price += (int)$total_price[$i];
        }

        for ($i=1; $i <=7; $i++){
            $hosoku[] = $_POST['hosoku'.$i];
        }

        $year = $_POST['year'];
        $month = $_POST['month'];
        $date = $_POST['date'];
        $date_new = $year."年".$month."月".$date."日";
        $param = [
            'date_new' => $date_new, 'mitumori' => $mitumori,
            'my_corp' => $my_corp, 'postal_new' => $postal_new, 'tel_new' => $tel_new,
            'fax_new' => $fax_new,'all_total_price' => $all_total_price, 'tekiyo' => $tekiyo,
            'suryo' => $suryo, 'tanka' => $tanka, 'kingaku' => $kingaku,
            'biko' => $biko,    'hosoku' => $hosoku, 'form_hosoku' => $form_hosoku, 'form_mitumori' => $form_mitumori,
            'form_hosku' => $form_hosoku, 'num' => $num,
        ];
        return view('mitumori/edit_check_confirm', $param);
    }

    public function update(Request $request){
        $mitumori = Mitumori::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $mitumori->timestamps = false;
        $mitumori->fill($form)->save();
        return redirect('/mitumori/edit_show?id='.$mitumori->id);
    }

    public function edit_show(Request $request){
        $mitumori = Mitumori::find($request->id);
        $my_corp = MyCorp::all()->first();
        $form_hosoku = 7;
        $form_mitumori = 10;
        $postal = $my_corp['postal'];
        preg_match("/(.{3})(.{4})/", $postal, $match);
        $postal_new = $match[1] . "-" . $match[2];
        $tel = $my_corp['tel'];
        preg_match("/(.{3})(.{3})(.{4})/", $tel, $match);
        $tel_new = "TEL " . $match[1] . "-" . $match[2] . "-" . $match[3];
        $fax = $my_corp['fax'];
        preg_match("/(.{3})(.{3})(.{4})/", $fax, $match);
        $fax_new = "FAX " . $match[1] . "-" . $match[2] . "-" . $match[3];
        

        for($i=1; $i<=10; $i++){
            $tekiyo[] = $mitumori['tekiyo'.$i];
            $suryo[] = $mitumori['suryo' . $i];
            $tanka[] = $mitumori['tanka' . $i];
            $kingaku[] = $mitumori['kingaku' . $i];
            $biko[] = $mitumori['biko' . $i];
        }

        for($i=1; $i<=7; $i++){
            $hosoku[] = $mitumori['hosoku'.$i];
        }

        $total_price = $mitumori['total_price'];

        $param = [
            'mitumori' => $mitumori, 'my_corp' => $my_corp, 'form_mitumori' =>$form_mitumori,
            'form_hosoku' => $form_hosoku, 'postal_new' => $postal_new, 'tel_new' => $tel_new,
            'fax_new' => $fax_new, 'tekiyo' => $tekiyo, 'suryo' => $suryo,
            'tanka' => $tanka, 'kingaku' => $kingaku, 'biko' => $biko, 'hosoku' => $hosoku,
            'total_price' => $total_price,
        ];
        return view('/mitumori/edit_show', $param);
    }

    public function print(Request $request){
        $date = date("Y年n月d日");
        DB::table('mitumori_list')->where('id', $request->id)->update(['date' => $date]);
        $mitumori = Mitumori::find($request->id);
        $my_corp = MyCorp::all()->first();
        $form_hosoku = 7;
        $form_mitumori = 10;
        $postal = $my_corp['postal'];
        preg_match("/(.{3})(.{4})/", $postal, $match);
        $postal_new = $match[1] . "-" . $match[2];
        $tel = $my_corp['tel'];
        preg_match("/(.{3})(.{3})(.{4})/", $tel, $match);
        $tel_new = "TEL " . $match[1] . "-" . $match[2] . "-" . $match[3];
        $fax = $my_corp['fax'];
        preg_match("/(.{3})(.{3})(.{4})/", $fax, $match);
        $fax_new = "FAX " . $match[1] . "-" . $match[2] . "-" . $match[3];
    

        for($i=1; $i<=10; $i++){
            $tekiyo[] = $mitumori['tekiyo'.$i];
            $suryo[] = $mitumori['suryo' . $i];
            $tanka[] = $mitumori['tanka' . $i];
            $kingaku[] = $mitumori['kingaku' . $i];
            $biko[] = $mitumori['biko' . $i];
        }

        for($i=1; $i<=7; $i++){
            $hosoku[] = $mitumori['hosoku'.$i];
        }

        $total_price = $mitumori['total_price'];

        $param = [
            'mitumori' => $mitumori, 'my_corp' => $my_corp, 'form_mitumori' => $form_mitumori,
            'form_hosoku' => $form_hosoku, 'postal_new' => $postal_new, 'tel_new' => $tel_new,
            'fax_new' => $fax_new, 'tekiyo' => $tekiyo, 'suryo' => $suryo,
            'tanka' => $tanka, 'kingaku' => $kingaku, 'biko' => $biko, 'hosoku' => $hosoku,
            'total_price' => $total_price, 'date' => $date,
        ];

        return view('/mitumori/print', $param);
    }

    public function Mitumori_delete(Request $request){
        Mitumori::find($request->id)->delete();
        return redirect('/mitumori/mitumori_list');
    }
    
}
