<?php

namespace App\Http\Controllers;

use App\Models\Anket;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $session_data = session()->get('isim_soyisim');
        $questions = Question::all();
        $token = csrf_token();
        return view('questions', ['questions' => $questions, 'session_data' => $session_data, 'token' => $token]);
    }
    public function login()
    {
        session()->forget('isim_soyisim');
        session()->forget('user_type');
        return view('login');
    }
    public function loginPost(Request $r)
    {

        $isim = strtolower($r->input('isim'));
        $soyisim = strtolower($r->input('soyisim'));
        $sifre = $r->input('sifre');
        if ($isim == "o" && $soyisim == "c" && $sifre == "**") {
            session(['isim_soyisim' => 'admin', 'user_type' => 1]);
            return redirect('/admin/dashboard');
        } else if ($sifre == "AVIOR*") {
            session(['isim_soyisim' => $isim . ' ' . $soyisim, 'user_type' => 0]);
            return redirect('/selection');
        }

        return redirect('/login');

    }
    public function submitForm(Request $r)
    {

        if (!session()->has('isim_soyisim')) {
            return redirect()->route('login')->with('error', 'Hata');
        }
        $session = session()->pull('isim_soyisim');
        $name = explode(' ', $session)[0];
        $surname = explode(' ', $session)[1];
        $approval = 0;
        $affection = 0;
        $success = 0;
        $perfectionism = 0;
        $righteousness = 0;
        $god_complex = 0;
        $autonomy = 0;
        for ($i = 1; $i < 36; $i++) {
            if ($i >= 1 && $i < 6) {
                $approval += (int) $r->input('q' . $i);
            }
            if ($i >= 6 && $i < 11) {
                $affection += (int) $r->input('q' . $i);
            }
            if ($i >= 11 && $i < 16) {
                $success += (int) $r->input('q' . $i);
            }
            if ($i >= 16 && $i < 21) {
                $perfectionism += (int) $r->input('q' . $i);
            }
            if ($i >= 21 && $i < 26) {
                $righteousness += (int) $r->input('q' . $i);
            }
            if ($i >= 26 && $i < 31) {
                $god_complex += (int) $r->input('q' . $i);
            }
            if ($i >= 31 && $i < 36) {
                $autonomy += (int) $r->input('q' . $i);
            }
        }

        Anket::create([
            'name' => $name,
            'surname' => $surname,
            'success' => $success,
            'approval' => $approval,
            'affection' => $affection,
            'perfectionism' => $perfectionism,
            'righteousness' => $righteousness,
            'god_complex' => $god_complex,
            'autonomy' => $autonomy
        ]);
        return redirect()->route('selection')->with('success', 'Başarılı');
    }

    public function selection()
    {
        return view('selection');
    }
    public function rp()
    {
        return view('rp');
    }
    public function rpDetail($detail)
    {
        if (!in_array($detail, array(1, 2, 3, 4, 5, 6, 7, 8, 9, '1-2'))) {
            // Değişken belirtilen değerlerden biri değilse burası çalışır
            return redirect('/selection');
        }
        return view('rpdetail', compact('detail'));
    }
}
