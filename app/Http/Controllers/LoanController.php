<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loan', ['result' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->filled('repayment_amount') && !$request->filled('principal_amount_borrowed') && !$request->filled('percentage_rate_per_period') && !$request->filled('number_of_payment')) {
            return view('loan', ['result' => 'Please fill up the form to get your calculation.']);
        } else {
            $repaymentAmount = $request->input('repayment_amount');
            $principalAmountBorrowed = $request->input('principal_amount_borrowed');
            $percentageRatePerPeriod = $request->input('percentage_rate_per_period') / 100 / 12;
            $numberOfPayment = $request->input('number_of_payment') * 12;
        }

        if (!$request->filled('repayment_amount')) {
            $repaymentAmount = $principalAmountBorrowed * ($percentageRatePerPeriod / (1 - pow((1 + $percentageRatePerPeriod), (-1 * $numberOfPayment))));
            $result = 'The repayment amount is RM'.number_format($repaymentAmount, 2, '.', ',').' with the principal amount of RM'.number_format($principalAmountBorrowed, 2, '.', ',').', '.$request->input('number_of_payment').' number of payments and '.$request->input('percentage_rate_per_period').'% per period.';
        }

        if (!$request->filled('principal_amount_borrowed')) {
            $principalAmountBorrowed = $repaymentAmount / ($percentageRatePerPeriod / (1 - pow((1 + $percentageRatePerPeriod), (-1 * $numberOfPayment))));
            $result = 'The principal amount borrowed is RM'.number_format($principalAmountBorrowed, 2, '.', ',').' with the repayment amount of RM'.number_format($repaymentAmount, 2, '.', ',').', '.$request->input('number_of_payment').' number of payments and '.$request->input('percentage_rate_per_period').'% per period.';
        }

        if (!$request->filled('percentage_rate_per_period')) {
            $result = 'Sorry, this part has not implemented';
        }

        if (!$request->filled('number_of_payment')) {
            $numberOfPayment = (int) log((($percentageRatePerPeriod / ($repaymentAmount / $principalAmountBorrowed)) - 1) * -1, (1 + $percentageRatePerPeriod)) / 12 * -1;
            $result = 'The number of payments is '.$numberOfPayment.' with the repayment amount of RM'.number_format($repaymentAmount, 2, '.', ',').', the principal amount borrowed of RM'.number_format($principalAmountBorrowed, 2, '.', ',').' and '.$request->input('percentage_rate_per_period').'% per period.';
        }

        return redirect()->route('calculate-loan.index')->with('status', $result);
    }
}
