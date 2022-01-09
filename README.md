<p align="center">
	<a href="https://www.plutonium.best"><img src=".github/plutonium.png"></img></a><br>
</p>
<h1 align="center">Documents source wiki</h1>

**Visiter le site**: https://www.plutonium.best/wiki

# A propos de ce repository

Cet endroit regroupe toutes les sources des pages du wiki pour le serveur plutonium. Il a été conçu pour la communauté souhaitant s'investir dans la conception, la participation et l'élaboration du wiki de Plutonium. 

# Sommaire

* [Introduction](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#introduction)
* [Contribuer](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#contribuer)
  * [Règles de contribution](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#règles-de-contribution)
    * [Nommage de fichiers](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#nommage-des-fichiers)
    * [Utilisation du markdown](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#utilisation-du-markdown)
  * [Les Pull Request](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#les-pull-request)
    * [Faire une Pull Request](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#faire-une-pull-request)
    * [Recommandations pour les Pull Request](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#recommandations-pour-les-pulls-requests)
  * [Les Issues](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#les-issues)
* [Liens utiles de documentations](https://github.com/ShockedPlot7560/pluto-wiki/blob/main/README.md#liens-utiles-de-documentation)

# Introduction

Avant toute choses, la courtoisie et les règles de bases d'une communauté s'appliquent.
- Toute menaces / propos à contenu pornographique, discriminatoire, raciste, sexiste etc .. sont interdites
- Toutes insultes sont interdites, si vous êtes pas d'accord sur des points, ceci peut se faire calmement

Le but principal de ce répertoire est de fournir à la communauté de s'exprimer et de pouvoir s'impliquer au développement de cette documentation maintenu par les joueurs, pour les joueurs.

# Contribuer

Pour toute participation incluant la modification ou l'ajout de pages dans le wiki, nous utilisons le système de Pull Request intégré à GitHub
Pour toute demande de modification / report de faute d'orthographe etc ... Les issues sont à utiliser

Si vous ne savez pas quoi faire mais que vous souhaiter quand même participer à la vie du wiki, commenter, exprimer vous, reliser, chercher des bugs dans les [Issues](https://github.com/ShockedPlot7560/pluto-wiki/issues/new)

**Toute contribution inutile ou abusive seront automatiquement décliné par l'équipe sans devoir donner de raisons, si pour autant vous pensez que c'est une erreur, il vous faudra surement fournir plus de détails la prochaine fois.**

## Règles de contribution

Toutes personnes souhaitant contribuer au wiki doit se soumettre au règles de contribution 

Tout les documents du wiki de plutonium sont effectués en [Mardown, un guide est diponible ici](https://blog.wax-o.com/2014/04/tutoriel-un-guide-pour-bien-commencer-avec-markdown/) et les images proposés pour illustrer les pages doivent être uploadés d'abord sur GitHub via l'outils d'édition. 
> Aucun dossier ne proposant d'image ou média n'est proposé car chaque illustration est ensuite revu avant d'être mise en version finale sur le site officiel de Plutonium, il faudra passer par des outils externes.

### Nommage des fichiers

Le répertoire est organisé dans une architecture de fichier clair et qui est nécessaire de respecter.
```
├── .github
├── build
└── docs
    └── nom-category
        ├── nom-category_category.md
	└── une-page.md
```
Chaque pages doit se trouver dans le dossier correspondant à sa catégorie
Chaque fichier correspondant à une page **DOIT**:
* **Id unique**: un 'id' unique doit être donné correspondant à une chaine contenant : [a-z] / [1-9] / ou - *(voir les pages déjà existante pour un exemple)*
* **Nom fichier**: le nom du fichiers est lié à l'id utilisé: ``id.md``, *exemple: opalite.md pour une pages qui aurait pour id: opalite*
* **Tête de fichier**: Les premières lignes du fichiers doivent être rempli suivant ce patern: 
```markdown
---
id: //id à remplacer
title: // titre de la page
category: // category id
description: // description courte de la page
icon: // lien vers l'icône de la page entre guillemet
---
___
//suite du document
```

### Utilisation du markdown

Les pages étant écrites en markdown pour être générer ensuite côté serveur, il est nécessaire de suivre cette norme.  
De plus, il est important d'éviter au maximum l'html pur directement au sein du documents mais de privilégié la syntax markdown qui est très complète.
> [Voir une documentation](https://blog.wax-o.com/2014/04/tutoriel-un-guide-pour-bien-commencer-avec-markdown/)

## Les Pull Request

> Les Pull Request sont gérés par l'équipe de Plutonium lorsqu'ils sont disponibles, souvener vous qu'elles peuvent mettre un certains temps avant d'être relu.  
> Selon vos modifications et la qualité de votre rédaction, la team pourrait vous demander des changements a effectuer qui seront nécessaires avant de voir les changements publiés officiellement.

Chaque Pull Request doit concerner **une seule page** et UNE seule, vous ne devez pas proposer 5 nouvelle page en une seule pull request, mais en faire 5 différente. Les seuls regroupements autorisés concerne les Pull Request visant à corriger des fautes d'orthographes / données invalides.

Avant que vos modifications soit réviser par la team gérant le wiki, tout les tests liés à la Pull Request doivent être un succès, si l'un d'entre eux ressort une erreur, veuillez la corriger. *Si vous savez pas d'où vient l'erreur ou si vous n'arrivez pas à la résoudre, commenter pour demander de l'aide*.

### Faire une Pull Request

La méthode basique pour effectuer une Pull Request sur github est la suivante:
1. [Créer un fork du répertoire de base](https://github.com/ShockedPlot7560/pluto-wiki/fork) Ceci vous donnera votre propre copie du wiki permettant ainsi d'effectuer vos modifications
2. Créer une nouvelle branche pour vos changements
3. Effectuer vos modifications sur la branche précédement créer
4. Vous pouvez ensuite créer une nouvelle [Pull Request](https://github.com/ShockedPlot7560/pluto-wiki/pull/new) sur le répertoire de base 

### Recommandations pour les pulls requests

* Nous vous recommandons de savoir un minimum utiliser l'outils proposé pour ne pas faire d'erreur ou de fausse manipulations pouvant ruiner votre travail accompli
* **Créer une branche par Pull Request** Ceci vous permet d'utiliser le même fork pour créer plusieurs Pull Request.
* **Expliciter vos intitulé de modifications** Lorsque vous effectuer des 'commit' ou modifications, veillez à rendre l'intitulé du commit le plus clair possible et en détaillant les modifications apportés. *Vous pouvez retrouver un exemple [ici](https://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)*
* **Modifier un par un** Il est important de séparer vos modifications et d'enregistrer souvent pour obtenir un versionnage plus propre. Effectuer des modifications disparce entre plusieurs fichier en un seul commit n'est bien sûr pas la bonne pratique.
* **Plus c'est gros, plus c'est long** Prenez en compte que plus il y a relire, plus celle-ci va être longue, ainsi, veillez à segmenter vos Pull Request au maximum pour permettre un traitement plus rapide.

**Ne l'oubliez pas : Merci d'avance pour la contribution au wiki!**

## Les issues

> Les issues, comme les Pull Request, sont maintenus par l'équipe de Plutonium lorsqu'ils sont disponibles, ainsi, avant d'avoir une réponse sur la votre, il peut s'écouler du temps.

Si l'idée est acquise, l'issue sera triés selon un ordre de priorité définis par l'équipe. Les issues avec une priorité haute voire critique deviendront la priorité de l'équipe tandis que les priorité basse ne seront traités lorsque l'urgence n'est plus présente.

> Noter que toute issue est soumis à discussion publique, si une personne souhaite donner son avis sur tel ou tel points, il est la bienvenue, elles sont fait pour. 
> Il est aussi important de noter que si vous souhaiter contribuer mais ne savez pas comment, les issues peuvent être un lieu d'idées pour aider l'équipe.

# Liens utiles de documentation

* [A propos des Pull Request](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/about-pull-requests)
* [A propos des Forks](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/working-with-forks/about-forks)
* [Créer une Pull Request à partir d'un fork](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/creating-a-pull-request-from-a-fork)
