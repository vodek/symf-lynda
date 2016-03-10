<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 05/03/16
 * Time: 20:39
 */
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController
{

    /**
     * @Route("/lucky/number/{count}", name="Co to kurwa jest")
     */

        public function numberAction($count)
        {

                $numbers = array();
                for ($i = 0; $i < $count; $i++) {
                    $numbers[] = rand(1, 49);
                }


                $numbersList = asort($numbers);
                $numbersList = implode(', ', $numbers);

                return new Response(
                    '<html><body><h1 style="color:red;">Randomly selected numbers: ' . $numbersList . '</h1></body></html>'
                );

            }

        

    // ...
}