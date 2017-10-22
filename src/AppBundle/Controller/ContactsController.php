<?php
/**
 * Created by PhpStorm.
 * User: Mike Kr
 * Date: 22.10.2017
 * Time: 0:24
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactsController extends Controller
{
	/**
	 * @Route("/contacts", name="Contacts")
	 */
	public function indexAction(Request $request)
	{
		return $this->render('default/contacts.html.twig', [
			'title' 		=> "Contact us",
			'meta'			=> 'contact us meta description'
		]);
	}
	
	/**
	 * @Route("/ajax/save/customer", name="SaveCustomer")
	 */
	public function saveAction(Request $request)
	{
		$result = [];
		$result['status'] = 'OK';
		if (!$name = $request->request->get('name')) {
			$result['fields'][] = 'name';
			$result['status'] = 'fail';
		}
		if (!$phone = $request->request->get('phone')) {
			$result['fields'][] = 'phone';
			$result['status'] = 'fail';
		}
		if ($result['status'] == 'OK') {
			$customer = new Customer();
			$customer->setName($name);
			$customer->setPhone($phone);
			$em = $this->getDoctrine()->getManager();
			$em->persist($customer);
			$em->flush();
		}
		$response = new Response(json_encode($result));
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}
}