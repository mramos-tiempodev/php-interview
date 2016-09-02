<?php
namespace Animal\Controller;

use Zend\Json\Json;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\Http\Client as HttpClient;
use Zend\View\Model\ViewModel;

/**
 * Used to receive all the calls from the frontend of the app
 */
class AnimalclientController extends AbstractActionController
{

    public function indexAction()
    {
        $client = new HttpClient();
        $client->setAdapter('Zend\Http\Client\Adapter\Curl');
        $client->setUri('http://tiempo.webchallange.com/api/Animal');
        $client->setMethod('GET');
        $response = $client->send();

        return new ViewModel(array('Animal'=> $response->getContent(), 'success' => true));
    }

    public function insertAction()
    {
        $request = $this->getRequest();
        $post = array();

        if ($request->isPost()) {
            parse_str($request->getContent(), $post);
        }

        $client = new HttpClient();
        $client->setAdapter('Zend\Http\Client\Adapter\Curl');
        $client->setUri('http://tiempo.webchallange.com/api/Animal');
        $client->setMethod('POST');
        $client->setParameterPOST($post);
        $response = $client->send();
		$data = json_decode($response->getContent());
        return new JsonModel(array('Animal'=> $data, 'success' => true));
    }

    public function updateAction()
    {
	    $request = $this->getRequest();
	    $post = array();

	    if ($request->isPost()) {
		    parse_str($request->getContent(), $post);
	    }

	    $client = new HttpClient();
	    $client->setAdapter('Zend\Http\Client\Adapter\Curl');
	    $client->setUri('http://tiempo.webchallange.com/api/Animal');
	    $client->setMethod('PUT');
	    $client->setParameterPOST($post);
	    $response = $client->send();
	    $data = json_decode($response->getContent());
	    return new JsonModel(array('Animal'=> $data, 'success' => true));
    }
} 