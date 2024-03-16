<?php

namespace App\Jobs;

use App\Models\Task;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateTasksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tasks = Task::all();

        foreach ($tasks as $task) {
            
            $this->generateRecurringTasks($task);
        }
       
    }

    private function generateRecurringTasks(Task $task): void {
       
        $currentDate = Carbon::now();
        $start = Carbon::parse($task->start_date);
        $end = Carbon::parse($task->end_date);

        if (!$currentDate->between($start,$end)){
           return;
        } 

        $duration = $start->diffInDays($end);

        switch ($task->frequency) {
            
            case 'daily':
                $task->completed = false;

                break;
            
                case 'weekly':
            
                if($currentDate->isMonday()){
                    $task->completed = false;
                }
                break;
            
                case 'multiple_days':
                
                if($currentDate->isMonday() or $currentDate->isWednesday() or $currentDate->isFriday() ){
                    $task->completed = false;
                }
                break;
            
                case 'monthly':
                
                if ($currentDate->day == 5){
                    $task->completed = false;
                }
                break;
            case 'yearly':

                if ($currentDate->month == 3 && $currentDate->day == 5){
                    $task->completed = false;
                }
                break;
        }

        $task->save();

    }

}
