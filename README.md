💰📊📈
# MoneyMind - Gestion Budgétaire Personnelle

MoneyMind est une application web Laravel permettant aux utilisateurs de gérer efficacement leurs finances personnelles. L'application offre le suivi des revenus, des dépenses, des objectifs d'épargne et des listes de souhaits tout en proposant des suggestions intelligentes grâce à l'IA. 💡💵📉

## Fonctionnalités Principales 🚀📌🛠️

### **Front Office**

#### **Visiteur**

- Accès à une page d'accueil publique présentant l'application.
- Inscription avec saisie du salaire mensuel et de la date de crédit.
- Système de récupération de mot de passe. 🔐📩💼

#### **Utilisateur Authentifié**

- Gestion du salaire mensuel avec crédit automatique.
- Ajout et gestion des dépenses (avec catégories définies par l'admin).
- Configuration et suivi des dépenses récurrentes.
- Paramétrage des alertes budgétaires. ⚠️💲📊
- Tableau de bord interactif :
  - Revenu restant et total dépensé.
  - Répartition des dépenses par catégorie.
  - Progression des objectifs d'épargne et état des souhaits.
  - Suggestions IA basées sur les habitudes de dépense.
- Notifications par email (alertes budget, salaire crédité). 📧📆🔔

### **Back Office (Administrateur)**

- Tableau de bord des statistiques (nombre d'utilisateurs, revenu moyen, tendances des dépenses).
- Suppression des comptes inactifs.
- Gestion des catégories de dépenses.
- Gestion des utilisateurs. 🔍📑🔧

## Fonctionnalités Transversales 🔄📡🛡️

- Authentification et autorisation (utilisateur/admin).
- Notifications par email pour les alertes et mises à jour.
- Gestion automatisée des salaires et dépenses récurrentes.
- Suggestions IA via Gemini pour optimiser le budget.
- Statistiques et filtrage des dépenses.

## Exigences Techniques 🖥️⚙️🔬

- **Architecture :** Application monolithique scalable sous Laravel.
- **Automatisation :** Planification des salaires et dépenses récurrentes.
- **IA :** Intégration de l'API Gemini pour recommandations personnalisées.
- **Hébergement :** Serveur Linux.
- **Interface Utilisateur :**
  - Design responsive et adapté à tous les appareils.
  - Navigation intuitive et tableau de bord clair.
  - Visualisation des données via graphiques.
- **Sécurité :**
  - Validation des entrées côté serveur.
  - Protection contre les attaques XSS et CSRF.
  - Hachage des mots de passe.
  - Accès réglementé par rôles.
  - Requêtes SQL sécurisées. 🔒🛡️💾

## Installation & Déploiement 🚀💻🔧

### **Prérequis**

- PHP 8+
- Laravel 12
- MySQL
- Composer
- Node.js & NPM

### **Installation**

```bash
# Cloner le projet
git clone https://github.com/votre-repo/MoneyMind.git
cd MoneyMind

# Installer les dépendances
composer install
npm install && npm run dev

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Configurer la base de données
php artisan migrate --seed

# Lancer le serveur local
php artisan serve
```

## Exemple d'Utilisation 📖🔍📝

1. **Inscription** : Un utilisateur déclare un salaire de 5000 DH, crédité le 29 de chaque mois.
2. **Admin** : Ajoute les catégories "Divertissement", "Nourriture", "Factures".
3. **Dépenses Récurrentes** : "Abonnement Internet - 200 DH, Factures, chaque 10".
4. **Dépenses Manuelles** : "Jeu - 600 DH, Divertissement" (reste 4200 DH).
5. **Alerte** : Seuil fixé à 50% (2500 DH), dépense "TV - 2000 DH", alerte budget dépassé ! 🚨💸⚠️
6. **IA** : Gemini suggère de réduire les dépenses en loisirs.
7. **Objectifs** : "Épargner 300 DH" non atteint. Liste de souhaits : "Casque - 1000 DH" (10% atteint).
8. **Admin** : Supprime un compte inactif depuis 2 mois.
9. **Déploiement** : Application accessible via `https://moneymind.example.com`. 🌐📲🔗

---

### Auteur ✍️👨‍💻🚀

Projet développé par Omar FARAJI.

### Licence 📜⚖️✅

MIT License
