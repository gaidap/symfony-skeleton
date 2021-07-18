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
                'user' => $user
            ]);
        }
        
        /**
         * @Route("/createUser", name="createUser")
         */
        public function createUser(): Response {
            $em = $this->getDoctrine()->getManager();
            $newUser = new User();
            $newUser->setName('Peter');
            $em->persist($newUser);
            $em->flush();
            dump('New user was created with id of' . $newUser->getId());
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
            ]);
        }
    }
