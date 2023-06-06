# TP_AJAX
TP_WEB2: gestion de pétitions. Technologies utilisées: PHP POO/AJAX/MYSQL 
Nous voulons réaliser une application web permettant la gestion des pétitions:
création, signature, affichage, modification, suppression (pétition et/ou signature), …

1.Nous utilisons les deux classes suivantes :
–Petition : IDP, Nom, Prenom, Description, DatePublic, Titre.
–Signature : IDP, IDS, Nom, Prenom, Pays, Date, Heure.

2.Créer la base de données Petition permettant de stocker les pétitions et les signatures.

3.Créer la page «  ListePetition » permettant d’afficher la liste des pétions.

4.Créer le formulaire « Signature » permettant la signature d’une pétition. Ce formulaire est appelé à partir de la page «  ListePetition »
–Ce formulaire se compose des champs : Nom, Prénom, Email, Pays et du Bouton (envoyer)

5.Créer la page « AjouterSignature » qui, lorsqu’elle est appelée à partir de la  page « Signature » :
–ajoute la nouvelle signature dans la table Signature.
–affiche OK ou NotOK en fonction du succès de l’opération.

6.Ajouter les fonctionnalités suivantes :
–Interface pour l’ajout d’une nouvelle pétition
–Notification de l’ajout d’une nouvelle pétition aux navigateurs connectés.
–Afficher en temps réel la pétition qui a le plus de signatures.

7.Ajouter une zone de texte dans le formulaire « Signature » permettant d’afficher les cinq dernières signatures ajoutées.
–Utiliser l’objet XMLHttpRequest pour que la mise à jour de la liste se fasse de façon asynchrone.

![1](https://github.com/HZAOUDI/TP_AJAX/assets/125825033/a5ae5e9c-32b1-44cd-966d-1536642fcc11)
![2](https://github.com/HZAOUDI/TP_AJAX/assets/125825033/336fd9fd-5c2f-4d6f-8e68-3b6c89791c84)
![3](https://github.com/HZAOUDI/TP_AJAX/assets/125825033/336fa971-bdfb-4cc2-bc7d-24a16bb52481)
![4](https://github.com/HZAOUDI/TP_AJAX/assets/125825033/8ebb7d1c-1254-41e0-be5f-6d2fdb99e483)
![5](https://github.com/HZAOUDI/TP_AJAX/assets/125825033/fee1d4c1-2834-48db-98d6-dcce9716fd5f)
