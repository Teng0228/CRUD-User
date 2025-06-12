<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function exportUsers()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header row
        $sheet->fromArray(['ID', 'Name', 'Email', 'Phone', 'Status'], NULL, 'A1');

        // Fetch user data
        $users = User::all(['id', 'name', 'email', 'phone_number', 'status'])->toArray();
        $sheet->fromArray($users, NULL, 'A2');

        // Save to temp file
        $writer = new Xlsx($spreadsheet);
        $fileName = 'users_export.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return Response::download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
