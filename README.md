# drupal-skill-test

## Description
Drupal 10 Skill challenge.

## Requirements
- PHP 8.3
- Composer
- Drush
- Drupal 10
- MySQL
- DDEV (I used this)
- Docker (optional)
- Docker Compose (optional)

## Installation
1. Clone the repository
2. Run `composer install`
3. Run `composer require drush/drush` if needed
4. Import the database from `_dumps/database.sql`
5. Run `drush cr` to clear the cache
6. Go to theme/custom/skill_challenge directory and run `script/build` to get the theme working if needed

## Usage
1. List events /list-events
2. Configure list events view /admin/structure/views/view/list_events
3. Configure event related view /admin/structure/views/view/related_events
4. Change bg card color /admin/config/event_config/config
5. See the new card color on clear caches on /list-events page
6. Event content type manage fields: /admin/structure/types/manage/event/fields
7. Duration event is logged here: /admin/reports/dblog
