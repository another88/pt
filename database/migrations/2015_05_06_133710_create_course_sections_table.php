<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cid');
      $table->string('title');
			$table->string('page_image');
			$table->text('description');
      $table->string('weight');
      $table->tinyInteger('enabled');
      $table->integer('levels');
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
		Schema::drop('course_sections');
	}

}
