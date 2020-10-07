<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;
use Firebase\JWT\JWT;
use CodeIgniter\API\ResponseTrait;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //echo 'ta dando certo o filter auth 2.0';
        $key        = Services::getSecretKey();
		$authHeader = $request->getServer('HTTP_AUTHORIZATION');
		$arr        = explode(' ', $authHeader);
		$token      = $arr[1];

		try
		{
			JWT::decode($token, $key, ['HS256']);
		}
		catch (\Exception $e)
		{
			return Services::response()
				->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
		}
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}