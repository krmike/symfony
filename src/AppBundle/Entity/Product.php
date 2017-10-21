<?php
/**
 * Created by PhpStorm.
 * User: Mike Kr
 * Date: 21.10.2017
 * Time: 21:07
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	public $id;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $name;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $slug;

	/**
	 * @ORM\Column(type="integer")
	 */
	public $category_id;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $title;

	/**
	 * @ORM\Column(type="text")
	 */
	public $meta;

	/**
	 * @ORM\Column(type="text")
	 */
	public $short_description;

	/**
	 * @ORM\Column(type="text")
	 */
	public $description;

	/**
	 * @ORM\Column(type="decimal", scale=2)
	 */
	public $price;

	/**
	 * @param $slug
	 * @return mixed
	 * @todo 404 exception
	 */
	
	public function findBySlug($slug)
	{
		$repository = $this->getDoctrine()->getRepository(Product::class);

		if (!$product = $repository->findOneBySlug($slug)) {
			throw new NotFoundHttpException('Sorry not existing!'); 
		}

		return $product;
	}

	/**
	 * @param $slug
	 * @return mixed
	 * @todo 404 exception
	 */

	public function findByCategoryId($category_id)
	{
		$repository = $this->getDoctrine()->getRepository(Product::class);

		if (!$product = $repository->findByCategory_id($category_id)) {
			throw new NotFoundHttpException('Sorry not existing!');
		}

		return $product;
	}
}