<?php

namespace App\Console;

use App\Console\Commands\TestCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $filePath = public_path() . '/schedule.log';
        // 执行 artisan 命令
        // $schedule->command('inspire')
        //          ->hourly();

        // 在后台运行，并加锁
        $schedule->command('command:test')
            ->everyMinute()
            ->appendOutputTo($filePath)
            ->withoutOverlapping()
            ->runInBackground();

        // 执行闭包
        // $schedule->call(function () {
        //     Db::table('blogs')->delete(0);
        // })->daily();

        // 调度 Shell 命令
        // $schedule->exec('php -v')->daily();

        // 调度队列任务
        $schedule->job(new TestCommand())->everyMinute();
        // $schedule->job(new TestCommand())->cron('* * * * *');

        // Dispatch the job to the "heartbeats" queue...
        // $schedule->job(new TestCommand(), 'heartbeats')->everyFiveMinutes();

        // 工作日的上午8点到下午5点每小时运行...
        // $schedule->command('foo')
        //     ->weekdays()
        //     ->hourly()
        //     ->timezone('America/Chicago')
        //     ->between('8:00', '17:00');

        /**
         * 避免任务重叠：默认情况下 这个锁会在 24 小时后失效，也可以指定锁失效前的分钟数。
         *
         * 要使用这个功能，必须使用 memcached 或 redis 缓存驱动作为应用默认的缓存驱动。
         * 此外，所有服务器必须和同一个中央缓存服务器通信。
         */
        // $schedule->command('emails:send')->withoutOverlapping();

        // 只在单台服务器上运行
        // $schedule->command('emails:send')->onOneServer();

        /**
         * 后台任务：让命令在后台执行以便它们可以同时运
         *
         * 默认情况下，同时调度的多个命令会顺序执行。
         * 有一些长时间运行的命令，将会导致随后的命令在预期之后很久才能执行。
         * 可以使用 runInBackground 方法来实现让命令在后台执行，以便它们可以同时运
         */
        // $schedule->command('analytics:report')
        //     ->daily()
        //     ->runInBackground();

        // 当 Laravel 处于维护模式时，一般调度任务不会运行。可以使用 evenInMaintenanceMode 方法在维护模式期间强制运行任务
        // $schedule->command('emails:send')->evenInMaintenanceMode();

        /**
         * 任务输出：将输出保存到文件
         *
         * emailOutputTo、sendOutputTo 和 appendOutputTo 方法只对 command 和 exec 方法有效
         */
        // $schedule->command('emails:send')
        //     ->daily()
        //     ->sendOutputTo('$filePath');
        // // 追加模式
        // $schedule->command('emails:send')
        //     ->daily()
        //     ->appendOutputTo('$filePath');
        // // 需要先配置 Laravel 的邮件服务，将输出通过邮件发送给接收人
        // $schedule->command('foo')
        //     ->daily()
        //     ->sendOutputTo('$filePath')
        //     ->emailOutputTo('foo@example.com');

        /**
         * 任务钩子
         *
         * 使用 before 和 after 方法，你可以指定在调度任务完成之前和之后要执行的代码
         */
        // $schedule->command('emails:send')
        //     ->daily()
        //     ->before(function () {
        //         // 任务即将开始...
        //     })
        //     ->after(function () {
        //         // 任务已经完成...
        //     });
        // // 使用 pingBefore 和 thenPing方法，调度器可以在任务完成之前和之后自动 ping 给定的 URL。
        // $schedule->command('emails:send')
        //     ->daily()
        //     ->pingBefore('$url')
        //     ->thenPing('$url');
        // // 在给定条件为 true 时才 ping 给定的 URL
        // $schedule->command('emails:send')
        //     ->daily()
        //     ->pingBeforeIf('$condition', '$url')
        //     ->thenPingIf('$condition', '$url');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
