
use Illuminate\Database\Seeder;

public function run()
{
    $faker = Faker\Factory::create();

    // Seed Users Table
    DB::table('users')->delete();

    $users = [];
    for($i = 0; $i < 100; $i++) {
        $users[] = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make($faker->password),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ];
    }
    DB::table('users')->insert($users);


    // Seed Teams Table
    DB::table('teams')->delete();
    $teams = [];
    for($i = 0; $i < 20; $i++) {
        $teams[] = [
            'name' => 'Team ' . ucwords($faker->domainWord),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ];
    }
    DB::table('teams')->insert($teams);


    // Seed Participants Table
    DB::table('participants')->delete();

    // Insert some of our users as participants
    $users = App\User::limit(20)->orderByRaw('rand()')->get();
    foreach($users as $user) {
        $user->participants()->create([]);
    }

    // Insert some of the teams as participants
    $teams = App\Team::limit(10)->orderByRaw('rand()')->get();
    foreach($teams as $team) {
        $team->participants()->create([]);
    }

    // Seed Competitions Table
    DB::table('competitions')->delete();

    $competitions = [];

    for($i = 0; $i < 10; $i++) {
        $competitions[] = [
            'name' => $faker->company,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ];
    }

    DB::table('competitions')->insert($competitions);


    // Seed Competitions Participants Relationships
    DB::table('competition_participant')->delete();

    // Sign up each participant to 3 random competitions
    $participants = App\Participant::all();
    $competitions = App\Competition::all();

    foreach($participants as $participant) {
        $participant->competitions()->sync($competitions->shuffle()->take(3));
    }
}


