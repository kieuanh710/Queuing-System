<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\BoardCast;
use Illuminate\Support\Facades\DB;
class ReportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return BoardCast::select('services.nameService');
        $reports = DB::table('boardcasts')
        ->join('services', 'boardcasts.id_service', 'services.idService')
        ->join('accounts', 'boardcasts.id_account', 'accounts.id')
        ->select('boardcasts.number', 'services.nameService', 'boardcasts.date','boardcasts.source',)
        ->get();
        return $reports;
    }
}
