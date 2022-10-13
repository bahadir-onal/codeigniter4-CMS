<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ReCaptcha implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if($request->getMethod() == 'post'){
            if ($request->getPost('g-recaptcha-response')){
                $client = \Config\Services::curlrequest();
                $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
                    'form_params' => [
                        'secret' => '6LcIDpUfAAAAAHGhsKGsaen7eyOjCXq0aIbgmGri',
                        'response' => $request->getPost('g-recaptcha-response'),
                        'remoteip' => $request->getIPAddress()
                    ]
                ]);

                $res = json_decode($response->getBody());
                if (!isset($res->success) || !$res->success){
                    return redirect()->back()->with('error', 'Doğrulama işlemini yapın.');
                }
            }else{
                return redirect()->back()->with('error', 'Doğrulama işlemini yapın.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}