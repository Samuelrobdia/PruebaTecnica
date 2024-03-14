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
        // Obtener todas las tareas
        $tasks = Task::all();

        foreach ($tasks as $task) {
            // Lógica para generar las tareas periódicas
            $this->generateRecurringTasks($task);
        }
    }

    private function generateRecurringTasks(Task $task): void {
        // Fecha de inicio y fin del rango
        $start = Carbon::parse($task->start_date);
        $end = Carbon::parse($task->end_date);

        // Duración de la tarea
        $duration = $start->diffInDays($end);

        // Determinar la frecuencia y calcular las fechas de las tareas
        switch ($task->frequency) {
            case 'daily':
                $interval = CarbonInterval::day();
                break;
            case 'weekly':
                $interval = CarbonInterval::week()->setWeekStartsAt(Carbon::MONDAY);
                break;
            case 'multiple_days':
                $interval = CarbonInterval::week()->setWeekStartsAt(Carbon::MONDAY)->weeks(1)->days(1, 3, 5);
                break;
            case 'monthly':
                $interval = CarbonInterval::month()->day(5);
                break;
            case 'yearly':
                $interval = Carbon::parse('March 5')->yearly();
                break;
            default:
                // Frecuencia no válida
                return;
        }

        // Fecha inicial para la generación
        $currentDate = $start->copy();

        // Generar tareas hasta la fecha final
        while ($currentDate->lte($end)) {
            $this->createTask($task, $currentDate, $duration);
            $currentDate->add($interval);
        }
    }

    private function createTask(Task $task, Carbon $date, int $duration): void {
        
        // Actualizar la tarea existente o crear una nueva si es necesario
        $existingTask = Task::where('task', $task->task)
            ->where('start_date', $date)
            ->where('end_date', $date->copy()->addDays($duration))
            ->first();

        if ($existingTask) {
            $existingTask->update(['completed' => false]);
        } else {
            Task::create([
                'task' => $task->task,
                'frequency' => $task->frequency,
                'start_date' => $date,
                'end_date' => $date->copy()->addDays($duration),
                'completed' => false,
            ]);
        }
    }
}
