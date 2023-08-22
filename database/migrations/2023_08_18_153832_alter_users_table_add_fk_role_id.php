<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //

            $table->foreignId('role_id')->constrained();
        });


        $user = new User;
        $user->firstname = 'Admin';
        $user->lastname = 'Admin';
        $user->age = 30;
        $user->email = 'admin@example.com';
        $user->password = bcrypt('asd123'); 
        $user->role_id = 1;
        $user->save();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //

            $table->dropForeign('role_id');
        });
    }
};
