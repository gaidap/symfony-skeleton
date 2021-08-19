<?php
    
    namespace App\Controller;
    
    use App\Entity\User;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Cache\Adapter\FilesystemAdapter;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class UserController extends AbstractController {
        /**
         * @Route("/user/{id}", name="user")
         */
        public function index(Request $request, User $user): Response {
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
                'users' => [$user]
            ]);
        }
        
        /**
         * @Route("/allUsers", name="allUsers")
         */
        public function allUsers(): Response {
            $cache = new FilesystemAdapter();
            $posts = $cache->getItem('database.get_posts');
            if(!$posts->isHit()) {
                $posts_from_db = ['post 1', 'post 2', 'post 3'];
                dump('connected with database...');
                $posts->set(serialize($posts_from_db));
                $posts->expiresAfter(5);
                $cache->save($posts);
            }
            dump(unserialize($posts->get()));
            $repo = $this->getDoctrine()->getRepository(User::class);
            $users = $repo->findAll();
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
                'users' => $users
            ]);
        }
    }
