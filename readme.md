# th14 my first try with Laravel PHP Framework

// Once in your www file

• Install composer
• Rename .env.example in .env
• Enter your DB info in .env
• php composer update
• php artisan key:generate
• php artisan migrate

// Fill the DB with demo items

php artisan tinker

$address1 = App\Address::firstOrCreate(['id' => 1,'street' => 'Rue de la Gare','number' => '8','postalcode' => 5630,'city' => 'Cerfontaine']);
$address2 = App\Address::firstOrCreate(['id' => 2,'street' => 'Rue de la carpette en soie','number' => '4','postalcode' => 5630,'city' => 'Cerfontaine']);
$address3 = App\Address::firstOrCreate(['id' => 3,'street' => 'Rue du mec posé','number' => '31bis','postalcode' => 5630,'city' => 'Cerfontaine']);
$address4 = App\Address::firstOrCreate(['id' => 4,'street' => 'Rue de la biquette','number' => '31','postalcode' => 5630,'city' => 'Somzée']);
$user1 = App\User::Create(['id' => 1,'address_id' => 1,'section_id' => 1,'grade' => 4,'firstname' => 'Gaël', 'lastname' => 'Fontenelle', 'totem' => 'Cirneco', 'email' => 'test@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000000]);
$user2 = App\User::Create(['id' => 2,'address_id' => 2,'section_id' => 2,'grade' => 2,'firstname' => 'Martin', 'lastname' => 'Chauvaux', 'totem' => 'Bonjour', 'email' => 'test2@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000001]);
$user3 = App\User::Create(['id' => 3,'address_id' => 2,'section_id' => 3,'grade' => 2,'firstname' => 'Thomas', 'lastname' => 'Chauvaux', 'totem' => '31', 'email' => 'test3@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000002]);
$user4 = App\User::Create(['id' => 4,'address_id' => 3,'section_id' => 4,'grade' => 2,'firstname' => 'Thomas', 'lastname' => 'Bruyer', 'totem' => 'LAmiBruyer', 'email' => 'test4@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000003]);
$user5 = App\User::Create(['id' => 5,'address_id' => 1,'section_id' => 5,'grade' => 3,'firstname' => 'Yves', 'lastname' => 'Fontenelle', 'totem' => 'Papa', 'email' => 'test5@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000004]);
$user6 = App\User::Create(['id' => 6,'address_id' => 4,'section_id' => 1,'grade' => 1,'firstname' => 'Maël', 'lastname' => 'Bernard', 'email' => 'test6@test.be', 'password' => bcrypt('bonjour')]);
$user7 = App\User::Create(['id' => 7,'address_id' => 4,'grade' => 0,'firstname' => 'Régis', 'lastname' => 'Fontenelle', 'email' => 'test7@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000005]);
$user8 = App\User::Create(['id' => 8,'address_id' => 1,'section_id' => 1,'grade' => 3,'firstname' => 'Pascale', 'lastname' => 'Defrêne', 'email' => 'test8@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000006]);
$section1 = App\Section::Create(['id' => 1,'user_id' => 1,'name' => 'Baladin','content' => 'Des 3 à 8 ans vis des aventures Baladin !']);
$section2 = App\Section::Create(['id' => 2,'user_id' => 2,'name' => 'Louveteau','content' => 'Des 8 à 12 ans vis des aventures Louveteau !']);
$section3 = App\Section::Create(['id' => 3,'user_id' => 3,'name' => 'Éclaireur','content' => 'Des 12 à 16 ans vis des aventures Éclaireur !']);
$section4 = App\Section::Create(['id' => 4,'user_id' => 4,'name' => 'Pionnier','content' => 'Des 16 à 18 ans vis des aventures Pionnier !']);
$section5 = App\Section::Create(['id' => 5,'user_id' => 5,'name' => 'Staff d\'U','content' => 'Le staff']);
$reminder1 = App\Reminder::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'content' => 'Nouveau site des Scouts SOON :P']);
$reminder2 = App\Reminder::Create(['id' => 2,'user_id' => 2,'section_id' => 1,'content' => 'Info section 1']);
$reminder3 = App\Reminder::Create(['id' => 3,'user_id' => 3,'section_id' => 2,'content' => 'Info section 2']);
$reminder4 = App\Reminder::Create(['id' => 4,'user_id' => 4,'section_id' => 3,'content' => 'Info section 3']);
$reminder5 = App\Reminder::Create(['id' => 5,'user_id' => 5,'section_id' => 4,'content' => 'Info section 4']);
$reminder6 = App\Reminder::Create(['id' => 6,'user_id' => 1,'section_id' => 5,'content' => 'Info section 5']);
$reminder7 = App\Reminder::Create(['id' => 7,'user_id' => 2,'content' => 'Info pour tous']);
$post = App\Post::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'title' => 'Bienvenue sur le nouveau site des Scouts','slug' => 'bienvenue','content' => 'Bientôt disponible dans toutes les bonnes crêmerie. Voila voila fin du premier article.','online' => 1]);

//$post1 = App\Post::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'title' => 'Offline','slug' => 'offline', 'content' => 'Bientôt disponible mais pas tout de suite.', 'online' => false]);

// Slug is not put in the BD for no reasons ??? so &post1 fail for identical slug
