<?php

use Entity\AccountTrader;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{

    /**
     * @Route("/test-page", name="site_test")
     */
    public function testAction(Request $request)
    {
        $text = '';

        $r = new \stdClass();
        $r->fullName = 'test2';
        $account = new AccountTrader($r);
        $account->setEmail('test');
        $account->setPassword('te');
        $account->setFullName('test');

        $validator = $this->get('validator');
        $errors = $validator->validate($account, null, ['login']);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $text = 'ok';

        $response = new Response($text);
        return $response;
    }
}