# Laravel5 Repository

Implement repository pattern for laravel5 elquent model.

If you are a Chinese user, you can see this documentation. [点击此处](https://github.com/fuguevit/repository/blob/master/README_ZH.md)

** I. Installation **

Run the following command from your terminal:

> composer require "fuguevit/repository: 0.*"

or add this to require section in  your composer.json file:

> "fuguevit/repository": "0.*"

then run `composer update`

> *note:* should add "minimum-stability": "dev" in composer.json if not.

** II. Overview **

First, add repository service provider in config/app.php file.

> Fuguevit\Repositories\Providers\RepositoryServiceProvider::class

Then, copy repository configuration file to config folder.

> php artisan vendor:publish --provider="Fuguevit\Repositories\Providers\RepositoryServiceProvider" --tag=config

You need replace the parameter in repository.php file with your local configuration, especially when you have specific namespace.

```
  'repository_namespace' => 'App\Repositories',
  'repository_path' 	 => 'app'.DIRECTORY_SEPARATOR.'Repositories',
  'criteria_namespace'   => 'App\Repositories\Criteria',
  'criteria_path'        => 'app'.DIRECTORY_SEPARATOR.'Repositories'.DIRECTORY_SEPARATOR.'Criteria',
  'model_namespace' 	 => 'App',
  'cache_enabled'   	 => env('REPOSITORY_CACHE', true),
  'cache_ttl'       	 => env('REPOSITORY_CACHE_TTL', 30),
  'cache_use_tags'       => env('REPOSITORY_CACHE_TAGS', false),
```
 
Assume you have a model named Question, you can simply create repository with command: 

> php artisan make:repository QuestionsRepository

The repository is generated as:

```
<?php

namespace App\Repositories;

use Fuguevit\Repositories\Eloquent\Repository;

/**
 * Class QuestionsRepository
 * @package App\Repositories
 */
class QuestionsRepository extends Repository
{
    /**
     * @return string
     */
    public function model()
    {
        return 'App\Question';
    }
}
```

** III. Usage **

By default, you can find a question by its attribute. For example:

```
#1 find question by id
$question = Question::find($id);

#2 find questions by attribute 'category' while equals 'others'
$questions = Question::where('category', 'others')->get();
```

When using repository, you can simply do it like below:

```
#0 init QuestionsRepository object called $question

#1 find question by id
$result = $question->find($id);

#2 find questions by attribute 'category' while equals 'others'
$results = $question->findBy('category', 'others');
```

All CRUD functions are well packaged, in the next section we will see the function list.

** IV. Methods **

The following methods are available:

** Fuguevit\Repositories\Contracts\RepositoryInterface **

```
    public function all($columns = ['*']);
    public function lists($value, $key = null);
    public function create(array $attributes);
    public function save(array $attributes);
    public function update(array $attributes, $id);
    public function delete($id);
    public function find($id, $columns = ['*']);
    public function findBy($field, $value, $columns = ['*']);
    public function findAllBy($field, $value, $columns = ['*']);
    public function findAllExcept($field, $value, $columns = ['*']);
    public function findIn($field, array $values, $columns = ['*']);
    public function findNotIn($field, array $values, $columns = ['*']);
    public function findWhere($where, $columns = ['*']);
    public function paginate($perPage = 1, $columns = ['*']);
    public function orderBy($field, $direction = 'asc');
    public function with(array $relations);
```

** Fuguevit\Repositories\Contracts\CriteriaInterface **

```
    public function apply($model, Repository $repository);
```

** Examples **

- Get all entities

```
    $this->question->all();
```

- Create a new entity

```
    $this->question->create($fillable);
```

- Update an entity

```
    $this->question->update($attributes, $id);
```

- Remove an entity

```
    $this->question->delete($id);
```

- Find an entity default by id

```
    $this->question->find($id);
```

- Find an entity by field

```
    $this->question->findBy($field, $value);
```

- Find all entities by field

```
    $this->question->findAllBy($field, $value;
```

- Find all entities in a range

```
    $this->question->findIn($field, $values);
```

- Find all entities by complicated multiple fields:

```
    $this->question->findWhere([
        'user_id' => $userId,
        ['created_at', '>', \Carbon\Carbon::yesterday()],
        ['status', 'in', array('active', 'banned')]
    ]);
```

** V. Criteria**

** VI. Cache**

** VII. Credits**
----
This Package is inspired by [bosnadev/repository](https://github.com/bosnadev/repository).