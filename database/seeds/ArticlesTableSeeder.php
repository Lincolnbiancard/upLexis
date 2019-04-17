<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('articles')->insert(
            
           [
                [
                    'id_user'      => 6,
                    'title' => 'Compliance na Logística também traz benefícios',
                    'image' => 'https://www.uplexis.com.br/wp-content/uploads/2019/04/logistica.jpeg',
                    'link' => 'https://www.uplexis.com.br/blog/compliance-na-logistica/',
                ],
                [
                    'id_user'      => 6,
                    'title' => 'Sua empresa possui um Plano de Contingência?',
                    'image' => 'https://www.uplexis.com.br/wp-content/uploads/2019/04/gestao-de-crise-1.jpeg',
                    'link' => 'https://www.uplexis.com.br/blog/compliance/sua-empresa-possui-um-plano-de-contingencia/',
                ],
                [
                    'id_user'      => 6,
                    'title' => 'Compliance na Gestão Portuária?',
                    'image' => 'https://www.uplexis.com.br/wp-content/uploads/2019/04/gestao-de-crise-1.jpeg',
                    'link' => 'https://www.uplexis.com.br/blog/compliance/compliance-na-gestao-portuaria/',
                ]
           ]); 
    }
}
