<?php
namespace App\Http\Controllers;

use App\Models\Pertemuan;
use App\Models\Dosen;
use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    public function showByDosen($id)
    {
        $dosen = Dosen::findOrFail($id);
        $pertemuan = Pertemuan::where('dosen_id', $id)->get();
        return view('layout.students.pertemuan', compact('dosen', 'pertemuan'));
    }
}
