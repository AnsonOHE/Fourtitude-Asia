<?php

namespace App\Http\Controllers;

use App\Helpers\lcg;
use Illuminate\Http\Request;

class LCGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lcg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lcg = new Lcg(65536, 137, 1, 0);

        $primeNumber = [];

        foreach (range(0, 10000) as $number) {
            $n = $lcg->next();

            if ($this->checkPrimeNumber($n)) {
                array_push($primeNumber, $n);
            }
        }

        $result = 'The 100th prime number is '.$primeNumber[99].'.';
        
        return redirect()->route('lcg.index')->with('status', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'plain_text' => ['required']
        ]);

        $encrypted = $this->encrypt($request->input('plain_text'));
        $decrypted = $this->decrypt($encrypted);

        $result = "The encrypted text is: ".$encrypted.".The decrypted text is: ".$decrypted.".";

        return redirect()->route('lcg.index')->with('info', $result);
    }
    
    private function encrypt($plainText)
    {
        $lcg = new Lcg(256, 11, 1, 0);
        $bytes = unpack('C*', $plainText);
        $xors = [];

        foreach ($bytes as $val) {
            $xors[] = $val ^ $lcg->next();
        }

        $str = pack('C*', ...$xors);

        return base64_encode($str);
    }

    private function decrypt($base64EncodedValue)
    {
        $str = base64_decode($base64EncodedValue);

        $lcg = new Lcg(256, 11, 1, 0);
        $bytes = unpack('C*', $str);
        $xors = [];

        foreach ($bytes as $val) {
            $xors[] = $val ^ $lcg->next();
        }

        $str = pack('C*', ...$xors);

        return $str;
    }

    private function checkPrimeNumber($number)
    {
        if ($number == 1) {
            return false;
        }

        for ($a = 2; $a <= ($number / 2); $a++) {
            if ($number % $a == 0) {
                return false;
            }
        }

        return true;
    }
}
