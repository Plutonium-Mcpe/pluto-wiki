---
id: faction-settings
title: [New] Les paramètres de faction
category: faction
description: La personnification de votre faction !
icon: "textures/blocks/command_block.png"
---
___
## Introduction

Les paramètres de faction permettent de personnaliser votre faction.  
Vous pouvez changer:
- La description
- La visibilité de faction
- Le blason
- Le quiz de candidature
- Les grades de votre faction

## Le quiz de candidature

Quiz accessible lorsque votre faction est en visibilité ``Sur invitation``, il permet de poser des questions aux joueurs souhaitant rejoindre votre faction.

Vous pourrez ensuite accepter ou refuser la candidature de ce joueur après avoir vu ses réponses.

Plusieurs types de questions sont disponibles:
- ``Ouverte``: Le joueur peut répondre librement
- ``Switch``: Le joueur doit choisir entre oui ou non

## Les grades

Les grades permettent de définir des permissions pour les membres de votre faction. Ils sont composés d'un nom, d'un diminutif (2 lettres) et d'un ensemble de permissions.

Lors de la création ou de l'édition d'un grade, seul les permissions possédées par votre grade actuel sont attribuables au nouveau grade.  
Pour protéger les grades supérieur, il est impossible d'effectuer quelconque modification sur un grade supérieur au votre (ordre, permissions, etc...).

Il existe deux types de grade spéciaux:
- Propriétaire: Ce grade représente le propriétaire de la faction. Il est impossible de le supprimer, de l'attribuer et de l'ordonner, il possède toutes les permissions par défaut.
- Par défaut: Ce grade est le grade qui sera attribué par défaut aux nouveaux membres de votre faction. Il est impossible de le supprimer et ne possède aucune permission par défaut.

## Permissions liées

- ``Edition paramètre généraux`` : Permet d'éditer les paramètres généraux de la faction (description, visibilité)
- ``Edition blason`` : Permet d'éditer le blason de la faction
- ``Edition quiz`` : Permet d'éditer le quiz de candidature de la faction
- ``Attribution grade`` : Permet d'attribuer un grade inférieur à soit à un membre de la faction
- ``Ajout grade`` : Permet d'ajouter un grade à la faction
- ``Suppression grade`` : Permet de supprimer un grade inférieur à soit
- ``Edition grade`` : Permet d'éditer un grade inférieur à soit