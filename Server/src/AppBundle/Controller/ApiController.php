<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use AppBundle\Entity\Product;
use AppBundle\Entity\Scanned;
use Symfony\Component\Validator\Constraints\DateTime;

class ApiController extends Controller {

	/**
	 * @Route("/iTrash/{ean}/")
	 * @Method("POST")/
	 */
	public function postProductAction(Request $request, $ean) {

		// REPEAT

		$em = $this->getDoctrine()->getManager();
    	$scanned = $em->getRepository('AppBundle:Scanned')
    		->findOneByEan($ean);

    	if ($scanned) {
    		$scanned->setRepeats($scanned->getRepeats() + 1);
    	}
    	else {
    		$scanned = new Scanned();
    		$scanned->setEan($ean);
    		$scanned->setRepeats(1);
    	}

    	$em->persist($scanned);
		$em->flush();


    	// FIREBASE
		$firebase = new \Firebase\FirebaseLib(
			'https://itrashtest.firebaseio.com/',
			'MRKURtAh493IUFcNu3bFn66oxXpsknFnZKkjaoZJ'
		);

		$em = $this->getDoctrine()->getManager();
    	$product = $em->getRepository('AppBundle:Product')
    		->findOneByEan($ean);

    	$timesInBucket = $firebase->get($ean . '/timesThrown/');
    	$lidlStock = $firebase->get($ean . '/stockValue');
    	if ($exists != 'null' && $timesThrown < $lidlStock) {
    		$firebase->update($ean . '/timesThrown/', $timesThrown + 1);
    	}
    	else if ($timesThrown < $lidlStock)
    		return new JsonResponse(json_encode("Times Thrown >= Lidl Stock"));
    	}
    	else {
    		$firebase->set($ean . '/', $this->productToArray($product););
    	}

		$productStringJson = $this->productToArray($product);
		return new JsonResponse(json_encode($productStringJson));

	}

	function productToArray(Product $product) {
		$res = array (
			'ean' => $product->getEan() ,
			'name' => $product->getName() ,
			'description' => $product->getDescription() ,
			'timeInMillis' => round(microtime(true) * 1000) ,
			'price' => $product->getPrice() ,
			'smallImageURL' => $product->getSmallImageURL() ,
			'mediumImageURL' => $product->getMediumImageURL() ,
			'largeImageURL' => $product->getLargeImageURL() ,
			'lidlURL' => $product->getLidlURL() ,
			'availableOnline' => $product->getAvailableOnline() ,
			'daysForDelivery' => $product->getDaysForDelivery() ,
			'timesThrown' => 1 ,
			'stockValue' => $product->getStockValue()
			);
		return $res;
	}

}