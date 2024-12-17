protected function schedule(Schedule $schedule)
{
    $schedule->command('clubs:auto-assign')->daily(); // Runs daily
}
