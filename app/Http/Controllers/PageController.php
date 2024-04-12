<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;
use App\Models\Post;

class PageController extends Controller
{
    public function legals(): View
    {
        return view('legals', [
            'title' => '<h1 class="text-center text-xl font-semibold">Mentions Légales</h1><br>',
            'content' => '<h2>1. Éditeur du site</h2><br>
            <p>Nom de l\'entreprise (le cas échéant)<br>
            Adresse : [Votre adresse]<br>
            Téléphone : [Votre numéro de téléphone]<br>
            Email : [Votre adresse email]<br>
            Directeur de la publication : [Votre nom]</p><br>

            <h2>2. Hébergement</h2><br>
            <p>Le site est hébergé par [Nom de l\'hébergeur]<br>
            Adresse : [Adresse de l\'hébergeur]<br>
            Téléphone : [Numéro de téléphone de l\'hébergeur]<br>
            Email : [Email de l\'hébergeur]</p><br>

            <h2>3. Propriété intellectuelle</h2><br>
            <p>Le contenu du site, notamment les textes, images, graphismes, logos, icônes, ainsi que leur mise en forme sont la propriété exclusive de [Votre entreprise ou votre nom]. Toute reproduction, distribution, modification, adaptation, ou diffusion, partielle ou intégrale, du contenu de ce site est strictement interdite sans l\'autorisation écrite préalable de [Votre entreprise ou votre nom].</p><br>

            <h2>4. Données personnelles</h2><br>
            <p>Les informations recueillies à travers le site sont destinées à [Votre entreprise ou votre nom] et ne seront en aucun cas transmises à des tiers. Conformément à la loi "Informatique et Libertés" du 6 janvier 1978 modifiée, vous disposez d\'un droit d\'accès, de rectification et de suppression des données vous concernant. Pour exercer ce droit, veuillez contacter [Votre entreprise ou votre nom] à l\'adresse [Votre adresse email].</p><br>

            <h2>5. Cookies</h2><br>
            <p>Ce site utilise des cookies pour améliorer l\'expérience utilisateur. En naviguant sur ce site, vous acceptez l\'utilisation de cookies conformément à notre politique en matière de cookies.</p><br>

            <h2>6. Liens externes</h2><br>
            <p>Le site peut contenir des liens vers des sites externes sur lesquels [Votre entreprise ou votre nom] n\'exerce aucun contrôle. En conséquence, [Votre entreprise ou votre nom] ne peut être tenu responsable du contenu de ces sites externes ni des éventuels dommages causés par leur utilisation.</p><br>

            <h2>7. Loi applicable et juridiction compétente</h2><br>
            <p>Les présentes mentions légales sont soumises au droit français. En cas de litige, les tribunaux français seront seuls compétents.</p><br>

            <h2>8. Contact</h2><br>
            <p>Pour toute question concernant les mentions légales du site, vous pouvez nous contacter à l\'adresse suivante : [Votre adresse email].</p><br>'
        ]);
    }

    public function about_us(): View
    {
        return view('about_us', [
            'title' => '<h1 class="text-center text-xl font-semibold">À propos de nous</h1><br>',
            'content' => '<section>
            <h2>Notre entreprise</h2><br>
            <p>Bienvenue sur le site de [Nom de votre entreprise] ! Nous sommes une entreprise spécialisée dans [Décrivez brièvement votre domaine d\'activité]. Notre mission est \'aider nos clients à [Expliquez ce que vous faites pour vos clients].</p><br>
        </section>

        <section>
            <h2>Notre équipe</h2><br>
            <p>Nous sommes une équipe passionnée et dévouée, composée d\'experts dans différents domaines. Chaque membre de notre équipe apporte son expertise unique pour offrir à nos clients les meilleurs produits et services.</p><br>
        </section>

        <section>
            <h2>Notre engagement</h2><br>
            <p>Chez [Nom de votre entreprise], nous nous engageons à fournir à nos clients des solutions de qualité supérieure, un service client exceptionnel et une expérience globale positive. Nous croyons en la transparence, l\'intégrité et l\'innovation.</p><br>
        </section>'
        ]);
    }

    // public function index(): View
    // {
    //     $elements = ['Element 1', 'Element 2', 'Element 3'];
    //     $title = "welcome";
    //     $content = "test content";
    //     $condition = true; 

    //     return view('head', 
    //     ['title'=>$title,
    //     'elements' => $elements,
    //     'condition' => $condition,
    //     'content'=>$content
    //     ]);
    // }


        public function articles(): View
    {
        // $posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->take(6)->get();

        return view('articles', 
        ['posts'=>$posts]
        );
    }

//     public function anotherMethod(): View
// {
//     $posts = Post::all();

//     return view('another-view', ['posts' => $posts]);
// }
}
