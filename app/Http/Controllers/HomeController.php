<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{

    private $getAllUrl = "https://dummyjson.com/products";


    function getAlldata(): JsonResponse
    {

        $response = Http::get($this->getAllUrl);

        if ($response->ok()) {

            return  response()->json($response->json(), $response->status());
        } else {

            return  response()->json("Failed getting data", $response->status());
        }
    }

    function StoreData(Request $request): RedirectResponse
    {
        $store = DB::table('order')->insert(
            [
                'Kode_pesanan' => $request->kode_pesanan,
                'tanggal_pesanan' => $request->tanggal_pesanan,
                'supplier' => $request->nama_supplier,
                'product' => $request->nama_produk,
                'total' => $request->total,
                "created_at" =>  DB::raw('CURRENT_TIMESTAMP'),
                "updated_at" =>  DB::raw('CURRENT_TIMESTAMP'),
            ]
        );

        if ($store) {
            $data = true;
        } else {
            $data = false;
        }

        return redirect("/")->with("data", $data);
    }
}
