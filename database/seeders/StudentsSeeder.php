<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    public function run()
    {
        $file = database_path('seeders/data/diem_thi_thpt_2024.csv');

        if (!file_exists($file)) {
            $this->command->error("CSV file not found: $file");
            return;
        }

        $handle = fopen($file, 'r');
        if ($handle === false) {
            $this->command->error("Cannot open CSV file.");
            return;
        }

        // đọc header
        $header = fgetcsv($handle);
        $header = array_map(fn($h) => mb_strtolower(trim($h)), $header);

        $rows = [];
        $chunk = 500;

        $parseNum = function ($v) {
            $v = trim($v);
            if ($v === '' || strtoupper($v) === 'NA') return null;
            $v = str_replace(',', '.', $v); // 7,5 -> 7.5
            return is_numeric($v) ? (float)$v : null;
        };

        while (($data = fgetcsv($handle)) !== false) {
            $row = array_combine($header, $data);

            $rows[] = [
                'sbd' => $row['sbd'] ?? null,
                'toan' => $parseNum($row['toan'] ?? null),
                'ngu_van' => $parseNum($row['ngu_van'] ?? null),
                'ngoai_ngu' => $parseNum($row['ngoai_ngu'] ?? null),
                'vat_li' => $parseNum($row['vat_li'] ?? null),
                'hoa_hoc' => $parseNum($row['hoa_hoc'] ?? null),
                'sinh_hoc' => $parseNum($row['sinh_hoc'] ?? null),
                'lich_su' => $parseNum($row['lich_su'] ?? null),
                'dia_li' => $parseNum($row['dia_li'] ?? null),
                'gdcd' => $parseNum($row['gdcd'] ?? null),
                'ma_ngoai_ngu' => $row['ma_ngoai_ngu'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($rows) >= $chunk) {
                DB::table('students')->insertOrIgnore($rows);
                $rows = [];
            }
        }

        if (count($rows)) {
            DB::table('students')->insertOrIgnore($rows);
        }

        fclose($handle);
        $this->command->info("CSV import finished.");
    }
}
