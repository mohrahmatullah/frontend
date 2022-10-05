<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use App\Http\Requests\createRequest;
use App\Http\Requests\updateRequest;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;

class ListController extends Controller
{
    protected $api_host;
    
    public function __construct()
    {
        $this->api_host = ENV('API_URL');
    }

    public function index(Request $request)
    {
        return view('login');
    }

    public function auth(Request $request){
        $response = Http::post($this->api_host.'/api/login', [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);

        if($response->ok()){
            $login = $response->json();

            Session([
                        'token' => $login['access_token']
                    ]);

            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Successfully login.',
                'type'  => 'success',
            ];
            Session::flash('alert_toast', $alert_toast);
            return redirect()->route('employee');
        }
        else{
            echo "Salah login";
        }
    }

    public function logout(){
        Http::withToken(Session::get('token'))->get($this->api_host.'/api/logout')->json();
        
        Session::flush();

        return redirect()->route('home'); 
    }

    public function employee(Request $request)
    {
        try{            
            $data = Http::withToken(Session::get('token'))->get($this->api_host.'/api/employee')->json();

            $employee = $this->getPaginator($data['data'], $request);
            return view('employee', compact('employee'));
        }
        catch (\Exception $e) {
            // return response()->json(['success' => false, 'http_code' => $e->getCode(), 'message' => $e->getMessage()]);
            return redirect()->route('home'); 
        }
    }

    public function getPaginator($items, $request)
    {
        $total = count($items); // total count of the set, this is necessary so the paginator will know the total pages to display
        $page = $request->page ? $request->page : 1; // get current page from the request, first page is null
        $perPage = 10; // how many items you want to display per page?
        $offset = ($page - 1) * $perPage; // get the offset, how many items need to be "skipped" on this page

        $items = array_slice($items, $offset, $perPage); // the array that we actually pass to the paginator is sliced

        return new LengthAwarePaginator($items, $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query()
        ]);
    }

    // public function getSplit(){

    //     $var = '14532211';

    //     $stri = (string)$var;

    //     for ($i=1; $i<=10; $i++){
    //         for ($j=10;$j>=$i;$j--){
    //             echo $j;
    //         }
    //         echo "<br>";
    //     }

    //         $arr = get_defined_vars();

    //     dd($arr);
    // }
}
