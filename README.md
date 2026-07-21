# KeysBeast — Digital License/Key Delivery System

A Laravel-based digital license/key store (similar to WooCommerce License Manager). Customers buy a
product through Stripe Checkout and receive a unique, single-use license key automatically — by
email and on their account dashboard. Admins manage products and keys (including bulk import)
through a dedicated admin panel.

## Stack

- **Laravel 12**, PHP 8.2+, MySQL
- **Filament v3** — admin panel (`/admin`)
- **Laravel Breeze (Blade)** — customer login/registration/dashboard
- **Stripe Checkout** (test mode) — payment + webhook-driven fulfillment

## 1. Requirements

- PHP 8.2+ with the `intl`, `pdo_mysql`, `mbstring`, `openssl` extensions enabled
- Composer
- Node.js + npm
- MySQL (5.7+/8+) running locally
- A free [Stripe](https://dashboard.stripe.com/register) account (test mode is enough)
- (Optional, for local webhook testing) the [Stripe CLI](https://stripe.com/docs/stripe-cli)

## 2. Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
```

Create the database (adjust credentials to match your MySQL install):

```sql
CREATE DATABASE keysbeast;
```

Edit `.env` and confirm the `DB_*` values match your local MySQL setup:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=keysbeast
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations and seed demo data (admin user, a demo customer, 3 demo products with a mix of
available/sold fake keys):

```bash
php artisan migrate --seed
```

Seeded accounts (**change these before going live**):

| Role     | Email                  | Password   |
|----------|-------------------------|------------|
| Admin    | admin@keysbeast.test     | password   |
| Customer | customer@keysbeast.test  | password   |

Start the app:

```bash
php artisan serve
```

- Storefront: http://localhost:8000
- Admin panel: http://localhost:8000/admin

## 3. Stripe setup (test mode)

1. In the [Stripe dashboard](https://dashboard.stripe.com/test/apikeys), copy your **test mode**
   Publishable key and Secret key into `.env`:
   ```
   STRIPE_KEY=pk_test_...
   STRIPE_SECRET=sk_test_...
   ```
2. For **local** webhook testing, use the Stripe CLI:
   ```bash
   stripe listen --forward-to localhost:8000/stripe/webhook
   ```
   Copy the `whsec_...` signing secret it prints into `.env` as `STRIPE_WEBHOOK_SECRET`, then
   restart `php artisan serve`.
3. Complete a checkout using [Stripe's test card](https://stripe.com/docs/testing) `4242 4242 4242 4242`,
   any future expiry, any CVC.

When you deploy the finished site, create a **live** webhook endpoint in the Stripe dashboard
pointing at `https://yourdomain.com/stripe/webhook`, subscribed to the `checkout.session.completed`
event, and use its signing secret for `STRIPE_WEBHOOK_SECRET`.

## 4. How it works

- **Products** (`/admin/products`) — name, slug, price, type (Windows/Office/Game/Other),
  description, active toggle. The shop only lists active products.
- **License Keys** (`/admin/license-keys`) — each key belongs to one product and is either
  `available` or `used`. Add a single key, bulk-import (one key per line, duplicates and blanks
  are dropped automatically), or delete a key (only while it's still `available` — sold keys are
  protected to preserve order history).
- **Checkout** — a logged-in customer clicks "Buy Now" → a `pending` order is created → they're
  sent to Stripe Checkout → on successful payment, Stripe calls `/stripe/webhook` → the app
  verifies the signature, atomically assigns the next available key to the order (row-locked, so
  two simultaneous payments can never receive the same key), marks the order `fulfilled`, and
  emails the key to the customer.
- **Customer dashboard** (`/dashboard`) — every logged-in customer sees only their own orders and
  keys, with a copy-to-clipboard button.
- **Admin dashboard** (`/admin`) — available keys / sold keys / total orders at a glance.

## 5. Email delivery

`.env.example` defaults to `MAIL_MAILER=log`, so in local development the license key email is
written to `storage/logs/laravel.log` instead of actually being sent — no external account needed
to test the flow. To send real emails, switch to SMTP (Mailtrap for testing, or your live SMTP
provider for production):

```
MAIL_MAILER=smtp
MAIL_HOST=...
MAIL_PORT=...
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
```

## 6. Moving to your live environment

1. Copy the codebase over (excluding `.env`, `vendor/`, `node_modules/`, `storage/logs/`).
2. On the live server: `composer install --no-dev`, `npm install && npm run build`.
3. Create a fresh `.env` on the live server with:
   - `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://yourdomain.com`
   - Live MySQL credentials
   - **Live** Stripe keys (`pk_live_...` / `sk_live_...`) and a live webhook secret
   - Real SMTP mail credentials
4. `php artisan migrate --force` (do **not** re-run `--seed` on production — it creates the demo
   admin/customer accounts with a known password). Instead create your real admin account, e.g.:
   ```bash
   php artisan tinker
   >>> \App\Models\User::create(['name' => 'Your Name', 'email' => 'you@yourdomain.com', 'password' => bcrypt('a-strong-password'), 'is_admin' => true]);
   ```
5. Register the live Stripe webhook endpoint (see step 3 above) and confirm a real test purchase
   before opening the store to customers.

## 7. Project structure highlights

- `app/Services/LicenseKeyService.php` — the core assignment (`assignKeyToOrder`) and bulk-import
  (`bulkImport`) logic.
- `app/Http/Controllers/CheckoutController.php` / `StripeWebhookController.php` — checkout +
  payment fulfillment.
- `app/Filament/Resources/` — the admin panel's Products, License Keys (incl. the Bulk Import
  page), and Orders screens.
- `app/Mail/LicenseKeyMail.php` + `resources/views/emails/license-key.blade.php` — the delivery
  email.
- `resources/views/products/`, `resources/views/checkout/`, `resources/views/dashboard.blade.php`
  — the customer-facing storefront and account pages.
