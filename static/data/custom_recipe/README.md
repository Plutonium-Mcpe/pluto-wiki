# Custom recipe
Ce dossier contient tout les crafts customs de Plutonium
Chaque fichier .json contient toute les données nécessaires à la détermination de ceux-ci. Ils seront utilisés pour générer les images des craft utiliser dans le wiki.

## Structure des fichiers .json
Chacun se compose de trop grand parents : ``input``, ``output`` et ``shape``
* ``input`` : Cet élément est un tableau permettant de définir dans le shape, quels sont les items ou blocs formant le craft. Il se compose de deux éléments qui sont : ``name`` et ``folder``. Folder est soit vanilla ou plutonium représentant le type de texture à prendre. ``name`` va être le chemin vers le fichier (sans l'extension) à partir du /textures soit : *items/heal_stick* ou *blocks/cobblestone*
* ``ouput`` : à la même manière que ``input``, cet élement unique représente la texture de l'item de sortie (1 seul élement est attendu)
* ``shape`` : représente la forme du craft et la disposition de celui-ci
