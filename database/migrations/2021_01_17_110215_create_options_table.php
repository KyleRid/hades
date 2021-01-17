<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('option_id');
            $table->string('option_name', 64)->unique();
            $table->longText('option_value');
            $table->string('autoload', 20)->default('yes');
        });

        DB::table('options')->insert(
            [
                [
                    'option_name' => 'siteurl',
                    'option_value' => 'http://localhost/wordpress/',
                ],
                [
                    'option_name' => 'home',
                    'option_value' => 'http://localhost/wordpress/',
                ],
                [
                    'option_name' => 'sitename',
                    'option_value' => 'Hades Demo Site',
                ],
                [
                    'option_name' => 'sitedescription',
                    'option_value' => 'Hades Description',
                ],
                [
                    'option_name' => 'user_can_register',
                    'option_value' => '0',
                ],
                [
                    'option_name' => 'admin_email',
                    'option_value' => 'nelsonbh@yandex.ru',
                ],
                [
                    'option_name' => 'mailserver_url',
                    'option_value' => 'mail.example.com',
                ],
                [
                    'option_name' => 'mailserver_login',
                    'option_value' => 'login@example.com',
                ],
                [
                    'option_name' => 'mailserver_pass',
                    'option_value' => 'password',
                ],
                [
                    'option_name' => 'mailserver_port',
                    'option_value' => '110',
                ],
                [
                    'option_name' => 'default_category',
                    'option_value' => '1',
                ],
                [
                    'option_name' => 'default_comment_status',
                    'option_value' => 'open',
                ],
                [
                    'option_name' => 'date_format',
                    'option_value' => 'F j, Y',
                ],
                [
                    'option_name' => 'time_format',
                    'option_value' => 'g:i a',
                ],
                [
                    'option_name' => 'links_updated_date_format',
                    'option_value' => 'F j, Y g:i a',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
