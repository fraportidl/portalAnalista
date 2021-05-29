<?php


namespace App\Http\Controllers;


use Doctrine\ORM\EntityManagerInterface;


class PainelAdministrativoController extends Controller
{

        /**
         * @var EntityManagerInterface $em
         */
        private $em;


        public function __construct(EntityManagerInterface $em)
        {
            $this->em = $em;
        }


     public function index(){
        return view('PainelAdministrativo.home');
    }


}
