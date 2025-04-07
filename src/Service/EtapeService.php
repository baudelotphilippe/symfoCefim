<?php 

namespace App\Service;

class EtapeService {
    function getEtapes() {
        return [
            ["year" => 1978, "event" => "Création de la discothèque"],
            ["year" => 1985, "event" => "Première rénovation et agrandissement"],
            ["year" => 1992, "event" => "Introduction des premières soirées à thème"],
            ["year" => 2000, "event" => "Modernisation du son et des lumières"],
            ["year" => 2005, "event" => "Collaboration avec DJs internationaux"],
            ["year" => 2010, "event" => "Ouverture d’un espace VIP"],
            ["year" => 2015, "event" => "Lancement d’une application mobile pour réservations"],
            ["year" => 2020, "event" => "Mise en place d’un service de streaming de DJ sets"],
            ["year" => 2023, "event" => "Expansion avec une nouvelle discothèque dans une autre ville"],
            ["year" => 2025, "event" => "Création d’un label musical pour promouvoir de nouveaux artistes"]
        ];
    }
}