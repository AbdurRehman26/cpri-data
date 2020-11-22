<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sites', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code');
			$table->string('bsc_name');
			$table->string('name');
			$table->string('no_of_cells')->nullable();
			$table->string('latitude');
			$table->string('longitude');
			$table->string('vendor')->nullable();
			$table->string('site_type')->nullable();
			$table->string('omc')->nullable();
			$table->string('priority')->nullable();
			$table->string('region')->nullable();
			$table->string('sub_region')->nullable();
			$table->string('comm_region')->nullable();
			$table->string('osv')->nullable();
			$table->string('proposed_region')->nullable();
			$table->string('zone')->nullable();
			$table->string('mbu')->nullable();
			$table->string('rbu')->nullable();
			$table->string('network_type')->nullable();
			$table->string('prime_no_prime')->nullable();
			$table->string('indoor_outdoor')->nullable();
			$table->string('genset_status')->nullable();
			$table->string('omo_colocation')->nullable();
			$table->string('omo_id')->nullable();
			$table->string('collocated_status')->nullable();
			$table->string('moran_site')->nullable();
			$table->string('site_power_profile')->nullable();
			$table->string('deodar_shared')->nullable();
			$table->string('lac')->nullable();
			$table->string('vlan')->nullable();
			$table->string('type')->nullable();
			$table->string('city')->nullable();

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
		Schema::drop('sites');
	}

}
