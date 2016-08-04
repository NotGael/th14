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

$address1 = App\Address::Create(['id' => 1,'street' => 'Rue de la Gare','number' => '8','postalcode' => 5630,'city' => 'Cerfontaine']);
$address2 = App\Address::Create(['id' => 2,'street' => 'Rue de la carpette en soie','number' => '4','postalcode' => 5630,'city' => 'Cerfontaine']);
$address3 = App\Address::Create(['id' => 3,'street' => 'Rue du mec posé','number' => '31bis','postalcode' => 5630,'city' => 'Cerfontaine']);
$address4 = App\Address::Create(['id' => 4,'street' => 'Rue de la biquette','number' => '31','postalcode' => 5630,'city' => 'Somzée']);
$user1 = App\User::Create(['id' => 1,'address_id' => 1,'section_id' => 1,'grade' => 4,'firstname' => 'Gaël', 'lastname' => 'Fontenelle', 'totem' => 'Cirneco', 'email' => 'test@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000000]);
$user2 = App\User::Create(['id' => 2,'address_id' => 2,'section_id' => 2,'grade' => 2,'firstname' => 'Martin', 'lastname' => 'Chauvaux', 'totem' => 'Bonjour', 'email' => 'test2@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000001]);
$user3 = App\User::Create(['id' => 3,'address_id' => 2,'section_id' => 3,'grade' => 2,'firstname' => 'Thomas', 'lastname' => 'Chauvaux', 'totem' => '31', 'email' => 'test3@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000002]);
$user4 = App\User::Create(['id' => 4,'address_id' => 3,'section_id' => 4,'grade' => 2,'firstname' => 'Thomas', 'lastname' => 'Bruyer', 'totem' => 'LAmiBruyer', 'email' => 'test4@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000003]);
$user5 = App\User::Create(['id' => 5,'address_id' => 1,'section_id' => 5,'grade' => 3,'firstname' => 'Yves', 'lastname' => 'Fontenelle', 'totem' => 'Papa', 'email' => 'test5@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000004]);
$user6 = App\User::Create(['id' => 6,'address_id' => 4,'section_id' => 1,'grade' => 1,'firstname' => 'Maël', 'lastname' => 'Bernard', 'email' => 'test6@test.be', 'password' => bcrypt('bonjour')]);
$user7 = App\User::Create(['id' => 7,'address_id' => 4,'grade' => 0,'firstname' => 'Régis', 'lastname' => 'Fontenelle', 'email' => 'test7@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000005]);
$user8 = App\User::Create(['id' => 8,'address_id' => 1,'section_id' => 1,'grade' => 3,'firstname' => 'Pascale', 'lastname' => 'Defrêne', 'email' => 'test8@test.be', 'password' => bcrypt('bonjour'), 'tel' => 0400000006]);
$section1 = App\Section::Create(['id' => 1,'user_id' => 1,'name' => 'Baladins','content' => 'À la ribambelle, de 6 à 8 ans : \"Je prends confiance\". À l\’âge des baladins, l’enfant connaît de grands changements, tant sur le plan intellectuel que relationnel. Pour profiter de toutes ses découvertes, il a besoin d’acquérir la confiance indispensable à son épanouissement. La première étape du parcours scout lui offre un temps pour prendre confiance en lui, en les autres et en le monde. Grâce à ce que l’animateur met en place, le baladin prend plaisir à rencontrer, savoir, connaître, oser, essayer, y arriver et s\’émerveiller.']);
$section2 = App\Section::Create(['id' => 2,'user_id' => 2,'name' => 'Louveteau','content' => 'À la meute, je vis pleinement avec les autres. Entre 8 et 12 ans, l\’enfant traverse une période d’approfondissement de la relation aux autres. De plus en plus conscient des mécanismes de la vie en communauté, il aime se sentir membre à part entière des groupes auxquels il participe. La meute offre à l\’enfant un espace pour expérimenter toutes les composantes de cette vie sociale. En acceptant des responsabilités adaptées à son âge, l\’enfant continue à prendre confiance. Grâce à ce que l\’animateur met en place, le louveteau prend plaisir à écouter, s\’affirmer, respecter, partager, agir en coopération et prend conscience de ce qu\’il vit à la meute.']);
$section3 = App\Section::Create(['id' => 3,'user_id' => 3,'name' => 'Éclaireurs','content' => 'À la troupe, je construis avec les autres.Au début de l\’adolescence, le jeune développe sa prise de responsabilités : il prend les choses en main.À la troupe, et particulièrement au sein du petit groupe qu\’est la patrouille, il participe à la construction collective de projets, dans un esprit de complémentarité et de solidarité.Grâce à ce que l’animateur met en place, l\’éclaireur prend plaisir à rêver, faire des plans, être responsable, s\’outiller, agir pour le groupe et vivre des aventures.']);
$section4 = App\Section::Create(['id' => 4,'user_id' => 4,'name' => 'Pionniers','content' => 'Au poste, je m\'engage. Entre 16 et 18 ans, le jeune est en quête d’idéaux et souhaite élargir son horizon. Au poste, le pionnier se découvre citoyen du monde et essaie d\’y prendre place en mettant ses compétences et son énergie au service des autres et de ses convictions. Grâce au soutien de l\’animateur, le pionnier prend plaisir à faire le point, adhérer, assumer, réfléchir à son avenir, agir en cohérence avec ses croyances et aller au bout de ses rêves.']);
$section5 = App\Section::Create(['id' => 5,'user_id' => 5,'name' => 'Staff d\'Unité','content' => 'Chaque unité est encadrée par une équipe responsable.']);
$reminder1 = App\Reminder::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'content' => 'Nouveau site des Scouts SOON :P']);
$reminder2 = App\Reminder::Create(['id' => 2,'user_id' => 2,'section_id' => 1,'content' => 'Info section 1']);
$reminder3 = App\Reminder::Create(['id' => 3,'user_id' => 3,'section_id' => 2,'content' => 'Info section 2']);
$reminder4 = App\Reminder::Create(['id' => 4,'user_id' => 4,'section_id' => 3,'content' => 'Info section 3']);
$reminder5 = App\Reminder::Create(['id' => 5,'user_id' => 5,'section_id' => 4,'content' => 'Info section 4']);
$reminder6 = App\Reminder::Create(['id' => 6,'user_id' => 1,'section_id' => 5,'content' => 'Info section 5']);
$reminder7 = App\Reminder::Create(['id' => 7,'user_id' => 2,'content' => 'Info pour tous']);
$post = App\Post::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'title' => 'Bienvenue sur le nouveau site des Scouts','slug' => 'bienvenue','content' => 'Bientôt disponible dans toutes les bonnes crêmerie. Voila voila fin du premier article.','online' => 1]);
$post1 = App\Post::Create(['id' => 1,'user_id' => 1,'section_id' => 1,'title' => 'Offline','slug' => 'offline', 'content' => 'Bientôt disponible mais pas tout de suite.', 'online' => false]);

// Slug is not put in the BD for no reasons ??? so &post1 fail for identical slug
