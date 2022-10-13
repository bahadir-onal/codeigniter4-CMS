<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $supportLocale = $request->config->supportedLocales;
        $segment  = $request->uri->getSegments();
        $isUriLocale = in_array($segment[0], $supportLocale);
        $isStopUri = in_array($segment[2], config('filters')->stopAuthFilter);

        if($isUriLocale && $segment[1] == 'admin' && !$isStopUri && !session()->isLogin){
            return redirect()->to(route_to('admin_login'));
        }

        if ($isUriLocale && $segment[1] == 'admin' && $isStopUri && session()->isLogin){
            return redirect()->to(route_to('admin_dashboard'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}