---
id: faction
title: Commandes pour les factions 
category: commands
description: Vous souhaitez devenir le plus riche et puissant du serveur ? Envie de jouer en équipe pour évoluer rapidement et vous amuser encore plus sur le serveur ? Créez ou rejoignez une faction ! 
icon: "textures/blocks/command_block.png"
---
___
## Description  

Une faction est une équipe comportant jusqu'à 20 joueurs qui s’allient pour réaliser des tâches en groupe comme du pvp, des pillages, des constructions etc...
C'est une équipe basé sur la confiance de ses membres malgré le fait que la trahison soit autorisé sur le serveur. De nombreux avantages dans le gameplay vous seront apportés si vous faites partie d'une faction ! 

Il y a 3 rangs différents dans les factions : 

- Chef 
- Officier 
- Membre  

## Commandes disponibles avec explication :  

 * ``/f help ``: Permet de visualiser la liste complète des commandes liées aux factions disponible sur le serveur directement en jeu.
* ``/f info <faction> ``: Permet de visualiser toutes les informations importantes sur une faction comme sa date de création, ses membres ou encore sa description. 
* ``/f create <nom> ``: Permet la création d'une faction avec un nom choisi.     
 **Informations** : Vous ne pouvez pas créer deux factions du même nom ni créer de faction si vous en avez déjà une. 
* ``/f delete ``: Permet de supprimer sa faction. 
 **Information** : Seul le chef de la faction peut supprimer sa faction, ceci en supprimera toutes les données.   
* ``/f invite <pseudo> ``: Permet d'inviter un joueur dans sa faction.  
 **Information** : Il faut bien rentrer le pseudo exact du joueur qui doit être ajouté (mettre " au début et à la fin du pseudo s'il y comporte des espaces).   
* ``/f accept ``: Permet d'accepter une invitation pour rejoindre une faction. 
* ``/f deny ``: Permet de refuser une invitation pour rejoindre une faction.
 * ``/f promote <pseudo> ``: Permet de promouvoir au rang supérieur un membre de votre faction.   
 **Information** : Seul le chef d'une faction peut utiliser cette commande.
* ``/f demote <pseudo> ``: Permet de rétrograder au rang inférieur un membre de votre faction.   
 **Information** : Seul le chef d'une faction peut utiliser cette commande.
* ``/f kick <pseudo> ``: Permet d'expulser une personne de votre faction. 
* ``/f leave ``: Permet de quitter votre faction.  
* ``/f description <description> ``: Permet de modifier la description de votre faction.  
 **Information** : Seul le chef d'une faction peut la modifier, une limite de 200 caractères est définie sur les descriptions de faction.  
* ``/f sethome ``: Permet de placer un home accessible à tous les membres de la faction.    
 **Information** : Seul le chef peut placer un f home. Vous avez accès à un f home par serveur.
* ``/f delhome ``: Permet de supprimer le f home de votre faction.  
 **Information** : Seul le chef peut supprimer le f home.  
* ``/f home ``: Permet de se téléporter au home de votre faction.
* ``/f claim ``: Permet de claim le chunk où vous vous trouvez. Cela signifie que les membres extérieurs à votre faction ont des permissions réduites dans la zone et ne peuvent pas casser des blocs par exemple.   
 **Informations** : Seul le chef peut supprimer le claim d'une zone. Utilise 2 de puissance pour claim une zone
* ``/f unclaim ``: Permet d'enlever le claim de votre faction dans une zone.  
 **Information** : Seul le chef peut supprimer le claim d'une zone. Permet de récupérer 1 de puissance.
* ``/f overclaim ``: Permet d'enlever le claim d'une autre faction dans une zone et remplacer par le claim de votre faction.  
 **Information** : Seul le chef peut utiliser cette commande, il faut impérativement que votre faction ait plus de power que la faction ennemie.
 * ``/f claiminfo ``: Permet de vérifier s'il y a des claims dans le chunk où vous vous trouvez.
* ``/f bank ``: Permet de donner de l'argent à ça faction qui pourra être utilisé par le chef pour faire ce qu'il veut.
* ``/f topfaction ``: Montre le classement des 10 factions possédant le plus de puissance.
* ``/f topmoney ``: Montre le classement des 10 factions possédant le plus d’argent. 
* ``/f allies <faction> ``: Permet de visualiser les alliés d'une faction ainsi que leur puissance.
* ``/f allywith <faction> ``: Permet d'envoyer une demande afin de devenir allié avec une autre faction.
 **Information** : Vous avez une limite d'une alliance par faction.  
* ``/f allywaccept ``: Permet d'accepter une demande d'alliance.
* ``/f allydeny ``: Permet de refuser une demande d'alliance.
* ``/f breakalliancewith <faction> ``: Permet de supprimer une alliance de votre faction.
 **Information** : Seul le chef peut supprimer une alliance quand il le souhaite.
