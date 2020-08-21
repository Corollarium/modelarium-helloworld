# Modelarium Hello World

This project is the most basic toy application showing how to use [Modelarium](https://github.com/Corollarium/modelarium) to quickly create a web application. It uses [Lighthouse](https://lighthouse-php.com/) as GraphQL engine, serving backend with Laravel.

## Running this code

This code is ready to run. It's a default scaffold Laravel project with Vue ui, except for the `resources/js` directory, which was slightly modified to build a SPA with vue-router and implements a header component. We already added the Graphql files too, of course.

First download the repo and install dependencies:

```
composer install
yarn install
```

Create a database file and copy `.env`:

```
touch database/database.sqlite
cp .env.example .env
php artisan key:generate
```

Remember to fix the path to your `database.sqlite` on `.env`.

Now let's generate scaffolding from the Graphql files. They're at the `graphql/data` subdirectory. In a new package you'd run `php artisan modelarium:init` at this point, but we already ran it for you -- it won't hurt to run again, anyway. So let's create scaffolding:

```
php artisan modelarium:init
php artisan modelarium:scaffold '*' --everything --lighthouse --overwrite
```

That's it, you get the entire model/event/database/migration/etc files. We're not creating users in this toy app so no policies are created.

Let's create the DB and seed it:

```
php artisan migrate:fresh --seed 
```

Modelarium automatically generated random data for you. You can create more data with `php artisan db:seed`. 

Now let's generate the frontend. Modelarium creates all the scaffolding for you with the basic design from your chosen CSS framework. We picked Bootstrap with Vue here:

```
php artisan modelarium:frontend '\App\Models\Post' --framework=HTML --framework=Bootstrap --framework=Vue --overwrite --prettier
```

That's it, it will create all the files for you. Now let's test. In one terminal open:

```
yarn run watch
```

and in another one open a webserver:

```
php artisan serve --host 0.0.0.0 --port 8000
```

now open http://localhost:8000. 

## The Graphql file

Modelarium can generate the scaffolding for a new Graphql type with `artisan modelarium:type [typename]`. Here's a brief overview of the `Post` graphql that we use in this app:

```graphql
extend type Query {
    posts: [Post!]! @paginate(defaultCount: 10)
    post(id: ID @eq): Post @find
}
```

These two queries list posts and get post data. We use `@paginate` and `@find` directives for Lighthouse to process the requests automatically.

```graphql
extend type Mutation {
    upsertPost(input: PostInput! @spread): Post! @upsert
    deletePost(id: ID!): Post @delete
}
```

We add two mutations, one to for upserts (both insert and update) and another for deleting posts. In a real app these would be controlled by a `@can` directive.

```graphql
input PostInput {
    id: ID
    title: String!
    content: String!
    country: Countrycodeiso3!
}
```

We create an `input` entry to make it easier to declare the upsert. Note that id is not mandatory to allow inserts.

```graphql
type Post @migrationTimestamps {
    id: ID!
    title: Title! @modelFillable @MinLength(value: 5) @MaxLength(value: 25)
        @renderable(
            title: true
            label: "Title"
            comment: "Please add a descriptive title"
            placeholder: "Type here"
            size: "large"
            card: true
            table: true
        )
    content: Text! @modelFillable @MinLength(value: 15) @MaxLength(value: 1000)
        @renderable(
            label: "Content"
            comment: "Your post contents"
        )
    country: Countrycodeiso3! @modelFillable
        @renderable(
            label: "Country"
            comment: "Pick a country"
            table: true
        )
}
```

This is the actual type declaration. `@migrationTimestamps` instructs Modelarium to generate timestamps on the database table.

We have three fields, `title`, `content` and `country`. Each one has a different type. Modelarium provides a list of countries automatically (we're using the 3-letter ISO codes here). `@modelFillable` declares that these types can be filled by requests in Laravel. We provide a few seettings to the `@renderable` directive, which controls forms, cards and tables. And that's it, from this single file we generate the entire app.

## How would I create this repo from scratch?

This project is ready, but what if you were creating a modelarium project from scratch? There is [documentation about Modelarium](https://corollarium.github.io/modelarium/) that goes in depth, but here's a quick howto.

Create a base Laravel project:

```shell
# create project: 
composer create-project laravel/laravel modelarium-helloworld

# install deps with composer:
cd modelarium-helloworld
composer require corollarium/modelarium corollarium/formularium nuwave/lighthouse

# add laravel ui deps
composer require laravel/ui

# install ui deps
php artisan ui vue

# install npm deps
npm install

# add prettier to generate well formatted code
npm add prettier
```

That covers scaffolding. Now let's code.

```shell
# Init Modelarium
artisan modelarium:init

# Create the title datatype:
artisan datatype title --basetype=string

# Create the post graphql type:
artisan modelarium:type post
```

At this point you have most of what you need. You'd edit `graphql/schema.graphql` to include `types.graphql`, and write your `graphql/data/post.graphql`.

## License

This code is under [MIT license](https://opensource.org/licenses/MIT).
