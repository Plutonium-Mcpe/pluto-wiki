---
id: boussole-claim
title: [New] La boussole de claim
category: faction
description: La boussole de claim, item indispensable pour tout bon pilleur qui se respecte !
icon: "textures/items/faction/claim_compass.png"
---
___
## Introduction

La boussole de claim permet de voir le statut des chunks autour de soit.

![Boussole de claim](https://user-images.githubusercontent.com/66992287/236704379-8af5887d-3edf-4d5b-8f65-7cda0302735a.png)

## Lecture

La carte est divisé en sous section, appelé des chunks, équivalent à un carré de 16x16 blocs. 

- La croix (``+``) indique l'emplacement actuel de votre joueur dans la grille de chunk.
- Chaque tiret (``-``) représente un chunk non claim, et donc disponible.
- Tout autre caractères sur la carte correspond à un chaunk claim ou une zone protégé.
    - Sera affiché en ``bleu`` les chunks claim par votre faction.
    - Sera affiché en ``blanc`` les chunks claim par une faction autre que la votre.
    - Sera affiché en ``rouge claim`` les chunks actuellement sous l'influence d'un overclaim d'une autre faction
    - Sera affiché en ``orange`` avec le caractère ``/`` les zones protégés établis par les staff: Spawn par exemple
    - Sera affiché en ``rouge`` avec le caractère ``\`` la warzone (zone de pvp)

> Toute correspondance, couleur / caractère peut-être retrouvé dans la légende en bas de la carte

La boussole en haut à droite permet de savoir quel est la direction de notre joueur par rapport à la carte qui pointe vers le nord.

## Comment en obtenir ?

* Enchères de faction (#faction/faction-auction)
* Récompense de niveau de faction (Niveau 7) (#faction/faction-level)

## Caractériques

* ``Taux de rafraichissement``: 5 secondes
* ``Durabilité``: 7 jours, 1 rafraichissement = 1 durabilité