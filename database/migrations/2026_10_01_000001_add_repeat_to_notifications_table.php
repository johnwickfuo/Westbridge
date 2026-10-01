<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRepeatToNotificationsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('notifications', 'popup_limit')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->unsignedInteger('popup_limit')->nullable()->after('is_read');
            });
        }

        if (!Schema::hasColumn('notifications', 'popup_shown')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->unsignedInteger('popup_shown')->default(0)->after('popup_limit');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('notifications', 'popup_shown')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->dropColumn('popup_shown');
            });
        }

        if (Schema::hasColumn('notifications', 'popup_limit')) {
            Schema::table('notifications', function (Blueprint $table) {
                $table->dropColumn('popup_limit');
            });
        }
    }
}
