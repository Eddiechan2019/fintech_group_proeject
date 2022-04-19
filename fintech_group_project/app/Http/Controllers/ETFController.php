<?php

namespace App\Http\Controllers;

use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ETFController extends Controller
{

    public function __construct()
    {
        set_time_limit(8000000);
    }

    /**
     * Stock Index Stock
     * @return mixed
     */

    public function index(Request $request){

        try {
            $response = Http::get('http://127.0.0.1:5000/get_all_portfolios_data');

            if ($response->status() == 200) {
                $data = $response->json();

                if ($data['status'] == 'Success') {

                    $portfolios_data = json_decode($data['portfolios_data']);
                } else {
                    $portfolios_data = $data['message'];
                }
            } else {
                $portfolios_data = "Error";
            }

        } catch (\Exception $e) {
            $portfolios_data = $e;
        }

        try {
            $response = Http::get('http://127.0.0.1:5000/get_min_risk_portfolio_data');

            if ($response->status() == 200) {
                $data = $response->json();

                if ($data['status'] == 'Success') {

                    $min_risk_portfolios_data = json_decode($data['portfolios_data']);
                } else {
                    $min_risk_portfolios_data = $data['message'];
                }
            } else {
                $min_risk_portfolios_data = "Error";
            }

        } catch (\Exception $e) {
            $min_risk_portfolios_data = $e;
        }

        try {
            $response = Http::get('http://127.0.0.1:5000/get_highest_return_portfolios_data');

            if ($response->status() == 200) {
                $data = $response->json();

                if ($data['status'] == 'Success') {

                    $high_return_portfolios_data = json_decode($data['portfolios_data']);
                } else {
                    $high_return_portfolios_data = $data['message'];
                }
            } else {
                $high_return_portfolios_data = "Error";
            }

        } catch (\Exception $e) {
            $high_return_portfolios_data = $e;
        }

        return view('index', compact('portfolios_data', 'high_return_portfolios_data', 'min_risk_portfolios_data'));
    }
}
