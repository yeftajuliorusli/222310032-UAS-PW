<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Presensi;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index(Dashboard $dashboard) {
        $dosenId = auth()->user()->id;
        $dashboardData = $dashboard->where('dosen_id', $dosenId)->get();
        return view('dashboard.index', ["dashboard" => $dashboardData]);
    }

    // public function presensi($id) {
    //     $presensi = Presensi::where('jadwal_id', $id)->get();
    //     return view('dashboard.presensi', ["presensi" => $presensi]);
    // }
    public function presensi($id) {
        $presensi = Presensi::with('getStudent')->where('jadwal_id', $id)->get();

        $mahasiswaIds = $presensi->pluck('mahasiswa_id')->toArray();
        $allStudents = Student::all();

        $jadwal = Dashboard::find($id);
        $matkulId = $jadwal->matkul_id;

        foreach ($allStudents as $student) {
            if (!in_array($student->id, $mahasiswaIds)) {
                Presensi::create([
                    'jadwal_id' => $id,
                    'mahasiswa_id' => $student->id,
                    'matkul_id' => $matkulId,
                    'absent' => 'Tidak hadir',
                    'keterangan' => ""
                ]);
            }
        }

        $presensi = Presensi::with('getStudent')->where('jadwal_id', $id)->get();
        return view('dashboard.presensi', ["presensi" => $presensi]);
    }

    public function editPresensi($id) {
        $presensi = Presensi::find($id);
        return view('dashboard.editPresensi', ["presensi" => $presensi]);
    }

    public function updatePresensi(Request $request, $id) {
        $presensi = Presensi::find($id);

        $validateData = $request->validate([
            "absent" => "required|max:30",
            "keterangan" => "required|max:8",
        ]);

        $presensi->update($validateData);

        return redirect()->route('dashboard.presensi', ['id' => $presensi->jadwal_id])->with('success', 'Data sukses diupdate!');
    }
}
