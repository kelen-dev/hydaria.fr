# 🌌 Hydaria

**Hydaria** est une **team** et **communauté multigaming** réunissant les passionné·es de **MOBA**, **MMORPG**, **FPS** et bien plus. Le projet propose un site web complet de gestion communautaire et d'actualités.

🔗 [Site officiel](https://hydaria.fr)

---

## 🧩 Stack technique

Le site web a été conçu avec des technologies modernes pour garantir performance et accessibilité :

- [Laravel](https://laravel.com) – Backend PHP robuste
- [Composer](https://getcomposer.org) – Gestion des dépendances PHP
- [Vite](https://vitejs.dev) – Build tool rapide
- [Sass](https://sass-lang.com) – Préprocesseur CSS
- [Bootstrap](https://getbootstrap.com) – Framework CSS
- [Bootstrap Icons](https://icons.getbootstrap.com)
- [Laravel Breeze](https://laravel.com/docs/breeze) – Authentification simple
- [GSAP](https://greensock.com/gsap/) – Animations fluides

---

## 🚀 Fonctionnalités principales

- ✅ Système de **posts** et **tags**
- ✅ Administration via **SB Admin 2**
- ✅ Gestion **dynamique de la navbar**
- ✅ Réglages **du site (titre, description, couleurs)** depuis le panel
- ✅ Intégration de **TinyMCE** pour la rédaction
- ✅ Page d’erreur 404 animée
- ✅ **Animations** GSAP personnalisées
- 🛠️ En cours : système de commentaires, profils joueurs, badges…

---

## 📁 Installation locale

```bash
git clone https://github.com/Hydaria/Hydaria.git
cd Hydaria
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
