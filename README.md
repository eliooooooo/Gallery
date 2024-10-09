# Eliott's gallery

## Prise en main du projet
Voici les étapes à suivre pour installer le projet :  
  
- Cloner le projet git ou décomprésser l'archive.  
```bash
git clone ...
```  

- Installer les dépendances  
```bash
npm i
```  

- Compiler les assets  
Pour une utilisation en développement :  
```bash
npm run watch
```  
Pour une utilisation en production :  
```bash
npm run build
```  

## Structuration du projet  
Voici la structure du projet, dans l'optique de faciliter la reprise du projet :  
  
```
|- public
    | Ici se trouvent les fichiers disponibles à l'utilisateurs :
        - images
        - données
        - structures de page
|- src
    | Retrouvez ici les assets de style ainsi que les scripts javascripts
| icA la racine du projet se trouvent les fichiers de configuration du projet
```

## Configuration du projet  
Voici les différents points de configuration du projet :  
  
### tailwind.config.js  
[Voir la documentation](https://tailwindcss.com/docs/configuration#theme)  
Ce fichier permet la configuration personnalisée des styles et classes tailwindCSS.  
Ce fichier permet en autre la configuration d'une palette de couleur personnalisée.

Pour chaque modification de ce fichier, les assets devront être recompilées. (voir Prise en main du projet)