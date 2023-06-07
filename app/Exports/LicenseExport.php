<?php

namespace App\Exports;

use App\Models\License;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;



class LicenseExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $licenses = License::where('is_sent', 0)->get();

        return view('exports.licenses', [
            'licenses' => $licenses
        ]);
    }
}
