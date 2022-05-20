<p align="center">
	<a href="https://www.plutonium.best"><img src=".github/plutonium.png"></img></a><br>
</p>
<h1 align="center">Documents source wiki</h1>

**Visiter le site**: https://www.plutonium.best/wiki

# A propos de ce repository

Cet endroit regroupe toutes les sources des pages et aricles du wiki du serveur plutonium. Il a été conçu pour que la communauté puisse s'investir dans la conception, la participation et l'élaboration du wiki de Plutonium. 

# Sommaire

* [Introduction](https://github.com/Plutonium-Mcpe/pluto-wiki#introduction)
* [Contribuer](https://github.com/Plutonium-Mcpe/pluto-wiki#contribuer)
  * [Règles de contribution](https://github.com/Plutonium-Mcpe/pluto-wiki#règles-de-contribution)
    * [Nommage de fichiers](https://github.com/Plutonium-Mcpe/pluto-wiki#nommage-des-fichiers)
    * [Utilisation du markdown](https://github.com/Plutonium-Mcpe/pluto-wiki#utilisation-du-markdown)
  * [Les Pull Request](https://github.com/Plutonium-Mcpe/pluto-wiki#les-pull-request)
    * [Faire une Pull Request](https://github.com/Plutonium-Mcpe/pluto-wiki#faire-une-pull-request)
    * [Recommandations pour les Pull Request](https://github.com/Plutonium-Mcpe/pluto-wiki#recommandations-pour-les-pulls-requests)
  * [Les Issues](https://github.com/Plutonium-Mcpe/pluto-wiki#les-issues)
* [Liens utiles de documentations](https://github.com/Plutonium-Mcpe/pluto-wiki#liens-utiles-de-documentation)

# Introduction

Avant toutes choses, la courtoisie et les règles de bases d'une communauté s'appliquent ici.
- Toute menaces / propos à contenu pornographique, discriminatoire, raciste, sexiste etc .. sont interdites.
- Toutes insultes sont interdites, si vous êtes pas d'accord sur des points, ceci peut se faire calmement.

Le but principal de ce répertoire est de fournir à la communauté la possibilé de s'exprimer et de pouvoir s'impliquer au développement de cette documentation maintenu par les joueurs, pour les joueurs.

# Contribuer

Pour toute participation incluant la modification ou l'ajout de pages du wiki, nous utilisons le système de Pull Request intégré à GitHub.
Pour toute demande de modification / report de faute d'orthographe etc ..., il faut utiliser les issues.

Si vous ne savez pas quoi faire mais que vous souhaitez quand même participer à la vie du wiki, vous pouvez commenter, relir, chercher des bugs dans les [Issues](https://github.com/Plutonium-Mcpe/pluto-wiki/issues/new)

> Nous utilisons des syntax qui nous sont propres pour ajoutés des fonctionnalités au wiki : voir [SYNTAX.md](https://github.com/Plutonium-Mcpe/pluto-wiki/blob/stable/SYNTAX.md) pour plus d'information.

**Toute contribution inutile ou abusive seront automatiquement décliné par l'équipe du staff sans donner de raisons. Si pour autant votre proposistion de changement a été rejeté et que pensez que c'est une erreur, c'est certainement car vos modidifactions sont soit fausse soit manquent de détails / claraté.**

## Règles de contribution

Toutes personnes souhaitant contribuer au wiki doit se soumettre au règles de contribution. 

Tout les documents du wiki de plutonium sont écritent en [Mardown ( un guide est diponible ici :](https://blog.wax-o.com/2014/04/tutoriel-un-guide-pour-bien-commencer-avec-markdown/) ).
Les images utilisés dans vos contibution doivent être déjà présentes dans le wiki ou bien validé par l'équipe.  
Un dossier entier nomé **Static** est consacré aux images d'illustrations du wiki, il contient les crafts et textures moddés et vanilla. 

**Si un ajout d'illustrations est nécessaires pour un article, il vous faudra dans un premier temps l'upload via GitHub puis nous nous chargerons ensuite de l'intégré aux fichiers si celui-ci pertinent et respecte nos règles internes.**

### Nommage des fichiers

Le répertoire de ce Github est organisé dans une architecture de fichier clair qui est indispensable d'être respecter.
```
├── .github
├── build
└── docs
    └── nom-category
        ├── nom-category_category.md
	└── une-page.md
```
Chaque page doit se trouver dans le dossier correspondant à sa catégorie.
Chaque fichier correspondant à une page **DOIT** contenant :
* **Id unique**: un 'id' unique doit être donné correspondant à une chaîne contenant : [a-z] / [1-9] / ou - *(voir les pages déjà existante pour un exemple)*
* **Nom fichier**: le nom du fichiers est lié à l'id utilisé: ``id.md``, *exemple: opalite.md pour une pages qui aurait pour id: opalite*
* **Tête de fichier**: Les premières lignes du fichiers doivent être rempli suivant ce pattern : 
```markdown
---
id: //id à remplacer
title: // titre de la page
category: // category id
description: // description courte de la page
icon: // lien vers l'icône de la page entre guillemet ou lien relatif vers la textures: textures/items/une_texture.png
---
___
//suite de l'article
```

Pour intégrer un icon à votre page / catégorie, il vous sera demandé de fournir soit:
* un lien vers l'image donné (en .png) 
* un lien relatif vers l'image en question
  * deux dossiers sont disponibles pour le moment: craft / textures où textures comporte tout les sous-dossier tels que dans ``static/vanilla/textures`` actuels
  * *Ex: textures/items/opalite_ingot.png* pointe vers le lingot d'opalite

### Utilisation du markdown

Les pages étant écrites en markdown pour être générer ensuite côté serveur sur le site, il est nécessaire de suivre cette norme.  
De plus, il est important d'éviter au maximum l'html pur directement au sein du documents mais de privilégier la syntax markdown qui est très complète.
> [Voir une documentation](https://blog.wax-o.com/2014/04/tutoriel-un-guide-pour-bien-commencer-avec-markdown/)  
> Pour ajouter des fonctionnalitées en plus, nous utilisons des syntax en plus qui nous est propre:  
> [Voir notre syntax](https://github.com/Plutonium-Mcpe/pluto-wiki/blob/stable/SYNTAX.md)

## Les Pull Request

> Les Pull Request sont gérés par l'équipe de Plutonium lorsqu'ils sont disponibles, souvenez vous qu'elles peuvent mettre un certain temps avant d'être relu.  
> Selon vos modifications et la qualité de votre rédaction, la team pourrait vous demander des changements à effectuer qui seront nécessaires avant de voir les changements publiés officiellement.

Chaque Pull Request doit concerner **une seule page** et UNE seule, vous ne devez pas proposer 5 nouvelle page en une seule pull request, mais en faire 5 différentes. Les seuls regroupements autorisés concernent les Pull Request visant à corriger des fautes d'orthographes / données invalides.

Avant que vos modifications soient révisées par la team gérant le wiki, tous les tests liés à la Pull Request doivent être un succès, si l'un d'entre eux ressort une erreur, veuillez la corriger. *Si vous savez pas d'où vient l'erreur ou si vous n'arrivez pas à la résoudre, commenter pour demander de l'aide*.

### Faire une Pull Request

La méthode basique pour effectuer une Pull Request sur github est la suivante:
1. [Créer un fork du répertoire de base](https://github.com/Plutonium-Mcpe/pluto-wiki/fork) Ceci vous donnera votre propre copie du wiki permettant ainsi d'effectuer vos modifications
2. Créer une nouvelle branche pour vos changements
3. Effectuer vos modifications sur la branche précédemment créer
4. Vous pouvez ensuite créer une nouvelle [Pull Request](https://github.com/Plutonium-Mcpe/pluto-wiki/pull/new) sur le répertoire de base 

### Recommandations pour les pulls requests

* Nous vous recommandons de savoir un minimum utiliser l'outil proposé pour ne pas faire d'erreur ou de fausse manipulations pouvant ruiner votre travail accompli.
* **Créer une branche par Pull Request** Ceci vous permet d'utiliser le même fork pour créer plusieurs Pull Request.
* **Expliciter vos intitulé de modifications** Lorsque vous effectuez des 'commit' ou modifications, veillez à rendre l'intitulé du commit le plus clair possible et en détaillant les modifications apportées. *Vous pouvez retrouver un exemple [ici](https://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)*
* **Modifier un par un** Il est important de séparer vos modifications et d'enregistrer souvent pour obtenir un versionnage plus propre. Effectuer des modifications dispersées entre plusieurs fichiers en un seul commit n'est bien sûr pas la bonne pratique.
* **Plus c'est gros, plus c'est long** Prenez en compte que plus il y a relire, plus celle-ci va être longue, ainsi, veillez à segmenter vos Pull Request au maximum pour permettre un traitement plus rapide.

**Ne l'oubliez pas : Merci d'avance pour la contribution au wiki !**

## Les issues

> Les issues, comme les Pull Request, sont maintenus par l'équipe de Plutonium lorsqu'ils sont disponibles, ainsi, avant d'avoir une réponse sur la votre, il peut s'écouler un certain temps.

Si l'idée est acquise, l'issue sera triée selon un ordre de priorité définis par l'équipe. Les issues avec une priorité haute voire critique deviendront la priorité de l'équipe tandis que les priorité basse ne seront traitées lorsque l'urgence n'est plus présente.

> Notez que toute issue est soumise à discussion publique, si une personne souhaite donner son avis sur tel ou tel points, il est la bienvenue, elles sont fait pour. 
> Il est aussi important de noter que si vous souhaitez contribuer mais ne savez pas comment, les issues peuvent être un lieu d'idées pour aider l'équipe.

# Liens utiles de documentation

* [A propos des Pull Request](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/about-pull-requests)
* [A propos des Forks](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/working-with-forks/about-forks)
* [Créer une Pull Request à partir d'un fork](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/creating-a-pull-request-from-a-fork)

