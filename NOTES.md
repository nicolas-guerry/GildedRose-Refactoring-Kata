# Approche de refactoring

Objectif : améliorer la lisibilité et la maintenabilité tout en conservant le comportement existant.

- Mise en place du pattern Strategy via les `ItemUpdater` pour isoler les règles métier par type d’item
- Introduction d’une factory `(ItemUpdaterFactory)` pour centraliser la sélection des stratégies
- Regroupement de la logique commune dans `BaseItemUpdater`
- Ajout et maintien de tests PHPUnit pour garantir la non-régression

