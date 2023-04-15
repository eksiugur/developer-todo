<?php

namespace App\Console\Commands;

use App\Models\Provider;
use App\Models\Task;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class getNewTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-new-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Providers Get Task List';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $totalTask = 0;
        $providers = Provider::get();
        foreach ($providers as $provider) {
            $parameters = explode(",",$provider->parameters);
            $tasks = self::listTasks($provider->endpoint,$parameters);
            foreach ($tasks as $task) {
                $taskCount = Task::where(["provider_id"=>$provider->id,"name"=>$task->name])->count();
                if($taskCount==0){
                    $taskObject = new Task();
                    $taskObject->provider_id           = $provider->id;
                    $taskObject->name               = $task->name;
                    $taskObject->level              = $task->level;
                    $taskObject->duration = $task->duration;
                    $taskObject->save();
                    $totalTask++;
                }
            }
        }
        $this->info('New Task Created Success Count : '.$totalTask);
    }

    public static function listTasks($endpoint,$parameters): array
    {
        $client = new Client();
        $res = $client->request("GET", $endpoint);
        $responseBody = json_decode($res->getBody());

        $tasks = [];

        foreach ($responseBody as $key=>$item) {
            $name = $level = $duration = NULL;
            if($parameters[2]=="{key}"){
                foreach ($item as $dataName=>$property) {
                    $name               = $dataName;
                    $level              = $property->{$parameters[0]};
                    $duration = $property->{$parameters[1]};
                }
            }
            else{
                $param = [];
                foreach ($parameters as $parameter) {
                    $param[] = explode(".",$parameter);
                }

                if(count($param[0])>1)
                    $level = $item->{$param[0][0]}->{$param[0][1]};
                else
                    $level = $item->{$param[0][0]};

                if(count($param[1])>1)
                    $duration = $item->{$param[1][0]}->{$param[1][1]};
                else
                    $duration = $item->{$param[1][0]};

                if(count($param[2])>1)
                    $name = $item->{$param[2][0]}->{$param[2][1]};
                else
                    $name = $item->{$param[2][0]};

            }

            $task = new \stdClass();
            $task->name                 = $name;
            $task->level                = $level;
            $task->duration   = $duration;
            $tasks[] = $task;


        }
        return $tasks;
    }
}
