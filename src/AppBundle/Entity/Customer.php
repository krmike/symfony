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
 * @ORM\Table(name="customer")
 */
class Customer
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
	public $phone;

}