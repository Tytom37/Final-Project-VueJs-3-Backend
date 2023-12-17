<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'The Legend of Zelda: Tears of the Kingdom',
                'quantity' => '5',
                'price' => '890',
                'image' => 'https://th.bing.com/th/id/OIP.ReT44sRakng-0m13zsC0KwHaEK?rs=1&pid=ImgDetMain'
            ],
            [
                'name' => 'Hogwarts Legacy',
                'quantity' => '5',
                'price' => '3338',
                'image' => 'https://uhdwallpapers.org/uploads/converted/20/10/07/hogwarts-legacy-3840x2400_579957-mm-90.jpg'
            ],
            [
                'name' => "Marvel’s Spider-Man 2",
                'quantity' => '5',
                'price' => '3895',
                'image' => 'https://th.bing.com/th/id/OIP._fQMK4V20c1yHSQiotLLJwHaIL?rs=1&pid=ImgDetMain'
            ],
            [
                'name' => 'Diablo IV',
                'quantity' => '5',
                'price' => '3895',
                'image' => 'https://bnetcmsus-a.akamaihd.net/cms/page_media/xb/XBMMNKOZ8ILU1625080135362.jpg'
            ],
            [
                'name' => 'Star Wars Jedi: Survivor',
                'quantity' => '5',
                'price' => '2999',
                'image' => 'https://cdna.artstation.com/p/assets/images/images/057/306/018/large/tanis-teau-jedi-survivor.jpg?1671253437'
            ],
            [
                'name' => 'Mortal Kombat 1',
                'quantity' => '5',
                'price' => '2990',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1971870/header.jpg?t=1702617146'
            ],
            [
                'name' => 'Genshin Impact',
                'quantity' => '5',
                'price' => '6499',
                'image' => 'https://cdn1.epicgames.com/salesEvent/salesEvent/EGS_GenshinImpact_miHoYoLimited_S1_2560x1440-91c6cd7312cc2647c3ebccca10f30399'
            ],
            [
                'name' => 'Resident Evil 4 (2023)',
                'quantity' => '5',
                'price' => '3599',
                'image' => 'https://cdn.wikimg.net/en/strategywiki/images/thumb/4/4f/Resident_Evil_4_2023_box.jpg/500px-Resident_Evil_4_2023_box.jpg'
            ],
            [
                'name' => 'Honkai: Star Rail',
                'quantity' => '5',
                'price' => '3895',
                'image' => 'https://image.api.playstation.com/vulcan/ap/rnd/202308/1211/19e32e6b18f3b345afc4262a596b7eee6edeb98bbcebe171.jpg'
            ],
            [
                'name' => 'Armored Core VI: Fires of Rubicon',
                'quantity' => '5',
                'price' => '2477',
                'image' => 'https://th.bing.com/th/id/OIP.U1hKeymbyCbNsBTQMpTtawHaHa?rs=1&pid=ImgDetMain'
            ],
        ];

        foreach($data as $d) {
            Game::create($d);
        }
    }
}
