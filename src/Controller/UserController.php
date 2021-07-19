<?php
    
    namespace App\Controller;
    
    use App\Entity\User;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class UserController extends AbstractController {
        /**
         * @Route("/user/{id}", name="user")
         */
        public function index(Request $request, User $user): Response {
            dump($user);
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
                'users' => [$user]
            ]);
        }
        
        /**
         * @Route("/allUsers", name="allUsers")
         */
        public function allUsers(): Response {
            $repo = $this->getDoctrine()->getRepository(User::class);
            $users = $repo->findAll();
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
                'users' => $users
            ]);
        }
    }
