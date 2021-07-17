<p align="center"><a href="#"><img src="https://gitlab.com/zulwaqarzain96/vertigo-api/-/raw/master/public/img/sideLogo.png" width="200"></a></p>

<p align="center">
<a href="https://gitlab.com/ImranShamm/hse-magicx/-/pipelines"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## REQUIREMENT
This installation is intended to be used with laragon that comes with preinstall tools needed for the project for local development environment. For other ways the requirement is still the same but you need to configure them yourself.

Just make sure that your Laragon run with below Environment
- PHP >= 7.4 < 8.0
- MySQL 5.7
- Apache 2.4

## INSTALLATION STEPS

**1) Clone**
- SSH : `git clone git@gitlab.com:zulwaqarzain96/vertigo-api.git`
- HTTPS : `https://gitlab.com/zulwaqarzain96/vertigo-api.git`

**2) run - `composer install`**

**3) Copy .env.example file and rename to .env** 
- change `DB_DATABASE=dev_vertigo`

**4) run - `php artisan key:generate`**

**5) run - `php artisan storage:link`**

**6) Create database - dev_vertigo**

**7) run - `php artisan migrate`**

**8) run - php artisan db:seed --class=UserSeeder**

### DATABASE WITH SAMPLE DATA

**1) Import and Run vertigo_sample.sql**  (optional)

## API DOCUMENTATION

[VERTIGO API DOCUMENTATION](https://documenter.getpostman.com/view/3060542/SWLmW3mH)
