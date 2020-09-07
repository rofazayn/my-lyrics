<?php

use App\User;
use App\Category;
use App\Album;
use App\Artiste;
use App\Song;
use Illuminate\Database\Seeder;

class StartSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>Hash::make('password'),
            'role'=>1
        ]);

        Category::create([
            'name'=>'pop',
        ]);
        Category::create([
            'name'=>'rap',
        ]);
        Category::create([
            'name'=>'french',
        ]);
        Category::create([
            'name'=>'hip hop',
        ]);

        $artiste1=Artiste::create([
            'name'=>'Kendji girac',
            'category_id'=>3,
            'image'=>'https://www.aficia.info/wp-content/uploads/2018/06/Kendji-Girac-Cover-Pour-Oublier.jpg'
        ]);
        $artiste2=Artiste::create([
            'name'=>'soolking',
            'category_id'=>3,
            'image'=>'https://rapunchline.fr/wp-content/uploads/2018/10/Soolking-d%C3%A9voile-titre-date-cover.jpg'
        ]);
        $artiste3=Artiste::create([
            'name'=>'katy perry',
            'category_id'=>1,
            'image'=>'https://www.f-covers.com/cover/katy-perry-31-facebook-cover-timeline-banner-for-fb.jpg'
        ]);


        $song1=Song::create([
            'name'=>'conmigo',
            'image'=>'https://images.genius.com/0fbb11929b333ffa4ab45feae9503d09.640x640x1.jpg',
            'lyrics'=>"<div>Hey papa<br>Estoy aqui!<br>Me llamo Kendji</div><div>J'avais juste prévu de rentrer<br>Et puis sur toi je suis tombé<br>Tu as la peau qu'on voudrais goûter<br>Et le sourire muy caliente<br>Comme si le temps s'était arrêté<br>Au ralentis je t'ai vue t'avancer<br>Devant ta beauté j'reste planté</div><div>Me laisse pas solo solo<br>J'veux pas te saouler<br>Je veux juste un tango et te voir tanguer<br>Est-ce que t'aimes danser te balancer<br>Arrête un peu de penser et laisser moi t'enlacer</div><div>Solo, solo<br>De toi j'suis fou eh<br>Dis moi c'que j'dois faire pour t'amadouer<br>On pourrait bouger se mélanger<br>Se mettre un peu en danger oh</div><div>Conmigo, conmigo venga bailar<br>Conmigo, conmigo venga bailar<br>Conmigo, conmigo venga bailar<br>Conmigo venga bailar</div><div>Tu me regardes et fais ton entrée<br>Premier regard je suis charmé<br>Tu es un ange venu me tenter<br>Et je pourrais bien succomber<br>Entre nous y'a le fuego, l'envie<br>Tant de désirs inassouvis<br>Si le désir est de la partie</div><div>Me laisse pas solo solo<br>J'veux pas m'imposer<br>Mais j'tai dans la peau<br>On pourrait causer<br>Est-ce que t'aimais danser te balancer<br>Arrête un peu de penser et laisser moi t'enlacer</div><div>Solo solo<br>De toi j'suis fou eh<br>Dis moi c'que j'dois faire pour t'amadouer<br>On pourrais bouger se mélanger<br>Se mettre un peu en danger oh</div><div>Conmigo, conmigo venga bailar<br>Conmigo, conmigo venga bailar<br>Conmigo, conmigo venga bailar<br>Conmigo, venga bailar</div><div>Venga bailar venga bailar venga bailar conmigo<br>Venga bailar venga bailar venga bailar conmigo<br>Venga bailar venga bailar venga bailar conmigo<br>Venga bailar venga bailar venga bailar conmigo</div><div>Conmigo, conmigo venga bailar<br>Conmigo, conmigo venga bailar<br>Conmigo, conmigo venga bailar<br>Conmigo, venga bailar</div>",
            'artiste_id'=>$artiste1->id,
            'mp3'=>'ui/files/conmigo.mp3',
            'views'=>100000
        ]);
        $song2=Song::create([
            'name'=>'melegim',
            'image'=>'https://m.media-amazon.com/images/I/81vx4aHz2+L._SS500_.jpg',
            'lyrics'=>"<div>J'ai les deux mains sur tes épaules (yeah)<br>Histoire qu'le monde te laisse tranquille<br>Ils veulent nous voir sur les réseaux (yeah, yeah, yeah)<br>J'vais leur donner<br>Ce soir, on sort, mon bébé, j'ai la robe qu'il te faut<br>Y a plein de couples autour mais j'crois qu'en sah, c'est nous deux<br>Pas l'même style, pas l'même seille-o, pas le même niveau<br>Y a plein de couples autour mais j'crois qu'en sah, c'est nous deux, yeah</div><div>Meleğim, quand tu marches à mes côtés, je brille, yeah<br>Meleğim, quand tu marches à mes côtés, je frime (meleğim, meleğim)<br>Meleğim, marche à mes côtés, je brille (eh)<br>Meleğim, quand tu marches à mes côtés, je frime</div><div>À Paris ou Bodrum<br>Là où nos cœurs se retrouvent<br>Avec toi, la vie est trop courte<br>Avec toi, je revis tout court, nous deux<br>Oui, nous deux, que nous deux<br>On s'éloignera d'eux<br>Y a que nous deux, y a que nous deux<br>Et tu seras toujours celle qui me rend le plus fier<br>De ces hommes, le plus fier de ces hommes<br>Et tu seras toujours celle qui me rend le plus fier<br>De ces hommes, le plus fort de ces hommes, oui, yeah</div><div>J'ai les deux mains sur tes épaules<br>Histoire qu'le monde te laisse tranquille<br>Ils veulent nous voir sur les réseaux (yeah)<br>J'vais leur donner<br>Ce soir, on sort, mon bébé, j'ai la robe qu'il te faut<br>Y a plein de couples autour mais j'crois qu'en sah, c'est nous deux<br>Pas l'même style, pas l'même seille-o, pas le même niveau<br>Y a plein de couples autour mais j'crois qu'en sah, c'est nous deux, yeah</div><div>Meleğim, quand tu marches à mes côtés, je brille, yeah<br>Meleğim, quand tu marches à mes côtés, je frime (meleğim, meleğim)<br>Meleğim, marche à mes côtés, je brille (eh)<br>Meleğim, quand tu marches à mes côtés, je frime</div><div>À mon poignet, j'ai mis la Audemars (Piguet)<br>Juste histoire de pouvoir arriver à l'heure pour la soirée<br>Madame a bien rempli ses sapes (stylées)<br>Juste histoire de bien me rappeler pourquoi je l'ai mariée<br>Quand elle s'accroche à moi, on ne joue plus dans la même catégorie, mmm<br>Tu voulais nous voir? Tu nous as vus, t'as jeté tes yeux sur nos vies<br>Ooh, j'peux les entendre d'ici, d'ici, d'ici, d'ici, d'ici, d'ici<br>Jalousez, c'est par ici, ici, ici, ici, ici, ici, oh ay</div><div>J'ai les deux mains sur tes épaules (sur tes épaules)<br>Histoire qu'le monde te laisse tranquille<br>Ils veulent nous voir sur les réseaux (sur les réseaux)<br>J'vais leur donner<br>Ce soir, on sort, mon bébé, j'ai la robe qu'il te faut<br>Y a plein de couples autour mais j'crois qu'en sah, c'est nous deux<br>Pas l'même style, pas l'même seille-o, pas le même niveau<br>Y a plein de couples autour mais j'crois qu'en sah, c'est nous deux, yeah</div><div>Meleğim, quand tu marches à mes côtés, je brille, yeah<br>Meleğim, quand tu marches à mes côtés, je frime (meleğim, meleğim)<br>Meleğim, marche à mes côtés, je brille (yeah)<br>Meleğim, quand tu marches à mes côtés, je frime</div><div>Meleğim, Meleğim, Meleğim<br>Meleğim, Meleğim, Meleğim<br>Hassanates dans mon dos, mon dos<br>Continue, tu as raison, raison<br>Tu vomis sur mes réseaux, réseaux<br>Continue, tu as raison, raison</div><div>Mmm, mmm, j'suis désolé<br>Oh oh ay<br>J'suis désolé</div>",
            'artiste_id'=>$artiste2->id,
            'mp3'=>'ui/files/melegim.mp3',
            'views'=>100000
        ]);
        $song3=Song::create([
            'name'=>'swish',
            'image'=>'https://i.pinimg.com/originals/17/44/68/17446833396d6b1db4f4337e4c1247d1.jpg',
            'lyrics'=>"<div>They know what is what<br>But they don't know what is what<br>They just strut<br>What the fuck?</div><div>A tiger<br>Don't lose no sleep<br>Don't need opinions<br>From a shellfish or a sheep<br>Don't you come for me<br>No, not today (woah)<br>You're calculated<br>I got your number<br>'Cause you're a joker<br>And I'm a courtside killer queen<br>And you will kiss the ring<br>You best believe</div><div>So keep calm, honey, I'ma stick around<br>For more than a minute, get used to it<br>Funny my name keeps comin' out your mouth<br>'Cause I stay winning<br>Lay 'em up like</div><div>Swish, swish, bish<br>Another one in the basket (basket, woah, basket, woah)<br>Can't touch this<br>Another one in the casket (casket, woah, casket)</div><div>Your game is tired<br>You should retire<br>You're 'bout as cute as<br>An old coupon expired (woah, woah)<br>And karma's not a liar<br>She keeps receipts</div><div>So keep calm, honey, I'ma stick around<br>For more than a minute, get used to it<br>Funny my name keeps comin' out your mouth<br>'Cause I stay winning<br>Lay 'em up like</div><div>Swish, swish, bish<br>Another one in the basket (basket, woah, basket, woah)<br>Can't touch this<br>Another one in the casket (casket, woah, casket, let's go, woah)<br>Swish, swish, bish<br>Another one in the basket (basket, woah, basket, woah)<br>Can't touch this<br>Another one in the casket (casket, woah, casket, woah)</div><div>They know what is what<br>But they don't know what is what<br>Katy Perry (woah)<br>They just know what is what<br>Young Money<br>But they don't know what is what (what, woah)<br>They just know what is what<br>But they don't know what is what (woah)<br>They just strut<br>Hahaha, yo<br>What the fuck? (Woah)</div><div>Pink Ferragamo sliders on deck<br>Silly rap beefs just get me more checks<br>My life is a movie, I'm never off set<br>Me and my amigos (no, not Offset)<br>Swiss swish, aww I got them upset<br>But my shooters'll make 'em dance like dubstep<br>Swiss, swish, aww, my haters is obsessed<br>'Cause I make M's, they get much less<br>Don't be tryna double back<br>I already despise you (yeah)<br>All that fake love you showin'<br>Couldn't even disguise you, yo, yo<br>Ran? When? Nicki gettin' tan<br>Mirror mirror who's the fairest bitch in all the land?<br>Damn, man, this bitch is a Stan<br>The generous queen'll kiss a fan<br>Ass goodbye, I'ma be riding by<br>I'ma tell my Biggz, yeah that's the guy<br>A star's a star, da ha da ha<br>They never thought the swish god would take it this far<br>Get my pimp cup, this is pimp shit, baby<br>I only rock with queens, so I'm makin' hits with Katy</div><div>Swish, swish, bish<br>Another one in the basket (and another one, and another one) (basket, woah, basket, woah)<br>Can't touch this (can't touch this)<br>Another one in the casket (and another one, and another one) (casket, woah, casket, woah)</div><div>They know what is what<br>Do they know?<br>But they don't know what is what<br>They just know what is what (woah)<br>But they don't know what is what (woah)<br>They just know what is what<br>But they don't know what is what<br>They just strut (woah)<br>What the (woah)</div>",
            'artiste_id'=>$artiste3->id,
            'mp3'=>'ui/files/swish.mp3',
            'views'=>100000
        ]);
        $song4=Song::create([
            'name'=>'roar',
            'image'=>'https://upload.wikimedia.org/wikipedia/en/4/41/Katy_Perry_-_Roar.png',
            'lyrics'=>"<div>I used to bite my tongue and hold my breath<br>Scared to rock the boat and make a mess<br>So I sat quietly, agreed politely<br>I guess that I forgot I had a choice<br>I let you push me past the breaking point<br>I stood for nothing, so I fell for everything</div><div>You held me down, but I got up (hey!)<br>Already brushing off the dust<br>You hear my voice, your hear that sound<br>Like thunder, gonna shake the ground<br>You held me down, but I got up<br>Get ready 'cause I had enough<br>I see it all, I see it now</div><div>I got the eye of the tiger, a fighter<br>Dancing through the fire<br>'Cause I am a champion, and you're gonna hear me roar<br>Louder, louder than a lion<br>'Cause I am a champion, and you're gonna hear me roar!</div><div>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>You're gonna hear me roar!</div><div>Now I'm floating like a butterfly<br>Stinging like a bee I earned my stripes<br>I went from zero, to my own hero</div><div>You held me down, but I got up (hey!)<br>Already brushing off the dust<br>You hear my voice, your hear that sound<br>Like thunder, gonna shake the ground<br>You held me down, but I got up<br>Get ready 'cause I've had enough<br>I see it all, I see it now</div><div>I got the eye of the tiger, a fighter<br>Dancing through the fire<br>'Cause I am a champion, and you're gonna hear me roar<br>Louder, louder than a lion<br>'Cause I am a champion, and you're gonna hear me roar!</div><div>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>You're gonna hear me roar!</div><div>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>You're gonna hear me roar!</div><div>Roar, roar, roar, roar, roar!</div><div>I got the eye of the tiger, a fighter<br>Dancing through the fire<br>'Cause I am a champion, and you're gonna hear me roar<br>Louder, louder than a lion<br>'Cause I am a champion, and you're gonna hear me roar!</div><div>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>You're gonna hear me roar!</div><div>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>Oh oh oh oh oh oh oh oh<br>You're gonna hear me roar!</div>",
            'artiste_id'=>$artiste3->id,
            'mp3'=>'ui/files/roar.mp3',
            'views'=>100000
        ]);
    }
}
