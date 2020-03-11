<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\repository\Repository;

class SendCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pusher:send';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		echo "reading all the messages for today\n";
		//Get all the records for today
		$results = Repository::getInstance()->getPushNotificationsAutomatedRepository()->getAllForToday();
		$PushNotificationsAutomatedRepository = Repository::getInstance()->getPushNotificationsAutomatedRepository();
		foreach($results as $PushNotificationAutomated){

			$message = $PushNotificationAutomated->id."|".$PushNotificationAutomated->channel_id."|".$PushNotificationAutomated->everyday."|".$PushNotificationAutomated->everyDayAt."|".$PushNotificationAutomated->send."|".$PushNotificationAutomated->from."|".$PushNotificationAutomated->to."|".$PushNotificationAutomated->bannerAction."|".$PushNotificationAutomated->bannerFile;
			
			echo "Procesing message\n";
			echo $message."\n";
			echo "Sending\n";
			
			$this->sendMessage($PushNotificationAutomated);

			echo "Send\n";
		}

		if(count($results)==0){
			echo "No today messages to send\n";	
		}

		echo "reading all the messages for valid dates\n";

		//Get all the records for today
		$results = Repository::getInstance()->getPushNotificationsAutomatedRepository()->getAllForAvailableDates();
		
		foreach($results as $PushNotificationAutomated){

			$message = $PushNotificationAutomated->id."|".$PushNotificationAutomated->channel_id."|".$PushNotificationAutomated->everyday."|".$PushNotificationAutomated->everyDayAt."|".$PushNotificationAutomated->send."|".$PushNotificationAutomated->from."|".$PushNotificationAutomated->to."|".$PushNotificationAutomated->bannerAction."|".$PushNotificationAutomated->bannerFile;
			
			echo "Procesing message\n";
			echo $message."\n";
			echo "Sending\n";
			
			$this->sendMessage($PushNotificationAutomated);

			echo "Send\n";
		}

		if(count($results)==0){
			echo "No messages to send by valid dates\n";	
		}

		echo "finished\n";
	}


	private function sendMessage($PushNotificationAutomated){

		//Get the channel name
		$Channel = Repository::getInstance()->getChannelsRepository()->getById($PushNotificationAutomated->channel_id);		

		echo "Channel name ".$Channel->name."\n";

		$PushNotificationsController = new \PushNotificationsController();
		$PushNotificationsController->bannerFile = $PushNotificationAutomated->bannerFile;
		$PushNotificationsController->bannerAction = $PushNotificationAutomated->bannerAction;
		$PushNotificationsController->channel = $Channel->name;		
		$res = $PushNotificationsController->sendMessage();

		echo "Response from pusher = ".$res;

		$PushNotificationAutomatedLog = new \PushNotificationAutomatedLog();
	    $PushNotificationAutomatedLog->channel_id = $PushNotificationAutomated->channel_id;
	    $PushNotificationAutomatedLog->everyday = $PushNotificationAutomated->everyday;
	    $PushNotificationAutomatedLog->everyDayAt = $PushNotificationAutomated->everyDayAt;
	    $PushNotificationAutomatedLog->send = 1;
	    $PushNotificationAutomatedLog->from = $PushNotificationAutomated->from;
	    $PushNotificationAutomatedLog->to = $PushNotificationAutomated->to;
	    $PushNotificationAutomatedLog->bannerAction = $PushNotificationAutomated->bannerAction;
	    $PushNotificationAutomatedLog->bannerFile = $PushNotificationAutomated->bannerFile;
	    		
	    $PushNotificationsAutomatedLogRepository = Repository::getInstance()->getPushNotificationsAutomatedLogRepository();

	    $PushNotificationsAutomatedRepository = Repository::getInstance()->getPushNotificationsAutomatedRepository();
	    
		//Save the send log in the database
		$PushNotificationsAutomatedLogRepository->add($PushNotificationAutomatedLog);

		//Update the message to do not send it again
		$PushNotificationsAutomatedRepository->messageSend($PushNotificationAutomated->id);
	}
	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
