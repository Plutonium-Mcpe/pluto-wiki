Le Markdown étant limité pour certains cas, ou n'offrant pas toute la liberté et laisance que l'ont souhaite pour faire durer ce wiki, nous avons décider d'y ajouter des syntax particulière propre à Plutonium.  
Les eléments énoncé dans ce fichier ne seront que très rarement amené à être modifié pour un soucis de rétrocompatibilité, cependant, il est susceptible qu'il y en ai de nouveau. **Tenez vous donc au courant des dernières nouveautés**  

## Les mentions

Nous avons choisit de rendre l'ajout de mention et de tags vers des profil ou pages du wiki plus simples et plus agiles.  

### Les mentions utilisateurs

Vous souhaiter taguer un profil d'un joueur pour telle ou telle raison ? Aucun soucis, utiliser la syntax suivante:
> Toute mention d'utilisateur doit suivre le patern suivant: ``@pseudo``  ou la regex suivante: ``/@[a-zA-Z0-9]+/i`` 
> *``pseudo`` est à remplacer par le pseudo complet du joueur* **ATTENTION, la recherche de pseudo est soumis à la casse** 

Si un pseudo ne correspond pas, n'est pas reconnu car non présent dans les données du serveur, la mention sera retiré et simplement remplacer par la mention.

**Les pseudos avec espace ne sont pas encore supportés**

### Les mentions d'article / catégorie du wiki

En cas de besoin de relier les articles entre eux, ou de mentionner un article pour plus d'information, nous avons mit en place le tag de page qui permet de remplacer le tag par un lien vers la page existante. 

#### Tag de catégorie

> Les tags de catégorie doivent suivre ce patern: ``#category-id`` ou la regex suivante: ``/#[a-z0-9\-]+/i``  
> *``category-id`` est à remplacer par l'id de la catégorie. Vous pouvez le trouver dans l'en tête du fichier d'index de la catégorie.* 
> *Exemple: #items renverra un lien vers la catégorie des Items*

Si une catégorie n'est pas reconnu, inexistante, le tag sera remplacé par l'intitulé pourvu de son ``#``

#### Tag de pages du wiki

> Les tags de pages du wiki doivent suivre ce patern: ``#category-id/article-id`` ou la regex suivante: ``/#[a-z0-9\-\/]+/i`` 
> - *``category-id`` est à remplacer par l'id de la catégorie. Vous pouvez le trouver dans l'en tête du fichier d'index de la catégorie.* 
> - *``article-id`` est à remplacer par l'id de la page en question. Vous pouvez le trouver dans l'en tête du fichier correspondant à la page*  
> 
> *Exemple: #items/heal-stick renverra un lien vers l'article du Heal stick*

Si une catégorie n'est pas reconnu, inexistante, le tag sera remplacé par l'intitulé pourvu de son ``#``

## Les miniatures (thumbnail)

Les miniatures sont des images qui seront placés en premier dans la page permettant l'affichage de l'icônes spécifiés en haut à gauche de l'article au carré du texte.  
Vous pouvez demander l'icônes d'une page sur une autre ou demander l'icône d'une catégorie sur une page.

### Miniatures de catégorie

> Les miniatures de catégorie doivent suivre le patern suivant: ``{{thumbnail#category-id}}`` ou la regex suivante: ``/{{thumbnail#([a-z\-])+}}/``  
> *``category-id`` est à remplacer par l'id de la catégorie. Vous pouvez le trouver dans l'en tête du fichier d'index de la catégorie.*  
> *Exemple: {{thumbnail#items}} mettra l'icônes de la catégorie Items en haut à gauche de la page*

Si la catégorie donné est inexistante, pose problème, la miniature ne sera pas affiché et l'espace sera donc laisser vide.

### Miniatures de page

> Les miniatures de page doivent suivre le patern suivant: ``{{thumbnail#category-id/article-id}}`` ou la regex suivante: ``/{{thumbnail#([a-z\-\/])+}}/``  
> - *``category-id`` est à remplacer par l'id de la catégorie. Vous pouvez le trouver dans l'en tête du fichier d'index de la catégorie.* 
> - *``article-id`` est à remplacer par l'id de la page en question. Vous pouvez le trouver dans l'en tête du fichier correspondant à la page* 
>
> *Exemple: {{thumbnail#items/heal-stick}} mettra l'icônes de la page du Heal stick en haut à gauche de la page*

Si la catégorie ou la page donné est inexistante ou pose problème, la miniature ne sera pas affiché et l'espace sera donc laisser vide.

## Les images

Les images vous permettent d'insérer tout type d'image au sein de votre page, passant des craft au screen pour montrer un patern de ferme / gameplay.

### Pointer un craft  

> Pour pointer un craft, la syntax suivante doit être respecté: ``{{craft#craft/craft_un_item}}`` ou la regex suivante: ``{{craft#([a-z\-\_])+\/([a-z\/\-\_])+}}``
> *``craft_un_item`` est à remplacer par le nom du craft souhaité. Noté bien que les craft sont généré automatiquement et nommé avec un craft_ par défault.*
> *Exemple: {{craft#craft/craft_heal_stick}} affichera une fois sur le site, le craft du heal stick*
