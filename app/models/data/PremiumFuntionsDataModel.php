<?php

namespace App\models\data;

class PremiumFuntionsDataModel extends BaseDataModel {

	public $premium;
	public $sendToOnlyOneDestinataryInFact;
	public $onlyUseIVATax;
	public $onlyOneSerieForDocument;
	public $disableInvoiceTicketsWindow;
	


	public function __construct(){		
		parent::__construct();		
	}
}
