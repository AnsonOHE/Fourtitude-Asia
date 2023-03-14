<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckDigitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('check-digit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'digit' => ['required', 'min:0'],
        ]);

        $sum = 0;

        foreach (str_split($request->input('digit')) as $n) {
            $sum += $n;

            if ($sum % 2 === 0) {
                $sum = $sum / 2;
            } else {
                $sum = ($sum - 1) / 2;
            }
        }

        $result = 'The check digit for the number '.$request->input('digit').' is '.$sum.'. The generated value is "'.$request->input('digit').$sum.'".';

        return redirect()->route('check-digit.index')->with('status', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $check = [
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
        ];

        for ($a = 1; $a <= 1000000; $a++) {
            $sum = 0;

            foreach (str_split($a) as $n) {
                $sum += $n;
    
                if ($sum % 2 === 0) {
                    $sum = $sum / 2;
                } else {
                    $sum = ($sum - 1) / 2;
                }
            }

            $check[$sum]++;
        }

        arsort($check);

        $result = 'The check digit occurs with the highest frequency is '.array_key_first($check).' and the lowest frequency is '.array_key_last($check).'.';

        return redirect()->route('check-digit.index')->with('info', $result);
    }
}
