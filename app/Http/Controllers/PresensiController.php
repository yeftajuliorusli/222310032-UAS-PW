<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Student;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = Presensi::first();
        return $this->showPresensi($presensi->id);
    }

    public function showPresensi($id)
    {
        $students = Student::all();
        $qrcode = QrCode::size(200)->generate('Your QR Code Data Here');

        return view('dashboard.presensi', compact('students', 'qrcode'));
    }

    public function savePresensi(Request $request)
    {
        dd($request->all()); // Debugging line

        $data = $request->input('presensi');

        foreach ($data as $presensiData) {
            $presensi = new Presensi();
            $presensi->student_id = $presensiData['id'];
            $presensi->absent = $presensiData['absent'];
            $presensi->keterangan = $presensiData['keterangan'];
            $presensi->save();
        }

        return redirect()->back()->with('success', 'Data presensi berhasil disimpan.');
    }
}
