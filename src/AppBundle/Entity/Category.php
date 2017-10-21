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
 * @ORM\Table(name="category")
 */
class Category
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $name;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	public $slug;
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
	 * @param $slug
	 * @return mixed
	 * @todo 404 exception
	 */
	
	public function findBySlug($slug)
	{
		$repository = $this->getDoctrine()->getRepository(Category::class);

		if (!$category = $repository->findOneBySlug($slug)) {
			throw new NotFoundHttpException('Sorry not existing!'); 
		}

		return $category;

	}
}