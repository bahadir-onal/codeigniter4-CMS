<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsPermission implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $segment = $request->uri->getSegments();
        if (session()->isLogin && isset($segment[2])){
            $segment[3] = isset($segment[3]) ? '_'.$segment[3] : '';
            $permit = $segment[2].$segment[3];

            if (session('userData.group') != DEFAULT_ADMIN_GROUP){
                if (array_key_exists($permit, config('permissions')->list)){
                    if (!in_array($permit, session()->permissions)){
                        return redirect()->to(route_to('admin_permissions_error'));
                    }
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}