<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSectionLessonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_section_lessons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sid');
			$table->string('description');
      $table->string('title');
      $table->text('body');
			$table->string('page_image');
      $table->string('youtube');
      $table->string('weight');
      $table->integer('level');
      $table->tinyInteger('enabled');
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
		Schema::drop('course_section_lessons');
	}

}
