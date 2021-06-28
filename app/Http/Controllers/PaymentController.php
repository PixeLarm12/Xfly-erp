<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Xfly\Model\Payment;
use App\Xfly\Model\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentsExport;
use App\Http\Requests\PaymentCreateRequest;
use App\Http\Requests\PaymentUpdateRequest;
use PDF;

class PaymentController extends Controller
{
    private $total_pages = 10;
    private $today;

    public function __construct()
    {
        $this->today = date('Y-m-d');
    }

    public function index()
    {
        $payments = Payment::orderByRaw('purchase_date DESC')->paginate($this->total_pages);

        return view('Payments.welcome', compact('payments'));
    }

    public function create()
    {
        return view('Payments.create');
    }

    public function store(PaymentCreateRequest $request)
    {
        if (Payment::create($request->validated())) {
            $payments = Payment::orderByRaw('purchase_date DESC')->paginate($this->total_pages);

            return redirect('/payments')->with('payments');
        }

        echo 'erro no cadastro';
    }

    public function edit(Payment $payment)
    {
        $users = User::all();

        return view('Payments.edit', compact('payment', 'users'));
    }

    public function update(PaymentUpdateRequest $request, Payment $payment)
    {
        $payment->update($request->validated());
        $payments = Payment::orderByRaw('purchase_date DESC')->paginate($this->total_pages);

        return redirect('/payments')->with('payments');
    }

    public function destroy(Request $request)
    {
        if ($request->confirm == 1) {
            Payment::where('id', $request->id)->delete();
        }

        $payments = Payment::orderByRaw('purchase_date DESC')->paginate($this->total_pages);

        return redirect('/payments')->with('payments');
    }

    public function reports()
    {
        return view('Payments.report');
    }

    public function reportAllPayments(Request $request)
    {
        $payments = Payment::all();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Payments.Reports.PDF.reportAllPayments', compact('payments'));

            return $pdf->setpaper('a4')->stream('Relatorio_Pagamentos_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new PaymentsExport($payments), 'Relatorio_Pagamentos_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function reportCreatedAtPayments(Request $request)
    {
        $initial = $request->date_initial;
        $final = $request->date_final;

        $payments = Payment::whereBetween('purchase_date', [$initial, $final])->get();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Payments.Reports.PDF.reportCreatedAtPayments', compact('payments', 'initial', 'final'));

            return $pdf->setpaper('a4')->stream('Relatorio_Pagamentos_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new PaymentsExport($payments), 'Relatorio_Pagamentos_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function reportBuyerPayments(Request $request)
    {
        $payments = Payment::where('buyer', $request->buyer)->get();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Payments.Reports.PDF.reportBuyerPayments', compact('payments'));

            return $pdf->setpaper('a4')->stream('Relatorio_' . $request->buyer . '_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new PaymentsExport($payments), 'Relatorio_' . $request->buyer . '_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function reportAdminsAndDate(Request $request)
    {
        $initial = $request->date_initial;
        $final = $request->date_final;

        $payments = Payment::where('buyer', $request->buyer)->whereBetween('purchase_date', [$initial, $final])->get();

        if ($request->report_option == 'PDF') {
            $pdf = PDF::loadView('Payments.Reports.PDF.reportAdminsAndDate', compact('payments', 'initial', 'final'));

            return $pdf->setpaper('a4')->stream('Relatorio_' . $request->buyer . '_' . date('d_m_Y', strtotime($this->today)) . '.pdf');
        }
        if ($request->report_option == 'EXCEL') {
            return Excel::download(new PaymentsExport($payments), 'Relatorio_' . $request->buyer . '_' . date('d_m_Y', strtotime($this->today)) . '.xlsx');
        }
    }

    public function viewCreatedAtPayments()
    {
        return view('Payments.reportCreatedAtPayments');
    }

    public function viewAllPayments()
    {
        return view('Payments.reportAllPayments');
    }

    public function viewAdminsAndDate()
    {
        $users = User::all();

        return view('Payments.reportAdminsAndDate', compact('users'));
    }

    public function viewBuyerPayments()
    {
        $users = User::all();

        return view('Payments.reportBuyerPayments', compact('users'));
    }
}
