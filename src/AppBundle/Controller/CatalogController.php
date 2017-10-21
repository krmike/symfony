<?php
/**
 * Created by PhpStorm.
 * User: Mike Kr
 * Date: 21.10.2017
 * Time: 19:55
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatalogController extends Controller
{
	/**
	 * @Route("/", name="Catalog")
	 */
	public function indexAction(Request $request)
	{
		// replace this example code with whatever you need
		return $this->render('default/catalog.html.twig', [
			'title' => "Main page",
		]);
	}
	
	/**
	 * @Route("/{slug}", name="Category")
	 */
	public function categoryAction($slug)
	{

		$category = $this->getDoctrine()->getRepository(Category::class)->findOneBySlug($slug);
		$products = [
			1 => [
				'name'	=> '1 product'
			],
			2 => [
				'name'	=> '2 product'
			]
		];

		return $this->render('default/category.html.twig', [
			'title' 	=> $category->title,
			'category'	=> $category,
			'products'	=> $products
		]);
	}
}
