---
id: faction
title: Commandes pour les factions 
category: commands
description: Vous souhaitez devenir le plus riche & puissant du serveur ? Envie de jouer en équipe pour évoluer rapidement et vous amuser encore plus sur le serveur ? Créez ou rejoignez une faction ! 
icon: "textures/blocks/command_block.png"
---
___
## Description  

Une faction est une équipe comportant jusqu'à 20 joueurs qui s’allient pour réaliser des tâches en groupe comme du pvp, des pillages, des constructions etc...
C'est un lieu basé sur la confiance de ces membres malgré le faite que la trahison soit autorisé sur le serveur. De nombreux avantages dans le gameplay vous seront apportés si vous faites partie d'une faction ! 

Il y a 3 niveaux de rang différents dans les factions, dont voici la répartition des permissions:

Permission | Chef | Officier | Membre
:----------------------------------: | :-: | :-: | :-:
Se téléporter au home de faction | ✔️ | ✔️ | ✔️
Définir/supprimer le home de faction | ✔️ | ❌ | ❌ 
Supprimer la faction | ✔️ | ❌ | ❌
Inviter un joueur | ✔️ | ✔️ | ❌
Promouvoir/rétrograder un joueur | ✔️ | ❌ | ❌
Expulser un membre | ✔️ | ✔️ | ❌
Modifier la description de faction | ✔️ | ❌ | ❌
Claim/Unclaim une zone | ✔️ | ❌ | ❌
Overclaim une zone | ✔️ | ❌ | ❌

## Commandes disponibles avec explication :

Pour toutes les permissions nécessaires pour effectuer ces commandes, veuillez vous référer au tableau ci-dessus


* ``/f help ``: Permet de visualiser la liste complète des commandes lié au faction disponible sur le serveur directement en jeu.
* ``/f info <faction> ``: Permet de visualiser toutes les informations importantes sur une faction comme sa date de création, ses membres ou encore sa description. 
* ``/f create <nom> ``: Permet la création d'une faction avec un nom choisi.    
 **Informations** : Vous ne pouvez pas créer deux factions du même nom ni créer de faction si vous en avez déjà une. 
* ``/f delete ``: Permet de supprimer sa faction. 
* ``/f invite <pseudo> ``: Permet d'inviter un joueur dans sa faction.  
 **Information** : Il faut bien rentrer le pseudo exact du joueur qui doit être ajouté ( mettre " au début et à la fin du pseudo si il y comporte des espaces). 
* ``/f accept ``: Permet d'accepter une invitation pour rejoindre une faction. 
* ``/f deny ``: Permet de refuser une invitation pour rejoindre une faction. 
* ``/f promote <pseudo> ``: Permet de promouvoir au rang supérieur un membre de votre faction.   
* ``/f demote <pseudo> ``: Permet de rétrograder au rang inférieur un membre de votre faction.
* ``/f kick <pseudo> ``: Permet d'expulser une personne de votre faction.  
* ``/f leave ``: Permet de quitter votre faction.  
* ``/f description <description> ``: Permet de modifier la description de votre faction.  
 **Informations** : Une limite de **200 carractères** est defini sur les descriptions de faction.  
* ``/f sethome ``: Permet de placer un home accessible à tous les membres de la faction sur le serveur actuel.    
* ``/f home ``: Permet de se téléporter au home de votre faction.
* ``/f delhome ``: Permet de supprimer le f home de votre faction.  
* ``/f claim ``: Permet de claim une zone de 20x20. Cela signifie que les membres extérieurs à votre faction ont des permissions réduites dans la zone et ne peuvent pas casser des blocs par exemple.   
* ``/f unclaim ``: Permet d'enlever le claim de votre faction dans la zone actuelle.
* ``/f overclaim ``: Permet d'enlever le claim d'une autre faction dans la zone actuelle et la remplacer par le claim de votre faction.  
 **Informations** : Il faut imperativement que votre faction ai plus de puissance que la faction ennemie.
* ``/f claiminfo ``: Permet de vérifier si il y a des claims dans une zone de [ Voir cle ]. Cette commande indique le nom de la faction qui a un claim et sa distance du lieu de l'exécution de la commande.
* ``/f bank ``: Permet d'accéder au menu de la banque de votre faction. Vous pourrez ainsi faire des transactions avec celle-ci et voir le solde de votre faction.
* ``/f topfaction ``: Montre le classement des 10 factions possédant le plus de puissance.
* ``/f topmoney ``: Montre le classement des 10 factions possédant le plus d’argent. 




 
