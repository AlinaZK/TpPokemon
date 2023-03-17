<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use App\Repository\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/pokemons', name: 'pokemons_')]
class PokemonController extends AbstractController
{
    #[Route('', name: 'list')]
    public function list(PokemonRepository $pokemonRepository): Response // docrine va etre declare
    {
        // todo : aller cherche les series en BDD
        $pokemons = $pokemonRepository->findAll();
        dump($pokemons); // docrine va etre declare

        return $this->render('pokemons/list.html.twig',[
            'pokemons'=>$pokemons
        ]);
    }

    #[Route('/details/{id}', name: 'details')]
    public function details(int $id, PokemonRepository $pokemonRepository): Response
    {
        $pokemon = $pokemonRepository->find($id);
        return $this->render('pokemons/details.html.twig',
            [
                'pokemons'=> $pokemon
            ]);
    }
}
