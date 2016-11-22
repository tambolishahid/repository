# Laravel5 Repository

Implement repository pattern for laravel5 elquent model.

If you are a Chinese user, you can see this documentation. [点击此处](https://github.com/fuguevit/repository/blob/master/README_ZH.md)

**Installation**

Run the following command from your terminal:

> composer require "fuguevit/repository: 0.*"

or add this to require section in  your composer.json file:

> "fuguevit/repository": "0.*"

then run `composer update`

> *note:* should add "minimum-stability": "dev" in composer.json if not.

**Overview**

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

**Usage**

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

**Functions**

**Criteria**

**Cache**

**Credits**
----
This Package is inspired by [bosnadev/repository](https://github.com/bosnadev/repository).