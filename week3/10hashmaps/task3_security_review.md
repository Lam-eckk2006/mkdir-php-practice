# Task 3 - Security review of the auth flow

## Places where the flow reads user input

| File | Input | Source | Validation before use |
| --- | --- | --- | --- |
| `register.php` | `full_name` | `$_POST` | Trimmed, required, minimum 2 characters. |
| `register.php` | `email` | `$_POST` | Trimmed, lowercased, required, `filter_var(..., FILTER_VALIDATE_EMAIL)`, duplicate-email check against `$_SESSION['users']`. |
| `register.php` | `password` | `$_POST` | Required, minimum 8 characters. Hashed with `password_hash()` before it is stored. |
| `register.php` | `confirm_password` | `$_POST` | Required and must match `password`. |
| `login.php` | `email` | `$_POST` | Trimmed, lowercased, required, `filter_var(..., FILTER_VALIDATE_EMAIL)`. |
| `login.php` | `password` | `$_POST` | Required; checked with `password_verify()` against the stored hash. |
| `dashboard.php` | session values | `$_SESSION['user']` | Session is treated as trusted only after the login flow sets it; the page checks the user is an array before reading it. |
| `task2_word_frequency.php` | `text` | `$_POST` | Treated as plain text and normalised with `preg_split()`; only the derived word counts are used. |

## Escaping of printed values

Every value that comes from user input or from the session is passed through `htmlspecialchars()` before it is printed:

- `register.php`: the sticky `full_name` and `email` field values, and every validation error message.
- `login.php`: the registered-email notice, the sticky `email`, and all error messages.
- `dashboard.php`: the stored `name` and `email`.
- `task2_word_frequency.php`: the submitted paragraph in the textarea and every word in the results table.

Numeric values (`$rank`, `$count`, `$totalWords`, `$uniqueWords`) are cast to `(int)` instead.

## Access control

`dashboard.php` starts with:

```php
if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
```

A visitor with no session is redirected to `login.php` and the script stops with `exit`, so no dashboard HTML is sent. `logout.php` clears `$_SESSION`, expires the session cookie, and calls `session_destroy()`. After a successful login, `session_regenerate_id(true)` prevents session fixation.

## What I would improve next month with a real database

The biggest improvement would be to move users out of `$_SESSION` and into a real database table. Right now the "user list" lives only in one browser's session, so it disappears when the session ends and cannot be shared between users or servers. With a database I would store each account in a `users` table with a unique index on `email`, insert with a prepared statement to prevent SQL injection, and use `password_hash()` / `password_verify()` exactly as I do now so passwords are never stored in plain text. I would also add a `created_at` timestamp, a `failed_login_attempts` counter with temporary lockout, CSRF tokens on the register and login forms, `SameSite`/`Secure` cookie flags, and a password-reset flow that sends a single-use token by email. Finally, I would keep the same rule I already follow here: validate on input, escape on output, and never trust the session until the login check has passed.
