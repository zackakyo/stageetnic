<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreationOfTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environnements', function (Blueprint $table) {
            $table->id();
            $table->string('abreviation');
            $table->string('nom'); 
            $table->timestamps();
        });

        Schema::create('phps', function (Blueprint $table) {
            $table->id();
            $table->string('version'); 
            $table->timestamps();
        });
        
        Schema::create('mysqls', function (Blueprint $table) {
            $table->id();
            $table->string('version'); 
            $table->timestamps();
        });
        
        Schema::create('solrs', function (Blueprint $table) {
            $table->id();
            $table->string('version'); 
            $table->timestamps();
        });

        Schema::create('serveurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');  
            // $table->string('adresse_ip');
            // $table->string('version_redhat'); 
            // $table->string('version_apache');
            // $table->foreignId('php_id')->constrained()->default(null)->change();
            // $table->foreignId('mysql_id')->constrained()->default(null)->change();;
            // $table->foreignId('solr_id')->constrained()->default(null)->change();;
            $table->foreignId('environnement_id')->constrained();
            $table->timestamps();
        });

        Schema::create('base_de_donnees', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); 
            $table->foreignId('serveur_id')->constrained();
            $table->timestamps();
        });
        
        Schema::create('typo3s', function (Blueprint $table) {
            $table->id();
            $table->string('version_courte');
            $table->string('version_complete');
            $table->timestamps();
        });
          
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); 
            // $table->string('url_backend'); 
            // $table->foreignId('typo3_id')->constrained();  
            $table->foreignId('serveur_id')->constrained();
            // $table->foreignId('base_de_donnees_id')->constrained(); 
            $table->timestamps();
        });

        Schema::create('extensions', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); 
            $table->boolean('ter')->default(false)->change(); 
            // $table->string('version_ext'); 
            $table->timestamps();
        });
        
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); 
            $table->string('prefixe'); 
            $table->string('domaine'); 
            $table->boolean('pre_prod')->default(True)->change(); 
            $table->integer('root_id'); 
            $table->date('root_crdate'); 
            $table->foreignId('instance_id')->constrained();
            $table->timestamps();
        });

        Schema::create('extension_typo3', function (Blueprint $table) {
            $table->foreignId('extension_id'); 
            $table->foreignId('typo_id'); 
        }); 

        Schema::create('extension_instance', function (Blueprint $table) {
            $table->foreignId('extension_id'); 
            $table->foreignId('instance_id'); 
        }); 

        Schema::create('extension_site', function (Blueprint $table) {
            $table->foreignId('extension_id'); 
            $table->foreignId('site_id'); 
        }); 
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('environnements');
        Schema::dropIfExists('serveurs');
        Schema::dropIfExists('phps');
        Schema::dropIfExists('mysqls');
        Schema::dropIfExists('solrs');
        Schema::dropIfExists('base_de_donnees');
        Schema::dropIfExists('instances');
        Schema::dropIfExists('typo3s');
        Schema::dropIfExists('extensions');
        Schema::dropIfExists('sites');
        Schema::dropIfExists('extension_typo3');
        Schema::dropIfExists('extension_instance');
        Schema::dropIfExists('extension_site');
    }
}
