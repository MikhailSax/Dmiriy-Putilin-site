<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\NewsPost;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Администратор',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        collect([
            ['Встреча с жителями по вопросам благоустройства', 'Благоустройство'],
            ['Контроль ремонта освещения во дворах', 'Освещение'],
            ['Итоги недели по обращениям граждан', 'Отчёт'],
        ])->each(fn ($item) => NewsPost::create([
            'user_id' => $user->id,
            'title' => $item[0],
            'category' => $item[1],
            'excerpt' => 'Краткий материал о работе в округе и результатах по обращениям жителей.',
            'content' => 'Полный текст новости с подробностями, датами, участниками и дальнейшими шагами по контролю исполнения.',
            'status' => 'published',
            'published_at' => now(),
            'seo_title' => $item[0],
            'seo_description' => 'Новости округа и работа депутата Дмитрия Путилина.',
        ]));

        collect([
            ['Как формируется карта обращений жителей', 'Приёмная'],
            ['Приоритеты развития округа на ближайший период', 'Планы'],
        ])->each(fn ($item) => BlogPost::create([
            'user_id' => $user->id,
            'title' => $item[0],
            'category' => $item[1],
            'excerpt' => 'Публикация о подходе к работе, контроле обращений и развитии территории.',
            'content' => 'Развёрнутый текст публикации: позиция депутата, детали процесса, результаты и планы дальнейшей работы.',
            'status' => 'published',
            'is_pinned' => true,
            'published_at' => now(),
            'seo_title' => $item[0],
            'seo_description' => 'Блог депутата Дмитрия Путилина.',
        ]));
    }
}
