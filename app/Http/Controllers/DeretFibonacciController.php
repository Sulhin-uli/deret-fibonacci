<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeretFibonacciController extends Controller
{
    public function index(Request $request)
    {
        $number_start = $request->number_start;
        $number_n = $request->number_n;
        # array ini akan digunakan untuk menampung bilangan fibonacci
        $fibonacci = [];

        if ($number_n < 0) {
            # langsung hentikan fungsi jika $number_n kurang dari 0
            return "number_n tidak boleh kurang dari 0";
        } else if ($number_start < 1) {
            # langsung hentikan fungsi jika $number_n kurang dari 0
            return "number_start tidak boleh kurang dari 1";
        }



        # mulai perulangan
        $satu_angka_sebelum = 0;
        $dua_angka_sebelum = 0;



        for ($i = $number_start; $i > $number_start - 1; $i++) {
            # jika bilangan sama dengan bilangan awal maka langsung di masukkan ke array
            if ($number_start == $i) {
                $bilangan = $i;
                array_push($fibonacci, $bilangan);
            } else {
                # junlahkan
                $bilangan = $satu_angka_sebelum + $dua_angka_sebelum;
                # tambahkan $bilangan ke dalam array $fibonacci
                array_push($fibonacci, $bilangan);
            }

            $satu_angka_sebelum = $bilangan;
            if ($number_start != $i) {
                $dua_angka_sebelum = $satu_angka_sebelum;
            }
            # berhenti jika jumlah array sama dengan number_n
            if (count($fibonacci) == $number_n) {
                break;
            }
        }

        return $fibonacci;
    }
}
