# Notions

## Tables 

````
Tables est un tableau avec à l'interieur des données.
````

## Clé Primaire

````
La clé primaire ou l'identifiant a pour but d'identifié une ligne dans une autre tables.
```` 

## Clé Etrangère

````
La clé étrangère a pour but de faire référence à une clé primaire dans une autre tables. Ce qui entraine une liaison entre les deux tables.
```` 

## SGBD

````
Système de Gestion des Données. MySQL est un SGBD.

Constitué de 4 éléments : - Moteur SQL.
                          - Catalogue.
                          - Language de requête.
                          - Processeur de requête.
````

## Entité

````
Ensemble d'éléments informatif relatif à un même concept dans un modèle. Correspond généralement à une table dans l'univers des bases de données.
````

## Attribut

````
Propriété d'une entité dans un modèle correspondant généralement à une colonne dans une table de la base.
````

## Relation

````
Lien logique entre deux entités, représenté dans l'univers des SGBDR par l'insertion d'une clef étrangère ou par l'utilisation d'une table de jointure.
````

## Catalogue

````
`Dictionnaire des données
````

## MLD

````
Schéma de données
````

## MCD

````
Model Conceptuel de Donnée.
````

## Cardinalité 

````
4 cas Possibles: - 0,1 (min 0, max 1)
                 - 1,1 (min 1, max 1)
                 - 0,n (min 0, max plusieur)
                 -1,n (min 0, max plusieur)
````

## Processus

````
1- Faire le dictionnaire de donnée (Catalogue).
2- Création des entités.
3- Création des relations.
4- Création des cardinalités.
````