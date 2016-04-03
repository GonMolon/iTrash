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
	 * @Method("GET")
	 */
	public function getProductAction(Request $request, $ean) {

		//$this->makeMyDatabaseBeHappy();

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


    	$exists = $firebase->get($ean . '/');
    	$timesInBucket = $firebase->get($ean . '/timesThrown');
    	$lidlStock = $firebase->get($ean . '/stockValue');

    	$responseMessage = "Product was correctly added, EAN: " . $ean;

    	if ($exists != 'null' && $timesInBucket < $lidlStock) {
    		$timesInBucket = $timesInBucket + 1;
    		$path = $ean . '/timesThrown/';
    		$firebase->set($path, $timesInBucket);

    		$newTime = round(microtime(true) * 1000);
    		$path = $ean . '/timeInMillis/';
    		$firebase->set($path, $newTime);

    		$responseMessage = "Quantity was incremented and time uploaded: " . $ean;

    	} else if ($exists != 'null') {
    		$responseMessage = "Error: More than the limit";

    	} else {
    		if ($product) {
				$productArray = $this->productToArray($product);
	    		$firebase->set($ean, $productArray);
    		}
    		else {
    			$firebase->set($ean . '/ean/', $ean);
    			$firebase->set($ean . '/timesThrown/', 1);
    			$newTime = round(microtime(true) * 1000);
	    		$firebase->set($ean . '/timeInMillis/', $newTime);
    			$firebase->set($ean . '/stockValue/', 42);
    		}
    	}

		return new Response($responseMessage);

	}

	/**
	 * @Route("/iTrash/allMyShit/")
	 * @Method("GET")
	 */
	public function getMyShitAction(Request $request) {

	}

	function productToArray(Product $product) {
		return array (
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
	}


	function makeMyDatabaseBeHappy() {
		$array = json_decode('');
		$array = $array->Campaign->ContainerItems;
		for ($i = 0; $i < count($array); $i++) {

			$p = new Product();
			$aux = $array[$i]->Product;

			$p->setEan($aux->ean);
			$p->setName($aux->productLanguageSet->ProductLanguageSet->title);
			$p->setDescription($aux->productLanguageSet->ProductLanguageSet->subtitle);
			$p->setPrice($aux->price);
			$p->setSmallImageURL($aux->mainImage->Image->smallUrl);
			$p->setMediumImageURL($aux->mainImage->Image->mediumUrl);
			$p->setLargeImageURL($aux->mainImage->Image->largeUrl);
			$p->setLidlURL($aux->shareUrl);
			$p->setAvailableOnline($aux->availableOnline);
			$p->setDaysForDelivery($aux->daysForDelivery);
			$p->setMaxOrderQuantity($aux->maxOrderQuantity);
			$p->setStockValue($aux->stock->stockValue);

			$em = $this->getDoctrine()->getManager();
			$em->persist($p);
			$em->flush();
		}
	}


}