# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog][keepachangelog] and this project adheres to [Semantic Versioning][semver].

## v0.0.2

### Changed

- User model moved from `App` namespace to `App\Models`

### Added

- `Makefile` with all required targets
- Git hooks (must be installed using `make git-hooks` command)
- HTTP endpoint `/status` (health check)
- Feature tests

## v0.0.1

### Changed

- Composer scripts
- Default database connection now is `pgsql`

### Added

- `.dockerignore`
- `.rr.local.yml` & `.rr.yml`
- Package `avto-dev/roadrunner-laravel` (required for RR)
- Package `predis/predis` (required for cache & session connections)
- Package `avto-dev/stacked-dumper-laravel` (dev)
- Package `phpstan/phpstan` (dev)
- `docker-compose.yml`
- `docker/app/Dockerfile` with scripts and configs
- `docker/docker-compose.env` (ise it instead `.env` file)
- PHPUnit bootstrap file `tests/bootstrap.php"`

### Fixed

- Missed annotations

### Removed

- `routes/console.php`

[keepachangelog]:https://keepachangelog.com/en/1.0.0/
[semver]:https://semver.org/spec/v2.0.0.html
