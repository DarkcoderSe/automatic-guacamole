<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\License;
use App\Exports\LicenseExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Mail;
use App\Mail\NewLicenseReport;


class DispatchReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $now = Carbon::now();
        $fileName = "licenses-sheet-{$now}.xlsx";
        $excelFile = Excel::download(new LicenseExport, $fileName);
        $path = $excelFile->getFile()->getPathname();

        Mail::to('test@app.com')->send(new NewLicenseReport($path));

        $licenses = License::where('is_sent', 0)->get();

        foreach ($licenses as $license) {
            $license->is_sent = 1;
            $license->save();
        }

        unlink($path);

        return $excelFile;

    }
}
