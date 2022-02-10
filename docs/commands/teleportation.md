---
id: teleportation
title: Commande de teleportation
category: commands
description: Marcher, courir c'est bien, mais la téléportation c'est mieux ! Une commande et vous voilà auprès de votre ami !
icon: "textures/items/ender_pearl.png"
---
___
## Description

Les commandes de téléportation vont vous être très utile durant votre aventure. Si besoin de vous téléporter à un ami, à un joueur pour un échange ou même pour vous téléporter aléatoirement en monde minage, une commande et le tour est joué.

## Téléportation à un joueur

Vous permettra de vous téléporter à un joueur avec une sécurité. Fonctionne avec un système de demande, tant que le joueur en face n'a pas accepté la téléportation, personne ne sera embêter.  
**Chaque demande de téléportation expirera au bout de 30s**. Si le joueur en face n'acccepte pas après ce temps-ci, il faudra effectuer une nouvelle fois la commande.  

Vous ne pouvez pas utiliser ces commandes tant que vous êtes en combat. Vous ne pourrez non plus accepter une demande de téléportation d'un joueur en combat ou vous téléporter à un joueur en combat.  

### Utilisation

* ``/tpa <pseudo>``: Se téléporter vers le pseudo indiquer, *Exemple: /tpa CIeSucre, enverra une demande de téléportation vers le joueur avec le pseudo CIeSucre*
* ``/tpahere <pseudo>``: Envoyer une demande de téléportation au joueur indiqué, pour se téléporter vers vous. *Exemple: /tpahere CIeSucre, proposera à CIeSucre de se téléporter à vous même*
* ``/tpaccept``: Va de pair avec **/tpdeny**, cette commande vous permet d'accepter la demande de téléportation reçu. Si cette demande vient d'un **/tpa**, le joueur en face sera téléporter à vous, si cela vient d'un **/tpahere** vous serez téléporter au joueur en face.
* ``/tpdeny``: Va de pair avec **/tpaccept**, cette commande ignorera la demande de téléportation reçu.

## Téléporation prédefinis

Parfois, il vous sera utile de vous rendre dans une certaine zone d'un serveur, ou même de changer rapidement de serveur.

### Utilisation

* ``/hub & /spawn``: Vous téléportera au spawn du serveur où vous vous trouver
* ``/lobby1 & /lobby2 ...``: Permet de se téléporter au lobby avec le numéro spécifié, si le numéro 1 est renseigné à la fin de la commande, vous serez téléporter au lobby numéro 1
* ``/stelite & /arcadia ...``: Si le d'un serveur faction est mis dans une commande, vous serez téléporter au serveur concerné. **/stelite** vous amènera au serveur faction Stelite
* ``/minage1 & /minage2 ...``: Sur le même principe que les commandes de lobby, vous permettra de vous téléporter au serveur minage portant le numéro spécifié.
* ``/shop``: Vous téléportera au Shop du serveur courant
* ``/boss``: Vous amènera au monde des boss et leurs arènes

## Autres

* ``/rtp``: **Disponible que en serveur Minage**, vous permettra de vous téléporter aléatoirement sur la carte, pratique pour vous éloigner rapidement du spawn.
* ``/allowtp``: permet d'activé ou de désactiver le fait que les guides puisse se téléporter sur vous sans demande de téléportation. Les guides n'ont pas cette permission par défaut.