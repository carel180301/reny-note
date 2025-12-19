<?php

namespace App\Imports;

use App\Models\Claim;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class ClaimsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // REMOVE HEADER ROW
        $rows->shift();

        foreach ($rows as $row) {

            // skip empty rows
            if (!isset($row[0]) || $row[0] === null) {
                continue;
            }

            Claim::create([
                'nomor_rekening' => trim($row[0]),
            ]);
        }
    }
}
