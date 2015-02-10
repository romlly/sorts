# Sorts - algorithmes de tri et benchmark

## Initialisation

```
$ composer install
```
## Lancement du benchmark

```
$ php cli.php
```

## Configuration

Toute la confugration est renseignée dans le fichier ``/etc/config.json``.

### Section DB

La section ``DB`` doit être renseignée pour que les résultats des benchmarks soient stockés en base de données.

### Section benchmark

La section ``benchmark`` décrit la séquence de test de performances des algorithmes de tri.

  * ``name`` nom de la séquence de benchmarks
  * ``storeResults`` booléen désignant si les résultats de la séquence de benchmarks doivent être stockés en base de données (voir section `DB`)
  * ``algorithms`` tableau de noms d'algorithmes de tris a exécuter (l'ordre sera respecté)
  * ``dataToSort`` nature des données à trier lors des tests
    * ``type`` structure de données utilisée (seul ``array`` est actuellement supporté)
    * ``elements`` définition de la séquence d'éléments qui seront générés en vue d'être triés. Par exemple, (from: 10, to: 20, step: 5) correspond à 3 collections d'éléments de 10, 15 et 20 éléments générés aléatoirement.