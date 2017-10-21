<?php
/**
 * Created by PhpStorm.
 * User: Mike Kr
 * Date: 21.10.2017
 * Time: 19:55
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
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

		$categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
		return $this->render('default/catalog.html.twig', [
			'title' 		=> "Main page",
			'meta'			=> 'main page meta description',
			'categories'	=> $categories
		]);
	}

	/**
	 * @Route("/{slug}.html", name="Product")
	 */
	public function productAction($slug)
	{

		$product = $this->getDoctrine()->getRepository(Product::class)->findOneBySlug($slug);
		$category = $this->getDoctrine()->getRepository(Category::class)->find($product->category_id);

		return $this->render('default/product.html.twig', [
			'title' 	=> $product->title,
			'meta' 		=> $product->meta,
			'product'	=> $product,
			'category'	=> $category
		]);
	}
	
	/**
	 * @Route("/{slug}", name="Category")
	 */
	public function categoryAction($slug)
	{

		$category = $this->getDoctrine()->getRepository(Category::class)->findOneBySlug($slug);
		$products = $this->getDoctrine()->getRepository(Product::class)->findBy(
			[
				'category_id'	=> $category->id
			]
		);

		return $this->render('default/category.html.twig', [
			'title' 	=> $category->title,
			'meta' 		=> $category->meta,
			'category'	=> $category,
			'products'	=> $products
		]);
	}
}
