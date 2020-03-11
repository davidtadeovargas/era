<?php

class ProductsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//Create the type of emails		
		Product::create(array('code' => 'LIC1',"description" => "Licencia Para 1 usuarios.","price" => 2500,"numberComputers"=>1,"productTypeID"=>1));
		Product::create(array('code' => 'LIC2',"description" => "Licencia Para 4 usuarios","price" => 3500,"numberComputers"=>4,"productTypeID"=>1));
		Product::create(array('code' => 'LIC3',"description" => "Licencia Para 10 usuarios","price" => 5500,"numberComputers"=>10,"productTypeID"=>1));
		Product::create(array('code' => 'LIC4',"description" => "Licencia Para 20 usuarios","price" => 10500,"numberComputers"=>20,"productTypeID"=>1));

		Product::create(array('code' => 'TIM1',"description" => "Paquete de 500 timbres","price" => 500,"numberComputers"=>0,"productTypeID"=>2));
		Product::create(array('code' => 'TIM2',"description" => "Paquete de 1,000 timbres","price" => 1000,"numberComputers"=>0,"productTypeID"=>2));
		Product::create(array('code' => 'TIM3',"description" => "Paquete de 10,0000 timbres","price" => 10000,"numberComputers"=>0,"productTypeID"=>2));
		Product::create(array('code' => 'TIM4',"description" => "Paquete de 100,000 timbres","price" => 60000,"numberComputers"=>0,"productTypeID"=>2));

		Product::create(array('code' => 'REV1',"description" => "Revocación de licencia 1 usuario","price" => 1500,"numberComputers"=>1,"productTypeID"=>3));
		Product::create(array('code' => 'REV2',"description" => "Revocación de licencia 5 usuario","price" => 2500,"numberComputers"=>5,"productTypeID"=>3));
		Product::create(array('code' => 'REV3',"description" => "Revocación de licencia 20 usuario","price" => 3800,"numberComputers"=>20,"productTypeID"=>3));
		Product::create(array('code' => 'REV4',"description" => "Revocación de licencia 50 usuario","price" => 7000,"numberComputers"=>50,"productTypeID"=>3));
	}

}
