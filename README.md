## Laravel + Sanctum Basic REST API (CRUD)

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Instructions
Don't forget to run these commands:

- composer install
- composer dump-autoload
- php artisan migrate
- php artisan db:seed

### API Usage

#### To get token for access (these credentials are indicated in the seeder)
**POST ../api/login?email=admin@mail.com&password=adm1nP@sswORd**

#### To get all news items
**GET ../api/news**

**Sorting parameters**
sort_by - Field used for sorting
order - Direction of sorted field

**Pagination parameters**
current_page
results_per_page

**Basic filter parameters**
title
content

#### To create new news item
**POST ..api/news**

    {
        "title": "Sunt corrupti velit voluptas molestiae.",
        "content": "Vel voluptas inventore non officiis amet consequatur vitae nihil. Ratione fugit quia ea quia error reprehenderit qui blanditiis.",
        "is_published": false
    }

#### To retrieve a news item
**GET ../api/news/{id}**

#### To update a news item
**PATCH ..api/news/{id}**

    {
        "title": "UpdatedSunt corrupti velit voluptas molestiae.",
        "content": "Updated Vel voluptas inventore non officiis amet consequatur vitae nihil. Ratione fugit quia ea quia error reprehenderit qui blanditiis.",
        "is_published": false
    }

#### To delete a news item:
**DELETE ../api/news/{id}**