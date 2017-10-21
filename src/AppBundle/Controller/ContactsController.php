<?php
/**
 * Created by PhpStorm.
 * User: Mike Kr
 * Date: 22.10.2017
 * Time: 0:24
 */

namespace AppBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
}