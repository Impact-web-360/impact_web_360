<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;

class TestArticleCreation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:test-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test article creation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $article = new Article();
            $article->nom = 'T-shirt de test';
            $article->description = 'T-shirt de test pour vérifier le fonctionnement';
            $article->image = 'test.jpg';
            $article->prix = 5000;
            $article->type = 'T-shirt';
            $article->couleur = '#ff0000';
            $article->taille = 'M';
            $article->save();

            $this->info('Article de test créé avec succès !');
            return 0;
        } catch (\Exception $e) {
            $this->error('Erreur lors de la création de l\'article : ' . $e->getMessage());
            return 1;
        }
    }
}
