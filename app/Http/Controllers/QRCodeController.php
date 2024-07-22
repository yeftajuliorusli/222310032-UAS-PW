<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Student;

class QRCodeController extends Controller{
    public function generateQRCode(){
        $students = Student::all();
        $qrcode = QrCode::size(300)->generate('https://www.example.com');
        return view('layout.dashboard.presensi', [
            'qrcode' => $qrcode,
            'students' => $students
        ]);
    }
}
