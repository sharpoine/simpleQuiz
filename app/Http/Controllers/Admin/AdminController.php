<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = Anket::select(
            'id',
            'name',
            'surname',
            'approval',
            'affection',
            'success',
            'perfectionism',
            'righteousness',
            'god_complex',
            'autonomy',
            'created_at',
            \DB::raw("CONCAT(
                (CASE WHEN approval >= 0 THEN (SELECT positive FROM comments WHERE field='approval') ELSE (SELECT negative FROM comments WHERE comments.field='approval') END) ,' ',
                (CASE WHEN affection >= 0 THEN (SELECT positive FROM comments WHERE field='affection') ELSE (SELECT negative FROM comments WHERE comments.field='affection') END),' ',
                (CASE WHEN success >= 0 THEN (SELECT positive FROM comments WHERE field='success') ELSE (SELECT negative FROM comments WHERE comments.field='success') END) ,' ',
                (CASE WHEN perfectionism >= 0 THEN (SELECT positive FROM comments WHERE field='perfectionism') ELSE (SELECT negative FROM comments WHERE comments.field='perfectionism') END) ,' ',
                (CASE WHEN righteousness >= 0 THEN (SELECT positive FROM comments WHERE field='righteousness') ELSE (SELECT negative FROM comments WHERE comments.field='righteousness') END) ,' ',
                (CASE WHEN god_complex >= 0 THEN (SELECT positive FROM comments WHERE field='god_complex') ELSE (SELECT negative FROM comments WHERE comments.field='god_complex') END) ,' ',
                (CASE WHEN autonomy >= 0 THEN (SELECT positive FROM comments WHERE field='autonomy') ELSE (SELECT negative FROM comments WHERE comments.field='autonomy') END) ,' '
            ) as comment")
        )->get();
        return view('admin.dashboard', compact('data'));
    }
    public function getAnketValue(Request $r)
    {
        $id = $r->input('id');
        return Anket::where(['id' => $id])->get();
    }
}
