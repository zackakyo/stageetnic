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
            $table->string('nom')->nullable();
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
            $table->string('adresse_ip')->default('unk');
            $table->string('version_redhat')->default('unk');
            $table->string('version_apache')->default('unk');
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
            $table->string('version_courte')->index();
            $table->string('version_complete');
            $table->timestamps();
        });

        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('url_backend')->nullable();
            $table->foreignId('typo3_id')->nullable()->constrained();
            $table->foreignId('serveur_id')->constrained();
            $table->foreignId('base_de_donnee_id')->nullable()->constrained()->onDelete("cascade");
            $table->timestamps();
        });

        Schema::create('extensions', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->index();
            $table->boolean('ter')->default(false);
            $table->boolean('actif')->default(false);
            $table->string('version_ext')->default('unk');
            $table->timestamps();
        });

        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->default('unk');
            $table->string('prefixe')->default('unk');
            $table->string('domaine')->default('unk');
            $table->boolean('pre_prod')->default(True)->change();
            $table->integer('root_id')->nullable();
            $table->dateTime('root_crdate')->nullable();
            $table->foreignId('instance_id')->nullable()->constrained();
            $table->timestamps();
        });

        Schema::create('extension_typo3', function (Blueprint $table) {
            // $table->integer('extension_id')->unsigned()->index();
            // $table->foreign('extension_id')->references('id')->on('extensions')->onDelete('cascade');
            $table->foreignId('extension_id')->constrained()->onDelete('cascade');
            $table->foreignId('typo3_id')->constrained()->onDelete('cascade');
            // $table->integer('typo3_id')->unsigned()->index();
            // $table->foreign('typo3_id')->references('id')->on('typo3s')->onDelete('cascade');
            $table->primary(['extension_id', 'typo3_id']);
        });

        Schema::create('extension_instance', function (Blueprint $table) {
            $table->foreignId('extension_id')->constrained()->onDelete('cascade');
            $table->foreignId('instance_id')->constrained()->onDelete('cascade');
            $table->primary(['extension_id', 'instance_id']);
        });

        Schema::create('extension_site', function (Blueprint $table) {
            $table->foreignId('extension_id')->constrained()->onDelete('cascade');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->primary(['extension_id', 'site_id']);
        });

        Schema::create('php_serveur', function (Blueprint $table) {
            $table->foreignId('php_id')->constrained()->onDelete('cascade');
            $table->foreignId('serveur_id')->constrained()->onDelete('cascade');
            $table->primary(['php_id', 'serveur_id']);
        });

        Schema::create('mysql_serveur', function (Blueprint $table) {
            $table->foreignId('mysql_id')->constrained()->onDelete('cascade');
            $table->foreignId('serveur_id')->constrained()->onDelete('cascade');
            $table->primary(['mysql_id', 'serveur_id']);
        });

        Schema::create('serveur_solr', function (Blueprint $table) {
            $table->foreignId('serveur_id')->constrained()->onDelete('cascade');
            $table->foreignId('solr_id')->constrained()->onDelete('cascade');
            $table->primary(['serveur_id', 'solr_id']);
        });
        Schema::create('versionExtensions', function (Blueprint $table) {
            $table->id();
            $table->string('version');
            $table->foreignId('extension_id')->constrained()->onDelete('cascade');
            $table->timestamps();
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
