<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_user', function (Blueprint $table) {
            // id nemame bidejki se brise oti ovaa tabela ni e pivot tabela  
            $table->foreignId('movie_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->primary(['movie_id', 'user_id']);
            $table->unique('movie_id'); // za da moze eden film da se izrenta samo od eden user 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_user');
    }
};

/**
 * 
 * 
Pivot таблиците (или меѓу-таблиците) се користат во релационите бази на податоци за да се овозможат многу-многу врски меѓу две главни табели. Тие се искористуваат кога еден запис во прва табела може да биде поврзан со повеќе записи во втората табела и обратно, без да биде претерано сложено со додавање на повеќе колони во главните табели.

Во твојот код, movie_user е името на pivot табелата која ја создаваш со миграцијата. Оваа табела ги поврзува табелите movies и users. Преку оваа табела, можеш да ги следиш врските помеѓу филмовите и корисниците кои ги изнајмуваат.

Во спецификациите на табелата movie_user во твојата миграција, може да забележиме следното:

movie_id и user_id се две strani клучеви кои ги поврзуваат соодветно со табелите movies и users. Ова овозможува табелата movie_user да знае кои филмови се поврзани со кои корисници.

primary(['movie_id', 'user_id']) означува дека комбинацијата на movie_id и user_id ќе биде примарен клуч на табелата. Ова значи дека секој запис во табелата мора да биде уникатен со оваа комбинација.

unique('movie_id') означува дека идентификациониот број на филмот movie_id мора да биде уникатен во рамките на табелата. Ова спречува ист филм да биде изнајмен од ист корисник повеќе пати.

Во суштина, оваа pivot табела ја овозможува многу-многу врската меѓу филмовите и корисниците, каде што еден филм може да биде изнајмен од повеќе корисници, а исто така еден корисник може да изнајмува повеќе филмови. Pivot табелата чува информации за овие врски, како комбинации од movie_id и user_id.



 */
