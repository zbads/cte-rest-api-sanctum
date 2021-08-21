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
`POST ../api/login?email=admin@mail.com&password=adm1nP@sswORd`

#### To get all news items
`GET ../api/news`

**Sorting parameters**
<p>`sort_by` - Field used for sorting</p>
<p>`order` - Direction of sorted field</p>

**Pagination parameters**
<p>`current_page` - To indicate the current page</p>
<p>`results_per_page` - To specify the number of items shown in the current page</p>

**Basic filter parameters**
<p>`title` - Searches for the title with wildcard % as prefix and suffix.</p>
<p>`content` - Searches for the content with wildcard % as prefix and suffix.</p>

#### To create new **news** item
`POST ..api/news`

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
`DELETE ../api/news/{id}`