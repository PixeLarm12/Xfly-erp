<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PaymentsExport implements FromView, ShouldAutoSize
{
    private $payments;

    public function __construct($payments)
    {
        $this->payments = $payments;
    }

    public function view(): View
    {
        $payments = $this->payments;

        return view('Payments.Reports.EXCEL.template', compact('payments'));
    }
}
