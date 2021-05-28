<?php namespace App\Providers;

use Doctrine\Common\Cache\PhpFileCache;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\ArrayCache;
use Illuminate\Support\ServiceProvider;

class DoctrineServiceProvider extends ServiceProvider {
  private $entityManager;

  public function getEntityManager()
  {
                //Caminho para a pasta de models/entities, está pasta não existe na instalação do Laravel e pode ser criada em "app/Http/Models"
    $path = array(__DIR__."\..\Models\Entity");
                //Verifica se a aplicação está com d
    $debug = isset($_ENV['APP_DEBUG']) ? $_ENV['APP_DEBUG'] : true;
    //Array com as configurações de banco de dados
    $database_array = require __DIR__ . '\..\..\config\database.php';
    //Array com a configuração de conexão com o banco de dados
    $database_connection = $database_array['connections'][$database_array['default']];
    //Método do Doctrine usado para configurar

      $proxyDir = __DIR__ . '/../Helpers/proxies';
      $cacheDir=__DIR__ . '/../Helpers/cache';
      $cache = new PhpFileCache($cacheDir);




  $config = Setup::createAnnotationMetadataConfiguration($path,false,$proxyDir,$cache, true);




    //Retorna uma instância do EntityManager
    return EntityManager::create($database_connection, $config);
  }

  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot()
  {
    $this->entityManager = $this->getEntityManager();
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->singleton('Doctrine\ORM\EntityManagerInterface', function($app){
      return $this->entityManager;
    });
  }
}
