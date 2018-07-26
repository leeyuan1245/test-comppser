# test-comppser
测试composer使用方法

整个项目里composer使用得当，除了入口文件引入require './vender/outuload.php'外，是不应该在项目其他地方出现require或者include引入文件。

配置参考：https://docs.phpcomposer.com/04-schema.html
···
{
    "name": "lzy/test-composer",        //项目的名称，格式：“机构/项目名称”
    "description": "test composer",     //项目介绍
    "type": "project",                  //项目的类型，一般可以是项目“project”；也可以是库“library”。
    "require": {                        //指定项目的依赖
        "php": ">=5.5.9",
        "guzzlehttp/guzzle": "^6.2"
    },
    "require-dev": {                    //开发环境下的依赖库，如果正式环境不想加载这些库，在install 或 update 支持使用 --no-dev 参数来跳过 require-dev 字段中列出的包
        "predis/predis": "^1.1"
    },
    "autoload": {                      //指定该项目除了vender之外的文件加载方式
        "psr-4": {                     //指定遵守psr-4格式规范的php加载
            "App\\": "app",            //指定加载命名空间为“App\*”开头的php文件的路径是./app下
            "Jose\\MyZip\\": "app/ThirdParty/MyZip"    //指定加载命名空间维“Jose\MyZip”下的php文件的路径是“./app/ThirdParty/MyZip”下
        },
        "files":[                      //函数库的加载路径。也可以是多个文件夹和文件混合组合方式，如"files":["app/common","app/fun","function.php"]
            "app/common/function.php"
        ],
        "classmap":[                   //指定没有使用命名空间的类的加载路径
            "app/Class/"
        ]
    },
    "autoload-dev": {                  
        "psr-4": {
            "Example\\Test\\": "test/"
        }
    },
    "repositories": [                  //指定require来源
        {
            "type": "composer",
            "url": "https://packagist.phpcomposer.com"
        }
    ]
}
···

其中，关于repositories使用说明：
repositories支持以下类型的包资源库：

    composer: 一个 composer 类型的资源库，是一个简单的网络服务器（HTTP、FTP、SSH）上的 packages.json 文件，它包含一个 composer.json 对象的列表，有额外的 dist 和/或 source 信息。这个 packages.json 文件是用一个 PHP 流加载的。你可以使用 options 参数来设定额外的流信息。
    vcs: 从 git、svn 和 hg 取得资源。
    pear: 从 pear 获取资源。
    package: 如果你依赖于一个项目，它不提供任何对 composer 的支持，你就可以使用这种类型。你基本上就只需要内联一个 composer.json 对象。
实例：
···
{
    "repositories": [
        {
            "type": "composer",
            "url": "http://packages.example.com"
        },
        {
            "type": "composer",
            "url": "https://packages.example.com",
            "options": {
                "ssl": {
                    "verify_peer": "true"
                }
            }
        },
        {
            "type": "vcs",
            "url": "https://github.com/Seldaek/monolog"
        },
        {
            "type": "pear",
            "url": "http://pear2.php.net"
        },
        {
            "type": "package",
            "package": {
                "name": "smarty/smarty",
                "version": "3.1.7",
                "dist": {
                    "url": "http://www.smarty.net/files/Smarty-3.1.7.zip",
                    "type": "zip"
                },
                "source": {
                    "url": "http://smarty-php.googlecode.com/svn/",
                    "type": "svn",
                    "reference": "tags/Smarty_3_1_7/distribution/"
                }
            }
        }
    ]
}
···
    注意： 顺序是非常重要的，当 Composer 查找资源包时，它会按照顺序进行。默认情况下 Packagist 是最后加入的，因此自定义设置将可以覆盖 Packagist 上的包。
