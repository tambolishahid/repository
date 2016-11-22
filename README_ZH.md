# Laravel5 Repository (中文)

Laravel5 Repository 是对Laravel的仓库模式的实现。

**安装**

在本地工程目录下面，输入下列命令行：

> composer require "fuguevit/repository: 0.*"

或者，在composer.json文件内插入下行代码：

> "fuguevit/repository": "0.*"

保存后，执行 `composer update`

> *注意:* 当前情况下安装该包时，需要确保composer.json文件内有 "minimum-stability": "dev" 这一行。

**概览**

首先，在config/app.php文件下的providers数组中添加如下一行：

> Fuguevit\Repositories\Providers\RepositoryServiceProvider::class

其次，用artisan执行一下命令，将repository.php文件拷贝至项目config目录：

> php artisan vendor:publish --provider="Fuguevit\Repositories\Providers\RepositoryServiceProvider" --tag=config

配置文件结构如下，请依据自身项目配置做适当调整，例如项目命名空间和目录结构。

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

接下来可以创建第一个Repository Class， 假设原项目中有一个叫做Question的Model类，针对其我们可以执行一下方法：

> php artisan make:repository QuestionsRepository

在配置文件定义的Repository目录下，可以发现QuestionsRepository.php文件已生成。

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

正常使用Eloquent Model的情况下，使用方式如下：

```
#1 根据主键查找
$question = Question::find($id);

#2 根据属性 'category' 的值查找
$questions = Question::where('category', 'others')->get();
```

当使用 Repository 时：

```
#0 初始化 QuestionsRepository 对象 $question（可以交给Laravel的IoC实现）

#1 根据主键查找
$result = $question->find($id);

#2 根据属性 'category' 的值查找
$results = $question->findBy('category', 'others');
```

下一章节描述Repository的所有方法。

**Functions**

**Criteria**

**Cache**

**感谢**
----
本项目是在bosnadev的[Laravel Repository](https://github.com/bosnadev/repository)的启发编写的。